<?php

require_once('includes/portal_app.inc.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["userid"]) && isset($_POST["current_password"]) && isset($_POST["new_password"])) {
        $UserID = Validation::testInput($_POST["userid"]);
        $CurrentPassword = Validation::testInput($_POST["current_password"]);
        $UserNewPassword = Validation::testInput($_POST["new_password"]);
        $NewHashedPassword = password_hash($UserNewPassword, PASSWORD_DEFAULT);

        (new UserController)->changeUserPassword($UserID, $CurrentPassword, $NewHashedPassword);
    }

    header("Location: myprofile.php");
    exit();
}