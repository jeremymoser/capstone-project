<?php
$pagetitle = "Courses";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
(new UserController)->verifyAccessPrivilege('Registrant');
$RegistrantCoursesPage = new RegistrantView();
$coursecode = NULL;
$coursetitle = NULL;
$department = NULL;
if (isset($_SESSION['coursecode']) and $_SESSION['coursecode'] != "") {
    $departments = Validation::testInput($_SESSION['coursecode']);
    unset($_SESSION['depcoursecodeartments']);
} elseif (isset($_POST["coursecode"]) and $_POST['coursecode'] != "") {
    $coursecode = Validation::testInput($_POST['coursecode']);
}
if (isset($_SESSION['coursetitle']) and $_SESSION['coursetitle'] != "") {
    $coursetitle = Validation::testInput($_SESSION['coursetitle']);
    unset($_SESSION['coursetitle']);
} elseif (isset($_POST["coursetitle"]) and $_POST['coursetitle'] != "") {
    $coursetitle = Validation::testInput($_POST['coursetitle']);
}
if (isset($_SESSION['department']) and $_SESSION['department'] != "") {
    $departments = Validation::testInput($_SESSION['department']);
    unset($_SESSION['department']);
} elseif (isset($_POST["department"]) and $_POST['department'] != "") {
    $department = Validation::testInput($_POST['department']);
}
?>
<form method="post" class="mt-5 mb-0" id="Filters">
    <div class="mt-3 border border-primary rounded show p-2" id="filters">
        <div class="row px-2">
            <div class="col-md-3 my-2">
                <div class="">
                    <label for="department" class="form-label text-primary"><strong>Department</strong></label>
                    <select class="form-select" name="department" id="department" size="7" multiple>
                        <?= $RegistrantCoursesPage->displayDeptFilter($department); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center my-2">
                <button type="submit" class="btn btn-outline-primary">Search Courses</button>
                <button type="reset" class="btn btn-outline-secondary" onclick="javascript:clearFilters();">Clear
                    Filters</button>
            </div>
        </div>
    </div>
</form>
<div class="my-3">
    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#coursefilters" role="button"
        aria-expanded="false" aria-controls="coursefilters">
        <i class="bi bi-filter-circle"></i> Toggle Filters
    </a>
</div>
<?php if ($coursecode != NULL or $coursecode != "" or $coursetitle != NULL or $coursetitle != "" or $department != NULL or $department != "") { ?>
    <div class="mt-3">
        <button class="btn btn-outline-success text-nowrap" onclick="location.href='registrant_addcourse.php';"><i
                class="bi bi-plus-square-fill me-1"></i> Add Course</button>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Credits</th>
                        <th scope="col">Fee</th>
                        <th scope="col">Department</th>
                        <th scope="col">Active</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?=
                        $RegistrantCoursesPage->displayRegistrantCourses($coursecode, $coursetitle, $department);
                    ?>
            </table>
        </div>
    </div>
<?php }
$RegistrantCoursesPage = NULL; ?>
<script src="assets/scripts/registrant_classes.js"></script>
<?php require_once('includes/portal_footer.inc.php'); ?>