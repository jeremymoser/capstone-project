<?php
$pagetitle = "Academic Calendar";
$headtitle = "{$pagetitle} | Small's Community College: Connecting Minds";
require_once('includes/website_head.inc.php');
?>
        <p>
            Join us at Small's Community College, where minds come together to shape a brighter future. Whether you're a
            recent high school graduate, a career changer, or someone looking to expand their knowledge, we invite you
            to become a part of our community. Together, we will connect minds, inspire growth, and <span
                class="text-nowrap">achieve greatness</span>.
        </p>
        <p>
            Ready to embark on your educational journey? Apply today and experience the Small's Community <span
                class="text-nowrap">College difference</span>.
        </p>
        <p class="text-primary strong">
            <strong>Class starts soon &ndash; register today!</strong>
        </p>
        <div class="text-center">
            <button class="btn btn-lg btn-primary shadow-sm"
                onclick="alert('For simulation purposes only.\nUnder normal circumstances, button click would re-direct to a college admissions application form.');">
                Apply Now
            </button>
        </div>
        <div class="mt-5">
            <h2 class="text-primary">Fall 2023</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Term &amp; Section</th>
                        <th scope="col">Start Date</th>
                        <th scope="col"> End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $CalendarWebpage = new WebsiteView();
                    echo $CalendarWebpage->displayTermFall2023();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <h2 class="text-primary">Spring 2024</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Term &amp; Section</th>
                        <th scope="col">Start Date</th>
                        <th scope="col"> End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $CalendarWebpage->displayTermSpring2024();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require_once('includes/website_footer.inc.php'); ?>