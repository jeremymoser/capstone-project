<?php

class Accounting extends Database
{

    /* --- METHODS --- */

    protected function AllStudents()
    {
        $sql = "CALL SP_Accounting_AllStudents()";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function StudentAccount($StudentID)
    {
        $sql = "CALL SP_Accounting_StudentAccount(:StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function AddEntry($StudentID, $RecordedOn, $Description, $Amount)
    {
        $sql = "CALL SP_Accounting_AddEntry(:StudentID, :RecordedOn, :Description, :Amount)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->bindParam(":RecordedOn", $RecordedOn, PDO::PARAM_STR);
        $stmt->bindParam(":Description", $Description, PDO::PARAM_STR);
        $stmt->bindParam(":Amount", $Amount, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Entry Added";
        $_SESSION["AlertMessage"] = "The account entry has been added successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function StudentAccountEntry($StAccountID, $StudentID)
    {
        $sql = "CALL SP_Accounting_StudentAccountEntry(:StAccountID, :StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StAccountID", $StAccountID, PDO::PARAM_INT);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function EditEntry($StAccountID, $StudentID, $RecordedOn, $Description, $Amount)
    {
        $sql = "CALL SP_Accounting_EditEntry(:StAccountID, :StudentID, :RecordedOn, :Description, :Amount)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StAccountID", $StAccountID, PDO::PARAM_INT);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->bindParam(":RecordedOn", $RecordedOn, PDO::PARAM_STR);
        $stmt->bindParam(":Description", $Description, PDO::PARAM_STR);
        $stmt->bindParam(":Amount", $Amount, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Entry Saved";
        $_SESSION["AlertMessage"] = "The account entry (ID #" . $StAccountID . ") has been updated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function DeleteEntry($StAccountID, $StudentID)
    {
        $sql = "CALL SP_Accounting_DeleteEntry(:StAccountID, :StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StAccountID", $StAccountID, PDO::PARAM_INT);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Entry Deleted";
        $_SESSION["AlertMessage"] = "The account entry (ID #" . $StAccountID . ") has been deleted successfully.";

        $sql = NULL;
        $stmt = NULL;
    }
}