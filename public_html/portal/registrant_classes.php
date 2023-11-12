<?php
$privilege = 'Registrant';
$pagetitle = "Classes";
$headtitle = "Class Roster | Small's Community College: Connecting Minds";
require_once('includes/portal_head.inc.php');
$RegistrantClassesPage = new RegistrantView();
$departments = NULL;
$instructors = NULL;
$terms = NULL;
$venues = NULL;
if (isset($_SESSION['departments']) and $_SESSION['departments'] != "") {
    $departments = Validation::testInput($_SESSION['departments']);
    unset($_SESSION['departments']);
} elseif (isset($_POST["departments"]) and $_POST['departments'] != "") {
    $departments = Validation::testInput($_POST['departments']);
}
if (isset($_SESSION['instructors']) and $_SESSION['departments'] != "") {
    $instructors = Validation::testInput($_SESSION['instructors']);
    unset($_SESSION['instructors']);
} elseif (isset($_POST["instructors"]) and $_POST['instructors'] != "") {
    $instructors = Validation::testInput($_POST['instructors']);
}
if (isset($_SESSION['terms'])) {
    $terms = Validation::testInput($_SESSION['terms']);
    unset($_SESSION['terms']);
} elseif (isset($_POST["terms"])) {
    $terms = Validation::testInput($_POST['terms']);
}
if (isset($_SESSION['venues'])) {
    $building = Validation::testInput($_SESSION['venues']);
    unset($_SESSION['venues']);
} elseif (isset($_POST["venues"])) {
    $venues = Validation::testInput($_POST['venues']);
}
?>
<form method="post" class="mt-5 mb-0" id="Filters">
    <div class="mt-3 border border-primary rounded show p-2" id="filters">
        <div class="row px-2">
            <div class="col-md-3 my-2">
                <div class="">
                    <label for="departments" class="form-label text-primary"><strong>Department</strong></label>
                    <select class="form-select" name="departments" id="departments" size="7" multiple>
                        <?= $RegistrantClassesPage->displayDeptFilter($departments); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3 my-2">
                <div class="">
                    <label for="instructors" class="form-label text-primary"><strong>Instructor</strong></label>
                    <select class="form-select" name="instructors" id="instructors" size="7" multiple>
                        <?= $RegistrantClassesPage->displayInstrFilter($instructors); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3 my-2">
                <div class="">
                    <label for="terms" class="form-label text-primary"><strong>Term</strong></label>
                    <select class="form-select" name="terms" id="terms" size="7" multiple>
                        <?= $RegistrantClassesPage->displayTermFilter($terms); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3 my-2">
                <div class="">
                    <label for="venues" class="form-label text-primary"><strong>Venue</strong></label>
                    <select class="form-select" name="venues" id="venues" size="7" multiple>
                        <?= $RegistrantClassesPage->displayVenueFilter($venues); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center my-2">
                <button type="submit" class="btn btn-outline-primary">Search Classes</button>
                <button type="reset" class="btn btn-outline-secondary" onclick="javascript:clearFilters();">Clear
                    Filters</button>
            </div>
        </div>
    </div>
</form>
<div class="my-3">
    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#classfilters" role="button"
        aria-expanded="false" aria-controls="classfilters">
        <i class="bi bi-filter-circle"></i> Toggle Filters
    </a>
</div>
<?php if ($departments != NULL or $departments != "" or $instructors != NULL or $instructors != "" or $terms != NULL or $terms != "" or $venues != NULL or $venues != "") { ?>
    <div class="mt-3">
        <button class="btn btn-outline-success text-nowrap" onclick="location.href='registrant_addclass.php';"><i
                class="bi bi-plus-square-fill me-1"></i> Add Class</button>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col" class="text-nowrap">Class Code</th>
                        <th scope="col">Course</th>
                        <th scope="col">Instructor</th>
                        <th scope="col">Department</th>
                        <th scope="col">Term</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Active</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?=
                        $RegistrantClassesPage->displayRegistrantClasses($departments, $instructors, $terms, $venues);
                    ?>
            </table>
        </div>
    </div>
<?php }
$RegistrantClassesPage = NULL; ?>
<script src="assets/scripts/registrant_classes.js"></script>
<?php require_once('includes/portal_footer.inc.php'); ?>