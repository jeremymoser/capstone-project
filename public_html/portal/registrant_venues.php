<?php
$pagetitle = "Venues";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
include('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
$RegistrantVenuesPage = new RegistrantView();
?>
<div class="mt-5">
    <?php require_once('includes/portal_alerts.inc.php'); ?>
    <button class="btn btn-outline-success text-nowrap" onclick="location.href='registrant_addvenue.php';"><i
            class="bi bi-plus-square-fill me-1"></i> Add Venue</button>
</div>
<table class="table table-striped table-hover mt-3">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Building</th>
            <th scope="col">Room</th>
            <th scope="col">Active</th>
            <th scope="col">Actions</th>

        </tr>
    </thead>
    <tbody>
<?= $RegistrantVenuesPage->displayVenues(); ?>
    </tbody>
</table>
<?= $RegistrantVenuesPage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>