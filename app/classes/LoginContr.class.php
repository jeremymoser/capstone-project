<?php

class LoginController extends Login
{

    /* --- METHODS --- */

    public function processLogin(#[\SensitiveParameter] $Username, #[\SensitiveParameter] $Password)
    {
        $Login = $this->Login($Username, $Password);

        if ($Login === true) {
            header("Location: portal/");
            exit();
        } else {
            header("Location: login.php");
            exit();
        }
    }

    public function processIsLoggedIn()
    {
        $loggedIn = $this->LoggedIn();

        if ($loggedIn === false) {
            header("Location: ../login.php");
            exit();
        }
    }
    
    public function processLogout()
    {
        $this->Logout();
        header("Location: ../login.php");
        exit();
    }
}
