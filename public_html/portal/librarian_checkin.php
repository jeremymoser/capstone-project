<?php
$privilege = 'Librarian';
$pagetitle = "Check-in Books";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
$LibraryCheckInPage = new LibrarianView();
?>
        <div class="fs-4 mt-5">
            <strong>
                Today is <span class="text-primary">
                    <?= date("l, F d, Y"); ?>
                </span>
            </strong>
        </div>
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Student</th>
                    <th scope="col">Start &amp; End</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
<?= $LibraryCheckInPage->displayCheckedOutBooks(); ?>
            </tbody>
        </table>
<script src="assets/scripts/librarian_checkin.js"></script>
<?php require_once('includes/portal_footer.inc.php'); ?>