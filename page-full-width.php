<?php 
/*

template name: Full with(without sidebar)
*/

get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- post -->
    <section class="banner">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section><!-- banner -->

    <div id="the-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article id="static-page">
                        <?php the_content(); ?>
                    </article>

                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>
    
<?php get_footer(); ?>
