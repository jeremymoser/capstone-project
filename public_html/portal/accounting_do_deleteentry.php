<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Accounting');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $StAccountID = Validation::testInput($_POST['staccountid']);
    $StudentID = Validation::testInput($_POST['studentid']); 

    (new AccountingController)->processDeleteEntry($StAccountID, $StudentID);

    header("location: accounting_studentaccount.php");
    exit();
}