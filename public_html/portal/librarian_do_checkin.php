<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Librarian');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $From = Validation::testInput($_POST["from"]);
    $BookID = Validation::testInput($_POST["bookid"]);
    $BookTitle = Validation::testInput($_POST["booktitle"]);
    $ChargeFees = Validation::testInput($_POST["chargefees"]);

    (new LibrarianController)->processCheckInBook($From, $BookID, $BookTitle, $ChargeFees);
}
