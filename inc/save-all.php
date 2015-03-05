<?php 

$current_track = getField('track'); // Get current track

$rand = GetPosts('artist', [
    'posts_per_page' => 20,
    'orderby'        => 'rand',
    'post__not_in' => [get_the_id()],
    'meta_key' => 'track',
    'meta_query' => [
        [
           'key' => 'track',
           'value' => $current_track,
           'compare' => '=',
        ]
    ]
]) 

?>
<section class="save-all">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h1>Save by purchasing all of Track C and be set for the school year with 35 weeks of instruction!</h1>
            </div>
            <div class="col-sm-4">
                <a href="#" class="learn-more">Learn More About Purchasing Tracks ›</a>
            </div>
        </div>
        
        <div class="list_carousel responsive">
            <ul id="foo1" class="list-inline">
                <?php if ( $rand->have_posts() ) : while ( $rand->have_posts() ) : $rand->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo getImgLink('artist_cover_photo') ?>" alt="">
                            <?php the_title(); ?> 
                            <small><?php echo getField('heritage') ?> (<?php echo getField('date') ?>)</small>
                        </a>
                    </li>
                <?php endwhile; ?>
                <!-- post navigation -->
                <?php else: ?>
                <!-- no posts found -->
                <?php endif; ?> ?>
                
            </ul>
            <div class="clearfix"></div>
        </div>
        
    </div>
</section><!-- save-all -->