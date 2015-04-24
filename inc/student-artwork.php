<?php $id_artist = THE_ID ?>
<?php $artworks = GetPosts('artist', ['p' => $id_artist] ) ?>

<div class="container" id="studentArtwork">
    <div class="p50-0">
        <div class="row">
        <div class="col-sm-8">
            <section class="student-artwork">
                <header>
                    <h1><?php echo getOption('artist_student_artwork_text') ?></h1>
                    <a href="<?php echo get_page_link(2746); ?>" class="learn-more"><?php echo getOption('artist_all_student_artwork') ?></a>
                </header>
                <div class="row">
                    <div class="col-sm-10">
                        <div id="slide-artwork" class="carousel slide" data-ride="carousel">
                            
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            <?php if ( $artworks->have_posts() ) : 
                                $i = 0;
                                $indicator='<li>';
                                while ( $artworks->have_posts() ) :
                                    $artworks->the_post();

                                    
                                    foreach (get_field('sudent_gellery') as $image) {
                                        
                                        if ($i % 4 == 0 && $i != 0) {
                                            $indicator .= '</li><li>';
                                        }

                                        $indicator .= '
                                        <a href="#" data-target="#slide-artwork" data-slide-to="'.$i.'" >
                                            <img src="'. $image['sizes']['thumbnail'] .'" alt="">
                                        </a>
                                        ';
                                        ?>
                                        <div class="item <?php echo ($i==0)? 'active' : '' ?>">
                                            <div class="big-img">
                                                <img src="<?php echo $image['url']; ?>" alt="">
                                            </div>
                                            <p><?php echo $image['caption']; ?></p>
                                        </div>
                                    
                                    <?php        
                                        $i++; 
                                    }

                                    $indicator .= '</li>';

                                endwhile; ?>
                            <!-- post navigation -->
                            <?php else: ?>
                            <!-- no posts found -->
                            <?php endif; ?>
                                
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-2" id="the-indicators">
                        <!-- Indicators -->
                            <ol class="carousel-indicators" id="student-artwork">
                                <?php echo $indicator; ?>
                            </ol>

                            <div class="navigation">
                                <a id="prev3" class="prev" href="#"><i class="fa fa-caret-square-o-left"></i></a>
                                <a id="next3" class="next" href="#"><i class="fa fa-caret-square-o-right"></i></a>
                            </div>
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