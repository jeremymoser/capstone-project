<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ClassID = Validation::testInput($_POST["classid"]);
    $CourseID = Validation::testInput($_POST["course"]);
    $InstructorID = Validation::testInput($_POST["instructor"]);
    $ClassSection = Validation::testInput($_POST["section"]);
    $TermID = Validation::testInput($_POST["term"]);
    $VenueID = Validation::testInput($_POST["venue"]);
    $ClassActive = Validation::testInput($_POST["classactive"]);


    (new RegistrantController)->processEditClass($ClassID, $CourseID, $InstructorID, $ClassSection, $TermID, $VenueID, $ClassActive);
}
