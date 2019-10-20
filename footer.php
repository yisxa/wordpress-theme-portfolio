<footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                        <?php dynamic_sidebar( 'footer_1' ); ?>
                </div>
                <div class="col-md-3">
                        <?php dynamic_sidebar( 'footer_2' ); ?>
                </div>
                <div class="col-md-3">
                        <?php dynamic_sidebar( 'footer_3' ); ?>
                </div>
                <div class="col-md-3">
                        <?php dynamic_sidebar( 'footer_4' ); ?>
                </div>
            </div>
            <div class="social-icons">
                <a href="#"><i class="icon ion-social-facebook"></i></a>
                <a href="#"><i class="icon ion-social-instagram-outline"></i></a>
                <a href="#"><i class="icon ion-social-twitter"></i></a>
            </div>
        </div>
        <p>Copyright 2016-<?php echo date("Y");  ?> All right reserved Xivig</p>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <!-- // in order to get the horizontal bar -->
	<?php wp_footer(); ?>
</body>

</html>
