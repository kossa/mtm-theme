<?php
/**
 * Template Name: Artists Page
 */

get_header(); ?>

<?php 

$tracks = GetValuesMeta('audio_preview_upload');
$styles = GetValuesMeta('style');
$medias = GetValuesMeta('media');
$countries = GetValuesMeta('country');
$genders = GetValuesMeta('gender');

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
                        <select name="" class="form-control" id="">
                            <option value="">Track</option>
                        </select>
                    </li>
                    <li>
                        <select name="" class="form-control" id="">
                            <option value="">Style</option>
                            <?php foreach ($styles as $style): ?>
                            	<option value="<?php echo $style ?>"><?php echo $style ?></option>
                            <?php endforeach ?>
                        </select>
                    </li>
                    <li>
                        <select name="" class="form-control" id="">
                            <option value="">Media</option>
                            <?php foreach ($medias as $media): ?>
                            	<option value="<?php echo $media ?>"><?php echo $media ?></option>
                            <?php endforeach ?>
                        </select>
                    </li>
                    <li>
                        <select name="" class="form-control" id="">
                            <option value="">Country</option>
                            <?php foreach ($countries as $country): ?>
                            	<option value="<?php echo $country ?>"><?php echo $country ?></option>
                            <?php endforeach ?>
                        </select>
                    </li>
                    <li>
                        <select name="" class="form-control" id="">
                            <option value="">Gender</option>
                            <?php foreach ($genders as $gender): ?>
                            	<option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                            <?php endforeach ?>
                        </select>
                    </li>


                </ul>
            </form>

            <section class="all-artists">
                <ul class="list-inline">
                    <li>
                        <a href="#" class="one-artist">
                            <img src="img/art-01.jpg" alt="">
                            <h4>Rosa Bonheur</h4>
                            <h5>French (1822–1899)</h5>
                        </a>
                    </li>
                    
                </ul>
            </section>

        </div>
    </div>


<?php get_footer() ?>
