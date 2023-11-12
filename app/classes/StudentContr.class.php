<?php

class StudentController extends Student
{

    /* --- METHODS --- */

    public function processStudentAccountPayment($StudentID, $StudentPaymentAmount)
    {
        $this->StudentAccountPayment($StudentID, $StudentPaymentAmount);

        header("Location: student_account.php");
        exit();
    }
}
