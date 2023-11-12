<?php

class LibrarianView extends LibrarianController
{

    /* --- METHODS --- */

    public function displayCheckedOutBooks()
    {
        $Result = $this->CheckedOutBooks();

        $displayCheckedOutBooks = '';

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $BookID = Validation::displayInput($row['BookID']);
                $BookISBN10 = Validation::displayInput($row['ISBN10']);
                $BookISBN13 = Validation::displayInput($row['ISBN13']);
                ($BookISBN13 === "" || $BookISBN13 === NULL) ? $BookISBN = $BookISBN10 : $BookISBN = $BookISBN13;
                $BookTitle = Validation::displayInput($row['BookTitle']);
                $BookAuthor = Validation::displayInput($row['BookAuthor']);
                $BookGenre = Validation::displayInput($row['BookGenre']);
                $StudentName = Validation::displayInput($row["StudentName"]);
                $BorrowStart = Validation::displayInput($row["Start"]);
                $BorrowEnd = Validation::displayInput($row["End"]);

                $displayCheckedOutBooks .= '                  <tr>' . PHP_EOL .
                    '                       <td>' . $BookID . '</td>' . PHP_EOL .
                    '                       <td>' . $BookTitle . '<br><span class="text-secondary">ISBN: ' . $BookISBN . '</span></td>' . PHP_EOL .
                    '                       <td>' . $BookAuthor . '</td>' . PHP_EOL .
                    '                       <td>' . $BookGenre . '</td>' . PHP_EOL .
                    '                       <td>' . $StudentName . '</td>' . PHP_EOL .
                    '                       <td>Start: ' . $BorrowStart . '<br>End: <span class="' . $this->getBorrowEndTextColor($BorrowEnd) . '">' . $BorrowEnd . '</span></td>' . PHP_EOL .
                    '                       <td><form action="librarian_do_checkin.php" onsubmit="javascript:chargeFees(' . $BookID . ');" method="post" class="mb-0" id="checkinbook_' . $BookID . '"><input type="hidden" name="from" value="librarian_checkin.php"><input type="hidden" name="bookid" value="' . $BookID . '"><input type="hidden" name="booktitle" value="' . $BookTitle . '"><input type="hidden" name="borrowend" id="borrowend_' . $BookID . '" value="' .  $BorrowEnd . '"><input type="hidden" name="chargefees" id="chargefees_' . $BookID . '" value="1"><button class="btn btn-outline-warning text-nowrap"><i class="bi bi-check-circle-fill me-1"></i> Check-in Book</button></form></td>' . PHP_EOL .
                    '                  </tr>' . PHP_EOL;
            }
        } else {
            $displayCheckedOutBooks .=
                '                  <tr>' . PHP_EOL .
                '                       <td colspan="7">No results returned.</td>' . PHP_EOL;
        }
        $Result = "";
        return $displayCheckedOutBooks;
    }

    public function displayBooks()
    {
        $Result = $this->Books();

        $displayBooks = '';

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $BookISBN10 = Validation::displayInput($row['ISBN10']);
                $BookISBN13 = Validation::displayInput($row['ISBN13']);
                ($BookISBN13 === "" || $BookISBN13 === NULL) ? $BookISBN = $BookISBN10 : $BookISBN = $BookISBN13;
                $BookTitle = Validation::displayInput($row['BookTitle']);
                $BookAuthor = Validation::displayInput($row['BookAuthor']);
                $BookID = Validation::displayInput($row['BookID']);
                $BookGenre = Validation::displayInput($row['BookGenre']);
                $BookStatus = Validation::displayInput($row["BookStatus"]);
                $BookActive = Validation::displayInput($row["BookActive"]);
                ($BookActive == 1) ? $BookActive = 'Yes' : $BookActive = 'No';

                $displayBooks .= '                  <tr>' . PHP_EOL .
                    '                       <td>' . $BookID . '</td>' . PHP_EOL .
                    '                       <td>' . $BookTitle . '<br><span class="text-secondary">ISBN : ' . $BookISBN . '</span></td>' . PHP_EOL .
                    '                       <td>' . $BookAuthor . '</td>' . PHP_EOL .
                    '                       <td>' . $BookGenre . '</td>' . PHP_EOL .
                    '                       <td class="' . $this->getBookStatusTextColor($BookStatus) . '">' . $BookStatus . '</td>' . PHP_EOL .
                    '                       <td>' . $BookActive . '</td>' . PHP_EOL .
                    '                       <td class="text-nowrap"><div class="d-flex"><form action="librarian_editbook.php" method="post" class="mb-0"><input type="hidden" name="bookid" value="' . $BookID . '"><button type="submit" class="btn btn-outline-primary mx-1" title="Edit Book"><i class="bi bi-pencil-square"></i></button></form><form action="librarian_do_deletebook.php" method="post" class="mb-0"><input type="hidden" name="bookid" value="' . $BookID . '"><input type="hidden" name="booktitle" value="' . $BookTitle . '"><button type="submit" class="btn btn-outline-danger text-nowrap mx-1" title="Delete Book"><i class="bi bi-trash3-fill"></i></button></div></form></div></td>' . PHP_EOL .
                    '                  </tr>' . PHP_EOL;
            }
        } else {
            $displayBooks .=
                '                  <tr>' . PHP_EOL .
                '                       <td colspan="7">No results returned.</td>' . PHP_EOL;
        }
        $Result = "";
        return $displayBooks;
    }

    public function getBookStatusTextColor($BookStatus)
    {
        ($BookStatus === 'Available') ? $TextColor = 'text-success' : $TextColor = 'text-danger';
        return $TextColor;
    }

    public function getBorrowEndTextColor($BorrowEnd)
    {
        ($BorrowEnd >= date("m/d/Y")) ? $TextColor = 'text-success' : $TextColor = 'text-danger';
        return $TextColor;
    }

    public function displayCheckInBooksCount()
    {
        $CheckInBookCount = $this->CheckInBookCount();
        $displayCheckInBookCount .= '<span class="badge rounded-pill text-bg-secondary">' . $CheckInBookCount . '</span>';
        return $displayCheckInBookCount;
    }
}