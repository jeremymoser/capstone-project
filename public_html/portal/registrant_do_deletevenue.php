<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $VenueID = Validation::testInput($_POST["venueid"]);

    (new RegistrantController)->processDeleteVenue($VenueID);
}