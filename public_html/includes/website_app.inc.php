<?php
    
    //session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'domain' => '.smallscommunitycollege.org', 'secure' => true, 'httponly' => true, 'samesite' => 'Strict']);
    session_start();

    date_default_timezone_set('America/New_York');

    $app_dir = '/Applications/XAMPP/xamppfiles/htdocs/smcc_project/';
    $web_dir = '/smcc_project/public_html/';

    require_once ($app_dir . "vendor/autoload.php");
    require_once ($app_dir . 'app/classes/Database.class.php');
    require_once ($app_dir . 'app/classes/Validation.class.php');
    require_once ($app_dir . 'app/classes/Website.class.php');
    require_once ($app_dir . 'app/classes/WebsiteView.class.php');
    require_once ($app_dir . 'app/classes/Login.class.php');
    require_once ($app_dir . 'app/classes/LoginContr.class.php');
    require_once ($app_dir . 'app/classes/LoginView.class.php');
