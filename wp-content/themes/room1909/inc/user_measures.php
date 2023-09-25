<?php

/**
 * Custom measures
 * @version 1.0
 */





/* Custom Fields in User

- - - - - - - - - - - - - - - - - - */

add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
    if ( is_singular( 'product' ) ) {
    	if(get_field('bodyclass'))
			$classes[] = get_field('bodyclass');
    }
    return $classes;
}



add_action( 'show_user_profile', 'my_show_extra_measures_fields' );

add_action( 'edit_user_profile', 'my_show_extra_measures_fields' );



function my_show_extra_measures_fields( $user ) { ?>



	<h3>Measures information</h3>



	<table class="form-table">

		<tr> <th><label for="type_measure">Type Meseaure</label></th> 

			<td> 
				<label><input type="radio" name="type_measure" value="Imperial" <?php if('Imperial'==esc_attr(get_the_author_meta('type_measure',$user->ID ))) echo 'checked="checked"'; ?> class="radio" />&nbsp;&nbsp;Imperial</label><br /> 
				<label><input type="radio" name="type_measure" value="Metric" <?php if('Metric'==esc_attr(get_the_author_meta('type_measure',$user->ID ))) echo 'checked="checked"'; ?> class="radio" />&nbsp;&nbsp;Metric</label>
			</td> 
		</tr>



		<tr>

			<th><label for="height_m">Height</label></th>

			<td>

				<input type="text" name="height_m" id="height_m" value="<?php echo esc_attr( get_the_author_meta( 'height_m', $user->ID ) ); ?>" class="regular-text" />

				<span class="description" >ft.</span>

				<input type="text" name="heightIn" id="heightIn" value="<?php echo esc_attr( get_the_author_meta( 'heightIn', $user->ID ) ); ?>" class="regular-text" /><span class="description"> In.</span>

			</td>

		</tr>



		<tr>

			<th><label for="weight_m">Weight</label></th>

			<td>

				<input type="text" name="weight_m" id="weight_m" value="<?php echo esc_attr( get_the_author_meta( 'weight_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> lbs.</span>

			</td>

		</tr>



		<tr>

			<th><label for="neck_m">Neck</label></th>

			<td>

				<input type="text" name="neck_m" id="neck_m" value="<?php echo esc_attr( get_the_author_meta( 'neck_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="shoulder_m">Shoulder</label></th>

			<td>

				<input type="text" name="shoulder_m" id="shoulder_m" value="<?php echo esc_attr( get_the_author_meta( 'shoulder_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="armlenght_m">Arm Length</label></th>

			<td>

				<input type="text" name="armlenght_m" id="armlenght_m" value="<?php echo esc_attr( get_the_author_meta( 'armlenght_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>

		

		<tr>

			<th><label for="chest_m">Chest</label></th>

			<td>

				<input type="text" name="chest_m" id="chest_m" value="<?php echo esc_attr( get_the_author_meta( 'chest_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="bicep_m">Bicep</label></th>

			<td>

				<input type="text" name="bicep_m" id="bicep_m" value="<?php echo esc_attr( get_the_author_meta( 'bicep_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="stomach_m">Stomach</label></th>

			<td>

				<input type="text" name="stomach_m" id="stomach_m" value="<?php echo esc_attr( get_the_author_meta( 'stomach_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="waist_m">Waist</label></th>

			<td>

				<input type="text" name="waist_m" id="waist_m" value="<?php echo esc_attr( get_the_author_meta( 'waist_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="wrist_m">Wrist</label></th>

			<td>

				<input type="text" name="wrist_m" id="wrist_m" value="<?php echo esc_attr( get_the_author_meta( 'wrist_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="seat_m">Seat</label></th>

			<td>

				<input type="text" name="seat_m" id="seat_m" value="<?php echo esc_attr( get_the_author_meta( 'seat_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="jacketlength_m">Jacket Length</label></th>

			<td>

				<input type="text" name="jacketlength_m" id="jacketlength_m" value="<?php echo esc_attr( get_the_author_meta( 'jacketlength_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="urise_m">U-Rise</label></th>

			<td>

				<input type="text" name="urise_m" id="urise_m" value="<?php echo esc_attr( get_the_author_meta( 'urise_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="thigh_m">Thigth</label></th>

			<td>

				<input type="text" name="thigh_m" id="thigh_m" value="<?php echo esc_attr( get_the_author_meta( 'thigh_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



		<tr>

			<th><label for="pantslength_m">Pants Length</label></th>

			<td>

				<input type="text" name="pantslength_m" id="pantslength_m" value="<?php echo esc_attr( get_the_author_meta( 'pantslength_m', $user->ID ) ); ?>" class="regular-text" /><span class="description"> inches</span>

			</td>

		</tr>



	</table>

<?php }







add_action( 'personal_options_update', 'my_save_extra_measures_fields' );

add_action( 'edit_user_profile_update', 'my_save_extra_measures_fields' );



function my_save_extra_measures_fields( $user_id ) {



	if ( !current_user_can( 'edit_user', $user_id ) )

		return false;

	//update_usermeta( $user_id, 'height_m', $_POST['height_m'] );

	update_usermeta( $user_id, 'neck_m', $_POST['neck_m'] );

	update_usermeta( $user_id, 'shoulder_m', $_POST['shoulder_m'] );

}





/* Ajax - Save Form

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/



function update_user_measures() {
	if(is_user_logged_in()) {
		if ( isset($_REQUEST) ) {

	        $height_m 	  = $_REQUEST['height_m'];

	        $heightIn 	  = $_REQUEST['heightIn'];

	        $weight_m 	  = $_REQUEST['weight_m'];

	        $type_measure = $_REQUEST['type_measure'];

	        update_usermeta( get_current_user_id(), 'type_measure', $type_measure );

	     	update_usermeta( get_current_user_id(), 'height_m', $height_m );

	     	update_usermeta( get_current_user_id(), 'heightIn', $heightIn );

	     	update_usermeta( get_current_user_id(), 'weight_m', $weight_m );

	     	echo "update!";

    	}
    	else
    		echo false;
	}
	else {
		echo false;
	}

   	die();

}

 

add_action( 'wp_ajax_update_user_measures', 'update_user_measures' );







function update_user_measures_second_part() {

    if ( isset($_REQUEST) ) {

        $neck_m 		= $_REQUEST['neck_m'];

        $shoulder_m 	= $_REQUEST['shoulder_m'];

        $armlenght_m 	= $_REQUEST['armlenght_m'];

        $chest_m 		= $_REQUEST['chest_m'];

        $bicep_m 		= $_REQUEST['bicep_m'];

        $stomach_m 		= $_REQUEST['stomach_m'];

        $waist_m 		= $_REQUEST['waist_m'];

        $wrist_m 		= $_REQUEST['wrist_m'];

        $seat_m 		= $_REQUEST['seat_m'];

        $jacketlength_m = $_REQUEST['jacketlength_m'];

        $urise_m 		= $_REQUEST['urise_m'];

        $thigh_m 		= $_REQUEST['thigh_m'];

        $pantslength_m 	= $_REQUEST['pantslength_m'];

       



        update_usermeta( get_current_user_id(), 'neck_m', $neck_m );

        update_usermeta( get_current_user_id(), 'shoulder_m', $shoulder_m );

        update_usermeta( get_current_user_id(), 'armlenght_m', $armlenght_m );

        update_usermeta( get_current_user_id(), 'chest_m', $chest_m );

        update_usermeta( get_current_user_id(), 'bicep_m', $bicep_m );

        update_usermeta( get_current_user_id(), 'stomach_m', $stomach_m );

        update_usermeta( get_current_user_id(), 'waist_m', $waist_m );

        update_usermeta( get_current_user_id(), 'wrist_m', $wrist_m );

        update_usermeta( get_current_user_id(), 'seat_m', $seat_m );

        update_usermeta( get_current_user_id(), 'jacketlength_m', $jacketlength_m );

        update_usermeta( get_current_user_id(), 'urise_m', $urise_m );

        update_usermeta( get_current_user_id(), 'thigh_m', $thigh_m );

        update_usermeta( get_current_user_id(), 'pantslength_m', $pantslength_m );



     	//update_usermeta( get_current_user_id(), 'height_m', $height_m );

     	//update_usermeta( get_current_user_id(), 'heightIn', $heightIn );

     	//update_usermeta( get_current_user_id(), 'weight_m', $weight_m );

     	echo "update!";

    }

   die();

}

 

add_action( 'wp_ajax_update_user_measures_second_part', 'update_user_measures_second_part' );






add_shortcode('timeline_work_2', 'timeline_work_function_2');

function timeline_work_function_2($atts, $content) {

    return '
	<section class="cd-horizontal-timeline">
	<div class="timeline">
		<div class="events-wrapper">
			<div class="events">
				<ol>
					<li><a href="#0" data-date="01/01/2014" class="selected"><span>1</span>Choose or <br>create</a></li>
					<li><a href="#0" data-date="02/01/2014"><span>2</span>buyt it now or <br>customize it</a></li>
					<li><a href="#0" data-date="03/01/2014"><span>3</span>choose size or <br>get measured</a></li>
				</ol>
				<span class="filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->

		<ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev prev-new"></a></li>
			<li><a href="#0" class="next"></a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> <!-- .timeline -->

	<div class="events-content">
		<ol>
			<li class="selected" data-date="01/01/2014">
				<p><img class="img-slider" src="'.get_site_url().'/wp-content/uploads/2017/08/cierre.png">
				</p>
				<p><span class="num">1</span></p>
				<h3>Choose or create</h3>
				<p>It is a long established fact that a reader will be distracted by the readable <br>content of a page when looking at its layout.</p>
				<p><img src="'.get_site_url().'/wp-content/uploads/2017/08/default-image.png"></p>
			</li>
			<li data-date="02/01/2014">
				<p><img class="img-slider" src="'.get_site_url().'/wp-content/uploads/2017/08/aguja.png"></p>
				<p><span class="num">2</span></p>
				<h3>Buy it now or customize it</h3>
				<p>It is a long established fact that a reader will be distracted by the readable <br>content of a page when looking at its layout.</p>
				<p><img src="'.get_site_url().'/wp-content/uploads/2017/08/default-image.png"></p>
			</li>
			<li data-date="03/01/2014">
				<p><img class="img-slider" src="'.get_site_url().'/wp-content/uploads/2017/08/regla.png"></p>
				</p><span class="num">3</span></p>
				<h3>Choose size or get measured</h3>
				<p>It is a long established fact that a reader will be distracted by the readable <br>content of a page when looking at its layout.</p>
				<p><img src="'.get_site_url().'/wp-content/uploads/2017/08/default-image.png"></p>
			</li>
		</ol>
	</div> <!-- .events-content -->
</section>
<style>
.events ol{
	margin: 0;
}
.cd-timeline-navigation a::after {
	content: "\f105";
    position: absolute;
    height: 16px;
    width: 16px;
    display: inline-block;
    font: normal normal normal 20px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 36px;
    left: 50%;
    margin-left: -5px;
    top: 50%;
    margin-top: -19px;
    color: black;
    z-index: 222222;
}

.events li a span {
	display: block;
	background-color: #0b322b;
	width: 25px;
	position: relative;
	left: 50%;
	margin-left: -10px;
	color: #fff;
	height: 25px;
	font-size: 13px;
	line-height: 25px;
	border-radius: 50%;
	margin-bottom: 15px;
}
.cd-horizontal-timeline .timeline {
	height: 170px;
}
.cd-horizontal-timeline .events {
	top: 84px;
}
.cd-horizontal-timeline .events a {
	color: #0b322b;
	text-transform: uppercase;
	font-size: 16px;
	font-weight: bold;
}
</style>
';

}




