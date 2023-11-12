<?php
$pagetitle = "Checked Out Books";
$headtitle = "Registration | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Student');
$StudentBooksPage = new StudentView();
?>
<table class="table table-striped table-hover mt-5">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
        </tr>
    </thead>
    <tbody>
        <?php
        echo $StudentBooksPage->displayStudentBooks();
        ?>
    </tbody>
</table>
<?= $StudentBooksPage = ""; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>