<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Accounting');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $StAccountID = Validation::testInput($_POST['staccountid']);
    $StudentID = Validation::testInput($_POST['student']);
    $RecordedOn = Validation::testInput($_POST['recordedon']);
    $Description = Validation::testInput($_POST['description']);
    $Amount = Validation::testInput($_POST['amount']);

    (new AccountingController)->processEditEntry($StAccountID, $StudentID, $RecordedOn, $Description, $Amount);

    header("location: accounting_studentaccount.php");
    exit();
}