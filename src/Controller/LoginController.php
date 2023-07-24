<?php

namespace Videoteca\Mvc\Controller;
use PDO;

class LoginController implements IController
{
    private PDO $pdo;

    public function __construct() 
    {
        $dbPath = __DIR__ . '../../../banco.sqlite';
        $this->pdo = new PDO("sqlite:$dbPath");
    }

    public function requestProcess(): void
    {
        // buscar usando email
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        $sql = "SELECT * FROM users WHERE email = ?";

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $email);

        $statement->execute();

        $userData = $statement->fetch(PDO::FETCH_ASSOC);
        $correctPassword = password_verify($password, $userData['password'] ?? '');
        
        if ($correctPassword) {
            session_start();
            $_SESSION['logged'] = true;

            header('Location: /');
        } else {
            header('Location: /login?success=0');
        }
    }
}