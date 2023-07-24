<?php

namespace Videoteca\Mvc\Controller;

class LoginFormController implements IController
{
    public function requestProcess(): void
    {
        if (array_key_exists('logged', $_SESSION) && $_SESSION['logged'] === true) {
            header("Location: /");
            return;
        }

        require_once __DIR__ . '/../Views/login-form.php';
    }
}