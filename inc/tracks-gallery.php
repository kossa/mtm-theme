<?php 

$current_track = getTaxonomie('tracks'); // Get current track
wp_reset_query();

$rand = GetPosts('artist', [
    'orderby'      => 'title',
    'order'        => 'ASC',
    'post__not_in' => [THE_ID],
]) 

?>
<section class="save-all">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <!-- <h1>The below artists are part of <?php echo getTaxonomie('tracks') ?> . Save more on multiple artists and teach all year long.</h1> -->
                <h1><?php echo str_replace('[track]', getTaxonomie('tracks'), getOption('artist_tracks_title'))  ?></h1>
            </div>
            <div class="col-sm-4">
                <a href="<?php echo get_page_link(2770); ?>" class="learn-more"><?php echo getOption('artist_all_tracks') ?></a>
            </div>
        </div>
        
        <div class="list_carousel responsive">
            <ul id="foo1" class="list-inline">
                <?php if ( $rand->have_posts() ) : while ( $rand->have_posts() ) : $rand->the_post(); ?>
                    <?php if (getTaxonomie('tracks') == $current_track): ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo getImgLink('artist_cover_photo') ?>" alt="">
                                <?php the_title(); ?> 
                                <small><?php echo getField('heritage') ?> (<?php echo getField('date') ?>)</small>
                            </a>
                        </li>
                    <?php endif ?>
                <?php endwhile; ?>
                <!-- post navigation -->
                <?php else: ?>
                <!-- no posts found -->
                <?php endif; ?>
                
            </ul>
            <div class="clearfix"></div>
        </div>
        
    </div>
</section><!-- save-all -->