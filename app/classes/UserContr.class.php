<?php

class UserController extends User
{

    /* --- METHODS --- */

    public function changeUserPassword($UserID, #[\SensitiveParameter] $CurrentPassword, #[\SensitiveParameter] $UserHashedPassword)
    {
        $this->setUserPassword($UserID, $CurrentPassword, $UserHashedPassword);
    }

    public function verifyAccessPrivilege($UserRoleRequired) {
        if ($_SESSION["UserRole"] !== $UserRoleRequired) {
            $_SESSION["Alert"] = true;
            $_SESSION["AlertType"] = "danger";
            $_SESSION["AlertIcon"] = "bi bi-exclamation-octagon-fill";
            $_SESSION["AlertTitle"] = "Unauthorized Access";
            $_SESSION["AlertMessage"] = "You do not have access privileges to the resource you attempted to access.";

            header("Location: index.php");
            exit();
        }
    }
}