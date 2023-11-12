<?php
$privilege = 'Accounting';
$pagetitle = "Add Entry";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
$AccountingAddEntry = new AccountingView();
$student = 0;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student = Validation::testInput($_POST["student"]);
}
?>
        <form action="accounting_do_addentry.php" method="post" class="mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="recordedon" id="recordedon"
                            value="<?= date('Y-m-d'); ?>" placeholder="Record On Date" required>
                        <label for="recordedon">
                            Record On Date
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="student" id="student" required>
                            <option value="">Please select student</option>
                            <?= $AccountingAddEntry->displayAllStudents($student); ?>
                        </select>
                        <label for="student">
                            Student
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="description" id="description" maxlength="255"
                            placeholder="Description" required>
                        <label for="description">
                            Description
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" id="amount" class="form-control" name="amount" placeholder="Entry Amount"
                            required>
                        <label for="amount">
                            Amount
                        </label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="d-grid gap-2 mb-3">
                        <button class="btn btn-lg btn-outline-success" type="submit"><i
                                class="bi bi-plus-square-fill"></i> Add Entry</button>
                    </div>
                </div>
            </div>
        </form>
        <?= $AccountingAddEntry = NULL; ?>
        <?php require_once('includes/portal_footer.inc.php'); ?>