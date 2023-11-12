<?php

class FacultyController extends Faculty
{

    /* --- METHODS --- */

    public function processFacultyStudentGrades($InstructorID, $ClassID, $StudentID, $StudentGrade)
    {
        $this->FacultyStudentGrades($InstructorID, $ClassID, $StudentID, $StudentGrade);

        $_SESSION["class"] = Validation::displayInput($ClassID);

        header('Location: faculty_grades.php');
        exit();
    }

}