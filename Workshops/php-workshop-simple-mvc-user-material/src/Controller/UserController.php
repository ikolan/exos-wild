<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login(): string
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
            $email = trim(htmlentities($_POST["email"]));
            $password = $_POST["password"];
            $user = (new UserManager())->selectOneByEmail($_POST["email"]);
            if ($user && password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                header("Location: /");
            }
        }

        return $this->twig->render('User/login.html.twig');
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }

    public function register(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = $_POST;
            $userManager = new UserManager();
            if ($userManager->insert($credentials)) {
                return $this->login();
            }
        }
        return $this->twig->render('User/register.html.twig');
    }
}
