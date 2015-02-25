<?php $query = GetPosts('student-gallery', ['posts_per_page' => 6]); ?>

<section class="student-gallery">
  <div class="container">
    <h1><?php echo getOption('student_gallery_title') ?></h1>
    <a href="<?php echo getOption('student_gallery_button_link') ?>" class="btn btn-danger">
      <?php echo getOption('student_gallery_button_text') ?>
    </a>
    <div class="clearfix"></div>
    <div class="list_carousel responsive">
      <ul id="foo4" class="list-inline">
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <li>
          <a href="<?php the_permalink() ?>"><img src="<?php echo getImgLink('image_gallery') ?>" alt="">
            <h3 class="title">
              <?php the_title() ?> <small><?php echo getField('subtitle') ?></small>
            </h3></a>
        </li>
      <?php endwhile; ?>
      <!-- post navigation -->
      <?php else: ?>
      <!-- no posts found -->
      <?php endif; ?>
        
      </ul>
      <div class="clearfix"></div>
    </div>
  </div>
</section><!-- student-gallery -->