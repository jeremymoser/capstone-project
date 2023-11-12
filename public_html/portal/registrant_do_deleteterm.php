<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $TermID = Validation::testInput($_POST["termid"]);

    (new RegistrantController)->processDeleteTerm($TermID);
}