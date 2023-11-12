<?php

class Librarian extends Database
{

    /* --- METHODS --- */

    protected function CheckedOutBooks()
    {
        $sql = "CALL SP_Librarian_CheckedOutBooks()";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function CheckInBook($BookID, $BookTitle, $ChargeFees)
    {
        echo 'Charge Fees : ' . $ChargeFees;
        $sql = "CALL SP_Librarian_CheckInBook(:BookID, :ChargeFees)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':BookID', $BookID, PDO::PARAM_INT);
        $stmt->bindParam(':ChargeFees', $ChargeFees, PDO::PARAM_BOOL);
        $stmt->execute();

        if($ChargeFees == 1) {
            $FeeMessage = "Associated fee posted to student account.";
        } else {
            $FeeMessage = "Associated fee waived.";
        }

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Book Checked In";
        $_SESSION["AlertMessage"] = Validation::displayInput($BookTitle) . " (" . $BookID . ") has been checked in successfully. " . $FeeMessage;

        $sql = NULL;
        $stmt = NULL;
    }

    protected function Books()
    {
        $sql = "CALL SP_Librarian_Books()";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function AddBook($ISBN10, $ISBN13, $BookTitle, $BookAuthor, $BookGenre, $BookActive)
    {
        $sql = "CALL SP_Librarian_AddBook(:ISBN10, :ISBN13, :BookTitle, :BookAuthor, :BookGenre, :BookActive)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':ISBN10', $ISBN10, PDO::PARAM_STR);
        $stmt->bindParam(':ISBN13', $ISBN13, PDO::PARAM_STR);
        $stmt->bindParam(':BookTitle', $BookTitle, PDO::PARAM_STR);
        $stmt->bindParam(':BookAuthor', $BookAuthor, PDO::PARAM_STR);
        $stmt->bindParam(':BookGenre', $BookGenre, PDO::PARAM_STR);
        $stmt->bindParam(':BookActive', $BookActive, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Book Added";
        $_SESSION["AlertMessage"] = $BookTitle . " has been added successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function BookInfo($BookID)
    {
        $sql = "CALL SP_Librarian_BookInfo(:BookID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':BookID', $BookID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $_SESSION['BookID'] = Validation::displayInput($row['BookID']);
                $_SESSION['ISBN10'] = Validation::displayInput($row['ISBN10']);
                $_SESSION['ISBN13'] = Validation::displayInput($row['ISBN13']);
                $_SESSION['BookTitle'] = Validation::displayInput($row['BookTitle']);
                $_SESSION['BookAuthor'] = Validation::displayInput($row['BookAuthor']);
                $_SESSION['BookGenre'] = Validation::displayInput($row['BookGenre']);
                $_SESSION['BookStatus'] = Validation::displayInput($row['BookStatus']);
                $_SESSION['BookActive'] = Validation::displayInput($row['BookActive']);
            }
        }
        $sql = NULL;
        $stmt = NULL;
    }

    protected function CheckInBookCount()
    {
        $sql = "CALL SP_Librarian_CheckInBookCount()";
        $stmt = $this->connectPDO()->query($sql);
        $stmt->execute();
        $stmt->fetchAll();

        $RowCount = $stmt->rowCount();

        $sql = NULL;
        $stmt = NULL;
        return $RowCount;
    }

    protected function EditBook($BookID, $ISBN10, $ISBN13, $BookTitle, $BookAuthor, $BookGenre, $BookStatus, $BookActive)
    {
        $this->BookID = $BookID;
        $this->ISBN10 = $ISBN10;
        $this->ISBN13 = $ISBN13;
        $this->BookTitle = $BookTitle;
        $this->BookAuthor = $BookAuthor;
        $this->BookGenre = $BookGenre;
        $this->BookStatus = $BookStatus;
        $this->BookActive = $BookActive;

        $sql = "CALL SP_Librarian_EditBook(:BookID, :ISBN10, :ISBN13, :BookTitle, :BookAuthor, :BookGenre, :BookStatus, :BookActive)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':BookID', $BookID, PDO::PARAM_INT);
        $stmt->bindParam(':ISBN10', $ISBN10, PDO::PARAM_STR);
        $stmt->bindParam(':ISBN13', $ISBN13, PDO::PARAM_STR);
        $stmt->bindParam(':BookTitle', $BookTitle, PDO::PARAM_STR);
        $stmt->bindParam(':BookAuthor', $BookAuthor, PDO::PARAM_STR);
        $stmt->bindParam(':BookGenre', $BookGenre, PDO::PARAM_STR);
        $stmt->bindParam(':BookStatus', $BookStatus, PDO::PARAM_STR);
        $stmt->bindParam(':BookActive', $BookActive, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Book Updated";
        $_SESSION["AlertMessage"] = Validation::displayInput($BookTitle) . " (ID #" . Validation::displayInput($BookID) . ") has been updated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function DeleteBook($BookID, $BookTitle)
    {
        $sql = "CALL SP_Librarian_DeleteBook(:BookID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':BookID', $BookID, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Book Deleted";
        $_SESSION["AlertMessage"] = Validation::displayInput($BookTitle) . " (ID #" . Validation::displayInput($BookID) . ") has been deleted successfully.";

        $sql = NULL;
        $stmt = NULL;
    }
}