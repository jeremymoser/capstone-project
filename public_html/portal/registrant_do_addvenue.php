<?php

require_once('includes/portal_app.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Building = Validation::testInput($_POST["building"]);
    $Room = Validation::testInput($_POST["room"]);
    $VenueActive = Validation::testInput($_POST["venueactive"]);

    (new RegistrantController)->processAddVenue($Building, $Room, $VenueActive);
}
