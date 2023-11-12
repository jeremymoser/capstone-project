<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Librarian');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $BookID = Validation::testInput($_POST["bookid"]);
    $BookTitle = Validation::testInput($_POST["booktitle"]);

    (new LibrarianController)->processDeleteBook($BookID, $BookTitle);
}
