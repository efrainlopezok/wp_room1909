<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author     WooThemes
 * @package   WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}
// Exit if accessed directly

global $post, $product, $mr_tailor_theme_options;

//woocommerce_before_single_product
//nothing changed

//woocommerce_before_single_product_summary
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

add_action('woocommerce_before_single_product_summary_sale_flash', 'woocommerce_show_product_sale_flash', 10);
add_action('woocommerce_before_single_product_summary_product_images', 'woocommerce_show_product_images', 20);

//woocommerce_single_product_summary
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

add_action('woocommerce_single_product_summary_single_title', 'woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary_single_rating', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary_single_price', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary_single_excerpt', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary_single_meta', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary_single_sharing', 'woocommerce_template_single_sharing', 50);

//woocommerce_after_single_product_summary
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

remove_action('woocommerce_after_single_product_summary_data_tabs', 'woocommerce_output_product_data_tabs', 10);

//woocommerce_after_single_product
//nothing changed

//custom actions
remove_action('woocommerce_before_main_content_breadcrumb', 'woocommerce_breadcrumb', 20, 0);
add_action('woocommerce_product_summary_thumbnails', 'woocommerce_show_product_thumbnails', 20);

$product_page_has_sidebar = false;

if ((isset($mr_tailor_theme_options['products_layout'])) && ($mr_tailor_theme_options['products_layout'] == "0")) {

  $product_page_has_sidebar = false;

} else {

  $product_page_has_sidebar = true;

}

?>

<?php do_action('woocommerce_before_main_content_breadcrumb');?>

<div  id="product-<?php the_ID();?>" <?php post_class();?>>

    
	<?php if ($product_page_has_sidebar): ?>

	<div class="single-product with-sidebar">

		<div class="row">

			<div class="large-3 columns show-for-large-up">
				<div class="wpb_widgetised_column">
					<?php dynamic_sidebar('catalog-widget-area');?>
				</div>
			</div>

			<div class="large-9 columns">
				<?php do_action('woocommerce_before_single_product');?>

			<div class="product_summary_top">
			<?php
						do_action('woocommerce_single_product_summary_single_title');
						do_action('woocommerce_single_product_summary_single_rating');

						if (post_password_required()) {
							echo get_the_password_form();
							echo '</div></div></div></div>';
							return;
						}
						?>
			</div>

				<div class="row">

					<div class="large-7 large-push-0 medium-8 medium-push-2 columns">

						<?php
						if ((isset($mr_tailor_theme_options['catalog_mode'])) && ($mr_tailor_theme_options['catalog_mode'] == 0)) {
							do_action('woocommerce_before_single_product_summary_sale_flash');
						}
						do_action('woocommerce_before_single_product_summary_product_images');
						do_action('woocommerce_before_single_product_summary');
						?>


						<?php if ((isset($mr_tailor_theme_options['catalog_mode'])) && ($mr_tailor_theme_options['catalog_mode'] == 0)): ?>

						<?php if (!$product->is_in_stock() && !empty($mr_tailor_theme_options['out_of_stock_text'])): ?>

						<div class="out_of_stock_badge_single <?php if (!$product->is_on_sale()): ?>first_position<?php endif;?>">
							<?php echo __($mr_tailor_theme_options['out_of_stock_text'], 'getbowtied'); ?>
						</div>
						<?php endif;?>
						<?php endif;?>

						<div class="product_summary_thumbnails_wrapper with-sidebar">
							<div><?php do_action('woocommerce_product_summary_thumbnails');?></div>
						</div><!-- .product_summary_thumbnails_wrapper-->

					</div><!-- .columns -->

					<div class="large-5 large-push-0 columns">

						<div class="product_infos">

							<?php
							do_action('woocommerce_single_product_summary_single_price');
							do_action('woocommerce_single_product_summary_single_excerpt');
							do_action('woocommerce_single_product_summary');
							?>

						</div>

					</div><!-- .columns -->

				</div><!--.row-->

				<div class="row">
					<div class="large-12 large-uncentered columns">
						<?php
						do_action('woocommerce_after_single_product_summary_data_tabs');

						do_action('woocommerce_single_product_summary_single_meta');
						do_action('woocommerce_single_product_summary_single_sharing');

						do_action('woocommerce_after_single_product_summary');
						?>



					</div><!-- .columns -->
				</div><!-- .row -->

			</div><!--.large-9-->

		</div><!--.row-->

	</div><!--.single-product .with-sidebar-->

	<?php else: ?>

	<div class="single-product without-sidebar <?php if (has_term('create-your-own', 'product_cat')) echo 'customize-product' ?>" 
	<?php if (has_term('create-your-own', 'product_cat')) : ?>
					style="visibility: hidden;"
				<?php endif;?>
	>

		<div class="row row-fluid">
			
			<div class="large-7 large-push-0 medium-8 medium-push-2 columns">
				<div class="wrap-gallery">
				<?php
				if ((isset($mr_tailor_theme_options['catalog_mode'])) && ($mr_tailor_theme_options['catalog_mode'] == 0)) {
					do_action('woocommerce_before_single_product_summary_sale_flash');
				}
				do_action('woocommerce_before_single_product_summary_product_images');
				do_action('woocommerce_before_single_product_summary');

				?>


				<?php if (has_term('create-your-own', 'product_cat')) : ?>
					<script type="text/javascript">
						
					</script>
					<div class="image-conjugation">
						<?php 
						$rows = get_field('images');
						if($rows) {
							$imageAux = get_field('init_images');
							foreach($rows as $row) {
								if($row['collar_type']) {
									$imageAux .= $row['collar_type'].'-';
								}
								if($row['pockets']) {
									$imageAux .= $row['pockets'].'-';
								}
								if($row['button_thread_color']) {
									$imageAux .= $row['button_thread_color'].'-'; 
								}
								$imageAux = str_replace("(", "", $imageAux);
								$imageAux = str_replace(")", "", $imageAux);
								$imageAux = str_replace("&", "", $imageAux);
								$imageAux = str_replace(" ", "-", $imageAux);
								$imageAux = strtolower($imageAux);
								if($row['image']) {
									echo '<div class="'.$imageAux.'" style="background-image: url('.$row['image'].');"></div>';
									
								}
								else {
									echo '<div class="'.$imageAux.'" style="background-image: url('.get_the_post_thumbnail_url($idProduct, 'full').');"></div>';
								}
								$imageAux = get_field('init_images');
							}
						}
						?>
					</div>
				<?php endif; ?>


				<!-- <div class="easyzoom el_zoom woocommerce-product-gallery__image is-ready">
					<a data-fresco-group="product-gallery" data-fresco-options="fit: 'width'" class="zoom" href="http://wearescale.com/clients/room1909/wp-content/uploads/2017/09/1-Blue-jacket-basics.png">
						<img width="570" height="708" src="http://wearescale.com/clients/room1909/wp-content/uploads/2017/09/1-Blue-jacket-basics-570x708.png" class="attachment-shop_single size-shop_single wp-post-image" alt="1 Blue jacket basics" srcset="http://wearescale.com/clients/room1909/wp-content/uploads/2017/09/1-Blue-jacket-basics-570x708.png 570w, http://wearescale.com/clients/room1909/wp-content/uploads/2017/09/1-Blue-jacket-basics-70x87.png 70w, http://wearescale.com/clients/room1909/wp-content/uploads/2017/09/1-Blue-jacket-basics-350x435.png 350w, http://wearescale.com/clients/room1909/wp-content/uploads/2017/09/1-Blue-jacket-basics-116x145.png 116w, http://wearescale.com/clients/room1909/wp-content/uploads/2017/09/1-Blue-jacket-basics-190x236.png 190w" sizes="(max-width: 570px) 100vw, 570px">
					</a>
				</div> -->




				<?php if ((isset($mr_tailor_theme_options['catalog_mode'])) && ($mr_tailor_theme_options['catalog_mode'] == 0)): ?>
					<?php if (!$product->is_in_stock() && !empty($mr_tailor_theme_options['out_of_stock_text'])): ?>
						<div class="out_of_stock_badge_single <?php if (!$product->is_on_sale()): ?>first_position<?php endif;?>"><?php echo __($mr_tailor_theme_options['out_of_stock_text'], 'getbowtied'); ?></div>
					<?php endif;?>
				<?php endif;?>

				&nbsp;
				</div>
			</div><!-- .columns -->

			<?php

			if (empty($_COOKIE['woocommerce_recently_viewed'])) {
				$viewed_products = array();
			} else {
				$viewed_products = (array) explode('|', $_COOKIE['woocommerce_recently_viewed']);
			}

			if (!in_array($post->ID, $viewed_products)) {
				$viewed_products[] = $post->ID;
			}

			if (sizeof($viewed_products) > 4) {
				array_shift($viewed_products);
			}

			?>

			<?php if (empty($viewed_products)): ?>
				<div class="large-6 large-push-0 columns">
			<?php else: ?>

				<?php if ((!isset($mr_tailor_theme_options['recently_viewed_products'])) || ($mr_tailor_theme_options['recently_viewed_products'] == "1")): ?>
					<div class="large-5 large-push-0 columns">
				<?php else: ?>
					<div class="large-6 large-push-0 columns">
				<?php endif;?>

			<?php endif;?>

				<div class="product_infos">
					<?php //do_action('woocommerce_single_product_summary_single_excerpt'); ?>
						<div class="title-single-product">
							<?php
							do_action('woocommerce_single_product_summary_single_title');
							?>
						</div>
					<div class="single-product-price">
						<div class="cont-2">
							<?php do_action('woocommerce_single_product_summary'); ?>
						</div>
						<div class="cont-1">
							<div class="flex">
								<div class="costs">
									<h4><strong>The Set</strong></h4>
									<div><h4>USD</h4>
									<?php do_action('woocommerce_single_product_summary_single_price'); ?></div>
								</div>
								<div class="send-btn">
									<a href="?add-to-cart=779" class="btn-relative btn-green-b no-detailed">Add set to Cart <i class="fa fa-angle-right" aria-hidden="true"></i></a>
									<a href="<?php echo get_site_url();?>/checkout/" class="btn-relative btn-green-b detailed">Checkout <i class="fa fa-angle-right" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>

						<div class="delivery">
							<p>Delivery time is between 4-5 weeks <a href="#popup-top" class="popup-open"><span class="info">i</span></a></p>
						</div>
						<div id="infopopup" class="white-popup mfp-hide">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut interdum leo, in fringilla mauris. In consectetur laoreet urna et fringilla. Nam accumsan vestibulum mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ultrices imperdiet sapien, non sagittis lacus varius at. Donec lacus orci, varius non tincidunt id, ultricies eget lectus. Pellentesque semper sagittis nibh eget porttitor. Praesent eu condimentum ipsum, eget gravida tortor. Nunc sed egestas quam. In suscipit nulla id rutrum bibendum. Maecenas faucibus magna quis ex pretium rutrum a non sem. Aenean orci urna, gravida ut sollicitudin eget, consequat nec sapien.</p>
							<p>Vestibulum arcu massa, scelerisque et turpis eget, tristique tincidunt lacus. Ut sodales nulla gravida mi blandit, nec elementum tortor ultrices. Maecenas finibus porta tortor, quis hendrerit urna imperdiet sit amet. Phasellus odio diam, vestibulum ut nisi sed, luctus commodo velit. Pellentesque placerat quam et libero placerat, vitae venenatis est placerat. Duis aliquet justo eu enim consectetur dignissim. Curabitur eget libero nunc. Morbi tempor neque turpis, faucibus egestas arcu laoreet vel.</p>
						</div>
					</div>
				</div>
			</div><!-- .columns -->

			<?php if (!empty($viewed_products)): ?>
			<?php if ((!isset($mr_tailor_theme_options['recently_viewed_products'])) || ($mr_tailor_theme_options['recently_viewed_products'] == "1")): ?>
			<?php endif;?>
			<?php endif;?>
		</div><!-- .row -->

		<div class="row">
			<div class="large-12 large-uncentered columns">
				<?php
					do_action('woocommerce_after_single_product_summary_data_tabs');

					do_action('woocommerce_single_product_summary_single_meta');
					do_action('woocommerce_single_product_summary_single_sharing');

					do_action('woocommerce_after_single_product_summary');
				?>

			</div><!-- .columns -->
		</div><!-- .row -->

	</div><!--.single-product .without-sidebar-->

	<?php endif;?>

	<meta itemprop="url" content="<?php the_permalink();?>" />

</div><!-- #product-<?php the_ID();?> -->

<?php do_action('woocommerce_after_single_product');?>


<?php if (has_term('create-your-own', 'product_cat')) : ?>
	<script type="text/javascript">
		jQuery(window).load(function() {
      		jQuery('.single-product.without-sidebar').css('visibility', 'visible').addClass('fadeIn animated');
		});
	</script>
<?php endif;?>