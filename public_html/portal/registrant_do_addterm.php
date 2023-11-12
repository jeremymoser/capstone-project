<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $TermID = Validation::testInput($_POST["termid"]);
    $TermTitle = Validation::testInput($_POST["termtitle"]);
    $TermSection = Validation::testInput($_POST["termsection"]);
    $TermStart = Validation::testInput($_POST["termstart"]);
    $TermEnd = Validation::testInput($_POST["termend"]);
    $TermActive = Validation::testInput($_POST["termactive"]);

    (new RegistrantController)->processAddTerm($TermTitle, $TermSection, $TermStart, $TermEnd, $TermActive);
}
