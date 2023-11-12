<?php
$pagetitle = 'Welcome to Small\'s Community College<br>
<span class="text-primary">Connecting Minds</span>';
$headtitle = "Welcome to Small's Community College: Connecting Minds";
require_once('includes/website_head.inc.php');
?>
        <p class="lead">
            At Small's Community College, we believe in the power of education to transform lives and communities. With
            a rich history of excellence in education, we are dedicated to providing an inclusive, innovative, and
            nurturing environment where minds come together to learn, grow, <span class="text-nowrap">and succeed</span>.
        </p>
        <div class="mt-5">
            <h2>Our Committment</h2>
            <div class="row mt-3">
                <div class="col-md-6 p-3">
                    <div class="text-primary text-center mb-3">
                        <i class="bi bi-mortarboard-fill fs-1"></i><br>
                        <strong class="fs-4">Quality Education</strong>
                    </div>
                    We are committed to delivering high-quality education that prepares our students for a lifetime of
                    success. Our dedicated faculty and staff work tirelessly to provide a supportive learning
                    environment that fosters critical thinking, creativity, and <span class="text-nowrap">personal growth</span>.
                </div>
                <div class="col-md-6 p-3">
                    <div class="text-primary text-center mb-3">
                        <i class="bi bi-stars fs-1"></i><br>
                        <strong class="fs-4">Inclusivity</strong>
                    </div>
                    We celebrate diversity and embrace the uniqueness of every individual. Small's Community College is
                    a place where students from all backgrounds are welcome and encouraged to thrive. We believe that a
                    diverse community of minds leads to richer discussions and a more vibrant <span class="text-nowrap">learning experience</span>.
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 p-3">
                    <div class="text-primary text-center mb-3">
                        <i class="bi bi-lightbulb-fill fs-1"></i><br>
                        <strong class="fs-4">Innovation</strong>
                    </div>
                    Our institution is at the forefront of educational innovation. We equip our students with the
                    knowledge and skills needed to excel in a rapidly changing world. From cutting-edge programs to
                    state-of-the-art facilities, we're committed to staying ahead of <span class="text-nowrap">the curve</span>.
                </div>
                <div class="col-md-6 p-3">
                    <div class="text-primary text-center mb-3">
                        <i class="bi bi-people-fill fs-1"></i><br>
                        <strong class="fs-4">Community</strong>
                    </div>
                    We are more than just a college; we are a tight-knit community. Small's Community College is a place
                    where you'll forge lifelong friendships, build professional networks, and connect with mentors who
                    will guide you on your <span class="text-nowrap">academic journey</span>.
                </div>
            </div>
        </div>
        <div class="mt-5">
            <h2>Discover Small's Community College</h2>
            <div class="card mb-4 bg-body-secondary shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $web_dir;?>assets/images/academic-programs.jpg" class="img-fluid rounded-start"
                            alt=" Academic Programs ">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Academic Programs</h3>
                            <p class="card-text mt-3">
                                Explore our diverse range of programs designed to meet your educational and career
                                goals. Whether you're interested in the arts, sciences, business, or technology, we have
                                a program <span class="text-nowrap">for you</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4 bg-body-secondary shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $web_dir;?>assets/images/campus-life.jpg" class="img-fluid rounded-start" alt=" Campus Life ">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Campus Life</h3>
                            <p class="card-text mt-3">
                                Immerse yourself in a vibrant campus life filled with clubs, organizations, and events
                                that cater to a wide variety of interests. At Small's Community College, there's always
                                something <span class="text-nowrap">exciting happening</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4 bg-body-secondary shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $web_dir;?>assets/images/beyond-the-classroom.jpg" class="img-fluid rounded-start"
                            alt=" Beyond the Classroom ">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Beyond the Classroom</h3>
                            <p class="card-text mt-3">
                                We believe in the power of experiential learning. Our students have the opportunity to
                                engage in internships, research, and community service, gaining practical experience
                                that enhances <span class="text-nowrap">their education</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <h2 class="text-primary">Join Us!</h2>
            <p>
                Join us at Small's Community College, where minds come together to shape a brighter future. Whether you're a recent high school graduate, a career changer, or someone looking to expand their knowledge, we invite you to become a part of our community. Together, we will connect minds, inspire growth, and <span class="text-nowrap">achieve greatness</span>.
            </p>
            <p>
                Ready to embark on your educational journey? Apply today and experience the Small's Community <span class="text-nowrap">College difference</span>.
            </p>
            <div class="text-center">
                <button class="btn btn-lg btn-primary shadow-sm" onclick="alert('For simulation purposes only.\nUnder normal circumstances, button click would re-direct to a college admissions application form.');">
                    Apply Now
                </button>
            </div>
        </div>
    </div>
    <?php require_once('includes/website_footer.inc.php'); ?>