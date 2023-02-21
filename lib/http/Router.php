<?php

class Router
{
  private array $routes = [
    "GET" => [],
    "POST" => [],
    "PUT" => [],
    "PATCH" => [],
    "DELETE" => []
  ];

  private function addRoute(string $path, callable | array | string $action, string $method): void
  {
    if (str_starts_with($path, '/')) $path = substr($path, 1);
    if (str_ends_with($path, '/')) $path = substr($path, 0, -1);
    $this->routes[$method][$path] = $action;
  }

  public function get(string $path, callable | array | string $action): void
  {
    $this->addRoute($path, $action, 'GET');
  }

  public function post(string $path, callable | array | string $action): void
  {
    $this->addRoute($path, $action, 'POST');
  }

  public function put(string $path, callable | array | string $action): void
  {
    $this->addRoute($path, $action, 'PUT');
  }

  public function patch(string $path, callable | array | string $action): void
  {
    $this->addRoute($path, $action, 'PATCH');
  }

  public function delete(string $path, callable | array | string $action): void
  {
    $this->addRoute($path, $action, 'DELETE');
  }

  public function api(string $path, string $controllerNamespace): void
  {
    $this->get($path, [$controllerNamespace, 'index']);
    $this->get($path . "/{id}", [$controllerNamespace, 'find']);
    $this->post($path, [$controllerNamespace, 'create']);
    $this->put($path . "/{id}", [$controllerNamespace, 'update']);
    $this->patch($path . "/{id}", [$controllerNamespace, 'update']);
    $this->delete($path . "/{id}", [$controllerNamespace, 'destroy']);
  }

  public function resource(string $path, string $controllerNamespace): void
  {
    $this->get($path . "/new", [$controllerNamespace, "new"]);
    $this->api($path, $controllerNamespace);
    $this->get($path . "/{id}/edit", [$controllerNamespace, "edit"]);
  }

  private function callAction(callable | array | string $action, array $vars = [])
  {
    if (is_callable($action)) {
      $response = $action(...$vars);
    } else {
      $class =  !is_string($action) ? new $action[0] : new $action;
      $method = !is_string($action) ? ($action[1] ?? "__invoke") : "__invoke";
      $response = $class->$method(...$vars);
    }
    return is_array($response) ? json($response) : $response;
  }

  public function load()
  {
    $url = current_url();
    $explodedUrl = explode("/", $url);
    foreach ($this->routes[current_method()] as $key => $value) {
      $explodedAction = explode("/", $key);
      if (count($explodedAction) !== count($explodedUrl)) continue;
      $validRoute = true;
      $vars = [];
      for ($i = 0; $i < count($explodedAction); $i++) {
        $currentAction = $explodedAction[$i];
        if (str_starts_with($currentAction, '{') && str_ends_with($currentAction, '}')) {
          $key = str_replace('{', '', $currentAction);
          $key = str_replace('}', '', $key);
          $vars[$key] = $explodedUrl[$i];
        } else if ($currentAction !== $explodedUrl[$i]) {
          $validRoute = false;
          break;
        };
      }
      if (!$validRoute) continue;
      die($this->callAction($value, $vars));
    }
    die(json(['message' => 'Page not found.'], 404));
  }
}
