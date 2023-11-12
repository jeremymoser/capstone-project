<?php

class User extends Database
{

    /* --- METHODS --- */

    public function setUserPassword($UserID, #[\SensitiveParameter] $CurrentPassword, #[\SensitiveParameter] $NewHashedPassword)
    {
        $sql = "CALL SP_LoginInfo(:Username)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":Username", $_SESSION["Username"], PDO::PARAM_STR);
        $stmt->execute();

        $User = $stmt->fetch();

        $DBPassword = $User["Password"];

        $challenge = password_verify($CurrentPassword, $DBPassword);

        if ($challenge === true) {
            $sql = "CALL SP_User_ChangePassword(:UserID, :NewHashedPassword)";
            $stmt = $this->connectPDO()->prepare($sql);
            $stmt->bindParam(":UserID", $UserID, PDO::PARAM_INT);
            $stmt->bindParam(":NewHashedPassword", $NewHashedPassword, PDO::PARAM_STR);
            $stmt->execute();

            $_SESSION["Alert"] = true;
            $_SESSION["AlertType"] = "success";
            $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
            $_SESSION["AlertTitle"] = "Password changed";
            $_SESSION["AlertMessage"] = "Password changed successfully.";
        } else {
            $_SESSION["Alert"] = true;
            $_SESSION["AlertType"] = "danger";
            $_SESSION["AlertIcon"] = "bi bi-sign-stop-fill";
            $_SESSION["AlertTitle"] = "Current Password Incorrect";
            $_SESSION["AlertMessage"] = "Current password is incorrect.";
        }


        $sql = "";
        $stmt = "";
    }
}