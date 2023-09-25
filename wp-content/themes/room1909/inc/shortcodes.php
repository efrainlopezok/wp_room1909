<?php
/**
 * Custom shortcodes goes here
 * @version 1.0
 */

function room_Button_Shortcode($atts, $content = '') {

  $attr = shortcode_atts(array(

    'color' => 'black',

    'align' => '',

    'link'  => '#',

  ), $atts);



  $attr['align'] = $attr['align'] ? 'btn-' . $attr['align'] : '';

  $attr['color'] = 'btn-' . $attr['color'];



  $out = '<a  href="' . $attr['link'] . '" class="button btn ' . $attr['color'] . ' ' . $attr['align'] . '">';

  $out .= $content;

  $out .= '</a>';

  return $out;

}

add_shortcode('button', 'room_button_shortcode');



function room_Button_Green_Shortcode($atts, $content = '') {

  $out = '<a href="'.$atts['link'].'" class="btn-relative btn-green '.$atts['class'].'">'.$content.'</a>';

  return $out;

}

add_shortcode('button_green', 'room_button_green_shortcode');



function room_content_buttons_shortcode($atts, $content = '')

{

  $out = '<div class="btn-box">';

  // $out .= do_shortcode('[add_to_cart id="756"]');

  $out .= '<a href="?add-to-cart='.$atts['product_id'].'" class="btn-relative btn-green-b">Add to Cart <i class="fa fa-angle-right" aria-hidden="true"></i></a>';

  $out .= '<p>OR</p>';

  $out .= '<a href="'.$atts['product_link'].'" class="btn-relative btn-green-b">Customize <i class="fa fa-angle-right" aria-hidden="true"></i></a>';

  $out .= '</div>';

  return $out;

}

add_shortcode('product_buttons', 'room_content_buttons_shortcode');





function room_Faq_Shortcode($atts, $content = null)

{

  return '<div class="faq">

        <div class="faq-click">

            <h3>' . esc_attr($atts['title']) . '</h3>

            <i class="fa fa-chevron-down" aria-hidden="true"></i>

        </div>

        <p>' . $content . '</p>

    </div>';

}

add_shortcode('faq', 'room_faq_shortcode');



function room_P_Shortcode($atts, $content = null)

{

  $out = shortcode_atts(array(

    'class' => 'paragraph',

  ), $atts);



  return '<p class="' . esc_attr($out['class']) . '">' . $content . '</p>';

}

add_shortcode('p', 'room_p_shortcode');



function roo_H3_Shortcode($atts, $content = null)

{

  $out = shortcode_atts(array(

    'class' => 'custom-h3',

  ), $atts);



  return '<h3 class="' . esc_attr($out['class']) . '">' . $content . '</h3>';

}

add_shortcode('h3', 'room_h3_shortcode');



function room_Button_New_Shortcode($atts, $content = null)

{

  $out = shortcode_atts(array(

    'class' => 'button',

    'link'  => '#',

  ), $atts);



  return '<a href="' . esc_attr($out['link']) . '" class="' . esc_attr($out['class']) . '">' . $content . '<i class="fa fa-chevron-right" aria-hidden="true"></i></a>';

}

// [btn link"" class=""][/btn]

add_shortcode('btn', 'room_button_new_shortcode');



function room_form_shortcode($atts = null) {

  return '<form method="post" action="/room/measurements" class="measurements-form">

    <div class="row-form-text">

      <p>Height</p>

      <p>Weight</p>

    </div>

    <div class="row-form">

      <div class="input-form-row">

        <input type="number" name="ft" id="measurements-ft" placeholder="0" value="'.get_the_author_meta('height_m').'">

        <label for="measurements-ft">ft.</label>

      </div>

      <div class="input-form-row">

        <input type="number" name="in" id="measurements-in" placeholder="0">

        <label for="measurements-in">in.</label>

      </div>

      <div class="input-form-row">

        <input type="text" name="lbs" id="measurements-lbs" placeholder="0">

        <label for="measurements-lbs">lbs.</label>

      </div>

    </div>

    <div class="row-form-checkbox">

      <label for="imperial">Imperial</label>

      <input type="checkbox" name="imperial" id="imperial">

      <label for="metric">Metric</label>

      <input type="checkbox" name="metric" id="metric">

    </div>

    <div class="row-form-submit">

      <input type="submit" id="submit_m" name="submit" value="Save & Continue">

      <i class="fa fa-angle-right" aria-hidden="true"></i>

    </div>

</form>';

}

add_shortcode('form', 'room_form_shortcode');









add_shortcode('timeline_work', 'timeline_work_function');

function timeline_work_function($atts = null) {

    return '<section class="cd-horizontal-timeline">

              <div class="timeline">

                <div class="events-wrapper">

                  <div class="events">

                    <ol>

                      <li><a href="#0" data-date="01/01/2014" class="selected">CHOOSE OR CREATE</a></li>

                      <li><a href="#0" data-date="01/02/2015">BUY IT NOW OR<br>CUSTOMIZE IT</a></li>

                      <li><a href="#0" data-date="01/03/2016">CHOOSE SIZE OR<br>GET MEASURED</a></li>

                      

                    </ol>



                    <span class="filling-line" aria-hidden="true"></span>

                  </div> <!-- .events -->

                </div> <!-- .events-wrapper -->

                  

                <ul class="cd-timeline-navigation">

                  <li><a href="#0" class="prev inactive">Prev</a></li>

                  <li><a href="#0" class="next">Next</a></li>

                </ul> <!-- .cd-timeline-navigation -->

              </div> <!-- .timeline -->



              <div class="events-content">

                <ol>

                  <li class="selected" data-date="01/01/2014">

                    <h2>Horizontal Timeline</h2>

                    <em>January 16th, 2014</em>

                    <p> 

                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.

                    </p>

                  </li>



                  <li data-date="01/02/2015">

                    <h2>Event title here</h2>

                    <em>February 28th, 2014</em>

                    <p> 

                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.

                    </p>

                  </li>



                  <li data-date="01/03/2016">

                    <h2>Event title here</h2>

                    <em>March 20th, 2014</em>

                    <p> 

                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.

                    </p>

                  </li>



                  

                </ol>

              </div> <!-- .events-content -->

            </section>';

}


// Shortcodes WooCommerce
