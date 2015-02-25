<section class="map-bottom">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1><?php echo getOption('map_title') ?></h1>
        <p><?php echo getOption('map_content') ?></p>
        <a href="<?php echo getOption('map_button_link') ?>" class="btn btn-primary">
          <?php echo getOption('map_button_text') ?>
        </a>
      </div>
      <div class="col-sm-6">
        <a href="<?php echo getOption('map_img_link') ?>" class="map-img">
          <img src="<?php echo getOption('map_img') ?>" alt="">
        </a>
      </div>
    </div>
  </div>
</section><!-- map-bottom -->