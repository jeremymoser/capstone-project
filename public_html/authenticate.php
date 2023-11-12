<?php
require_once('includes/website_app.inc.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $Username = Validation::testInput($_POST["username"]);
    $Password = Validation::testInput($_POST["password"]);

    (new LoginController)->processLogin($Username, $Password);

} else {
    header("Location: " . $web_dir . "login.php");
    exit();
}