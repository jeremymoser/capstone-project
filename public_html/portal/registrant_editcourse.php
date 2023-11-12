<?php
$pagetitle = "Edit Course";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
$RegistrantEditCoursePage = new RegistrantView();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $CourseID = Validation::testInput($_POST['courseid']);

    (new RegistrantController)->processCourseInfo($CourseID);
}
?>
<form action="registrant_do_editcourse.php" method="post" class="mt-5">
    <input type="hidden" name="courseid" value="<?= $CourseID; ?>">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="coursecode" id="coursecode" value="<?= $_SESSION['CourseCode']; ?>" class="form-control" maxlength="10"
                    placeholder="Course Code">
                <label for="coursecode" required>
                    Code
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="coursetitle" id="coursetitle" value="<?= $_SESSION['CourseTitle']; ?>" class="form-control" placeholder="Course Title">
                <label for="coursetitle" required>
                    Title
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="number" name="coursecredit" id="coursecredit" value="<?= $_SESSION["CourseCredit"]; ?>" class="form-control"
                    placeholder="Course Credit">
                <label for="coursecredit" required>
                    Credit
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="coursedepartment" id="coursedepartment">
                    <option value="">
                        Please Select Department
                    </option>
                    <?= $RegistrantEditCoursePage->displayDeptFilter($_SESSION['CourseDepartment']); ?>
                </select>
                <label for="coursedepartment">
                    Department
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="number" name="coursefee" id="coursefee" value="<?= $_SESSION['CourseFee']; ?>" class="form-control" placeholder="Course Fee">
                <label for="coursefee" required>
                    Fee
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="courseactive" id="courseactive">
                    <option value="1"<?= ($_SESSION["CourseActive"] == 1) ? ' selected="selected"': ''; ?>>
                        Active
                    </option>
                    <option value="0"<?= ($_SESSION["CourseActive"] == 0) ? ' selected="selected"': ''; ?>>
                        Inactive
                    </option>
                </select>
                <label for="courseactive">
                    Active
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-lg btn-outline-success" type="submit"><i class="bi bi-floppy-fill mx-2"></i>
                    Save Program</button>
            </div>
        </div>
    </div>
</form>
<?= $RegistrantEditCoursePage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>