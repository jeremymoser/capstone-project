<?php
$pagetitle = "Schedule";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Student');
$StudentSchedulePage = new StudentView();

$semester = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["semester"])) {
        $semester = Validation::testInput($_POST["semester"]);
    }
} else {
    $semester = $StudentSchedulePage->displayStudentCurrentSemesterTerms();
}
?>
<div class="row mt-5">
    <div class="col-md-6">
        <form method="post">
            <div class="form-floating">
                <select name="semester" id="semester" class="form-select" onchange="this.form.submit()">
                    <option value="">Select Semester</option>
                    <option value="5,6,7" <?= ($semester === "5-6-7") ? " selected" : ""; ?>>Summer 2023</option>
                    <option value="8,9,10,11" <?= ($semester === "8,9,10,11") ? " selected" : ""; ?>>Fall 2023</option>
                    <option value="12,13,14,15" <?= ($semester === "12,13,14,15") ? " selected" : ""; ?>>Spring 2024
                    </option>
                </select>
                <label for="semester" class="form-label">Semester</label>
            </div>
        </form>
    </div>
    <?php
    if ($semester !== "" || $semester !== NULL) {
        ?>
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>Code &amp; Section</th>
                    <th>Course</th>
                    <th>Instructor</th>
                    <th>Location</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
            </thead>
            <tbody>
                <?php
                echo $StudentSchedulePage->displayStudentSchedule($semester);
                ?>
        </table>
        <?php
    }
    ?>
</div>
<?= $StudentSchedulePage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>