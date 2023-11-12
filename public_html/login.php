<?php
$pagetitle = "Portal Login";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/website_head.inc.php');
?>
        <div class="row">
            <div
                class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 bg-body-secondary mt-2 p-3 rounded">
<?php
    $LoginPage = new LoginView();
    $LoginPage->displayLoginError();
?>
                <form action="authenticate.php" method="post" novalidate>
                    <div class="form-floating my-3">
                        <input type="text" name="username" id="username" class="form-control<?= $LoginPage->isUsernameValid(); ?>"
                            placeholder="Username" autocapitalize="off" required>
                        <label for="username" class="mb-3">Username</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="form-control<?= $LoginPage->isPasswordValid(); ?>" required>
                        <label for="password" class="mb-3">Password</label>
                    </div>
                    <div class="form-floating d-grid mb-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg text-nowrap">
                            <i class="bi bi-lock-fill"></i> Login
                        </button>
                    </div>
                    <div class="text-center small text-danger mb-2">
                        <strong>
                            Unauthorized use is prohibited.
                        </strong>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $LoginPage->clearLoginError(); ?>
    <?php require_once('includes/website_footer.inc.php'); ?>