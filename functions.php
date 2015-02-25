<?php 

session_start();

/*
|------------------------------------------------------------------------------------
| For debuggin
|------------------------------------------------------------------------------------
*/
//var_dump($wpdb);  


// Add Navigation menu
function mtm_register_theme_menu() {
    register_nav_menu( 'primary', 'Main Navigation Menu' );
}
add_action( 'init', 'mtm_register_theme_menu' );

/*
|------------------------------------------------------------------------------------
| Add Widget
|------------------------------------------------------------------------------------
*/
function mtm_widgets_init() {

    // Home-page: Bienvenu
    register_sidebar( array(
        'name'          => __( 'HomePage : Bienvenu', 'mtm' ),
        'id'            => 'home-bienvenue',
        'description'   => __( 'Le message Bienvenue sur la page d\'accueil.', 'mtm' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
    ) );

    // What We Do: Bienvenu
    register_sidebar( array(
        'name'          => __( 'what-we-do : what-think', 'mtm' ),
        'id'            => 'what-think',
        'description'   => __( 'what-think position', 'mtm' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
    ) );
    
}
add_action( 'widgets_init', 'mtm_widgets_init' );

/*
|------------------------------------------------------------------------------------
| Add support Thumblnails
|------------------------------------------------------------------------------------
*/
add_theme_support( 'post-thumbnails' ); 


/*
|------------------------------------------------------------------------------------
| Remove filter of <p></p>
|------------------------------------------------------------------------------------
*/
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


/*
|------------------------------------------------------------------------------------
| my classes in home page
|------------------------------------------------------------------------------------
*/
function add_class_body(){
    $classes = array();
    if (is_front_page()) {
         array_push($classes, 'home-page');
    }

    return $classes;
}  


/*
|------------------------------------------------------------------------------------
| Get Posts
|------------------------------------------------------------------------------------
*/
function GetPosts($type, $options=[])
{
  $args = array (
    'post_type'        => $type,
    'post_status'      => 'publish',
    'posts_per_page'   => -1,
    'caller_get_posts' => 1,
  );

  // The Query
  return new WP_Query( array_merge($args, $options) );
}


/*
|------------------------------------------------------------------------------------
| Get All fields
|------------------------------------------------------------------------------------
*/
function getFields($field = '')
{
  return get_post_custom_values( $field );
}


/*
|------------------------------------------------------------------------------------
| Get Field (just the first)
|------------------------------------------------------------------------------------
*/
function getField($field = '')
{ 
  return array_pop(get_post_custom_values( $field ));
}


/*
|------------------------------------------------------------------------------------
| Get Field as an image
|------------------------------------------------------------------------------------
*/
function getImgLink($field='')
{
  return array_shift(wp_get_attachment_image_src(getField( $field ), 'full'));
}





if ( !function_exists( 'getOption' ) ) {
function getOption($name, $default = false) {

  $optionsframework_settings = get_option('optionsframework');

  // Gets the unique option id
  $option_name = $optionsframework_settings['id'];

  if ( get_option($option_name) ) {
    $options = get_option($option_name);
  }

  if ( isset($options[$name]) ) {
    return $options[$name];
  } else {
    return $default;
  }
}
}