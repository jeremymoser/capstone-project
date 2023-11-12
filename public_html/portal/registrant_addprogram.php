<?php
$pagetitle = "Add Program";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
?>
<form action="registrant_do_addprogram.php" method="post" class="mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="programtitle" id="programtitle" class="form-control" placeholder="Program Title">
                <label for="programtitle" required>
                    Title
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="programtype" id="programtype">
                    <option>Select Program Type</option>
                    <option>
                        Associate
                    </option>
                    <option>
                        Bachelor
                    </option>
                    <option>
                        Certificate
                    </option>
                    <option>
                        General Education
                    </option>
                </select>
                <label for="programtype">
                    Type
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="programactive" id="programactive">
                    <option value="1">
                        Active
                    </option>
                    <option value="0">
                        Inactive
                    </option>
                </select>
                <label for="programactive">
                    Active
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-lg btn-outline-success" type="submit"><i
            class="bi bi-plus-square-fill me-1"></i>
                    Add Program</button>
            </div>
        </div>
    </div>
</form>
<?php require_once('includes/portal_footer.inc.php'); ?>