<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ClassID = Validation::testInput($_POST["classid"]);

    (new RegistrantController)->processDeleteClass($ClassID);
}