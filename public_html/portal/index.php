<?php
require_once('includes/portal_app.inc.php');
$pagetitle = "SCC Portal";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
$PortalPage = new LoginView();
$Hour = date('G'); // current hour, 24-hour format
if ($Hour >= 5 && $Hour < 12) {
    $Greeting = "Good morning";
} elseif ($Hour >= 12 && $Hour < 17){
    $Greeting = "Good afternoon";
} else {
    $Greeting = "Good evening";
}
?>
<div class="mt-5">
    <?php require_once('includes/portal_alerts.inc.php'); ?>
</div>
<h2 class="mt-3">
    <?= $Greeting; ?>, <span class="text-primary"> <?= $PortalPage->displayUserFullName(); ?></span>!
</h2>
<div class="row mt-5">
    <?php
    if ($PortalPage->displayUserRole() === "Librarian") {
        ?>
        <div class="order-1 order-md-2 order-lg-1 col-md-6 col-lg-4 my-2">
            <div class="card border-primary h-100">
                <div class="card-header text-bg-primary fs-5"><strong>Librarian</strong></div>
                <div class="card-body">
                    <ul class="my-1">
                        <li>
                            <a href="librarian_books.php">Books</a>
                        </li>
                        <li>
                            <a href="librarian_checkin.php">Check-in Books</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if ($_SESSION["UserRole"] === "Student") {
        $StudentPortalPage = new StudentView();
        ?>
        <div class="order-1 order-md-2 order-lg-1  col-md-6 col-lg-4 my-2">
            <div class="card border-primary h-100">
                <div class="card-header text-bg-primary fs-5"><strong>Student</strong></div>
                <div class="card-body">
                    <ul class="my-1">
                        <li>
                            <a href="student_summary.php">
                                Summary
                            </a>
                        </li>
                        <li>
                            <a href="student_academicrecord.php">
                                Academic Record</a>
                        </li>
                        <li>
                            <a href="student_account.php">
                                Account</a>
                            <span class="badge text-bg-info">
                                <?= $StudentPortalPage->displayStudentAccountBalance(); ?>
                            </span>
                        </li>
                        <li>
                            <a href="student_books.php">
                                Checked Out Books</a>
                            <span class="badge text-bg-info">
                                <?= $StudentPortalPage->displayStudentBorrowCount(); ?>
                            </span>
                        </li>
                        <li>
                            <a href="student_schedule.php">
                                Schedule</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if ($_SESSION["UserRole"] === "Faculty") {
        $FacultyPortalPage = new FacultyView();
        ?>
        <div class="order-1 order-md-2 order-lg-1  col-md-6 col-lg-4 my-2">
            <div class="card border-primary h-100">
                <div class="card-header text-bg-primary fs-5"><strong>Faculty</strong></div>
                <div class="card-body">
                    <ul class="my-1">
                        <li>
                            <a href="faculty_classroster.php">
                                Class Roster</a>
                            <span class="badge text-bg-info">
                                <?= $FacultyPortalPage->displayFacultyClassCount(); ?>
                            </span>
                        </li>
                        <li>
                            <a href="faculty_grades.php">Grades</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if ($_SESSION["UserRole"] === "Accounting") {
        ?>
        <div class="order-1 order-md-2 order-lg-1  col-md-6 col-lg-4 my-2">
            <div class="card border-primary h-100">
                <div class="card-header text-bg-primary fs-5"><strong>Accounting</strong></div>
                <div class="card-body">
                    <ul class="my-1">
                        <li>
                            <a href="accounting_studentaccount.php">
                                Student Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if ($_SESSION["UserRole"] === "Registrant") {
        ?>
        <div class="order-1 order-md-2 order-lg-1  col-md-6 col-lg-4 my-2">
            <div class="card border-primary h-100">
                <div class="card-header text-bg-primary fs-5"><strong>Registrant</strong></div>
                <div class="card-body">
                    <ul class="my-1">
                        <li>
                            <a href="registrant_classes.php">
                                Classes</a>
                        </li>
                        <li>
                            <a href="registrant_courses.php">
                                Courses</a>
                        </li>
                        <li>
                            <a href="registrant_programs.php">
                                Programs</a>
                        </li>
                        <li>
                            <a href="registrant_terms.php">
                                Terms</a>
                        </li>
                        <li>
                            <a href="registrant_venues.php">
                                Venues</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="order-2 order-sm-1 order-lg-2  col-md-12 col-lg-8 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <strong>Frequently Used Apps</strong>
            </div>
            <div class="card-body d-flex align-items-center text-primary text-center">
                <div class="col"><a href="javascript:alert('Link to Mail');"><i
                            class="bi bi-inbox-fill fs-1"></i><br>Mail</a></div>
                <div class="col"><a href="javascript:alert('Link to Canvas');"><i
                            class="bi bi-person-video2 fs-1"></i><br>Canvas</a></div>
                <div class="col"><a href="javascript:alert('Link to Workday');"><i
                            class="bi bi-card-heading fs-1"></i><br>Workday</a></div>
                <div class="col"><a href="javascript:alert('Link to Helpdesk');"><i
                            class="bi bi-headset fs-1"></i><br>Helpdesk</a></div>
            </div>
        </div>
    </div>
    <div class="order-3 order-md-3 col-md-6 col-lg-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5"><strong>Quick Links</strong></div>
            <div class="card-body">
                <ul>
                    <li><a href="javascript:alert('Link to Technical Support - IT Service Desk');">Technical Support -
                            IT Service Desk</a></li>
                    <?php if ($_SESSION["UserRole"] === "Student") { ?>
                        <li><a href="javascript:alert('Link to Privacy Policy');">Request a Transcript</a></li>
                        <li><a href="javascript:alert('Link to Tuition Payment Plan');">Tuition Payment Plan</a></li>
                        <li><a href="javascript:alert('Link to SCC Student ID');">SCC Student ID</a></li>
                        <li><a href="javascript:alert('Link to Student Activities');">Student Activities</a></li>
                        <li><a href="javascript:alert('Link to College News');">College News</a></li>
                        <li><a href="javascript:alert('Link to Academic Advising');">Academic Advising</a></li>
                    <?php } ?>
                    <?php if ($_SESSION["UserRole"] === "Faculty" || $_SESSION["UserRole"] === "Librarian" || $_SESSION["UserRole"] === "Accounting" || $_SESSION["UserRole"] === "Registrant") { ?>
                        <li><a href="javascript:alert('Link to Employee Assistance Program (EAP)');">Employee Assistance
                                Program (EAP)</a></li>
                        <li><a href="javascript:alert('Link to ADP Portal: Timecard & Paycheck');">ADP Portal: Timecard &
                                Paycheck</a></li>
                        <li><a href="javascript:alert('Link to Training & Development');">Training &amp; Development</a>
                        </li>
                    <?php } ?>
                    <li><a href="https://smallscommunitycollege.org/" target="_blank">College Website Homepage</a></li>
                    <li><a href="javascript:alert('Link to Privacy Policy');">Privacy Policy</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="order-4 col-md-6 col-lg-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5"><strong>Today on Campus</strong></div>
            <div class="card-body">
                <h5 class="text-primary">Wednesday, December 6th, 2023</h5>
                <ul>
                    <li>Bachelor Capstone Presentations</li>
                    <li>Final Exams</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="order-5 col-md-6 col-lg-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5"><strong>Upcoming Events</strong></div>
            <div class="card-body">
                <h5 class="text-primary">Thursday, December 14, 2023</h5>
                <ul>
                    <li>Term Ends</li>
                </ul>
                <h5 class="text-primary">Thursday, December 19, 2023</h5>
                <ul>
                    <li>Commencement Ceremony</li>
                </ul>
                <h5 class="text-primary">Wednesday, December 20th, 2023 through Monday, January 1st, 2024</h5>
                <ul>
                    <li>Winter Break</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php require_once('includes/portal_footer.inc.php'); ?>