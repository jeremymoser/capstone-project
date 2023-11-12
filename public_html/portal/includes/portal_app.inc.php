<?php

//session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'domain' => '.smallscommunitycollege.org', 'secure' => true, 'httponly' => true, 'samesite' => 'Strict']);
session_start();

date_default_timezone_set('America/New_York');

$app_dir = '/Applications/XAMPP/xamppfiles/htdocs/smcc_project/';
$web_dir = '/smcc_project/public_html/';
$portal_dir = '/smcc_project/public_html/portal/';

require_once($app_dir . "vendor/autoload.php");
require_once($app_dir . 'app/classes/Database.class.php');
require_once($app_dir . 'app/classes/Validation.class.php');
require_once($app_dir . 'app/classes/Formatter.class.php');
require_once($app_dir . 'app/classes/Login.class.php');
require_once($app_dir . 'app/classes/LoginContr.class.php');
require_once($app_dir . 'app/classes/LoginView.class.php');
require_once($app_dir . 'app/classes/User.class.php');
require_once($app_dir . 'app/classes/UserContr.class.php');
require_once($app_dir . 'app/classes/Portal.class.php');
require_once($app_dir . 'app/classes/Librarian.class.php');
require_once($app_dir . 'app/classes/LibrarianContr.class.php');
require_once($app_dir . 'app/classes/LibrarianView.class.php');
require_once($app_dir . 'app/classes/Student.class.php');
require_once($app_dir . 'app/classes/StudentContr.class.php');
require_once($app_dir . 'app/classes/StudentView.class.php');
require_once($app_dir . 'app/classes/Faculty.class.php');
require_once($app_dir . 'app/classes/FacultyContr.class.php');
require_once($app_dir . 'app/classes/FacultyView.class.php');
require_once($app_dir . 'app/classes/Accounting.class.php');
require_once($app_dir . 'app/classes/AccountingContr.class.php');
require_once($app_dir . 'app/classes/AccountingView.class.php');
require_once($app_dir . 'app/classes/Registrant.class.php');
require_once($app_dir . 'app/classes/RegistrantContr.class.php');
require_once($app_dir . 'app/classes/RegistrantView.class.php');

$LoginView = new LoginController();
$LoginView->processIsLoggedIn();
