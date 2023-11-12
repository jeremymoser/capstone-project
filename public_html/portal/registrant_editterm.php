<?php
$pagetitle = "Edit Term";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $TermID = Validation::testInput($_POST['termid']);

    (new RegistrantController)->processTermInfo($TermID);
}
?>
<form action="registrant_do_editterm.php" method="post" class="mt-5">
    <input type="hidden" name="termid" value="<?= $_SESSION["TermID"] ?>">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="termtitle" id="termtitle" value="<?= $_SESSION['TermTitle'] ?>" maxlength="25"
                    class="form-control">
                <label for="termtitle">
                    Title
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="termsection" id="termsection" value="<?= $_SESSION['TermSection'] ?>"
                    maxlength="25" class="form-control">
                <label for="termsection">
                    Section
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="termstart" value="<?= $_SESSION["TermStart"]; ?>"
                    id="termstart" placeholder="Term Start Date" required>
                <label for="termstart">
                    Start Date
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="termend" value="<?= $_SESSION["TermEnd"]; ?>" id="termend"
                    placeholder="Term End Date" required>
                <label for="termend">
                    End Date
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="termactive" id="termactive">
                    <option value="1" <?= ($_SESSION['TermActive'] === '1') ? ' selected="selected"' : ''; ?>>
                        Active
                    </option>
                    <option value="0" <?= ($_SESSION['TermActive'] === '0') ? ' selected="selected"' : ''; ?>>
                        Inactive
                    </option>
                </select>
                <label for="termactive">
                    Active
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-lg btn-outline-success" type="submit"><i class="bi bi-floppy-fill mx-2"></i>
                    Save Term</button>
            </div>
        </div>
    </div>
</form>
<?php require_once('includes/portal_footer.inc.php'); ?>