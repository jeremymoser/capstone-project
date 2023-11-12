<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ProgramID = Validation::testInput($_POST["programid"]);

    (new RegistrantController)->processDeleteProgram($ProgramID);
}