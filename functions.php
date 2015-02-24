<?php 

session_start();

/**
    For debuggin
*/
//var_dump($wpdb);  


// Add Navigation menu
function mtm_register_theme_menu() {
    register_nav_menu( 'primary', 'Main Navigation Menu' );
}
add_action( 'init', 'mtm_register_theme_menu' );

/**
    Add Widget
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

/**
    Add support Thumblnails
    */
add_theme_support( 'post-thumbnails' ); 


/**
    Remove filter of <p></p>
*/
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


/**
    my classes in home page
*/
function add_class_body(){
    $classes = array();
    if (is_front_page()) {
         array_push($classes, 'home-page');
    }

    return $classes;
}   

/**
    Get All categories as Object (Categories of winetechri)
*/
function getProductsObject(){
    $args = array(
        'child_of'                 => 0,
        'parent'                   => 0,
        'orderby'                  => 'ID',
        'order'                    => 'ASC',
        'hide_empty'               => 0,
        'hierarchical'             => 0,
        'exclude'                  => '',
        'include'                  => '',
        'taxonomy'                 => 'produits',
        'pad_counts'               => false
    );

    return 
        get_categories( $args );
}   


/**
    Get All categories as an Array (Categories of winetechri)
*/
function    getProductsArray(){
    $allCat = getProductsObject();
    $result = array();

    foreach ($allCat as $key) {
        array_push($result, $key->name);
    }
    return $result;
}

/**
    Get all products of one category
*/
function getAllProducts($productName){
    $arg = array(
      'post_type'        =>  'mtm',
      'post_status'      => 'publish',
      'posts_per_page'   => -1,
      'caller_get_posts' => 1,
      'produits'         => $productName,
  );


  return new WP_Query($arg);
}

/**
    Get Regions List
*/
function getRegionsList(){
    $regions = array();
    $args = array(
    'type'                     => 'mtm',
    'orderby'                  => 'name',
    'hide_empty'               => 0,
    'taxonomy'                 => 'regions',
  ); 

  $allcat = get_categories( $args );

  foreach ($allcat as $onecat) {
    $regions[$onecat->slug] = $onecat->name;
  }
  return $regions;
}   

/**
  getProductDetails
*/
function getProductDetails(){

  $ID = get_the_id();
  $obj = new stdClass();
  $x = array_pop(get_post_custom_values("image_produit"));

  $obj->title         = get_the_title();
  $obj->date          = get_the_date( "d/m/Y" );
  $obj->prix          = array_pop( get_post_custom_values( "prix" ) );
  $obj->content       = get_the_content();
  $obj->adresse       = array_pop(get_post_custom_values("adresse"));
  $obj->telephone     = array_pop(get_post_custom_values("telephone"));
  $obj->map           = array_pop(get_post_custom_values("map"));
  $obj->image_produit = wp_get_attachment_image_src($x, "full")[0];

  if(isset($_SESSION[$ID]) == false){

    // Hits
    $hits = 0;
    $hits = get_post_custom_values("hits")[0];

    if($hits == 0){
      $newhits = 1;
      add_post_meta($ID, "hits", $newhits);
    }else{
      $newhits = $hits + 1;
      update_post_meta($ID, "hits", $newhits);
    }
    $_SESSION[$ID] = $newhits;

  }else{
    echo "Rani hna";
    $newhits = $_SESSION[$ID];
  }

  $obj->hits = $newhits;

  return $obj;
}


/**
  Get all products of slider in home page
*/
function getProductsSlider($productName = null){
  $arg = array(
      'post_type'        =>  'mtm',
      'post_status'      => 'publish',
      'posts_per_page'   => -1,
      'caller_get_posts' => 1,
      

  );

  if($productName == null){ // Slide 
    $arg['meta_query'] = array(
          array(
            'key'     => 'status',
            'value'   => 'home',
            'type'    => 'CHAR',
            'compare' => 'LIKE'
          ),
      );
  }else{ // Slide for categories
    $arg['produits'] = $productName;

    $arg['meta_query'] = array(
          array(
            'key'     => 'status',
            'value'   => 'list',
            'type'    => 'CHAR',
            'compare' => 'LIKE'
          ),
      );
  }


  return new WP_Query($arg);
}

/**
  Get product with search
*/
function getSearch($name = null, $category = null, $produits = null, $region = null, $prix_min = null, $prix_max){
    $arg = array(
      'post_type'        =>  'mtm',
      'post_status'      => 'publish',
      'orderby'          => 'ID',
      'order'            => 'DESC'
    );


    // Set Product category
    if ($produits != null) {
      $arg['tax_query'] = array(
        array(
          'taxonomy' => 'produits',
          'field' => 'id',
          'terms' => $produits
          ) );
    }else{
      if ($category != null) {
        $arg['tax_query'] = array(
        array(
          'taxonomy' => 'produits',
          'field' => 'id',
          'terms' => $category
          ));
      }
    }

    $arg['meta_query'] = array();

    // Set Region
    if ($region) {
      array_push($arg['meta_query'], array(
        'key' => 'region',
        'value' => $region,
        'type' => 'CHAR',
        'compare' => '='
      ));
    }

    // Set prix min
    if ($prix_min) {
      array_push($arg['meta_query'], array(
        'key' => 'prix',
        'value' => $prix_min,
        'type' => 'NUMERIC',
        'compare' => '>='
      ));
    }

    // Set prix max
    if ($prix_max) {
      array_push($arg['meta_query'], array(
        'key' => 'prix',
        'value' => $prix_max,
        'type' => 'NUMERIC',
        'compare' => '<='
      ));
    }

  $wp_query = new WP_Query($arg);
  return $wp_query;  

}  

/**
  Get posts with type
*/
function getTypeProduct($type){

  $arg = array(
    'post_type'        =>  'mtm',
    'post_status'      => 'publish',
    'posts_per_page'   => -1,
    'caller_get_posts' => 1,
    'meta_query'       => array(
          array(
            'key'     => 'type_produit',
            'value'   => $type,
            'type'    => 'CHAR',
            'compare' => 'LIKE'
          ),
      )
  );

  return new WP_Query($arg);
}  

