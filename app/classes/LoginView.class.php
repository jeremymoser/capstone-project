<?php

class LoginView extends LoginController
{

    /* --- METHODS --- */

    public function displayLoginError()
    {

        if (isset($_SESSION["login_failed"])) {
            $loginFailed = $_SESSION["login_failed"];

            if ($loginFailed === true) {
                $type = $_SESSION["login_failed_type"];
                $icon = $_SESSION["login_failed_icon"];
                $title = $_SESSION["login_failed_title"];
                $message = $_SESSION["login_failed_message"];
                $username_valid = $_SESSION["login_failed_username_valid"];
                $password_valid = $_SESSION["login_failed_password_valid"];

                $displayLoginError = '                <div class="alert d-flex alert-' . $type . '" role="alert">' . PHP_EOL .
                    '                   <i class="' . $icon . ' me-2"></i>' . PHP_EOL .
                    '                       <div>' . PHP_EOL .
                    '                       <strong>' . $title . ':</strong>' . PHP_EOL .
                    '                       ' . $message . PHP_EOL .
                    '                   </div>' . PHP_EOL .
                    '                </div>' . PHP_EOL;

                echo $displayLoginError;
            }
        }
    }

    public function isUsernameValid()
    {
        if (isset($_SESSION["login_failed_username_valid"])) {
            echo $_SESSION["login_failed_username_valid"];
        }
    }

    public function isPasswordValid()
    {
        if (isset($_SESSION["login_failed_password_valid"])) {
            echo $_SESSION["login_failed_password_valid"];
        }
    }

    public function clearLoginError()
    {
        $_SESSION["login_failed"] = false;
        $_SESSION["login_failed_type"] = "";
        $_SESSION["login_failed_icon"] = "";
        $_SESSION["login_failed_title"] = "";
        $_SESSION["login_failed_message"] = "";
        $_SESSION["login_failed_username_valid"] = "";
        $_SESSION["login_failed_password_valid"] = "";
    }

    public function displayUsername()
    {
        return Validation::displayInput($this->Username());
    }

    public function displayUserRole()
    {
        return Validation::displayInput($this->UserRole());
    }

    public function displayUserFullName()
    {
        return Validation::displayInput($this->UserFullName());
    }
}