<?php

class LibrarianController extends Librarian
{

    /* --- METHODS --- */

    public function processAddBook($ISBN10, $ISBN13, $BookTitle, $BookAuthor, $BookGenre, $BookActive)
    {
        $this->AddBook($ISBN10, $ISBN13, $BookTitle, $BookAuthor, $BookGenre, $BookActive);

        header('Location: librarian_books.php');
        exit();
    }

    public function processBookInfo($BookID)
    {
        $this->BookInfo($BookID);
    }

    public function processEditBook($BookID, $ISBN10, $ISBN13, $BookTitle, $BookAuthor, $BookGenre, $BookStatus, $BookActive)
    {
        $this->EditBook($BookID, $ISBN10, $ISBN13, $BookTitle, $BookAuthor, $BookGenre, $BookStatus, $BookActive);

        unset($_SESSION["BookID"]);
        unset($_SESSION["ISBN10"]);
        unset($_SESSION["ISBN13"]);
        unset($_SESSION["BookTitle"]);
        unset($_SESSION["BookAuthor"]);
        unset($_SESSION["BookGenre"]);
        unset($_SESSION["BookStatus"]);
        unset($_SESSION["BookActive"]);

        header('Location: librarian_books.php');
        exit();
    }

    public function processCheckInBook($From, $BookID, $BookTitle, $ChargeFees = 1)
    {
        $this->CheckInBook($BookID, $BookTitle, $ChargeFees);

        header('Location: ' . $From);
        exit();
    }

    public function processDeleteBook($BookID, $BookTitle)
    {
        $this->DeleteBook($BookID, $BookTitle);

        header('Location: librarian_books.php');
        exit();
    }
}