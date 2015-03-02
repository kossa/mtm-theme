<?php get_header() ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="banner">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <h3><?php echo getField('subtitle') ?></h3>
        </div>
    </section><!-- banner -->

    <div id="artist-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="about-artist">
                        <div class="text-center"><img src="<?php echo getImgLink('artist_photo') ?>" alt=""></div>
                        <h4>About the Artist</h4>
                        <p>
                            <strong><?php the_title(); ?></strong>
                            (<?php echo getField('date') ?>) <br>
                            <?php echo getField('artist_bio') ?> 
                        </p>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="infos">
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <div class="info">
                                    <p class="small"><i class="fa fa-folder"></i> style</p>
                                    <p><?php echo getField('style') ?></p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="info">
                                    <p class="small"><i class="fa fa-pencil"></i> Media</p>
                                    <p><?php echo getField('media') ?></p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="info">
                                    <p class="small"><i class="fa fa-globe"></i> country</p>
                                    <p><?php echo getField('country') ?></p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="info">
                                    <p class="small"><i class="fa fa-user"></i> gender</p>
                                    <p><?php echo getField('gender') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <img src="<?php echo getImgLink('artist_cover_photo') ?>" alt="">
                            <a href="<?php echo getField('audio_preview_upload') ?>" class="btn btn-link"><i class="fa fa-volume-up"></i> audio preview</a>
                        </div>
                        <div class="col-sm-8">
                            <?php the_content(); ?>

                            <ul class="list-inline">
                                <li><a href="<?php echo getField('red_button_link') ?>" class="btn btn-danger btn-lg"><?php echo getField('red_button_text') ?></a></li>
                                <li><a href="<?php echo getField('blue_button_link') ?>" class="btn btn-primary btn-lg"><?php echo getField('blue_button_text') ?></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

<?php load_template( dirname(__FILE__) . '/inc/save-all.php' ); ?>

<?php load_template( dirname(__FILE__) . '/inc/student-artwork.php' ); ?>



<?php get_footer() ?>