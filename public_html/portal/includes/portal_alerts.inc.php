<?php
if (isset($_SESSION["Alert"])) {

    if ($_SESSION["Alert"] === true) {
        $Type = $_SESSION["AlertType"];
        $Icon = $_SESSION["AlertIcon"];
        $Title = $_SESSION["AlertTitle"];
        $Message = $_SESSION["AlertMessage"];

        $displayAlert = '                <div class="alert d-flex alert-' . $Type . '" role="alert">' . PHP_EOL .
            '                   <i class="' . $Icon . ' me-2"></i>' . PHP_EOL .
            '                       <div>' . PHP_EOL .
            '                       <strong>' . $Title . ':</strong> ' . PHP_EOL .
            '                       ' . $Message . PHP_EOL .
            '                   </div>' . PHP_EOL .
            '                </div>' . PHP_EOL;
        echo $displayAlert;
    }
}
