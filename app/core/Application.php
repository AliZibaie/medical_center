<?php

namespace app\core;

class Application
{
    private Router $router;
    private Request $request;
    private Response $response;
    private Controller $controller;
    private static Application $app;
    private static string $ROOT_DIR;

    /**
     * @return string
     */
    public static function getROOTDIR(): string
    {
        return self::$ROOT_DIR;
    }
    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        self::$app  = $this;
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }
=

    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @return Application
     */
    public static function getApp(): Application
    {
        return self::$app;
    }
    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }
}