<!-- Portal NavBar Start -->
        <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="<?=$portal_dir;?>" title=" Small's Community College: Connecting Minds ">
                    SCC Portal
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$portal_dir;?>">Home</a>
                        </li>
<?php if($_SESSION["UserRole"] === "Librarian") {
?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Librarian
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= $portal_dir; ?>librarian_books.php">
                                        Books
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= $portal_dir; ?>librarian_checkin.php">
                                        Check-in Books
                                    </a>
                                </li>
                            </ul>
                        </li>
<?php } ?>
<?php if($_SESSION["UserRole"] === "Student") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Student
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= $portal_dir; ?>student_summary.php" class="dropdown-item">
                                        Summary
                                    </a>
                                </li>
                                </li>
                                <li>
                                <a href="<?= $portal_dir; ?>student_academicrecord.php" class="dropdown-item">
                                    Academic Record
                                </a>
                                </li>
                                <li>
                                    <a href="<?= $portal_dir; ?>student_account.php" class="dropdown-item">
                                        Account
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $portal_dir; ?>student_books.php" class="dropdown-item">
                                        Checked Out Books
                                    </a>
                                </li>
                                <li>
                                <a href="<?= $portal_dir; ?>student_schedule.php" class="dropdown-item">
                                    Schedule
                                </a>
                            </ul>
                        </li>
<?php } ?>
<?php if($_SESSION["UserRole"] === "Faculty") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Faculty
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= $portal_dir; ?>faculty_classroster.php" class="dropdown-item">
                                        Class Roster
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $portal_dir; ?>faculty_grades.php" class="dropdown-item">
                                        Grades
                                    </a>
                                </li>
                            </ul>
                        </li>
<?php } ?>
<?php if($_SESSION["UserRole"] === "Accounting") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Accounting
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= $portal_dir; ?>accounting_studentaccount.php" class="dropdown-item">
                                        Student Account
                                    </a>
                                </li>
                            </ul>
                        </li>
<?php } ?>
<?php if($_SESSION["UserRole"] === "Registrant") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Registrant
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= $portal_dir; ?>registrant_classes.php" class="dropdown-item">
                                        Classes
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $portal_dir; ?>registrant_courses.php" class="dropdown-item">
                                        Courses
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $portal_dir; ?>registrant_programs.php" class="dropdown-item">
                                        Programs
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $portal_dir; ?>registrant_terms.php" class="dropdown-item">
                                        Terms
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $portal_dir; ?>registrant_venues.php" class="dropdown-item">
                                        Venues
                                    </a>
                                </li>
                            </ul>
                        </li>
<?php } ?>
                    </ul>
                    <div class="d-flex flex-column flex-md-row gap-3">
                        <a class="btn btn-outline-primary text-nowrap" href="<?= $portal_dir; ?>myprofile.php" title=" My Profile "><i class="bi bi-person-circle"></i> My Profile</a>
                        <a class="btn btn-outline-primary text-nowrap" href="<?= $portal_dir; ?>logout.php" title="Logout"><i class="bi bi-lock-fill"></i> Logout</a>
                    </div>
                </div>
            </div>
        </nav>
<!-- Portal NavBar End -->
