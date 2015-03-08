<?php 

session_start();
require_once("wp_bootstrap_navwalker.php");
/*
|------------------------------------------------------------------------------------
| For debuggin
|------------------------------------------------------------------------------------
*/
//var_dump($wpdb);  


// Add Navigation menu
function mtm_register_menus() {
        register_nav_menu( 'primary', 'Top Menu' );
}
add_action( 'init', 'mtm_register_menus' );


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
                'name'          => __( 'Sidebar Pages', 'mtm' ),
                'id'            => 'sidebar',
                'before_widget' => '<section class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>' 
        ) );

        register_sidebar( array(
                'name'          => __( 'Sidebar Blog', 'mtm' ),
                'id'            => 'sidebar-blog',
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
| Menu Active Class
|------------------------------------------------------------------------------------
*/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
/*
|------------------------------------------------------------------------------------
| Add support Thumblnails
|------------------------------------------------------------------------------------
*/
add_theme_support( 'post-thumbnails' ); 



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
    if (is_array(get_post_custom_values( $field ))) {
        return array_pop(get_post_custom_values( $field ));
    }else{
        return null;
    }

}


/*
|------------------------------------------------------------------------------------
| Get Taxonomies As Arr
|------------------------------------------------------------------------------------
*/
function getTaxonomieArr($name = '')
{ 
    $tags = wp_get_post_terms(get_the_id(), $name);

    $arr = [];
    foreach ($tags as $tag) {
        array_push($arr,$tag->name);
    }
    return $arr;
}

/*
|------------------------------------------------------------------------------------
| Get Taxononies as string
|------------------------------------------------------------------------------------
*/
function getTaxonomie($name='')
{
    return implode(', ', getTaxonomieArr($name));
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
| get Taxonomie
|------------------------------------------------------------------------------------
*/
function getTaxonomieFilter($value='')
{
    $tax = array();
    $args = array(
        'type'                     => 'artists',
        'orderby'                  => 'name',
        'hide_empty'               => 0,
        'taxonomy'                 => $value,
    ); 

    $allcat = get_categories( $args );

    foreach ($allcat as $onecat) {
        array_push($tax, $onecat->name);
    }
    return $tax;
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
            Group BY meta_value
        ";


    $result = []; 
    foreach ($wpdb->get_results($sql) as $index => $key) {
        array_push($result, $key->meta_value);
        //var_dump($key);
    }

    return $result;
}


/*
|------------------------------------------------------------------------------------
| Pagination
|------------------------------------------------------------------------------------
*/
add_filter( 'wp_pagenavi', 'ik_pagination', 10, 2 );
  
//customize the PageNavi HTML before it is output
function ik_pagination($html) {
    $out = '';
  
    //wrap a's and span's in li's
    $out = str_replace("<div","",$html);
    $out = str_replace("class='wp-pagenavi'>","",$out);
    $out = str_replace("<a","<li><a",$out);
    $out = str_replace("</a>","</a></li>",$out);
    $out = str_replace("<span","<li><span",$out);  
    $out = str_replace("</span>","</span></li>",$out);
    $out = str_replace("</div>","",$out);
  
    return '<div class="text-center"><ul class="pagination">'.$out.'</ul></div>';
}