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
                      <h2><?php echo getField( 'sub_title' ) ?></h2>
                      <div class="content">
                        <?php if (getField('link_video')): ?>
                          <a class="video" href="<?php echo getField('link_video') ?>"><img src="wp-content/uploads/2015/02/video.png" alt=""></a>
                        <?php endif ?>
                        <p><strong><?php echo the_content(); ?></strong></p>
                      </div>
                      <a href="<?php echo getField('text_link') ?>" class="btn btn-danger">Get started</a>
                    </div>

                  </div>
                </div>

              <?php $i++; endwhile; ?>
              <!-- post navigation -->
              <?php else: ?>
              <!-- no posts found -->
              <?php endif; ?>
            
              <!-- <div class="item">
                <div class="row">
                  <div class="col-md-7 hidden-xs">
                    <img src="img/slide-01.png" alt="">
                  </div>
                  <div class="col-md-5">
                    <h2>Timed, Scripted, Standards-Based Lessons Exploring 35 Master Artists</h2>
                    <div class="content">
                      <a class="video" href="#"><img src="img/video.png" alt=""></a>
                      <p><strong>See pricing and get a sneak peek video of the Leonardo da Vinci lesson!</strong></p>
                    </div>
                    <a href="#" class="btn btn-danger">Get started</a>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="row">
                  <div class="col-md-7 hidden-xs">
                    <img src="img/slide-01.png" alt="">
                  </div>
                  <div class="col-md-5">
                    <h2>Timed, Scripted, Standards-Based Lessons Exploring 35 Master Artists</h2>
                    <div class="content">
                      <a class="video" href="#"><img src="img/video.png" alt=""></a>
                      <p><strong>See pricing and get a sneak peek video of the Leonardo da Vinci lesson!</strong></p>
                    </div>
                    <a href="#" class="btn btn-danger">Get started</a>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="row">
                  <div class="col-md-7 hidden-xs">
                    <img src="img/slide-01.png" alt="">
                  </div>
                  <div class="col-md-5">
                    <h2>Timed, Scripted, Standards-Based Lessons Exploring 35 Master Artists</h2>
                    <div class="content">
                      <a class="video" href="#"><img src="img/video.png" alt=""></a>
                      <p><strong>See pricing and get a sneak peek video of the Leonardo da Vinci lesson!</strong></p>
                    </div>
                    <a href="#" class="btn btn-danger">Get started</a>
                  </div>
                </div>
              </div>
            
              <div class="item">
                <div class="row">
                  <div class="col-md-7 hidden-xs">
                    <img src="img/slide-01.png" alt="">
                  </div>
                  <div class="col-md-5">
                    <h2>Timed, Scripted, Standards-Based Lessons Exploring 35 Master Artists</h2>
                    <div class="content">
                      <a class="video" href="#"><img src="img/video.png" alt=""></a>
                      <p><strong>See pricing and get a sneak peek video of the Leonardo da Vinci lesson!</strong></p>
                    </div>
                    <a href="#" class="btn btn-danger">Get started</a>
                  </div>
                </div>
              </div> -->
            
            </div><!-- carousel-inner -->
          </div>
        
          <div class="navig">
            <ol class="carousel-indicators list-inline">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active">How it Works</li>
              <li data-target="#carousel-example-generic" data-slide-to="1">What is MTM?</li>
              <li data-target="#carousel-example-generic" data-slide-to="2">35 Artists, 5 Tracks</li>
              <li data-target="#carousel-example-generic" data-slide-to="3">The MTM Story</li>
              <li data-target="#carousel-example-generic" data-slide-to="4">Sneak Peek</li>
            </ol>
          </div>

        </div>

      
    </section><!-- slider -->