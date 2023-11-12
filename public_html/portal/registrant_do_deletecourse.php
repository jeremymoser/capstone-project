<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $CourseID = Validation::testInput($_POST["courseid"]);

    (new RegistrantController)->processDeleteCourse($CourseID);
}