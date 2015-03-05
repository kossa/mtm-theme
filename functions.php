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

        // Footer
        register_sidebar( array(
                'name'          => __( 'Footer widget area 1', 'mtm' ),
                'id'            => 'footer-01',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>' 
        ) );
        register_sidebar( array(
                'name'          => __( 'Footer widget area 2', 'mtm' ),
                'id'            => 'footer-02',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>' 
        ) );
        register_sidebar( array(
                'name'          => __( 'Footer widget area 3', 'mtm' ),
                'id'            => 'footer-03',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>' 
        ) );
        register_sidebar( array(
                'name'          => __( 'Footer widget area 4', 'mtm' ),
                'id'            => 'footer-04',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>' 
        ) );
        register_sidebar( array(
                'name'          => __( 'Sidebar', 'mtm' ),
                'id'            => 'sidebar',
                'before_widget' => '<section class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>' 
        ) );

        register_sidebar( array(
                'name'          => __( 'Widget Artist', 'mtm' ),
                'id'            => 'widget-artist',
                'before_widget' => '<section class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>' 
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



/*
|------------------------------------------------------------------------------------
| Get option of Theme
|------------------------------------------------------------------------------------
*/
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


/*
|------------------------------------------------------------------------------------
| Get all Values of key
|------------------------------------------------------------------------------------
*/
function GetValuesMeta($key='')
{
    global $wpdb;
    $sql = "
            SELECT * 
            FROM $wpdb->postmeta p 
            WHERE p.meta_key = '$key'
        ";


    $result = []; 
    foreach ($wpdb->get_results($sql) as $index => $key) {
        array_push($result, $key->meta_value);
        //var_dump($key);
    }

    return $result;
}
