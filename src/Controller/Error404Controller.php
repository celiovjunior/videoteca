<?php

namespace Videoteca\Mvc\Controller;

class Error404Controller
{
    public function requestProcess(): void
    {
        http_response_code(404);
    }
}