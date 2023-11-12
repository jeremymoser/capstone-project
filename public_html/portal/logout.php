<?php
require_once('includes/portal_app.inc.php');

    (new LoginController)->processLogOut();
    exit();
