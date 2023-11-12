<?php
$pagetitle = "Academic Record";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Student');
$StudentAcademicRecordPage = new StudentView();
?>
<div class="row table-responsive mt-5">
        <?= $StudentAcademicRecordPage->displayStudentAcademicRecord(); ?>
</div>
<?= $StudentAcademicRecordPage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>