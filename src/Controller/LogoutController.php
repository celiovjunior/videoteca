<?php

namespace Videoteca\Mvc\Controller;

class LogoutController implements IController 
{
    public function requestProcess(): void
    {
        session_destroy();
        header('Location: /login');
    }
}