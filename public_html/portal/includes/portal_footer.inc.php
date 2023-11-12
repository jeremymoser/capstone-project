<!-- Portal Footer Start -->
<div id="footer">
    <div class="container my-5">
        <div class="text-center small">
            <div class="text-primary">
                <strong>Logged in as
                    <?php
                    (new Portal)->clearAlert();
                    echo (new LoginView)->displayUsername();
                    ?>
                </strong>
            </div>
            &copy;
            <?php echo date("Y"); ?> Small's Community College.<span class="d-visible d-sm-none"><br></span> All rights
            reserved.
        </div>
    </div>
</div>
<!-- Portal Footer End -->
<!-- Portal Scripts Start -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= $web_dir; ?>assets/scripts/website.js"></script>
<!-- Portal Scripts End -->
</body>
<!-- Portal Body Ends -->

</html>