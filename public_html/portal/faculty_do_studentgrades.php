<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Faculty');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["classid"]) && isset($_POST["instructorid"])) {
        $ClassID = Validation::testInput($_POST["classid"]);
        $InstructorID = Validation::testInput($_POST["instructorid"]);
        foreach ($_POST as $key => $val) {
            if (is_numeric($key) && $val !== "") {
                $StudentID = $key;
                $StudentGrade = $val;

                (new FacultyController)->processFacultyStudentGrades($InstructorID, $ClassID, $StudentID, $StudentGrade);
            }
        }
    }


}