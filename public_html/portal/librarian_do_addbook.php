<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Librarian');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ISBN10 = Validation::testInput($_POST["isbn10"]);
    if ($ISBN10 === "") {
        $ISBN10 = NULL;
    }
    $ISBN13 = Validation::testInput($_POST["isbn13"]);
    if ($ISBN13 === "") {
        $ISBN13 = NULL;
    }
    $BookTitle = Validation::testInput($_POST["booktitle"]);
    $BookAuthor = Validation::testInput($_POST["bookauthor"]);
    $BookGenre = Validation::testInput($_POST["bookgenre"]);
    $BookActive = Validation::testInput($_POST["bookactive"]);

    (new LibrarianController)->processAddBook($ISBN10, $ISBN13, $BookTitle, $BookAuthor, $BookGenre, $BookActive);

    header('Location: librarian_books.php');
    exit();
}