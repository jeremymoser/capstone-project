<?php

class Student extends Database
{

    /* --- METHODS --- */

    protected function StudentInfo($StudentID)
    {
        $sql = "CALL SP_Student_Info(:StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function StudentAccount($StudentID)
    {
        $sql = "CALL SP_Student_Account(:StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function StudentSchedule($StudentID, $Semester)
    {
        $sql = "CALL SP_Student_Schedule(:StudentID, :Semester)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->bindParam(":Semester", $Semester, PDO::PARAM_STR);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function StudentAccountBalance($StudentID)
    {
        $sql = "CALL SP_Student_AccountBalance(:StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetch();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function StudentAccountPayment($StudentID, $PaymentAmount)
    {
        $sql = "CALL SP_Student_AccountPayment(:StudentID, :PaymentAmount)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->bindParam(":PaymentAmount", $PaymentAmount, PDO::PARAM_STR);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Account Payment Applied";
        $_SESSION["AlertMessage"] = "Your payment of " . Formatter::formatCurrency($PaymentAmount) . " has been applied to your account successfully.";
    }

    protected function StudentBorrowCount($StudentID)
    {
        $sql = "CALL SP_Student_BorrowCount(:StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function StudentParkingDecals($StudentID)
    {
        $sql = "CALL SP_Student_ParkingDecals(:StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function StudentBooks($StudentID)
    {
        $sql = "CALL SP_Student_Books(:StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        return $Result;
    }

    protected function StudentAcademicRecord($StudentID) {
        $sql = "CALL SP_Student_AcademicRecord(:StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function StudentCumulativeGPA($StudentID) {
        $sql = "CALL SP_Student_CumulativeGPA(:StudentID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        
        if(count($Result) === 1) {
            foreach($Result as $row) {
                $EarnedGradePoints = $row["EarnedGradePoints"];
                $EarnedUnits = $row["EarnedUnits"];

                if($EarnedGradePoints !== NULL && $EarnedGradePoints !== 0 && $EarnedUnits !== NULL && $EarnedUnits !== 0) {
                    return number_format($EarnedGradePoints / $EarnedUnits, 2);
                } else {
                    return "Unavailable";
                }
            }
        }
    }
}
