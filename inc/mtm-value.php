<?php $query = GetPosts('mtm-value', ['posts_per_page' => 9, 'order' => 'ASC']); ?>

<section class="mtm-value">
  <div class="container">
    <h1><?php echo getOption('mtm_value_title') ?></h1>
    <div class="row">
      <div class="col-sm-9">
        <h3><?php echo getOption('mtm_value_sub_title') ?></h3>
        <div class="meet-masters">
          <ul class="list-inline">
          <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            <li><a><i class="fa fa-<?php echo getField('icon') ?>"></i> <?php echo the_title(); ?></a></li>
          <?php endwhile; ?>
          <!-- post navigation -->
          <?php else: ?>
          <!-- no posts found -->
          <?php endif; ?>

          </ul>
        </div>
      </div>
      <div class="col-sm-3 other-art">

<?php $query = GetPosts('art-programs', ['posts_per_page' => 4, 'order' => 'ASC']); ?>
        <h3><?php echo getOption('other_art_programs_title') ?></h3>
        <ul class="list-unstyled">
          <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
          <li><a href="#"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
          <!-- post navigation -->
          <?php else: ?>
          <!-- no posts found -->
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</section><!-- mtm-value -->