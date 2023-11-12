<?php
$pagetitle = "Add Class";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
$RegistrantAddClassPage = new RegistrantView();
?>
<form action="registrant_do_addclass.php" method="post" class="mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="course" id="course" required>
                    <option value="">Please select Course</option>
<?= $RegistrantAddClassPage->displayClassCourses(); ?>
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
<?= $RegistrantAddClassPage->displayClassInstructors(); ?>
                </select>
                <label for="instructor">
                    Instructor
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="section" id="section" min="1" max="99"
                    placeholder="Section" required>
                <label for="section">
                    Section
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="term" id="term" required>
                    <option value="">Please select Term</option>
<?= $RegistrantAddClassPage->displayClassTerms(); ?>
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
<?= $RegistrantAddClassPage->displayClassVenues(); ?>
                </select>
                <label for="venue">
                    Venue
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-lg btn-outline-success" type="submit"><i class="bi bi-plus-square-fill mx-2"></i>
                    Add Class</button>
            </div>
        </div>
    </div>
</form>
<?= $RegistrantAddClassPage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>