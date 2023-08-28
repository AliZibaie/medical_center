<?php

namespace app\app\core;
USE app\app\core\Application;
class SiteController
{

    private string $layout = 'main';
    public function render($view, $params = [])
    {
        return Application::getApp()->getRouter()->renderView($view, $params);
    }

    /**
     * @return string
     */
    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @param string $layout
     */
    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    public function getDB(): \app\app\models\database\MySqlDatabase
    {
        return Application::getApp()->getDatabase();
    }

}