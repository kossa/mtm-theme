
<?php $query = GetPosts('top-ten'); ?>

<section class="top-ten">
  <div class="container">
    <h1><?php echo getOption('top_ten_title') ?></h1>
    <ul class="list-inline">
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <li><a><img src="<?php echo getImgLink('icon') ?>" alt=""><span><?php the_title(); ?></span></a></li>
      <?php endwhile; ?>
      <!-- post navigation -->
      <?php else: ?>
      <!-- no posts found -->
      <?php endif; ?>
      
    </ul>

    <a href="<?php echo getOption('top_ten_link') ?>" class="btn btn-danger">
      <?php echo getOption('top_ten_text') ?>
    </a>
  </div>
</section> <!-- top-ten -->