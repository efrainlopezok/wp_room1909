<?php

function main_css() {

  wp_register_style('magnific-css', get_stylesheet_directory_uri() . '/css/magnific-popup.css', array(), CHILD_THEME_VERSION);

  wp_enqueue_style('magnific-css');
  
  wp_enqueue_style('fontawesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array(), 'all');
  
  wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/css/slick.css', array(), 'all');
  
  wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/css/slick-theme.css', array(), 'all');
  
  wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/css/custom.css', array(), 'all');

  wp_enqueue_script('magnific-scripts', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), CHILD_THEME_VERSION, true);

  wp_enqueue_script('instagram-scripts', get_stylesheet_directory_uri() . '/js/instafeed.min.js', array(), CHILD_THEME_VERSION, true);

  wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js', array(), CHILD_THEME_VERSION, true);

  wp_enqueue_script('timeline', get_stylesheet_directory_uri() . '/js/timeline.js', array(), CHILD_THEME_VERSION, true);

  wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/js/slick.js', array(), CHILD_THEME_VERSION, true);

  wp_enqueue_script('product-image-js', get_stylesheet_directory_uri() . '/js/product-image-gallery.js', array(), CHILD_THEME_VERSION, true);

  wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), CHILD_THEME_VERSION, true);
  

}
add_action('wp_enqueue_scripts', 'main_css', 100);

function wpb_widgets_init()
{

  register_sidebar(array(
    'name'          => __('Footer 1', 'wpb'),
    'id'            => 'footer-1',
    'description'   => __('Footer 1', 'wpb'),
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 2', 'wpb'),
    'id'            => 'footer-2',
    'description'   => __('Footer 2', 'wpb'),
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Popup', 'wpb'),
    'id'            => 'popup-top',
    'description'   => __('Popup Top', 'wpb'),
    'before_widget' => '<div id="%1$s" class="widget-popup-top %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

}

add_action('widgets_init', 'wpb_widgets_init');

require_once dirname(__FILE__) . '/inc/shortcodes.php';
require_once dirname(__FILE__) . '/inc/user_measures.php';





function wpb_woo_my_account_order() {
  $myorder = array(
    'measurements'       => __( 'My measurements', 'woocommerce' ),
    'edit-account'       => __( 'Change My Details', 'woocommerce' ),
    'dashboard'          => __( 'Dashboard', 'woocommerce' ),
    'orders'             => __( 'Orders', 'woocommerce' ),
    'downloads'          => __( 'Download', 'woocommerce' ),
    'edit-address'       => __( 'Addresses', 'woocommerce' ),
    'payment-methods'    => __( 'Payment Methods', 'woocommerce' ),
    'customer-logout'    => __( 'Logout', 'woocommerce' ),
  );
  return $myorder;
}
add_filter ( 'woocommerce_account_menu_items', 'wpb_woo_my_account_order' );

function the_breadcrumbs() {

  global $post;

  if (!is_front_page()) {

    echo "<a href='";
    echo get_option('home');
    echo "'>";
    echo "Home";
    echo "</a>";

    if (is_category() || is_single()) {

      echo " <i class='fa fa-chevron-right breadcrumb-right' aria-hidden='true'></i> ";
      $cats = get_the_category($post->ID);

      foreach ($cats as $cat) {
        echo $cat->cat_name;
        echo " <i class='fa fa-chevron-right breadcrumb-right' aria-hidden='true'></i> ";
      }
      if (is_single()) {
        the_title();
      }
    } elseif (is_page()) {

      if ($post->post_parent) {
        $anc      = get_post_ancestors($post->ID);
        $anc_link = get_page_link($post->post_parent);

        foreach ($anc as $ancestor) {
          $output = " <i class='fa fa-chevron-right breadcrumb-right' aria-hidden='true'></i> <a href=" . $anc_link . ">" . get_the_title($ancestor) . "</a> <i class='fa fa-chevron-right breadcrumb-right' aria-hidden='true'></i> ";
        }

        echo $output;
        the_title();

      } else {
        echo "<i class='fa fa-chevron-right breadcrumb-right' aria-hidden='true'></i>";
        echo the_title();
      }
    }
  } elseif (is_tag()) {single_tag_title();} elseif (is_day()) {
    echo "Archive: ";
    the_time('F jS, Y');
    echo '</li>';} elseif (is_month()) {
    echo "Archive: ";
    the_time('F, Y');
    echo '</li>';} elseif (is_year()) {
    echo "Archive: ";
    the_time('Y');
    echo '</li>';} elseif (is_author()) {
    echo "Author's archive: ";
    echo '</li>';} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
    echo "Blogarchive: ";
    echo '</li>';} elseif (is_search()) {echo "Search results: ";}
}


function the_breadcrumbs_Categorie() {

  global $post;


    echo "<a href='";
    echo get_option('home');
    echo "'>";
    echo "Home";
    echo "</a>";
    echo " <i class='fa fa-chevron-right breadcrumb-right' aria-hidden='true'></i> ";
    echo '<a href="'.get_site_url().'/product-category/create-your-own/" >Create Your Own</a> <i class="fa fa-chevron-right breadcrumb-right" aria-hidden="true"></i> ';
    the_title();

}

// Hooks WooCommerce

add_filter( 'woocommerce_gforms_strip_meta_html', 'configure_woocommerce_gforms_strip_meta_html' );
function configure_woocommerce_gforms_strip_meta_html( $strip_html ) {
    $strip_html = false;
    return $strip_html;
}



/*# Ajax Filter Products
- - - - - - - - - - - - - - -*/
add_action( 'wp_ajax_filter_products_function', 'filter_products_function' );
function filter_products_function() { 
  //$res = array();
  if ( isset($_REQUEST) ) {

    $colorChange    = $_REQUEST['colorChange'];
    $patternChange  = $_REQUEST['patternChange'];
    $category       = $_REQUEST['category'];

    $colorChange    = strtolower($colorChange);

    $tax_final = array(
                  'relation' => 'AND',
                  array(
                  'taxonomy'    => 'product_cat',
                  'terms'     => $category,
                  'field'     => 'slug',
                  'operator'    => 'IN'
                ));

    if($colorChange) {
      $tax_queryColor = array(
                'taxonomy'    => 'pa_color',
                'terms'     => $colorChange,
                'field'     => 'name',
                'operator'    => 'IN'
              );
      $tax_final[] = $tax_queryColor;
    }

    if($patternChange) {
      $tax_queryPattern = array(
              'taxonomy'    => 'pa_pattern',
              'terms'     => $patternChange,
              'field'     => 'name',
              'operator'    => 'IN'
            );
      $tax_final[] = $tax_queryPattern;
    }

    $args = array( 
        'post_type'       => 'product',
        'post_status'       => 'publish',
        'orderby'         => $ordering_args['orderby'],
        'order'         => $ordering_args['order'],
        'posts_per_page'    => '-1',
        
        'tax_query'       => $tax_final
      );

      $products = new WP_Query( $args );

      if ( $products->have_posts() ) :
          while ( $products->have_posts() ) : 
            $products->the_post(); 
            woocommerce_get_template_part( 'content', 'product' );
           endwhile; 
      endif;
      wp_reset_postdata();
    }

    wp_die();
}



function woo_products_by_attributes_shortcode( $atts, $content = null ) {
  global $woocommerce, $woocommerce_loop;

  $ordering_args = $woocommerce->query->get_catalog_ordering_args( $orderby, $order );

  $args = array( 
        'post_type'       => 'product',
        'post_status'       => 'publish',
        'orderby'         => $ordering_args['orderby'],
        'order'         => $ordering_args['order'],
        'posts_per_page'    => '10',
        
        'tax_query'       => array(
            array(
              'taxonomy'    => 'pa_color',
              'terms'     => "beige",
              'field'     => 'slug',
              'operator'    => 'IN'
          )
          )
      );
  
  ob_start();
  
  $products = new WP_Query( $args );
  $woocommerce_loop['columns'] = $columns;
  if ( $products->have_posts() ) : ?>

    <?php woocommerce_product_loop_start(); ?>

      <?php while ( $products->have_posts() ) : $products->the_post(); ?>

        <?php woocommerce_get_template_part( 'content', 'product' ); ?>

      <?php endwhile; // end of the loop. ?>

    <?php woocommerce_product_loop_end(); ?>

  <?php endif;
  wp_reset_postdata();
  return '<div class="woocommerce">' . ob_get_clean() . '</div>';
 
}
 
add_shortcode("woo_products_by_attributes", "woo_products_by_attributes_shortcode");






/*# Ajax Function for gallery
- - - - - - - - - -- - - - - - - - - - - - - */
function update_gallery_woocommerce() {
  if ( isset($_REQUEST) ) {
    $image     = $_REQUEST['image'];
    $idProduct = $_REQUEST['idProduct'];
    $typeProductGallery = $_REQUEST['typeProductGallery'];
    $rows = get_field('images', $idProduct);
    $haveResult = false;
    if($rows) {
      foreach($rows as $row) {
        $imageAux = $typeProductGallery;
        if($row['collar_type']) {
          $imageAux .= $row['collar_type'].'-';
        }
        if($row['pockets']) {
          $imageAux .= $row['pockets'].'-';
        }
        if($row['button_thread_color']) {
             $imageAux .= $row['button_thread_color'].'-'; 
        }
        if($haveResult = $image == $imageAux) {
          echo '<div class="easyzoom el_zoom woocommerce-product-gallery__image">';
          if($row['image']) {
            echo '<img src="'.$row['image'].'" style="opacity:0;">';  
          }
          else {
            echo '<img src="'.get_the_post_thumbnail_url($idProduct, 'full').'" style="opacity:0;">';
          }
          echo '</div>';
          break;
        }

      }
      if(!$haveResult) {
        echo '<div class="easyzoom el_zoom woocommerce-product-gallery__image">';
        echo '<img src="'.get_the_post_thumbnail_url($idProduct, 'full').'" style="opacity:0;">';
        echo '</div>';  
      }
      
    }
    else {
      //echo 'no entraaa';
    }
  }
  die();
}
add_action( 'wp_ajax_update_gallery_woocommerce', 'update_gallery_woocommerce' );







add_action( 'wp_ajax_add_custom_product_meta', 'add_custom_product_meta' );
/*# Ajax Function for gallery
- - - - - - - - - -- - - - - - - - - - - - - */
function add_custom_product_meta() {
    global $woocommerce, $wpdb;

    $item_id = isset($_POST['item_id']) ? apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['item_id'] ) ) : FALSE;
    $quantity = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( $_POST['quantity'] );
    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $item_id, $quantity );
    $product_status    = get_post_status( $item_id );

    $variation_id = isset($_POST['variation_id']) ? $_POST['variation_id'] : 0;
    $atributes = isset($_POST['atributes']) ? $_POST['atributes'] : 'Small';
    $attribute_pa_macaroons = isset($_POST['attribute_pa_macaroons']) ? $_POST['attribute_pa_macaroons'] : FALSE;

    if($attribute_pa_macaroons && $passed_validation && $woocommerce->cart->add_to_cart( $item_id, $quantity, $variation_id, array( 'attribute_size' => $atributes,  "macaroons" => $attribute_pa_macaroons))){

        //$added = $woocommerce->cart->add_to_cart( $item_id, $quantity, $variation_id, array( 'attribute_size' => $atributes,  "macaroons" => $attribute_pa_macaroons));

        do_action( 'woocommerce_ajax_added_to_cart', $item_id );

        if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) {
            wc_add_to_cart_message( $item_id );
        }

        WC_AJAX::get_refreshed_fragments();

        echo json_encode(array(
            'atributes' => $atributes,
            'macaroons' => $attribute_pa_macaroons,
            'product_added' => TRUE,
            'ajax_complete' => TRUE,
            'posted' => isset($_POST['item_id']) ? $woocommerce->cart : 'item_id is empty'
        ));
        wp_die();
    }

    echo json_encode(array(
        'product_id' => FALSE,
        'product_added' => FALSE,
        'ajax_complete' => TRUE,
        'posted' => $attribute_pa_macaroons
    ));
    wp_die();
}