<?php
/**
 * Thankyou page
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( $order ) : ?>

<div class="row">
	<div class="large-8 large-centered columns">
		<div class="thank_you_header text-center">

			<?php if ( $order->has_status( 'failed' ) ) : ?>
        
                <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

                <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
                <?php endif; ?>
            </p>
        
            <?php else : ?>
        
                <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>
                
                <img class="thank_you_header_img_top" src="<?php echo get_template_directory_uri(); ?>/images/thank_you_header_img.png"  alt="login-image" />      
                    <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                        <li class="woocommerce-order-overview__order order">
                            <span class="title"><?php _e( 'Order:', 'woocommerce' ); ?></span>
                            <strong><?php echo $order->get_order_number(); ?></strong>
                        </li>

                        <li class="woocommerce-order-overview__date date">
                            <span class="title"><?php _e( 'Date:', 'woocommerce' ); ?></span>
                            <strong><?php echo date_i18n( get_option( 'date_format' ), strtotime($order->get_date_created()) ); ?></strong>
                        </li>

                        <li class="woocommerce-order-overview__total total">
                            <span class="title"><?php _e( 'Total:', 'woocommerce' ); ?></span>
                            <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                        </li>

                        <?php if ( $order->get_payment_method_title() ) : ?>

                        <li class="woocommerce-order-overview__payment-method method">
                            <span class="title"><?php _e( 'Payment method:', 'woocommerce' ); ?></span>
                            <strong><?php echo $order->get_payment_method_title(); ?></strong>
                        </li>

                        <?php endif; ?>
                    </ul>
                <div class="clear"></div>
                <img class="thank_you_header_img_bottom" src="<?php echo get_template_directory_uri(); ?>/images/thank_you_header_img.png"  alt="login-image" />
        
            <?php endif; ?>
    
		</div><!-- .thank_you_header-->

		<div class="thank_you_bank_details">
	        <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
        </div><!-- .thank_you_bank_details-->

    </div><!-- .medium-10-->
</div><!--	.row	-->

<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

<?php else : ?>

<div class="row">
	<div class="medium-10 medium-centered  large-8 large-centered text-center columns">
		<div class="thank_you_header">

			<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>
    
		</div>
    </div>
</div>

<?php endif; ?>