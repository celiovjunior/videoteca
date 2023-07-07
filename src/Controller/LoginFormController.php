<?php

namespace Videoteca\Mvc\Controller;

class LoginFormController implements IController
{
    public function requestProcess(): void
    {
        require_once __DIR__ . '/../Views/login-form.php';
    }
}