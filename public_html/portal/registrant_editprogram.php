<?php
$pagetitle = "Edit Program";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ProgramID = Validation::testInput($_POST['programid']);

    (new RegistrantController)->processProgramInfo($ProgramID);
}
?>
<form action="registrant_do_editprogram.php" method="post" class="mt-5">
    <input type="hidden" name="programid" id="programid" value="<?= $_SESSION["ProgramID"]; ?>">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="programtitle" id="programtitle" value="<?= $_SESSION["ProgramTitle"]; ?>" class="form-control"
                    placeholder="Program Title">
                <label for="programtitle" required>
                    Title
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="programtype" id="programtype">
                    <option <?= ($_SESSION["ProgramType"] === 'Associate') ? ' selected="selected"': ''; ?>>
                        Associate
                    </option>
                    <option <?= ($_SESSION["ProgramType"] === 'Bachelor') ? ' selected="selected"': ''; ?>>
                        Bachelor
                    </option>
                    <option <?= ($_SESSION["ProgramType"] === 'Certificate') ? ' selected="selected"': ''; ?>>
                        Certificate
                    </option>
                    <option <?= ($_SESSION["ProgramType"] === 'General Education') ? ' selected="selected"': ''; ?>>
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
                    <option value="1" <?= ($_SESSION["ProgramActive"] == 1) ? ' selected="selected"': ''; ?>>
                        Active
                    </option>
                    <option value="0" <?= ($_SESSION["ProgramActive"] == 0) ? ' selected="selected"': ''; ?>>
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
                <button class="btn btn-lg btn-outline-success" type="submit"><i class="bi bi-floppy-fill mx-2"></i>
                    Save Program</button>
            </div>
        </div>
    </div>
</form>
<?php require_once('includes/portal_footer.inc.php'); ?>