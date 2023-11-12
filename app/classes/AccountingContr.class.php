<?php

class AccountingController extends Accounting
{

    /* --- PROPERTIES --- */


    /* --- METHODS --- */

    public function processAddEntry($StudentID, $RecordedOn, $Description, $Amount)
    {
        $this->AddEntry($StudentID, $RecordedOn, $Description, $Amount);

        $_SESSION["student"] = Validation::displayInput($StudentID);

        header("location: accounting_studentaccount.php");
        exit();
    }

    public function processStudentAccountEntry($StAccountID, $StudentID) {
        $Result = $this->StudentAccountEntry($StAccountID, $StudentID);

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $_SESSION["StAccountID"] = Validation::displayInput($row["StAccountID"]);
                $_SESSION["StudentID"] = Validation::displayInput($row["Student"]);
                $_SESSION["RecordedOn"] = Validation::displayInput($row["RecordedOn"]);
                $_SESSION["Description"] = Validation::displayInput($row["Description"]);
                $_SESSION["Amount"] = Validation::displayInput($row["Amount"]);
            }
        } else {
            $_SESSION["Error"] = "Error: Unable to retrieve entry details.";
        }
        $Result = NULL;
    }

    public function processEditEntry($StAccountID, $StudentID, $RecordedOn, $Description, $Amount)
    {
        $this->EditEntry($StAccountID, $StudentID, $RecordedOn, $Description, $Amount);

        unset($_SESSION["StAccountID"]);
        unset($_SESSION["StudentID"]);
        unset($_SESSION["RecordedOn"]);
        unset($_SESSION["Description"]);
        unset($_SESSION["Amount"]);

        $_SESSION["student"] = Validation::displayInput($StudentID);

        header("location: accounting_studentaccount.php");
        exit();
    }

    public function processDeleteEntry($StAccountID, $StudentID)
    {
        $this->DeleteEntry($StAccountID, $StudentID);

        $_SESSION["student"] = Validation::displayInput($StudentID);

        header("location: accounting_studentaccount.php");
        exit();
    }
}