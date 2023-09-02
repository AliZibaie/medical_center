<?php

namespace app\app\core;

USE app\app\models\database\MySqlDatabase;
USE app\app\models\database\MySqlDatabaseConnection;

class Application
{
    private Router $router;
    private Request $request;
    private Response $response;
    private SiteController $controller;
    private MySqlDatabase $database;
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
        $this->controller = new SiteController();
        $this->router = new Router($this->request,$this->response);
        $this->database = new MySqlDatabase(MySqlDatabaseConnection::getInstance());
    }
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
     * @param SiteController $controller
     */
    public function setController(SiteController $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return SiteController
     */
    public function getController(): SiteController
    {
        return $this->controller;
    }

    /**
     * @return MySqlDatabase
     */
    public function getDatabase(): MySqlDatabase
    {
        return $this->database;
    }

}