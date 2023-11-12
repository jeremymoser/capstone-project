<?php
$pagetitle = "Add Course";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
$RegistrantAddCoursePage = new RegistrantView();
?>
<form action="registrant_do_addcourse.php" method="post" class="mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="coursecode" id="coursecode" class="form-control" maxlength="10" placeholder="Course Code">
                <label for="coursecode" required>
                    Code
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="coursetitle" id="coursetitle" class="form-control"
                    placeholder="Course Title">
                <label for="coursetitle" required>
                    Title
                </label>
            </div>
        </div>        
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="number" name="coursecredit" id="coursecredit" class="form-control"
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
<?= $RegistrantAddCoursePage->displayDeptFilter(); ?>
                </select>
                <label for="coursedepartment">
                    Department
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="number" name="coursefee" id="coursefee" class="form-control"
                    placeholder="Course Fee">
                <label for="coursefee" required>
                    Fee
                </label>
            </div>
        </div>        
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="courseactive" id="courseactive">
                    <option value="1">
                        Active
                    </option>
                    <option value="0">
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
                <button class="btn btn-lg btn-outline-success" type="submit"><i class="bi bi-plus-square-fill me-1"></i>
                    Add Program</button>
            </div>
        </div>
    </div>
</form>
<?= $RegistrantAddCoursePage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>