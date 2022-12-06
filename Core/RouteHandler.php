<?php

namespace Core;

use DevCoder\Router;

class RouteHandler
{
    protected static ?Router $router = \null;

    /**
     * function uri
     *
     * @return string
     */
    public static function uri()
    {
        return $uri = urldecode(
            parse_url(($_SERVER['REQUEST_URI'] ?? \null), PHP_URL_PATH)
        );
    }

    /**
     * function readRequest
     *
     * @return
     */
    public static function readRequest()
    {
        // https://github.com/devcoder-xyz/php-router

        try {
            $route = static::routerInstance()->matchFromPath(
                $_SERVER['REQUEST_URI'],
                $_SERVER['REQUEST_METHOD']
            );

            $parameters = $route->getParameters();
            // $arguments = ['id' => 2]
            $arguments = $route->getVars();

            $controllerName = $parameters[0];
            $methodName = $parameters[1] ?? null;

            $controller = new $controllerName();
            if (!is_callable($controller)) {
                $controller =  [$controller, $methodName];
            }

            echo $controller(...array_values($arguments));
        } catch (\Exception $exception) {
            header("HTTP/1.0 404 Not Found");
        }
    }

    /**
     * function routerInstance
     *
     * @return Router
     */
    public static function routerInstance(): Router
    {
        return static::$router ??= new Router(
            require __DIR__ . '/../Resources/routes.php'
        );
    }
}
