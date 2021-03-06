<?php
/**
 * Template Name: Artists Page
 */

get_header(); 

// Get Selects box
$tracks    = getTaxonomieFilter( 'tracks' );
$styles    = getTaxonomieFilter( 'styles' );
$medias    = getTaxonomieFilter( 'medias' );
$heritages = getTaxonomieFilter( 'heritages' );
$genders   = getTaxonomieFilter( 'genders' );

$artists = GetPosts('artist', ['meta_key' => 'last_name','orderby' => 'meta_value', 'order' => 'ASC']);


 ?>

    <section class="banner">
        <div class="container">
            <h1><?php echo getOption('artists_title') ?></h1>
        </div>
    </section><!-- banner -->

    <div id="artists-page">
        <div class="container">
            <div class="row header">
                <div class="col-sm-4">
                    <h2><?php echo getOption('artists_sub_title') ?></h2>
                </div>
                <div class="col-sm-8">
                    <?php echo getOption('artists_text_intro') ?>
                </div>
            </div>

            <hr>

            <form action="#" id="filter">
                <ul class="list-inline">
                    <li><span class="red">Filter by</span></li>
                    <li>
                        <select name="track" class="form-control" id="">
                            <option value="">Track</option>
                            <?php foreach ($tracks as $track): ?>
                                <option value="<?php echo strtolower($track) ?>"><?php echo $track ?></option>
                            <?php endforeach ?>
                        </select>
                    </li>
                    <li>
                        <select name="style" class="form-control" id="">
                            <option value="">Style</option>
                            <?php foreach ($styles as $style): ?>
                            	<option value="<?php echo strtolower($style) ?>"><?php echo $style ?></option>
                            <?php endforeach ?>
                        </select>
                    </li>
                    <li>
                        <select name="media" class="form-control" id="">
                            <option value="">Media</option>
                            <?php foreach ($medias as $media): ?>
                            	<option value="<?php echo strtolower($media) ?>"><?php echo $media ?></option>
                            <?php endforeach ?>
                        </select>
                    </li>
                    <li>
                        <select name="heritage" class="form-control" id="">
                            <option value="">Heritage</option>
                            <?php foreach ($heritages as $heritage): ?>
                            	<option value="<?php echo strtolower($heritage) ?>"><?php echo $heritage ?></option>
                            <?php endforeach ?>
                        </select>
                    </li>
                    <li>
                        <select name="gender" class="form-control" id="">
                            <option value="">Gender</option>
                            <?php foreach ($genders as $gender): ?>
                            	<option value="<?php echo strtolower($gender) ?>"><?php echo $gender ?></option>
                            <?php endforeach ?>
                        </select>
                    </li>


                </ul>
            </form>

            <section class="all-artists">
                <ul class="list-inline">
                    <!-- <li>
                        <a href="#" class="one-artist">
                            <img src="img/art-01.jpg" alt="">
                            <h4>Rosa Bonheur</h4>
                            <h5>French (1822–1899)</h5>
                        </a>
                    </li> -->

                    <?php if ( $artists->have_posts() ) : while ( $artists->have_posts() ) : $artists->the_post(); ?>
                        <li 
                            data-track    = "<?php echo strtolower(getTaxonomie('tracks')) ?>" 
                            data-style    = "<?php echo strtolower(getTaxonomie('styles')) ?>" 
                            data-media    = "<?php echo strtolower(getTaxonomie('medias')) ?>" 
                            data-heritage = "<?php echo strtolower(getTaxonomie('heritages')) ?>" 
                            data-gender   = "<?php echo strtolower(getTaxonomie('genders')) ?>" 
                        >

                            <a href="<?php the_permalink() ?>" class="one-artist">
                                <img src="<?php echo getImgLink('artist_cover_photo') ?>" alt="">
                                <h4><?php the_title(); ?></h4>
                                <h5>(<?php echo getField('date') ?>)</h5>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    <!-- post navigation -->
                    <?php else: ?>
                    <!-- no posts found -->
                    <?php endif; ?>
                    
                </ul>
            </section>

        </div>
    </div>

    <script>
    (function($){
    
        $("#filter select").change(function(){

            var _i = 0;
            $("#filter select").each(function(){
                if ($(this).val() == '') {
                    _i++;
                }else{
                    return false
                }
            });

            if (_i == $("#filter select").length) {
                $('section.all-artists li').show();
                return false;
            };


            // Hide all
            $('section.all-artists li').hide();

            // Get Values
            var _this = $(this);
            var filter_value = _this.val();
            var filter_name = _this.attr('name');

            // Show the right Artists
            if (filter_value) {
                $('section.all-artists li[data-'+filter_name+'*="'+filter_value+'"]').fadeIn();
            };

            // Reset all other selects
            $("#filter select").each(function(){
                if ($(this).attr('name') != filter_name) {
                    $(this).prop('selectedIndex',0);
                };
            });

            /*// Hide all
            $('section.all-artists li').hide();

            // Show 
            var nb_filter = 0;
            $("#filter select").each(function(){
                var filter_value = $(this).val();
                var filter_name = $(this).attr('name');
                if (filter_value) {
                    $('section.all-artists li[data-'+filter_name+'*="'+filter_value+'"]').fadeIn();
                    nb_filter++;
                };
            });

            if (!nb_filter) {
                $('section.all-artists li').fadeIn();
            };*/

        });

    })(jQuery);
    </script>
    
<?php get_footer() ?>
