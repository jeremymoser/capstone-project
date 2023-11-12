<?php
$privilege = 'Faculty';
$pagetitle = "Class Roster";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
$FacultyClassRosterPage = new FacultyView();

$class = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["class"])) {
        $class = Validation::testInput($_POST["class"]);
    }
}
?>
<div class="row mt-5">
    <div class="col-md-8">
        <form method="post">
            <div class="form-floating">
                <select class="form-select" id="class" name="class" onchange="this.form.submit()">
                    <option value="">Select class</option>
                    <?php
                    echo $FacultyClassRosterPage->displayFacultyClasses($class);
                    ?>
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
            <form action="faculty_grades.php" method="post">
                <input type="hidden" name="class" value="<?php echo $class; ?>">
                <button class="btn btn-outline-success">View/Enter Grades</button>
            </form>
            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Enrollment Date</th>
                        <th scope="col">Program of Study</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $FacultyClassRosterPage->displayFacultyClassRoster($class);
        }
        ?>
        </table>
    </div>
</div>
<?= $FacultyClassRosterPage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>