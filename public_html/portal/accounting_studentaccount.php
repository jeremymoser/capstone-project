<?php
$privilege = 'Accounting';
$pagetitle = "Student Account";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
$StudentAccountPage = new AccountingView();

$student = "";
if (isset($_SESSION["student"])) {
    $student = Validation::testInput($_SESSION["student"]);
    unset($_SESSION["student"]);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["student"])) {
        $student = Validation::testInput($_POST["student"]);
    }
}
?>
        <div class="row mt-5">
            <div class="col">
                <?php require_once('includes/portal_alerts.inc.php'); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <form method="post">
                    <div class="form-floating">
                        <select name="student" id="student" class="form-select" onchange="this.form.submit()">
                            <option value="">Please select student</option>
                            <?= $StudentAccountPage->displayAllStudents($student); ?>
                        </select>
                        <label for="student" class="form-label">Student</label>
                    </div>
                </form>
            </div>
        </div>
        <?php if ($student !== "") { ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <form action="accounting_addentry.php" method="post" class="mb-0">
                        <input type="hidden" name="student" value="<?= $student; ?>">
                        <button type="submit" class="btn btn-outline-success text-nowrap"><i
                                class="bi bi-plus-square-fill me-1"></i> Add Entry</button>
                    </form>
                </div>
            </div>
            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $StudentAccountPage->displayStudentAccount($student); ?>
            </table>
        <?php } ?>
    </div>
    <?= $StudentAccountPage = NULL; ?>
    <?php require_once('includes/portal_footer.inc.php'); ?>