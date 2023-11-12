<?php

class Login extends Database
{

    /* --- METHODS --- */

    protected function Login(#[\SensitiveParameter] $Username, #[\SensitiveParameter] $Password)
    {
        $formUsername = Validation::testInput($Username);
        $formPassword = Validation::testInput($Password);

        $sql = "CALL SP_LoginInfo(:username)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':username', $formUsername, PDO::PARAM_STR);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $Login = false;

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $UserID = $row["UserID"];
                $Username = Validation::displayInput($row["Username"]);
                $HashedPassword = Validation::displayInput($row['Password']);
                $UserRole = Validation::displayInput($row["UserRole"]);
                $LinkedID = Validation::displayInput($row["LinkedID"]);
            }

            $Login = password_verify($formPassword, $HashedPassword);

            $formPassword = NULL;
            $HashedPassword = NULL;

        } else {
            $Login = false;
        }

        if ($Login === true) {
            session_regenerate_id(true);
            $_SESSION["Authenticated"] = true;
            $_SESSION["UserID"] = $UserID;
            $_SESSION["Username"] = $Username;
            $_SESSION["UserRole"] = $UserRole;
            $_SESSION["LinkedID"] = $LinkedID;

            $this->UserInfo($UserID, $UserRole);

        } else {
            $_SESSION["login_failed"] = true;
            $_SESSION["login_failed_type"] = "danger";
            $_SESSION["login_failed_icon"] = "bi bi-exclamation-octagon-fill";
            $_SESSION["login_failed_title"] = "Login Failed";
            $_SESSION["login_failed_message"] = "The username and password entered are incorrect. Please <span class=\"text-nowrap\">try again.</span>";
            $_SESSION["login_failed_username_valid"] = " is-invalid";
            $_SESSION["login_failed_password_valid"] = " is-invalid";
        }
        $sql = NULL;
        $stmt = NULL;
        $Result = NULL;
        return $Login;
    }

    protected function UserInfo(#[\SensitiveParameter] $UserID, $UserRole)
    {
        $UserID = $_SESSION["UserID"];
        $UserRole = $_SESSION["UserRole"];
        $sql = "CALL SP_UserInfo(:UserID, :UserRole)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':UserID', $UserID, PDO::PARAM_STR);
        $stmt->bindParam(':UserRole', $UserRole, PDO::PARAM_STR);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $UserFirstName = Validation::displayInput($row['UserFirstName']);
                $UserLastName = Validation::displayInput($row['UserLastName']);
                $UserFullName = Validation::displayInput($row['UserFullName']);

                $_SESSION["UserFirstName"] = $UserFirstName;
                $_SESSION["UserLastName"] = $UserLastName;
                $_SESSION["UserFullName"] = $UserFullName;
            }
        }
        $sql = NULL;
        $stmt = NULL;
        $Result = NULL;
    }

    protected function LoggedIn()
    {
        $loggedIn = false;
        if (isset($_SESSION["Authenticated"])) {
            if (!$_SESSION["Authenticated"] === true || $_SESSION["UserID"] === NULL || $_SESSION["UserID"] === "" || $_SESSION["Username"] === NULL || $_SESSION["Username"] === "") {
                $loggedIn = false;
            } else {
                $loggedIn = true;
            }
        }

        if ($loggedIn === false) {
            $_SESSION["login_failed"] = true;
            $_SESSION["login_failed_type"] = "danger";
            $_SESSION["login_failed_icon"] = "bi bi-exclamation-octagon-fill";
            $_SESSION["login_failed_title"] = "Login Required";
            $_SESSION["login_failed_message"] = "The resource you attempted to access requires you to login. Please enter your username <span class=\"text-nowrap\">and password.</span>";
            $_SESSION["login_failed_username_valid"] = " is-invalid";
            $_SESSION["login_failed_password_valid"] = " is-invalid";
        }
        return $loggedIn;
    }

    protected function Username()
    {
        return $_SESSION["Username"];
    }

    protected function UserRole()
    {
        return $_SESSION["UserRole"];
    }

    protected function UserFirstName()
    {
        return $_SESSION["UserFirstName"];
    }

    protected function UserLastName()
    {
        return $_SESSION["UserLastName"];
    }

    protected function UserFullName()
    {
        return $_SESSION["UserFullName"];
    }

    protected function Logout()
    {
        session_unset();
        session_destroy();
        // Start a New Session & Generate a New Session ID
        session_start();
        session_regenerate_id(true);
        $_SESSION["login_failed"] = true;
        $_SESSION["login_failed_type"] = "success";
        $_SESSION["login_failed_icon"] = "bi bi-door-closed-fill";
        $_SESSION["login_failed_title"] = "Logged Out";
        $_SESSION["login_failed_message"] = "You have successfully logged out of the SCC Portal. See you <span class=\"text-nowrap\">next time!</span>";
        $_SESSION["login_failed_username_valid"] = "";
        $_SESSION["login_failed_password_valid"] = "";
    }
}