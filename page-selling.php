<?php
/**
 * Template Name: Selling Page
 */

get_header(); ?>



<div id="selling-page">
	  <section class="banner">
		<div class="container">
			<h1><?php echo getOption('selling_title') ?></h1>
	  
		  <h3><?php echo getOption('selling_sub_title') ?></h3>
		</div>
	  </section><!-- banner -->

	  <div class="content">
		<div class="container">
		  <div class="row steps">
			<div class="col-sm-4">
			  <img src="<?php echo getOption('selling_first_photo') ?>" alt="">
			  <div class="title">
				<span class="number">1</span>
				<h4><?php echo getOption('selling_first_title') ?></h4>
			  </div>
			  <p> <?php echo getOption('selling_first_text') ?></p>
			</div>
			
			<div class="col-sm-4">
			  <img src="<?php echo getOption('selling_second_photo') ?>" alt="">
			  <div class="title">
				<span class="number">2</span>
				<h4><?php echo getOption('selling_second_title') ?></h4>
			  </div>
			  <p> <?php echo getOption('selling_second_text') ?></p>
			</div>
			
			<div class="col-sm-4">
			  <img src="<?php echo getOption('selling_third_photo') ?>" alt="">
			  <div class="title">
				<span class="number">3</span>
				<h4><?php echo getOption('selling_third_title') ?></h4>
			  </div>
			  <p> <?php echo getOption('selling_third_text') ?></p>
			</div>

		
		  <section class="get-pricing-form">
			<div class="container">
			  <div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				  <?php echo do_shortcode('[contact-form-7 id="87" title="Selling form"]'); ?>
				</div>
			  </div>
			</div>
		  </section>
		</div>
	  </div>
	</div>

<?php get_footer() ?>
