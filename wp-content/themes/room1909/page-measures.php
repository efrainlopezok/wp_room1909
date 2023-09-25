<?php

/*

Template Name: Measures

*/

?>



<?php get_header(); ?>



<style type="text/css">

    #content {

        overflow: hidden;

    }

</style>
    <div class="blank-page full-width-page">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
                    <?php while ( have_posts() ) : the_post(); ?>

                    <form method="post" action="/room/measurements" class="measurements-form">

                        <div class="content-initial form-measures">

                            <?php get_template_part( 'content', 'page' ); ?>

                        <div class="full-width-page">

                            <div class="row">

                                <div class="row-fluid ">

                                    <div class="vc_column_container">

                                        <div class="vc_column-inner">

                                            <div class="row-form-text">

                                              <p>Height</p>

                                              <p>Weight</p>

                                            </div>

                                            <div class="row-form row-imperial">

                                              <div class="input-form-row">

                                                <input type="number" name="ft" id="measurements-height-m" placeholder="0" value="<?php 
                                                if(is_user_logged_in()) 
                                                    echo 
                                                    get_the_author_meta('height_m', get_current_user_id());
                                                else 
                                                    echo '';
                                                    ?>">

                                                <label for="measurements-ft">ft.</label>

                                              </div>

                                              <div class="input-form-row">

                                                <input type="number" name="in" id="measurements-heightin-m" placeholder="0" value="<?php 
                                                if(is_user_logged_in()) 
                                                    echo get_the_author_meta('heightIn', get_current_user_id());
                                                else 
                                                    echo '';
                                                ?>">

                                                <label for="measurements-in">in.</label>

                                              </div>

                                              <div class="input-form-row">

                                                <input type="text" name="lbs" id="measurements-weight-m" placeholder="0" value="<?php 
                                                if(is_user_logged_in()) 
                                                    echo get_the_author_meta('weight_m', get_current_user_id());
                                                else 
                                                    echo '';
                                                ?>">

                                                <label for="measurements-lbs">lbs.</label>

                                              </div>

                                            </div>


                                            <div class="row-form row-metric">

                                              <div class="input-form-row">

                                                <input type="number" name="cm-metric" id="measurements-height-m-metric" placeholder="0" >

                                                <label for="cm-metric">cm.</label>

                                              </div>

                                              <div class="input-form-row">

                                                <input type="text" name="measurements-lbs" id="measurements-weight-m-metric" placeholder="0">

                                                <label for="measurements-lbs">Kg.</label>

                                              </div>

                                            </div>


                                            <div class="row-form-checkbox">

                                              <label for="imperial" class="type-measure labelImperial">Imperial
                                              <input type="radio" name="imperial" id="imperial" value="Imperial" <?php if('Imperial'==esc_attr(get_the_author_meta('type_measure',$user->ID ))) echo 'checked="checked"'; ?>>
                                              </label>

                                              <label for="metric" class="type-measure labelMetric">Metric
                                              <input type="radio" name="imperial" id="metric"  value="Metric" <?php if('Metric'==esc_attr(get_the_author_meta('type_measure',$user->ID ))) echo 'checked="checked"'; ?>>
                                              </label>

                                            </div>

                                            <div class="row-form-submit">

                                              <input type="button" id="submit_m1" class="button_m" name="submit" value="Save & Continue"><div class="startmeasurentgif" style="background-image: url(<?php echo get_site_url().'/wp-content/uploads/2017/10/loading-transparent.gif';?>); background-size: 100%;background-position: center;width: 20px;height: 20px;position: absolute;right: -30px;top: 12px; display: none;">  </div>

                                              <i class="fa fa-angle-right" aria-hidden="true"></i>

                                            </div>



                                            <div class="clear"></div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        </div>

                        <div class="clear"></div>

                        <div class="full-width-page">

                            <div class="row">

                                <div class="row-fluid content-second" style="opacity:0; display: none; position: absolute;">

                                    <div class="vc_column_container">

                                        <div class="vc_column-inner">

                                            <?php

                                                $rows_pre = get_field('measures');

                                                $measures_next = array();

                                                if($rows_pre) {

                                                    foreach($rows_pre as $row) {

                                                        $measures_next[] = $row['short_title'];

                                                    }

                                                }

                                                $rows = get_field('measures');

                                                $measures_user = array('neck_m', 'shoulder_m', 'armlenght_m', 'chest_m', 'bicep_m', 'stomach_m', 'waist_m', 'wrist_m', 'seat_m', 'jacketlength_m', 'urise_m', 'thigh_m', 'pantslength_m');

                                                if($rows) {

                                                    $step = 2;

                                                    $steps_measures = "";

                                                    $steps_measures .= '<li class="customize-title active step-1"><h4>Height & Weight</h4><span>'.get_the_author_meta('height_m' , get_current_user_id()).'"'.get_the_author_meta('heightIn', get_current_user_id()).'" and '.get_the_author_meta('weight_m', get_current_user_id()).' lbs</span></li>';

                                                    echo '<div class="steps">';

                                                    $previusTitle = "";

                                                    foreach($rows as $row) {

                                                        echo '<div class="step-item">';

                                                            echo '<div class="title-step">';

                                                            echo '<h3>'.$row['title'].'</h3>';

                                                            echo '<span>STEP '.$step.' OF 14</span>';

                                                            echo '</div>';

                                                            echo '<div class="content-step">';

                                                            echo '<div class="video">';

                                                                if($row['type_video'] == "Youtube") {

                                                                    echo '<iframe id="video'.$step.'" width="560" height="315" src="https://www.youtube.com/embed/'.$row['video'].'?showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>';

                                                                }

                                                                else {

                                                                    if($row['type_video'] == "Vimeo") {



                                                                        //echo '<iframe src="https://player.vimeo.com/video/'.$row['video'].'?autoplay=1&loop=1&autopause=0" width="100%" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

                                                                    }

                                                                    else {



                                                                    }                                                

                                                                }

                                                                echo '<div class="play-video"></div>';

                                                            echo '</div>';



                                                            echo '<h4>INSTRUCTIONS</h4>';

                                                            echo '<div class="step-measure-box"><input type="text" id="'.$measures_user[$step - 2].'" name="'.$measures_user[$step - 2].'" value="'.get_the_author_meta($measures_user[$step - 2], get_current_user_id()).'"> inches</div>';

                                                            echo $row['instructions'];

                                                                echo '<div class="row-form-submit">';

                                                                    if($step == 2) {

                                                                        echo '<input type="button" class="prev-step-first button_m" value="Prev (Height & Weight)">';

                                                                        $previusTitle = $row['short_title'];

                                                                    }

                                                                    else {

                                                                        echo '<input type="button" class="prev-step button_m" value="Previus ('.$previusTitle.')">';

                                                                        $previusTitle = $row['short_title'];

                                                                    }

                                                                    echo '<span class="space-button"> </span>';

                                                                    if($step < 14) {

                                                                        echo '<input type="button" class="next-step button_m" value="Next ('.$measures_next[$step - 1].')">'; 

                                                                    }

                                                                    else {

                                                                        echo '<input type="button" class="complete-measurements button_m" value="Complete Measurements">';

                                                                    }

                                                                echo '<div class="clear"></div>

                                                                    </div>';

                                                            echo '</div>';

                                                        echo '</div>';



                                                        if(get_the_author_meta($measures_user[$step - 2], get_current_user_id())) {

                                                            $steps_measures .= '<li class="customize-title active"><h4 stepIndex="'.$step.'">'.$row['short_title'].'</h4><span>'.get_the_author_meta($measures_user[$step - 2], get_current_user_id()).' inches</span></li>';

                                                        }

                                                        else {

                                                            $steps_measures .= '<li class="customize-title"><h4 stepIndex="'.$step.'">'.$row['short_title'].'</h4><span>Not Selected</span></li>';

                                                        }

                                                        $step++;

                                                    }

                                                    echo '</div>';

                                                    echo '<div class="steps-completed"><h5>Enter measurements</h5><h6>Overview</h6>';

                                                    echo '<ul>'.$steps_measures.'</ul>';

                                                    echo '<div>';

                                                }

                                            ?>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="clear"></div>

                        <div class="row-fluid third-second" style="opacity:0; display: none; position: absolute;">
                            <?php echo get_field('thanks');?>
                        </div>
                    </form>

                    <div class="clear"></div>

                    <?php endwhile; // end of the loop. ?>

                <div class="clear"></div>

                <footer class="entry-meta"></footer>

            </div><!-- #content -->           

            

        </div><!-- #primary -->

        

    </div><!-- .boxed-page -->

    <div class="gif-save" style="background-image: url(<?php echo get_site_url().'/wp-content/uploads/2017/10/loading-transparent.gif';?>);">    
    </div>
    <a href="#popup-login" class="popup-open popup-login"></a>
    <div id="popup-login" class="zoom-anim-dialog popup-with-zoom-anim mfp-hide small-dialog">
        <div id="text-6" class="widget-popup-top widget_text">
            <!-- <h3 class="widget-title">Error!</h3>           -->
            <div class="textwidget text-center">
                <h3>Ops! We can’t save your information. You must register or sign in. </h3>
                <h5><a href="<?php echo get_site_url()?>/my-room/">Log In</a> or <a href="<?php echo get_site_url()?>/my-room/">Register</a></h5>
            </div>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close popup-modal-dismiss">

            <img src="http://wearescale.com/clients/room1909/wp-content/themes/room1909/images/close-icon-popup.png">
        </button>
    </div>

    <script src="<?php echo get_site_url().'/wp-content/themes/room1909/js/jquery-ui.js';?>"></script>




<script type="text/javascript">

jQuery(document).ready(function($) {

    <?php 
        if('Imperial'==esc_attr(get_the_author_meta('type_measure',$user->ID )))  {
            echo "$('.row-metric').addClass('hide');"; 
            echo "$('.labelImperial').addClass('active');";
        }
        else {
            if('Metric'==esc_attr(get_the_author_meta('type_measure',$user->ID ))) {
                echo "$('.row-imperial').addClass('hide');"; 
                echo "$('.labelMetric').addClass('active');";
                echo "$('.row-form-text').addClass('metric-form-text');";
            }
            else {
                echo "$('.row-metric').addClass('hide');"; 
                echo "$('.labelImperial').addClass('active');";
            }
        }
    ?>


    var footM = $('#measurements-height-m').val();
    footM *= 30.48;
    var inchesM = $('#measurements-heightin-m').val();
    inchesM *= 2.54;    
    var resultM = footM + inchesM;
    $('#measurements-height-m-metric').val((footM + inchesM));


    var lbsM = $('#measurements-weight-m').val();
    lbsM *= 0.453592;
    lbsM = roundNumber(lbsM);
    $('#measurements-weight-m-metric').val(lbsM);


    /* UPDATE MEASUREMENTS
    ----------------------------------*/
    $('#measurements-height-m').change(function() { 
        footM = $('#measurements-height-m').val();
        footM *= 30.48;
        inchesM = $('#measurements-heightin-m').val();
        inchesM *= 2.54;    
        resultM = footM + inchesM;
        $('#measurements-height-m-metric').val((footM + inchesM));
    });
    $('#measurements-heightin-m').change(function() {
        footM = $('#measurements-height-m').val();
        footM *= 30.48;
        inchesM = $('#measurements-heightin-m').val();
        inchesM *= 2.54;    
        resultM = footM + inchesM;
        $('#measurements-height-m-metric').val((footM + inchesM));
    });
    $('#measurements-weight-m').change(function() {
        lbsM = $('#measurements-weight-m').val();
        lbsM *= 0.453592;
        lbsM = roundNumber(lbsM);
        $('#measurements-weight-m-metric').val(lbsM);
    });

    $('#measurements-height-m-metric').change(function() {
        var heightMM = $(this).val(); // height measure metrics
        heightMM /= 30.48;
        var footMIH = heightMM - heightMM % 1; // foot measure Imperial Height
        $('#measurements-height-m').val(footMIH);
        var footMIHI = heightMM - footMIH; // foot measure Imperial Height In
        footMIHI *= 12;
        $('#measurements-heightin-m').val(footMIHI)
    });
    $('#measurements-weight-m-metric').change(function() {
        var weightMM = $(this).val();
        weightMM *= 2.20462;
        $('#measurements-weight-m').val(weightMM);
    }); 



    /* /UPDATE MEASUREMENTS
    ----------------------------------*/


    $('.type-measure').click(function() {
        $('.type-measure').removeClass('active');
        $(this).addClass('active');
        var changeTypeMeasure = $(this).find('input:checked').val();
        if(changeTypeMeasure == "Metric") {
            $('.row-metric').removeClass('hide');
            $('.row-imperial').addClass('hide');
            $('.row-form-text').addClass('metric-form-text');

        }
        else {
            $('.row-metric').addClass('hide');
            $('.row-imperial').removeClass('hide');
            $('.row-form-text').removeClass('metric-form-text');
        }
    });



    $('.play-video').click(function() {

        var iframeVideo = $(this).parent('.video').find('iframe');

        iframeVideo.attr('src', iframeVideo.attr('src') + '&autoplay=1')

        $(this).css({
            width: 0,
            height: 0
        });

    });

    var slickStep = $('.steps');

    $('.customize-title').click(function() {

        var stepIndex = $(this).index();

        if (stepIndex == 0) {
            $('.prev-step-first').click();
        } 
        else {
            if($(this).hasClass('active')) {
                slickStep.slick("slickGoTo", (stepIndex - 1));
            }
            else {
                //$('.step-item.slick-active .step-measure-box').find('input').addClass('.empty-field').focus();
            }
        }

    });

    $('.prev-step-first').click(function(e) {

        e.preventDefault();

        $('.content-second').css({
            'display': 'none',
            'position': 'absolute'
        });

        $('.content-second').animate({

            opacity: 0,

        }, 300);

        $('.content-initial').show('slide', {
            direction: 'down'
        }, 300);

        slickStep.slick('unslick');

    });

    $('.next-step').click(function(e) {
        e.preventDefault();
        if($('.step-item.slick-active .step-measure-box').find('input').val() > 0) {
            var elementList = $('.steps-completed .customize-title').eq( ($('.step-item.slick-active').index() + 1) );
            elementList.addClass('active');
            elementList.find('span').html($('.step-item.slick-active .step-measure-box').find('input').val() + " inches");

            slickStep.slick("slickNext");

            //;
        }
        else {
            //console.log("llene el campo!");
            $('.step-item.slick-active .step-measure-box').find('input').addClass('.empty-field').focus()
        }
    });

    $('.prev-step').click(function(e) {
        e.preventDefault();
        slickStep.slick("slickPrev");
    });

    $('#submit_m1').click(function(e) {

        e.preventDefault();

        
        var height_m = $('#measurements-height-m').val();
        var heightin_m = $('#measurements-heightin-m').val();
        var weight_m = $('#measurements-weight-m').val();
        var typeMeasure = $('.type-measure input:checked').val();


        var changeTypeMeasure = $('.row-form-checkbox input:checked').val();
        if(changeTypeMeasure == "Metric") {
            if($('#measurements-height-m-metric').val() > 0) {
                $('#measurements-height-m-metric').removeClass('empty-field');

                if($('#measurements-weight-m-metric').val() > 0) {
                    $('#measurements-weight-m-metric').removeClass('empty-field');

                    $('.startmeasurentgif').css('display', 'block');
                    $.ajax({
                        url: "<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php",
                        type: 'post',
                        data: {
                            'action': 'update_user_measures',
                            'height_m': height_m,
                            'heightIn': heightin_m,
                            'weight_m': weight_m,
                            'type_measure' : typeMeasure
                        },
                        success: function(data) {
                            if(data != 0) {
                                // alert('jkflds');
                                $('.startmeasurentgif').css('display', 'none');
                                $('.content-initial').hide('slide', {
                                    direction: 'up'
                                }, 300);

                                $('.content-second').css({
                                    'display': 'block',
                                    'position': 'relative'
                                });

                                slickStep.slick({
                                    arrows: false,
                                    swipe: false,
                                    accessibility: true,
                                    slickGoTo: 0,
                                    infinite: false
                                });

                                $('.content-second').animate({
                                    opacity: 1,
                                }, 1300);

                                $('.step-1 span').html(height_m + '\"' + heightin_m + '\"' + " and " + weight_m + " lbs");
                           }
                           else {
                            // $('.content-initial').slideDown(300);
                            // alert('done');
                            $('.startmeasurentgif').css('display', 'none');
                                $('a.popup-login').click();
                           }
                        },

                        error: function(errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                }
                else {
                    $('#measurements-weight-m-metric').addClass('empty-field').focus();
                }
            }
            else {
                $('#measurements-height-m-metric').addClass('empty-field').focus();
            }
        }
        else {
            if(height_m > 0) {
                $('#measurements-height-m').removeClass('empty-field');

                if(heightin_m > 0) {
                    $('#measurements-heightin-m').removeClass('empty-field');

                    if(weight_m > 0) {
                        $('#measurements-weight-m').removeClass('empty-field');

                        $('.startmeasurentgif').css('display', 'block');
                        $.ajax({
                            url: "<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php",
                            type: 'post',
                            data: {
                                'action': 'update_user_measures',
                                'height_m': height_m,
                                'heightIn': heightin_m,
                                'weight_m': weight_m,
                                'type_measure' : typeMeasure
                            },
                            success: function(data) {
                                if(data != 0) {
                                    $('.startmeasurentgif').css('display', 'none');
                                    $('.content-initial').hide('slide', {
                                        direction: 'up'
                                    }, 300);
// alert('fds');
                                    $('.content-second').css({
                                        'display': 'block',
                                        'position': 'relative'
                                    });

                                    slickStep.slick({
                                        arrows: false,
                                        swipe: false,
                                        accessibility: true,
                                        slickGoTo: 0,
                                        infinite: false
                                    });

                                    $('.content-second').animate({
                                        opacity: 1,
                                    }, 1300);

                                    $('.step-1 span').html(height_m + '\"' + heightin_m + '\"' + " and " + weight_m + " lbs");
                               }
                               else {
                                $('.startmeasurentgif').css('display', 'none');
                                    $('a.popup-login').click();
                               }
                            },

                            error: function(errorThrown) {
                                console.log(errorThrown);
                            }
                        });
                    }
                    else {
                        $('#measurements-weight-m').addClass('empty-field').focus();
                    }
                }
                else {
                    $('#measurements-heightin-m').addClass('empty-field').focus();
                }
            }
            else {
                $('#measurements-height-m').addClass('empty-field').focus();
            }
        }
    });

    $('.complete-measurements').click(function(e) {

        e.preventDefault();

        $('.gif-save').addClass('active');

        var neck_m = $('#neck_m').val();

        var shoulder_m = $('#shoulder_m').val();

        var armlenght_m = $('#armlenght_m').val();

        var chest_m = $('#chest_m').val();

        var bicep_m = $('#bicep_m').val();

        var stomach_m = $('#stomach_m').val();

        var waist_m = $('#waist_m').val();

        var wrist_m = $('#wrist_m').val();

        var seat_m = $('#seat_m').val();

        var jacketlength_m = $('#jacketlength_m').val();

        var urise_m = $('#urise_m').val();

        var thigh_m = $('#thigh_m').val();

        var pantslength_m = $('#pantslength_m').val();

        $.ajax({

            url: "<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php",

            method: 'get',

            data: {

                'action': 'update_user_measures_second_part',

                'neck_m': neck_m,

                'shoulder_m': shoulder_m,

                'armlenght_m': armlenght_m,

                'chest_m': chest_m,

                'bicep_m': bicep_m,

                'stomach_m': stomach_m,

                'waist_m': waist_m,

                'wrist_m': wrist_m,

                'seat_m': seat_m,

                'jacketlength_m': jacketlength_m,

                'urise_m': urise_m,

                'thigh_m': thigh_m,

                'pantslength_m': pantslength_m

            },

            success: function(data) {

                // alert('fsd');

                $('.content-second').css({
                    'display': 'none',
                    'position': 'absolute'
                });

                $('.content-second').animate({
                    opacity: 0,
                }, 300);

                $('.content-initial').show('slide', {
                    direction: 'down'
                }, 300);

                $('.third-second').css({'display':'block', 'position':'relative', 'opacity': '1'});

                $('.third-second').show('slide', {
                    direction: 'down'
                }, 300);

                $('.gif-save').removeClass('active');
                //slickStep.slick('unslick');
                console.log(data);

                //location.reload();
            },

            error: function(errorThrown) {

                console.log(errorThrown);

            }

        });

    });








    function roundNumber (number, max = 2) {
      if (typeof number !== 'number' || isNaN(number)) {
        throw new TypeError('Número inválido: ' + number);  
      }
      
      if (typeof max !== 'number' || isNaN(max)) {
        throw new TypeError('Máximo de dígitos inválido: ' + max); 
      }
      
      let fractionalPart = number.toString().split('.')[1];
      
      if (!fractionalPart || fractionalPart.length <= 2) {
        return number;
      }
      
      return Number(number.toFixed(max));
    }

});

</script>





<?php get_footer(); ?>
