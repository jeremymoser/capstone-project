<?php
$privilege = 'Librarian';
$pagetitle = "Add Book";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
?>
        <form action="librarian_do_addbook.php" method="post" class="mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="isbn10" placeholder="ISBN-10">
                        <label for="isbn13">
                            ISBN-10
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="isbn13" placeholder="ISBN-13">
                        <label for="isbn13">
                            ISBN-13
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="booktitle" placeholder="Book Title" required>
                        <label for="booktitle">
                            Title
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="bookauthor" placeholder="Book Author" required>
                        <label for="bookauthor">
                            Author
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="bookgenre" required>
                            <option value="">
                                Please select genre
                            </option>
                            <option value="Fiction">
                                Fiction
                            </option>
                            <option value="Non-Fiction" selected="selected">
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
                        <select class="form-select" name="bookactive" required>
                            <option value="1" selected="selected">
                                Available
                            </option>
                            <option value="0">
                                Not Available
                            </option>
                        </select>
                        <label for="bookgenre">
                            Status
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="d-grid gap-2 mb-3">
                        <button class="btn btn-lg btn-outline-success" type="submit"><i
                                class="bi bi-plus-square-fill mx-2"></i> Add Book</button>
                    </div>
                </div>
            </div>
        </form>
        <?php require_once('includes/portal_footer.inc.php'); ?>