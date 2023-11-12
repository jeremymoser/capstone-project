<?php
$pagetitle = "Add Term";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $TermID = Validation::testInput($_POST['termid']);

    (new RegistrantController)->processTermInfo($TermID);
}
?>
<form action="registrant_do_addterm.php" method="post" class="mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="termtitle" id="termtitle" class="form-control">
                <label for="termtitle" required>
                    Title
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="termsection" id="termsection" placeholder="Term Section" class="form-control"
                    required>
                <label for="termsection">
                    Section
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="termstart" id="termstart" placeholder="Term Start Date"
                    required>
                <label for="termstart">
                    Start Date
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="termend" id="termend" placeholder="Term End Date"
                    required>
                <label for="termend">
                    End Date
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="termactive" id="termactive">
                    <option value="1">
                        Active
                    </option>
                    <option value="0">
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
                <button class="btn btn-lg btn-outline-success" type="submit"><i
            class="bi bi-plus-square-fill me-1"></i>
                    Save Term</button>
            </div>
        </div>
    </div>
</form>
<?php require_once('includes/portal_footer.inc.php'); ?>