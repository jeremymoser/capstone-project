<?php
$pagetitle = "Summary";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Student');
$StudentSummaryPage = new StudentView();
?>
<div class="row mt-5">
    <div class="col-md-6 col-xl-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-person-badge-fill me-2"></i> Student
            </div>
            <div class="card-body">
                Name :
                <?= $StudentSummaryPage->displayStudentFullName_MI(); ?><br>
                Student ID :
                <?= $StudentSummaryPage->displayStudentID(); ?><br>
                Date of Birth :
                <?= $StudentSummaryPage->displayStudentDOB(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-pin-map-fill me-2"></i> Address
            </div>
            <div class="card-body outline-primary">
                <?= $StudentSummaryPage->displayStudentAddressLine1(); ?><br>
                <?= $StudentSummaryPage->displayStudentAddressLine2(); ?>
                <?= ($StudentSummaryPage->displayStudentAddressLine2() != "") ? "<br>" : ""; ?>
                <?= $StudentSummaryPage->displayStudentCity(); ?>,
                <?= $StudentSummaryPage->displayStudentState(); ?>
                <?= $StudentSummaryPage->displayStudentPostalCode(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-person-rolodex me-2"></i> Contact
            </div>
            <div class="card-body">
                Phone :
                <?= $StudentSummaryPage->displayStudentPhoneNumber(); ?> <br>
                Email :
                <?= $StudentSummaryPage->displayStudentEmail(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-8 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-compass me-2"></i>Program
            </div>
            <div class="card-body">
                <?= $StudentSummaryPage->displayStudentProgramTitle(); ?><br>
                Type :
                <?= $StudentSummaryPage->displayStudentProgramType(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-info-circle-fill me-2"></i> Advisor
            </div>
            <div class="card-body">
                <?= $StudentSummaryPage->displayStudentAdvisor();
                ; ?><br>
                <a href="javascript:alert('Start a chat with <?= $StudentSummaryPage->displayStudentAdvisor(); ?>');"
                    class="btn btn-outline-primary mt-2 me-1 fs-5" title="Chat"><i class="bi bi-chat-dots-fill"></i></a>
                <a href="javascript:alert('Send an email to <?= $StudentSummaryPage->displayStudentAdvisor(); ?>')"
                    class="btn btn-outline-primary mt-2 me-1 fs-5" title="Email"><i class="bi bi-envelope-fill"></i></a>
                <a href="javascript:alert('Place a phone call to <?= $StudentSummaryPage->displayStudentAdvisor(); ?>')"
                    class="btn btn-outline-primary mt-2 me-1 fs-5" title="Phone"><i
                        class="bi bi-telephone-fill fs-5"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-cash-coin me-2"></i> Account Balance
            </div>
            <div class="card-body text-primary text-center fs-3">
                <a href="student_account.php">
                    <?= $StudentSummaryPage->displayStudentAccountBalance(true); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-book me-2"></i> Checked Out Books
            </div>
            <div class="card-body text-primary text-center fs-3">
                <a href="student_books.php">
                    <?= $StudentSummaryPage->displayStudentBorrowCount(); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-bullseye me-2"></i> Cumulative GPA
            </div>
            <div class="card-body text-primary text-center fs-3">
                <a href="student_academicrecord.php">
                    <?= $StudentSummaryPage->displayStudentCumulativeGPA(); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-8 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-p-circle me-2"></i> Parking Decals
            </div>
            <div class="card-body">
                <?= $StudentSummaryPage->displayStudentParkingDecals(); ?>
            </div>
        </div>
    </div>
    <div class="col-12 my-2">
        <div class="card border-primary h-100">
            <div class="card-header text-bg-primary fs-5">
                <i class="bi bi-card-list me-2"></i> Current Schedule
            </div>
            <div class="card-body">
                <h5>
                    <?= $StudentSummaryPage->displayStudentCurrentSemesterTitle(); ?>
                </h5>
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Course</th>
                            <th>Instructor</th>
                            <th>Location</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $StudentSummaryPage->displayStudentSchedule($StudentSummaryPage->displayStudentCurrentSemesterTerms());
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $StudentSummaryPage = NULL; ?>
<?php require_once('includes/portal_footer.inc.php'); ?>