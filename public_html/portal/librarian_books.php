<?php
$privilege = 'Librarian';
$pagetitle = "Books";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
include('includes/portal_head.inc.php');
$LibraryBooksPage = new LibrarianView();
?>
        <div class="mt-5">
            <?php require_once('includes/portal_alerts.inc.php'); ?>
            <button class="btn btn-outline-success text-nowrap" onclick="location.href='librarian_addbook.php';"><i
                    class="bi bi-plus-square-fill me-1"></i> Add Book</button>
        </div>
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Status</th>
                    <th scope="col">Active</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
<?= $LibraryBooksPage->displayBooks(); ?>
            </tbody>
        </table>
<?php require_once('includes/portal_footer.inc.php'); ?>