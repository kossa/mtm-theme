<?php 

$query = GetPosts('slide');
$i     = 0;

?>

<section class="slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          
          <!-- Wrapper for slides -->
          <div class="container">
            <div class="carousel-inner" role="listbox">
              <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="item <?php echo ($i == 0) ? 'active' : '' ?>">
                  <div class="row">
                    <div class="col-md-7 hidden-xs">
                      <img src="<?php echo getImgLink('image_slide') ?>" alt="">
                    </div>
                    <div class="col-md-5">
                      <h2><?php the_content(); ?></h2>
                      <div class="content">
                        <?php if (getField('link_video')): ?>
                          <a class="video" href="<?php echo getField('link_video') ?>">
                            <img src="<?php echo getImgLink('image_video') ?>" alt="">
                          </a>
                        <?php endif ?>
                        <p><strong><?php echo getField( 'slider_subtitle' ) ?></strong></p>
                      </div>
                      <a href="<?php echo getField('button_link') ?>" class="btn btn-danger"><?php echo getField('button_text') ?></a>
                    </div>
                  </div>
                </div>

              <?php $i++; endwhile; ?>
              <!-- post navigation -->
              <?php else: ?>
              <!-- no posts found -->
              <?php endif; ?>
            
            </div><!-- carousel-inner -->
          </div>
        
          <div class="navig">
            <ol class="carousel-indicators list-inline">
              <?php $i = 0; if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" <?php echo ($i == 0) ? 'class="active"' : '' ?>><?php echo the_title(); ?></li>
              <?php $i++; endwhile; ?>
              <!-- post navigation -->
              <?php else: ?>
              <!-- no posts found -->
              <?php endif; ?>

            </ol>
          </div>

        </div>

      
    </section><!-- slider -->