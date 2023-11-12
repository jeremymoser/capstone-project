<?php
require_once 'includes/portal_app.inc.php';
(new UserController)->verifyAccessPrivilege('Accounting');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $StudentID = Validation::testInput($_POST["student"]);
    $RecordedOn = Validation::testInput($_POST["recordedon"]);
    $Description = Validation::testInput($_POST["description"]);
    $Amount = Validation::testInput($_POST["amount"]);

    (new AccountingController)->processAddEntry($StudentID, $RecordedOn, $Description, $Amount);
}
