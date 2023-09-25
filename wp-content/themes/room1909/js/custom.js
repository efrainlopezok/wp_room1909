jQuery(document).ready(function($) {

    $('.popup-open').magnificPopup({

        type: 'inline',

        fixedContentPos: false,

        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: false,

        preloader: false,

        midClick: true,

        removalDelay: 300,

        mainClass: 'my-mfp-zoom-in',

    });

    $(document).on('click', '.popup-modal-dismiss', function(e) {

        e.preventDefault();

        $.magnificPopup.close();

    });

    $('.faq').on('click', '.faq-click', function() {

        var t = $(this);

        var tp = t.next();

        var p = t.parent().siblings().find('p');

        tp.slideToggle(200);

        $(this).toggleClass('faq-icon');

    });

    $('.show-form').click(function(e) {

        e.preventDefault();

        $('.form-hide').slideToggle(500);

    });

    // $('.slider-nav').slick({

    //     slidesToShow: 3,

    //     slidesToScroll: 1,

    //     asNavFor: '.slider-for',

    //     dots: false,

    //     arrows: false,

    //     centerMode: true,

    //     focusOnSelect: true

    // });

    // $('.slider-for').slick({

    //     slidesToShow: 1,

    //     slidesToScroll: 1,

    //     fade: true,

    //     dots: true,

    //     arrows: true,

    //     asNavFor: '.slider-nav',

    //     autoplay: false,

    //     infinite: false,

    // });

    // $('.slider-for .slick-dots li, .slider-for .slick-arrow, .slider-nav .slider-nav-cont').on('click', function() {

    //     i = 0, p = 0;

    //     setTimeout(function() {

    //         $('.slider-for .slick-dots li').each(function() {

    //             i++;

    //             if ($(this).hasClass('slick-active')) {

    //                 p = i;

    //             }

    //         })

    //         $('.slider-for .slick-dots li').removeClass('drawed');

    //         for (j = 1; j <= p; j++) {

    //             $('.slider-for .slick-dots li:nth-child(' + j + ')').addClass('drawed');

    //         };

    //     }, 1);

    // });

    $("input#gform_submit_button_1").wrap("<div class='form_buttom'></div>");

    $("#input_2_14").wrap("<div class='select-form'></div>");

    $("#rememberme1").wrap("<label for='rememberme1' class='checkbox-label'></label>")

    // Sticky Nav

    var height = $('#sticky-nav').offset().top;

    $(window).on('scroll', function() {

        if ($(window).scrollTop() > height) {

            $('#sticky-nav').addClass('sticky-nav-fixed');

            $('#main-sticky-nav').addClass('main-sticky-nav');

        } else {

            $('#sticky-nav').removeClass('sticky-nav-fixed');

            $('#main-sticky-nav').removeClass('main-sticky-nav');

        }

    });

    /*Gallery simple product fixed on page

    - - - -  - - - - - - - - - - - - - - - - - - - - - - - -*/

    $(window).scroll(function() {

        var widthWG = $('.wrap-gallery').width();

        var heightWG = $('.wrap-gallery').height();

        var ultimateTop = 0;

        if ($(".single-product.without-sidebar").length) {

            if ($(window).scrollTop() + 50 >= $(".single-product.without-sidebar").offset().top &&

                $(window).scrollTop() <= ($('.single-product.without-sidebar').height() - 30)) {

               //console.log("adentro");

                $(window).scrollTop() - ($('.single-product.without-sidebar').height() - 30)

                if (($(window).scrollTop() + $('.wrap-gallery').height()) <

                    $('.single-product.without-sidebar').height() + $('.single-product.without-sidebar').offset().top) {

                    $('.wrap-gallery').addClass('fixed').width(widthWG).height(heightWG);

                } else {

                    //ultimateTop = $('.wrap-gallery').offset().top -  $(".single-product.without-sidebar").offset().top + 50;

                    //$('.wrap-gallery').removeClass('fixed').css('top', ultimateTop);



                    $('.wrap-gallery').removeClass('fixed');

                }

            } else {

                console.log("afuera");

                //ultimateTop = $('.wrap-gallery').offset().top -  $(".single-product.without-sidebar").offset().top;

                $('.wrap-gallery').removeClass('fixed');

                //$(".wrap-gallery").css('top', 0);

            }

        }

    });

    /*# add html for hover color

    - - - - - -- - - - - - - - - - */

    $('.customize-box-button-color .gfield_radio li').each(function() {

        var textAux = $(this).find('label').text();

        $(this).append('<span class="hover-color">' + textAux + '</span>');

    });

    function show_price_checkout() {

        $('.quantity').slideDown(500);

        $('button.single_add_to_cart_button').slideDown(500);

        $('.cont-1').slideDown(500);

    }

    function update_gallery2(text) {

        $(".product_images").addClass("loaderImage");

        $.ajax({

            url: mrtailor_ajaxurl,

            method: 'get',

            data: {

                'action': 'update_gallery_woocommerce',

                'typeProductGallery': typeProductGallery,

                'image': text,

                'idProduct': idProductGallery

            },

            success: function(data) {

                console.log(data);

                $("#product-images-carousel").data('owlCarousel').destroy();

                $("#product-images-carousel").html(data);

                $("#product-images-carousel").owlCarousel({

                    singleItem: true,

                    autoHeight: true,

                    transitionStyle: "fade",

                    lazyLoad: true,

                    navigation: true,

                    navigationText: ['<i class="getbowtied-icon-arrow_left"></i>', '<i class="getbowtied-icon-arrow_right"></i>'],

                });

                $(".product_images").removeClass("loaderImage");

                $(".easyzoom img").animate({

                    opacity: 1,

                }, 1200, function() {

                });

            },

            error: function(errorThrown) {

                console.log(errorThrown);

                $(".product_images").removeClass("loaderImage");

            }

        });

    }

    var customizeInit = false;

    function update_gallery2(text) {

        var elementVisible = typeProductGallery;

        if (!customizeInit) {

            $('.image-conjugation').addClass('show').height($('.woocommerce-product-gallery__wrapper').height());

            customizeInit = true;

            $('.woocommerce-product-gallery__wrapper').addClass('hidden');

        }

        $('.image-conjugation > div').removeClass('image-show');

        $('.image-conjugation .' + text).addClass('image-show');

    }

    /*Customizer Clothes*/

    $('.customize-open-type').click(function() {

        if ($(this).index() == 0) {

            $('.customize-box-type').slideToggle(500);

            $(this).removeClass('empty');

        } else {

            var allIsActive = true;

            $('.cont-2 .gform_fields li.customize-title').each(function() {

                if (allIsActive) {

                    if (!($(this).hasClass('customize-open-type'))) {

                        allIsActive = $(this).hasClass('active');

                        if (!allIsActive) {

                            $(this).addClass('empty');

                            return false;

                        }

                    } else {

                        $('.customize-box-type').slideToggle(500);

                        $(this).removeClass('empty');

                        return false;

                    }

                }

            });

        }

    });

    $('.customize-box-type ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-type').addClass('active').find('span').text(auxElement.text());

        $('.customize-box-type').slideToggle(400);

        var imageReplaceGallery = typeProductGallery;

        $('.cont-2 .gform_fields li.customize-title.active').each(function() {

            if ($(this).index() <= $('.customize-open-type').index()) {

                imageReplaceGallery += ($(this).find('span').text()) + "-";

            }

        });

        // update_gallery2(imageReplaceGallery);

        imageReplaceGallery = imageReplaceGallery.toLowerCase();

        imageReplaceGallery = imageReplaceGallery.replace(/ /g, '-');

        imageReplaceGallery = imageReplaceGallery.replace(/\(/g, '');

        imageReplaceGallery = imageReplaceGallery.replace(/\)/g, '');

        imageReplaceGallery = imageReplaceGallery.replace(/&/g, '');

        console.log(imageReplaceGallery);

        update_gallery2(imageReplaceGallery);

    });

    $('.customize-open-pockets').click(function() {

        if ($(this).index() == 0) {

            $('.customize-box-pockets').slideToggle(500);

            $(this).removeClass('empty');

        } else {

            var allIsActive = true;

            $('.cont-2 .gform_fields li.customize-title').each(function() {

                if (allIsActive) {

                    if (!($(this).hasClass('customize-open-pockets'))) {

                        allIsActive = $(this).hasClass('active');

                        if (!allIsActive) {

                            $(this).addClass('empty');

                            return false;

                        }

                    } else {

                        $('.customize-box-pockets').slideToggle(500);

                        $(this).removeClass('empty');

                        return false;

                    }

                }

            });

        }

    });

    $('.customize-box-pockets ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-pockets').addClass('active').find('span').text(auxElement.text());

        $('.customize-box-pockets').slideToggle(400);

        var imageReplaceGallery = typeProductGallery;

        $('.cont-2 .gform_fields li.customize-title.active').each(function() {

            if ($(this).index() <= $('.customize-open-pockets').index()) {

                imageReplaceGallery += ($(this).find('span').text()) + "-";

            }

        });

        imageReplaceGallery = imageReplaceGallery.toLowerCase();

        imageReplaceGallery = imageReplaceGallery.replace(/ /g, '-');

        imageReplaceGallery = imageReplaceGallery.replace(/\(/g, '');

        imageReplaceGallery = imageReplaceGallery.replace(/\)/g, '');

        imageReplaceGallery = imageReplaceGallery.replace(/&/g, '');

        console.log(imageReplaceGallery);

        update_gallery2(imageReplaceGallery);

    });

    $('.customize-open-button-color').click(function() {

        if ($(this).index() == 0) {

            $('.customize-box-button-color').slideToggle(500);

            $(this).removeClass('empty');

        } else {

            var allIsActive = true;

            $('.cont-2 .gform_fields li.customize-title').each(function() {

                if (allIsActive) {

                    if (!($(this).hasClass('customize-open-button-color'))) {

                        allIsActive = $(this).hasClass('active');

                        if (!allIsActive) {

                            $(this).addClass('empty');

                            return false;

                        }

                    } else {

                        $('.customize-box-button-color').slideToggle(500);

                        $(this).removeClass('empty');

                        return false;

                    }

                }

            });

        }

    });

    $('.gform_fields .customize-box-button-color ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-button-color').addClass('active').find('span').text(auxElement.text());

        $('.customize-box-button-color').slideToggle(400);

        var imageReplaceGallery = typeProductGallery;

        $('.cont-2 .gform_fields li.customize-title.active').each(function() {

            if ($(this).index() <= $('.customize-open-button-color').index()) {

                imageReplaceGallery += ($(this).find('span').text()) + "-";

            }

        });

        imageReplaceGallery = imageReplaceGallery.toLowerCase();

        imageReplaceGallery = imageReplaceGallery.replace(/ /g, '-');

        imageReplaceGallery = imageReplaceGallery.replace(/\(/g, '');

        imageReplaceGallery = imageReplaceGallery.replace(/\)/g, '');

        imageReplaceGallery = imageReplaceGallery.replace(/&/g, '');

        console.log(imageReplaceGallery);

        update_gallery2(imageReplaceGallery);

    });

    $('.customize-open-monogram').click(function() {

        if ($(this).index() == 0) {

            $('.customize-box-monogram').slideToggle(500);

            $(this).removeClass('empty');

        } else {

            var allIsActive = true;

            $('.cont-2 .gform_fields li.customize-title').each(function() {

                if (allIsActive) {

                    if (!($(this).hasClass('customize-open-monogram'))) {

                        allIsActive = $(this).hasClass('active');

                        if (!allIsActive) {

                            $(this).addClass('empty');

                            return false;

                        }

                    } else {

                        $('.customize-box-monogram').slideToggle(500);

                        $(this).removeClass('empty');

                        return false;

                    }

                }

            });

        }

    });

    $('.customize-box-monogram ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-monogram').addClass('active').find('span').text(auxElement.text());

        $('.customize-box-monogram').slideToggle(400);

    });

    var childAux = null;

    $('.customize-open-request').click(function() {

        var allIsActive = true;

        $('.cont-2 .gform_fields li.customize-title').each(function() {

            if (allIsActive) {

                if (!($(this).hasClass('customize-open-request'))) {

                    if (($(this).hasClass('has-child') && $(this).hasClass('active'))) {

                        childAux = $(this);

                        console.log(childAux.find('span').html())

                    } else {

                        if ($(this).hasClass('last-child')) {

                            childAux = null;

                        }

                    }

                    if (childAux && childAux.hasClass('active')) {

                        if (childAux.find('span').text() == "No") {

                            allIsActive = true;

                        } else {

                            allIsActive = $(this).hasClass('active');

                            if (!allIsActive) {

                                $(this).addClass('empty');

                                return false;

                            }

                        }

                    } else {

                        allIsActive = $(this).hasClass('active');

                        if (!allIsActive) {

                            $(this).addClass('empty');

                            return false;

                        }

                    }

                }

            }

        });

        if (allIsActive) {

            $('.customize-box-request').slideToggle(500);

            $('.customize-box-request-text').toggleClass('customize-hide-hard');

        }

    });

    $('.customize-box-request ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-request').addClass('active').find('span').text(auxElement.text());

        show_price_checkout();

    });

    $('.customize-open-location').click(function() {

        $('.customize-box-location').slideToggle(500);

    });

    $('.customize-box-location ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-location').addClass('active').find('span').text(auxElement.text());

    });

    $('.customize-open-set-color').click(function() {

        $('.customize-box-set-color').slideToggle(500);

    });

    $('.customize-box-set-color ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-set-color').addClass('active').find('span').text(auxElement.text());

    });

    $('.customize-open-style').click(function() {

        $('.customize-box-style').slideToggle(500);

    });

    $('.customize-box-style ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-style').addClass('active').find('span').text(auxElement.text());

    });

    $('.customize-open-initials').click(function() {

        $('.customize-box-initials').slideToggle(500);

    });

    $('.customize-open-initials').change(function() {

        if ($(this).val().length > 3) {

            $('.customize-box-monogram').slideToggle(400, function() {

                $('.customize-open-initials').next().next().slideToggle(500);

            });

        }

    });

    $('.customize-box-initials input[type="text"]').on('keyup', function() {

        if ($(this).val().length > 3)

            $('.customize-open-initials').addClass('active').removeClass('empty').find('span').text($(this).val());

        else

            $('.customize-open-initials').removeClass('active').find('span').text('Not Selected');

    }).change(function() {

        if ($(this).val().length > 3) {

            var positionLastItem = $('.customize-open-initials').index();

            var encounterParent = false;

            for (var i = positionLastItem; !encounterParent && i >= 0; i--) {

                var auxElement = $('.cont-2 .gform_fields > li').eq(i);

                encounterParent = auxElement.hasClass('has-child');

                if (!encounterParent && auxElement.hasClass('customize-title')) {

                    //console.log(auxElement.find('h4').text());

                    auxElement.click();

                    auxElement.slideUp('400');

                }

            }

        }

    });

    $('.customize-open-shoulder').click(function() {

        if ($(this).index() == 0) {

            $('.customize-box-shoulder').slideToggle(500);

            $(this).removeClass('empty');

        } else {

            if ($(this).prev().prev().hasClass('active')) {

                $('.customize-box-shoulder').slideToggle(500);

                $(this).removeClass('empty');

            } else {

                $(this).prev().prev().addClass('empty');

            }

        }

    });

    $('.customize-box-shoulder ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-shoulder').addClass('active').find('span').text(auxElement.text());

    });

    $('.customize-open-lapels').click(function() {

        $('.customize-box-lapels').slideToggle(500);

    });

    $('.customize-box-lapels ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-lapels').addClass('active').find('span').text(auxElement.text());

    });

    $('.customize-open-lapels-size').click(function() {

        $('.customize-box-lapels-size').slideToggle(500);

    });

    $('.customize-box-lapels-size ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-lapels-size').addClass('active').find('span').text(auxElement.text());

    });

    $('.customize-open-satin').click(function() {

        $('.customize-box-satin').slideToggle(500);

    });

    $('.customize-box-satin ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-satin').addClass('active').find('span').text(auxElement.text());

    });

    $('.customize-open-type-pockets').click(function() {

        $('.customize-type-pockets').slideToggle(500);

    });

    $('.customize-type-pockets ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-type-pockets').addClass('active').find('span').text(auxElement.text());

    });

    $('.customize-open-lining').click(function() {

        if ($(this).index() == 0) {

            $('.customize-box-lining').slideToggle(500);

            $(this).removeClass('empty');

        } else {

            if ($(this).prev().prev().hasClass('active')) {

                $(this).removeClass('empty');

                $('.customize-box-lining').slideToggle(500);

            } else {

                $(this).prev().prev().addClass('empty');

                console.log('error llenar el campo anterior');

            }

        }

    });

    $('.customize-box-lining ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-lining').addClass('active').find('span').text(auxElement.text());

    });

    $('.customize-open-button-jacket-hight').click(function() {

        $('.customize-box-jacket-hight').slideToggle(500);

    });

    $('.customize-box-jacket-hight ul li label').click(function() {

        var auxElement = $(this).clone();

        auxElement.find('span').remove();

        $('.customize-open-button-jacket-hight').addClass('active').find('span').text(auxElement.text());

    });

    var textAux = "";

    $('.list-box-images .gfield_radio li').each(function() {

        var labelEl = $(this).find('label');

        textAux = labelEl.text();

        labelEl.html('<span class="ginput_price"></span>');

        labelEl.css('background-image', 'url(' + textAux + ')');

        labelEl.addClass('removeBefore');

    });

    $('.list-box-images-text .gfield_radio li').each(function() {

        //var labelEl = $(this).find('label');

        //textAux = labelEl.text();

        //labelEl.html('<span class="ginput_price"></span>');

        //labelEl.css('background-image', 'url('+textAux+')');

        //labelEl.addClass('removeBefore');

    });

    /* How it Works

    - - - - - - - - - - -*/

    if ($(window).width() < 769) {

        $('.events').css('width', '100%');

    }

    $(window).resize(function() {

        if ($(window).width() < 769) {

            $('.events').css('width', '100%');

        }

    });

    if ($(window).width() >= 550) {

        var qTimeline = $('.events ol li').size(); //

        var aux = 25;

        $('.events ol li').each(function() {

            var widthLi = $(this).find('a').width();

            $(this).find('a').css('left', 'calc(' + aux + '% - ' + (widthLi / 2) + 'px)');;

            aux += 25;

        })

        $('.events ol li:last-child').find('a').click();

        $('.events ol li:first-child').find('a').click();

    } else {

        var qTimeline = $('.events ol li').size(); //

        var aux = 0;

        $('.events ol li').each(function() {

            if (aux == 50) {

                $(this).find('a').css('left', 'calc(' + aux + '% - 40px)');

            } else {

                if (aux == 100) {

                    $(this).find('a').css('left', 'calc(' + aux + '% - 80px)');

                } else {

                    $(this).find('a').css('left', 'calc(' + aux + '%)');

                }

            }

            aux += 50;

        })

        $('.events ol li:last-child').find('a').click();

        $('.events ol li:first-child').find('a').click();

    }

    $('.cd-timeline-navigation .next-new').click(function(e) {

        e.preventDefault();

    });

    var clickLabel = false;

    $('body').on('click', '.checkbox-label', function(e) {

        if (!clickLabel) {

            //console.log('on');

            $(this).addClass('checked');

            clickLabel = !clickLabel;

        } else {

            $(this).removeClass('checked');

            clickLabel = !clickLabel;

        }

    });

    $('.product_totals ul li:last-child .ginput_total').on('DOMSubtreeModified', function() {

        $('.woocommerce-Price-amount').html($(this).html());

    });

    var facebook = $('.box-share-list-inner .box-share-link:eq(0)').attr('href');

    var twitter = $('.box-share-list-inner .box-share-link:eq(1)').attr('href');

    $('<ul class="share-product-social"><li><a href="' + facebook + '" class="facebook-share" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i> Share</a></li><li><a href="' + twitter + '" class="twitter-share" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Share</a></li></ul>').appendTo('body.share-content .single-product .row .large-5');

    /*# Product page - filters

    - - - - - - - - - - - - - - - - - - - - - - */

    var displayPatternFilter = false;

    $('.show-filter-pattern').click(function(e) {

        e.preventDefault();

        if (!displayPatternFilter) {

            $('.list-filter-pattern').slideDown(300);

            displayPatternFilter = !displayPatternFilter;

        } else {

            $('.list-filter-pattern').slideUp(300);

            displayPatternFilter = !displayPatternFilter;

        }

    });

    //var displayColorFilter = false;

    $('.show-filter-color').click(function(e) {

        e.preventDefault();

        $('.list-filter-color').slideToggle(300);

        /*if(!displayColorFilter) {

            $('.list-filter-color').slideDown(300);

            displayColorFilter = !displayColorFilter;

        }

        else {

            $('.list-filter-color').slideUp(300);

            displayColorFilter = !displayColorFilter;   

        }*/

    });

    $('.wrap-color .gfield_radio li label').click(function() {

        $('.gif-save').addClass('active');

        $('.list-filter-color').slideToggle(300);

        var colorChange = $(this).attr('changecolor');

        var patternChange = $('.wrap-pattern .gfield_radio li input:checked').val();

        $.ajax({

            url: mrtailor_ajaxurl,

            method: 'get',

            data: {

                'action': 'filter_products_function',

                'category': $('#category').val(),

                'colorChange': colorChange,

                'patternChange': patternChange

            },

            success: function(data) {

                //console.log(data);

                if (data) {

                    $('#products-grid').html(data);

                } else {

                    $('#products-grid').html("<li>No Product Found</li>");

                }

                $('.gif-save').removeClass('active');

            },

            error: function(errorThrown) {

                console.log(errorThrown);

            }

        });

    });

    $('.wrap-pattern .gfield_radio li label').click(function() {

        $('.gif-save').addClass('active');

        $('.list-filter-pattern').slideToggle(300);

        var patternChange = $(this).attr('changepattern');

        var colorChange = $('.wrap-color .gfield_radio li input:checked').val();

        $.ajax({

            url: mrtailor_ajaxurl,

            method: 'get',

            data: {
                'action': 'filter_products_function',
                'category': $('#category').val(),
                'colorChange': colorChange,
                'patternChange': patternChange

            },
            success: function(data) {
                if (data) {
                    $('#products-grid').html(data);

                } else {
                    $('#products-grid').html("<li>No Product Found</li>");
                }
                $('.gif-save').removeClass('active');
            },

            error: function(errorThrown) {

                console.log(errorThrown);

            }

        });

    });

    $('.open-popup').magnificPopup({

        type: 'inline',

        midClick: true

    });

    $('.single_add_to_cart_button ').click(function(e) {

        //e.preventDefault();

        /*- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

        /* var product_id = jQuery("input[name=product_id]").val();

         var variation_id = jQuery("input[name=variation_id]").val();

         var the_id = 0;

         if (variation_id) {

             the_id = variation_id;

         } else {

             the_id = product_id;

         }

         var base = wc_gravityforms_params.prices[the_id];

         if (ajax_price_req) {

             ajax_price_req.abort();

         }

         var opts = "product_id=" + product_id + "&variation_id=" + variation_id

         opts += '&action=get_updated_price&gform_total=' + gform_total;

         ajax_price_req = jQuery.ajax({

             type: "POST",

             url: woocommerce_params.ajax_url,

             data: opts,

             dataType: 'json',

             success: function (response) {

                console.log('supuestamente');

         });*/

        /*- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

    });

    if ($('#instafeed').length) {

        var userFeed = new Instafeed({

            get: 'user',

            userId: '623597756',

            clientId: '02b47e1b98ce4f04adc271ffbd26611d',

            accessToken: '623597756.02b47e1.3dbf3cb6dc3f4dccbc5b1b5ae8c74a72',

            resolution: 'standard_resolution',

            template: '<a href="{{link}}" target="_blank" id="{{id}}" class="img-instagram" style="background-image: url({{image}})"></a>',

            sortBy: 'most-recent',

            limit: 18,

            links: true

        });

        userFeed.run();

    }

});