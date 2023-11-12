<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $CourseID = Validation::testInput($_POST["courseid"]);
    $CourseCode = Validation::testInput($_POST["coursecode"]);
    $CourseTitle = Validation::testInput($_POST["coursetitle"]);
    $CourseCredit = Validation::testInput($_POST["coursecredit"]);
    $CourseDepartment = Validation::testInput($_POST["coursedepartment"]);
    $CourseFee = Validation::testInput($_POST["coursefee"]);
    $CourseActive = Validation::testInput($_POST["courseactive"]);

    (new RegistrantController)->processEditCourse($CourseID, $CourseCode, $CourseTitle, $CourseCredit, $CourseDepartment, $CourseFee, $CourseActive);
}