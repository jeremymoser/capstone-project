<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ProgramID = Validation::testInput($_POST['programid']);
    $ProgramTitle = Validation::testInput($_POST["programtitle"]);
    $ProgramType = Validation::testInput($_POST["programtype"]);
    $ProgramActive = Validation::testInput($_POST["programactive"]);

    (new RegistrantController)->processEditProgram($ProgramID, $ProgramTitle, $ProgramType, $ProgramActive);
}
