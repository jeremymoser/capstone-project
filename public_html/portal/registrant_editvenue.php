<?php
$pagetitle = "Edit Venue";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $VenueID = Validation::testInput($_POST['venueid']);

    (new RegistrantController)->processVenueInfo($VenueID);
}
?>
<form action="registrant_do_editvenue.php" method="post" class="mt-5">
    <input type="hidden" name="venueid" value="<?= $_SESSION["VenueID"] ?>">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="building" id="building" value="<?= $_SESSION['Building'] ?>" maxlength="25"
                    class="form-control">
                <label for="building">
                    Building
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <input type="text" name="room" id="room" value="<?= $_SESSION['Room'] ?>" maxlength="25"
                    class="form-control">
                <label for="room">
                    Room
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="venueactive" id="venueactive">
                    <option value="1" <?= ($_SESSION['VenueActive'] === '1') ? ' selected="selected"' : ''; ?>>
                        Active
                    </option>
                    <option value="0" <?= ($_SESSION['VenueActive'] === '0') ? ' selected="selected"' : ''; ?>>
                        Inactive
                    </option>
                </select>
                <label for="venueactive">
                    Active
                </label>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-lg btn-outline-success" type="submit"><i class="bi bi-floppy-fill mx-2"></i>
                    Save Venue</button>
            </div>
        </div>
    </div>
</form>
<?php require_once('includes/portal_footer.inc.php'); ?>