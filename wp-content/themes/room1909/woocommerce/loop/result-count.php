<?php

/**
 * Result Count
 *
 * Shows text: Showing x - x of x results
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $wp_query;

if ( ! woocommerce_products_will_display() )
	return;
?>

<div class="medium-8 columns">
	<form method="get" action="/">
		<input type="hidden" name="category" id="category" value="<?php echo $wp_query->get_queried_object()->slug; ?>">

		<div class="wrap-price">
			<a href="#" class="show-filter-pattern">Price <i class="fa fa-angle-down" aria-hidden="true"></i></a>
		</div>

		<?php 
		$taxonomies = get_terms( array(
			'taxonomy' => 'pa_pattern',
			'hide_empty' => false
		) );
		?>
		<?php if ( !empty($taxonomies) ) : ?>
			<div class="wrap-pattern">
				<a href="#" class="show-filter-pattern">Pattern <i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<ul class="list-filter-pattern" style="display: none;">
					<li id="patter-li" class="gfield radio-10-block customize-hide customize-box-lining gfield_price gfield_price_7_23 gfield_option_7_23 field_sublabel_below field_description_below gfield_visibility_visible" style="display: list-item;">
						<label class="gfield_label">Button Thread Color</label>
						<div class="ginput_container ginput_container_radio">
							<?php 
								$output = '<ul class="gfield_radio">';
								$cont = 0;
								foreach( $taxonomies as $category ) {
									if( $category->parent == 0 ) {
										$output.= '<li class="choice_'.$cont.'">';
												$output .= '<input name="input_pattern" type="radio" value="'. esc_attr( $category->name ) .'" id="color'. esc_attr( $category->name ) .'">
													<label for="color'. esc_attr( $category->name ) .'" id="label_'.$cont.'" changepattern="'. esc_attr( $category->name ) .'">
													<img src="'.get_field('image', $category->taxonomy . '_' . $category->term_id)['url'].'"></label>';
													$output .= '<span class="hover-color">'.esc_attr( $category->name ).'</span>';
										$output.='</li>';
									}
									$cont++;
								}
								$output.='</ul>';
								echo $output;
								$output = "";
							?>
						</div>
					</li>
				</ul>
			</div>
		<?php endif; ?>


		<?php 
		$taxonomies = get_terms( array(
			'taxonomy' => 'pa_color',
			'hide_empty' => false
		) );
		?>
		<?php if ( !empty($taxonomies) ) : ?>
			<div class="wrap-color">
				<a href="#" class="show-filter-color">Color <i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<ul class="list-filter-color" style="display: none;">
					<li id="color-li" class="gfield radio-10-block customize-hide customize-box-button-color gfield_option_4_23 field_sublabel_below field_description_below gfield_visibility_visible" style="display: list-item;">
						<label class="gfield_label">Button Thread Color</label>
						<div class="ginput_container ginput_container_radio">
							<?php 
								$output = '<ul class="gfield_radio">';
								$cont = 0;
								foreach( $taxonomies as $category ) {
									if( $category->parent == 0 ) {
										$output.= '<li class="choice_'.$cont.'">';
												$output .= '<input name="input_color" type="radio" value="'. esc_attr( $category->name ) .'" id="color'. esc_attr( $category->name ) .'">
													<label for="color'. esc_attr( $category->name ) .'" id="label_'.$cont.'" changecolor="'. esc_attr( $category->name ) .'">'. esc_attr( $category->name ) .'</label>';
										$output.='</li>';
									}
									$cont++;
								}
								$output.='</ul>';
								echo $output;
							?>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		<?php endif; ?>
	</form>
</div><!-- .columns-->