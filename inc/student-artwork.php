<?php $artworks = GetPosts('student-artwork', ['posts_per_page' => 4]) ?>
<div class="container">
    <div class="p50-0">
        <div class="row">
        <div class="col-sm-8">
            <section class="student-artwork">
                <header>
                    <h1>Student Artwork</h1>
                    <a href="#" class="learn-more">Go to the Student Gallery ›</a>
                </header>
                <div class="row">
                    <div class="col-sm-10">
                        <div id="slide-artwork" class="carousel slide" data-ride="carousel">
                            
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            <?php if ( $artworks->have_posts() ) : $i = 0; $indicator=''; while ( $artworks->have_posts() ) : $artworks->the_post(); ?>
                                <?php 
                                $indicator .= '
                                    <li data-target="#slide-artwork" data-slide-to="'.$i.'" >
                                        <img src="'. getImgLink('thumbnail') .'" alt="">
                                    </li>';
                                ?>
                                <div class="item <?php echo ($i==0)? 'active' : '' ?>">
                                    <img src="<?php echo getImgLink('image') ?>" alt="">
                                    <p><?php the_title(); ?></p>
                                </div>
                            <?php $i++; endwhile; ?>
                            <!-- post navigation -->
                            <?php else: ?>
                            <!-- no posts found -->
                            <?php endif; ?>
                                
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-2" id="">
                        <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <?php echo $indicator; ?>
                            </ol>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-sm-4">
            <?php dynamic_sidebar( 'widget-artist' ); ?>
        </div>
    </div>
    </div>
</div>