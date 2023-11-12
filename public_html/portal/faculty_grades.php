<?php
$privilege = 'Faculty';
$pagetitle = "Grades";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
$FacultyGradesPage = new FacultyView();
$class = "";
if (isset($_SESSION["class"])) {
    $class = Validation::testInput($_SESSION["class"]);
    unset($_SESSION["class"]);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["class"])) {
        $class = Validation::testInput($_POST["class"]);
    }
}
?>
<div class="row mt-5">
    <?php require_once('includes/portal_alerts.inc.php'); ?>
    <div class="col-md-8">
        <form method="post">
            <div class="form-floating">
                <select class="form-select" id="class" name="class" onchange="this.form.submit()">
                    <option value="">Select class</option>
                    <?= $FacultyGradesPage->displayFacultyClasses($class); ?>
                </select>
                <label for="class" class="form-label">Class</label>
            </div>
        </form>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <?php
        if ($class !== "") {
            ?>
            <form action="faculty_classroster.php" method="post">
                <input type="hidden" name="class" value="<?php echo $class; ?>">
                <button class="btn btn-outline-success">View Class Roster</button>
            </form>
            <form action="faculty_do_studentgrades.php" method="post">
                <input type="hidden" name="classid" value="<?= $class; ?>">
                <input type="hidden" name="instructorid" value="<?= $FacultyGradesPage->displayInstructorID(); ?>">
                <table class="table table-striped table-hover mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Enrollment Date</th>
                            <th scope="col">Program of Study</th>
                            <th scope="col">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $FacultyGradesPage->displayFacultyClassRoster($class, $Grades = true); ?>
                </table>
            </form>
            <?php
        }
        ?>
    </div>
</div>
<?= $FacultyGradesPage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>