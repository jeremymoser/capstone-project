<?php
require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Student');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["studentid"])) {
        $StudentID = Validation::testInput($_POST["studentid"]);
        $StudentPaymentAmount = Validation::testInput($_POST["paymentamount"]);

        (new StudentController)->processStudentAccountPayment($StudentID, $StudentPaymentAmount);
    }
}
