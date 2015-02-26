
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <?php dynamic_sidebar( 'footer-01' ); ?>
          </div>
          <div class="col-sm-3">
            <?php dynamic_sidebar( 'footer-02' ); ?>
          </div>
          <div class="col-sm-3">
            <?php dynamic_sidebar( 'footer-03' ); ?>
          </div>
          <div class="col-sm-3">
            <?php dynamic_sidebar( 'footer-04' ); ?>
          </div>
        </div>

        <p><small>Copyright © 2015 Meet the Masters. All Rights Reserved. Website by Raindrop Marketing.</small></p>
        <a href="#" class="sitemap">Sitemap</a>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo bloginfo( 'template_url' ); ?>/js/jquery.js"></script>
    <script src="<?php echo bloginfo( 'template_url' ); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo bloginfo( 'template_url' ); ?>/js/jquery.touchSwipe.min.js"></script>
    <script src="<?php echo bloginfo( 'template_url' ); ?>/js/jquery.carouFredSel.js"></script>
    <script src="<?php echo bloginfo( 'template_url' ); ?>/js/main.js"></script>

    <?php wp_footer(); ?>
    
  </body>
</html>
