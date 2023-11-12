<?php
require_once('includes/portal_app.inc.php');
if (isset($privilege)) {
    (new UserController)->verifyAccessPrivilege($privilege);
}
?>
<!-- Portal Head Starts -->
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>
        <?php echo $headtitle; ?>
    </title>
</head>
<!-- Portal Head Ends -->
<!-- Portal Body Starts -->

<body>
    <?php require_once('includes/portal_navbar.inc.php'); ?>
    <div class="container" style="margin-top: 75px;">
        <h1>
            <?= $pagetitle; ?>
        </h1>
        <?php require_once('includes/portal_alerts.inc.php'); ?>