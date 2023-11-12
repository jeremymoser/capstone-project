<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $CourseID = Validation::testInput($_POST["course"]);
    $InstructorID = Validation::testInput($_POST["instructor"]);
    $Section = Validation::testInput($_POST["section"]);
    $TermID = Validation::testInput($_POST["term"]);
    $VenueID = Validation::testInput($_POST["venue"]);

    (new RegistrantController)->processAddClass($CourseID, $InstructorID, $Section, $TermID, $VenueID);
}