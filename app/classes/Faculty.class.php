<?php

class Faculty extends Database
{

    /* --- METHODS --- */

    protected function FacultyInfo($InstructorID)
    {
        $sql = "CALL SP_Faculty_Info(:InstructorID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":InstructorID", $InstructorID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;

    }

    protected function FacultyClasses($InstructorID)
    {
        $sql = "CALL SP_Faculty_Classes(:InstructorID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":InstructorID", $InstructorID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function FacultyClassRoster($InstructorID, $ClassID)
    {
        $sql = "CALL SP_Faculty_ClassRoster(:InstructorID, :ClassID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":InstructorID", $InstructorID, PDO::PARAM_INT);
        $stmt->bindParam(":ClassID", $ClassID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function FacultyClassCount($InstructorID)
    {
        $sql = "CALL SP_Faculty_ClassCount(:InstructorID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":InstructorID", $InstructorID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchColumn();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function FacultyStudentGrades($InstructorID, $ClassID, $StudentID, $StudentGrade)
    {
        $sql = "CALL SP_Faculty_StudentGrade(:InstructorID, :ClassID, :StudentID, :StudentGrade)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":InstructorID", $InstructorID, PDO::PARAM_INT);
        $stmt->bindParam(":ClassID", $ClassID, PDO::PARAM_INT);
        $stmt->bindParam(":StudentID", $StudentID, PDO::PARAM_INT);
        $stmt->bindParam(":StudentGrade", $StudentGrade, PDO::PARAM_STR);
        $stmt->execute();

        $sql = NULL;
        $stmt = NULL;

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Grades Added";
        $_SESSION["AlertMessage"] = "The class grades have been added successfully.";
    }
}