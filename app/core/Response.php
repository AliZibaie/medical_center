<?php

namespace app\core\Response;

class Response
{
    public function setStatusCode(int $code) : void
    {
        http_response_code($code);
    }
}