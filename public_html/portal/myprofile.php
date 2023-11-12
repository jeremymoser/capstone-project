<?php
$pagetitle = "My Profile";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
$MyProfilePage = new LoginView();
?>
        <div class="row mt-5">
            <div class="col-md-6col-lg-4 col-xl-3 rounded">
                <div class="card text-primary border-primary fs-5 p-3">
                    User :
                    <?= $MyProfilePage->displayUserFullName(); ?><br>
                    Role :
                    <?= $MyProfilePage->displayUserRole(); ?>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <?php require_once('includes/portal_alerts.inc.php'); ?>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#changePasswordModal">
                <i class="bi bi-key-fill me-1"></i>
                Change Password
            </button>
        </div>
        <!-- My Profile Change Password Modal Begins -->
        <div class="modal fade" id="changePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header fs-4">Change My Password</div>
                    <form action="myprofile_do_changepassword.php" method="post" novalidate>
                        <input type="text" name="userid" id="userid" class="form-control d-none"
                            value="<?= $_SESSION["UserID"]; ?>" tabindex="-1" required>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="password" name="current_password" id="current_password" class="form-control"
                                    tabindex="1" placeholder="Current Password">
                                <label for="current_password" class="mb-3">Current Password</label>
                            </div>
                            <div class="mb-3">
                                New password must:
                                <ul>
                                    <li id="current">be different from previous password</li>
                                    <li id="length">include at least ten (10) characters</li>
                                    <li id="uppercase">include at least one uppercase letter (A-Z)</li>
                                    <li id="number">include at least one number (0-9)</li>
                                    <li id="special">include at least one special character<br>(<span
                                            class="font-monospace">~!@#$%^&*-_=[]{};,.?</span>)</li>
                                </ul>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="new_password" id="new_password" class="form-control"
                                    tabindex="2" placeholder="New Password" required>
                                <label for="new_password" class="mb-3">New Password</label>
                            </div>
                            <div class="form-floating mb-3 d-none" id="confirm_new_password_field">
                                <input type="password" name="confirm_new_password" id="confirm_new_password"
                                    class="form-control" tabindex="3" placeholder="Confirm New Password" required>
                                <label for="confirm_new_password" class="mb-3">Confirm New Password</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning mx-2 float-start" name="clear" id="clear"
                                tabindex="4" onclick="javascript:resetField();">Reset</button>
                            <button type="submit" class="btn btn-success mx-2" name="save" id="save"
                                tabindex="5" disabled>Save</button>
                            <button type="button" class="btn btn-secondary" name="close" id="close" tabindex="6"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- My Profile Change Password Modal Ends -->
<?= $MyProfilePage = NULL; ?>
        <script src="assets/scripts/myprofile.js"></script>
        <?php require_once('includes/portal_footer.inc.php'); ?>
        