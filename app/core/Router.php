<?php

namespace core;

class Router
{
    private array $routes;

    private Request $request;
    private Response $response;

    /**
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path,$callback)
    {
        $this->routes['get'][$path]=$callback;
    }
    public function post($path,$callback)
    {
        $this->routes['post'][$path]=$callback;
    }
    public function resolve()
    {
        $path = $this->request->getPath();
        $method= $this->request->method();
        $callback= $this->routes[$method][$path] ?? false;
        if (!$callback){
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        if (is_string($callback)){
            return $this->renderView($callback);
        }
        if (is_array($callback)){
            Application::getApp()->setController(new $callback[0]);
            $callback[0] = Application::getApp()->getController();
        }

        return call_user_func($callback, $this->request);
    }
    public static function __callStatic(string $name, array $arguments)
    {
        return call_user_func($name, $arguments);
    }
    public  function __call(string $name, array $arguments)
    {
        return call_user_func($name, $arguments);
    }
    public function renderView($view,  $params = []) : string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = str_replace('{{title}}',$view,$layoutContent);
        $layoutContent = str_replace("{".$view."}",'text-primary',$layoutContent);
        return str_replace('{{content}}',$viewContent,$layoutContent);
    }
    public function layoutContent(): string
    {
        $layout = Application::getApp()->getController()->getLayout();
        ob_start();
        include_once Application::getROOTDIR()."/views/layout/$layout.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view, $params ) : string
    {
        foreach ($params as $key => $param){
            $$key= $param;
        }
        ob_start();
        include_once Application::getROOTDIR()."/views/$view.php";
        return ob_get_clean();
    }
    public function asset($folder,$file) : string
    {
        return __DIR__."../$folder/$file";
    }
    public function url($url) : string
    {
        return trim('http://localhost:8000/','/').Application::getROOTDIR().'/'.trim($url,'/');
    }
    public function redirect($path , $time = 0) : void
    {
        header("Refresh:$time;url=".trim('http://localhost:8000/','/').'/'.trim($path,'/'));
        exit();
    }

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

}