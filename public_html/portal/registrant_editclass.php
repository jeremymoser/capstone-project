<?php
$pagetitle = "Edit Class";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
$RegistrantEditClass = new RegistrantView();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ClassID = Validation::testInput($_POST['classid']);

    (new RegistrantController)->processClassInfo($ClassID);
}
?>
<form action="registrant_do_editclass.php" method="post" class="mt-5">
    <input type="hidden" name="classid" value="<?= $_SESSION["ClassID"] ?>">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="course" id="course" required>
                    <option value="">Please select Course</option>
                    <?= $RegistrantEditClass->displayClassCourses($_SESSION["Course"]); ?>
                </select>
                <label for="course">
                    Course
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="instructor" id="instructor" required>
                    <option value="">Please select Instructor</option>
                    <?= $RegistrantEditClass->displayClassInstructors($_SESSION["Instructor"]); ?>
                </select>
                <label for="instructor">
                    Instructor
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="section" id="section"
                    value="<?= $_SESSION["ClassSection"] ?>" min=" 1" max="99" placeholder="Section" required>
                <label for="section">
                    Section
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="term" id="term" required>
                    <option value="">Please select Term</option>
                    <?= $RegistrantEditClass->displayClassTerms($_SESSION["ClassTerm"]); ?>
                </select>
                <label for="term">
                    Term
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="venue" id="venue" required>
                    <option value="">Please select Venue</option>
                    <?= $RegistrantEditClass->displayClassVenues($_SESSION["ClassVenue"]); ?>
                </select>
                <label for="venue">
                    Venue
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="classactive" id="classactive">
                    <option value="1" <?= ($_SESSION['ClassActive'] == '1') ? ' selected="selected"' : ''; ?>>
                        Active
                    </option>
                    <option value="0" <?= ($_SESSION['ClassActive'] == '0') ? ' selected="selected"' : ''; ?>>
                        Inactive
                    </option>
                </select>
                <label for="classactive">
                    Active
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-lg btn-outline-success" type="submit"><i class="bi bi-floppy-fill mx-2"></i>
                    Save Class</button>
            </div>
        </div>
    </div>
</form>
<?= $RegistrantEditClass = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>