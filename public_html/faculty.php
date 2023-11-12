<?php
$pagetitle = "Faculty";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require ('includes/website_head.inc.php');
?>
        <div class="row">
            <div class="col-md-7 col-lg-8 order-2 order-md-1">
                Whether you're a prospective student, a current member of our community, or a fellow educator, we invite you to connect with our faculty and explore the wealth of knowledge and expertise that Small's Community College has to offer. Together, we are dedicated to the pursuit of academic excellence and the transformation of lives <span class="text-nowrap">through education</span>.
            </div>
            <div class="col-md-5 col-lg-4 order-1 order-md-2">
                <img src="<?= $web_dir;?>assets/images/faculty.jpg" class="img-fluid align-self-center ml-2 mb-2" alt=" Small's Community College Faculty ">
            </div>
        </div>
        <div class="mt-5">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Instructor</th>
                        <th scope="col">Department</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
<?php
    $FacultyWebpage = new WebsiteView();
    echo $FacultyWebpage->displayAllFaculty();
?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require_once('includes/website_footer.inc.php'); ?>