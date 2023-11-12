<?php
$pagetitle = "Account";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Student');
$StudentAccountPage = new StudentView();
?>
<div class="mt-5">
    <?php include_once 'includes/portal_alerts.inc.php'; ?>
    <button class="btn btn-outline-success text-nowrap" data-bs-toggle="modal" data-bs-target="#StudentAccountPayment"
        <?= ($StudentAccountPage->displayStudentAccountBalance(false) == 0.00) ? " disabled" : ""; ?>>
        <i class="bi bi-credit-card me-1"></i>
        Make Payment
    </button>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>Desciprtion</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
        echo $StudentAccountPage->displayStudentAccount($StudentAccountPage->displayStudentID());
        ?>
</table>
<div class="modal" id="StudentAccountPayment" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <form action="student_do_accountpayment.php" method="post" class="mb-0">
                <input type="hidden" name="studentid" value="<?= $StudentAccountPage->displayStudentID(); ?>">
                <div class="modal-header fs-4">
                    Account Payment
                </div>
                <div class="modal-body">
                    <div class="fs-5 text-primary text-center">
                        Account Balance :
                        <?= $StudentAccountPage->displayStudentAccountBalance(true); ?>
                    </div>

                    <div class="form-floating my-3">
                        <input type="number" name="paymentamount"
                            value="<?= $StudentAccountPage->displayStudentAccountBalance(false); ?>" step="any"
                            id="paymentamount" class="form-control" min="0.00"
                            max="<?= $StudentAccountPage->displayStudentAccountBalance(false); ?>" tabindex="1"
                            placeholder="Payment Amount" required>
                        <label for="paymentamount" class="mb-3">Payment Amount</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="paymentcardno" value="9999-9999-9999-9999" id="paymentcardno"
                            class="form-control" tabindex="2" maxlength="19" placeholder="Card Number" required>
                        <label for="paymentcardno" class="mb-3">Card Number</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="paymentcardexpirymonth" id="paymentcardexpirymonth" tabindex="3"
                                    class="form-select">
                                    <option value="">Select Month</option>
                                    <option value="01">01 - January</option>
                                    <option value="02">02 - Febuary</option>
                                    <option value="03">03 - March</option>
                                    <option value="04">04 - April</option>
                                    <option value="05">05 - May</option>
                                    <option value="06">06 - June</option>
                                    <option value="07">07 - July</option>
                                    <option value="08">08 - Augest</option>
                                    <option value="09">09 - September</option>
                                    <option value="10">10 - October</option>
                                    <option value="11">11 - Novemeber</option>
                                    <option value="12" selected>12 - December</option>
                                </select>
                                <label for="paymentcardexpirymonth" class="mb-3">Expiry Month</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="paymentcardexpiryyear" id="paymentcardexpiryyear" tabindex="4"
                                    class="form-select">
                                    <option value="">Select Year</option>
                                    <option value="2023" selected>2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                </select>
                                <label for="paymentcardexpiryyear" class="mb-3">Expiry Year</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="paymentcardcvv" value="999" id="paymentcardcvv"
                                    class="form-control" tabindex="5" placeholder="Card Number" required>
                                <label for="paymentcardcvv" class="mb-3">CVV</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="paymentpostalcode"
                                    value="<?= $StudentAccountPage->displayStudentPostalCode(); ?>"
                                    id="paymentpostalcode" class="form-control" tabindex="6" maxlength="10"
                                    placeholder="Postal Code" required>
                                <label for="paymentcpostalcode" class="mb-3">Postal Code</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-warning" tabindex="7">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" tabindex="8">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $StudentAccountPage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>