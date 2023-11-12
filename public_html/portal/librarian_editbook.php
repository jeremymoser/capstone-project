<?php
$privilege = 'Librarian';
$pagetitle = "Edit Book";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $BookID = Validation::testInput($_POST['bookid']);

    (new LibrarianController)->processBookInfo($BookID);
}
?>
        <form action="librarian_do_editbook.php" method="post" class="mt-5">
            <?php require_once('includes/portal_alerts.inc.php'); ?>
            <input type="hidden" name="bookid" value="<?= $_SESSION['BookID']; ?>">
            <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="isbn10" placeholder="ISBN-10"
                            value="<?= $_SESSION['ISBN10']; ?>">
                        <label for="isbn10">
                            ISBN-10
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="isbn13" placeholder="ISBN-13"
                            value="<?= $_SESSION['ISBN13']; ?>">
                        <label for="isbn13">
                            ISBN-13
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="booktitle" placeholder="Book Title"
                            value="<?= $_SESSION['BookTitle']; ?>" required>
                        <label for="booktitle">
                            Title
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="bookauthor" placeholder="Book Author"
                            value="<?= $_SESSION['BookAuthor']; ?>" required>
                        <label for="bookauthor">
                            Author
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="bookgenre" required>
                            <option value="">
                                Please select one
                            </option>
                            <option value="Fiction" <?= ($_SESSION['BookGenre'] == 'Fiction') ? ' selected="selected"' : ''; ?>>
                                Fiction
                            </option>
                            <option value="Non-Fiction" <?= ($_SESSION['BookGenre'] == 'Non-Fiction') ? ' selected="selected"' : ''; ?>>
                                Non-Fiction
                            </option>
                        </select>
                        <label for="bookgenre">
                            Genre
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="bookstatus">
                            <option value="Available" <?= ($_SESSION['BookStatus'] === 'Available') ? ' selected="selected"' : ''; ?>>
                                Available
                            </option>
                            <option value="Checked Out" <?= ($_SESSION['BookStatus'] === 'Checked Out') ? ' selected="selected"' : ''; ?>>
                                Checked Out
                            </option>
                        </select>
                        <label for="bookstatus">
                            Status
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="bookactive">
                            <option value="1" <?= ($_SESSION['BookActive'] === '1') ? ' selected="selected"' : ''; ?>>
                                Active
                            </option>
                            <option value="0" <?= ($_SESSION['BookActive'] === '0') ? ' selected="selected"' : ''; ?>>
                                Inactive
                            </option>
                        </select>
                        <label for="bookactive">
                            Active
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="d-grid gap-2 mb-3">
                        <button class="btn btn-lg btn-outline-success" type="submit"><i class="bi bi-floppy-fill mx-2"></i>
                            Save Book</button>
                    </div>
                </div>
            </div>
        </form>
        <?php require_once('includes/portal_footer.inc.php'); ?>