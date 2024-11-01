function wfcUpdateRefreshFragments( response ) {

    if( response.fragments ) {

        //Set fragments
        jQuery.each( response.fragments, function( key, value ) {
            jQuery( key ).replaceWith( value );
        });

        if( ( 'sessionStorage' in window && window.sessionStorage !== null ) ) {

            sessionStorage.setItem( wc_cart_fragments_params.fragment_name, JSON.stringify( response.fragments ) );
            localStorage.setItem( wc_cart_fragments_params.cart_hash_key, response.cart_hash );
            sessionStorage.setItem( wc_cart_fragments_params.cart_hash_key, response.cart_hash );

            if ( response.cart_hash ) {
                sessionStorage.setItem( 'wc_cart_created', ( new Date() ).getTime() );
            }
        }

        jQuery( document.body ).trigger( 'wc_fragments_refreshed' );
    }
}


function wfcGetRefreshedFragments(){

    jQuery.ajax({
        url: ajax_postajax.ajaxurl,
        type: 'POST',
        data: {
            action: 'wfc_get_refresh_fragments',
        },
        success: function( response ) {
            wfcUpdateRefreshFragments(response);
        }
    })

}

jQuery(document).ready(function() {
    console.log(siwscpData);

    jQuery( document.body ).trigger( 'wc_fragment_refresh' );

    setTimeout(function() {
        wfcGetRefreshedFragments();
    }, 100);

	jQuery(".siwscp_close_cart").click(function() {
	  	var boxWidth = jQuery(".siwcsp_main_side_cart").width();
        if(siwscpData.siwscp_cart_open_from == "left"){
        	
    	   	jQuery(".siwcsp_main_side_cart").animate({
                left: '-'+siwscpData.siwscp_sidecart_width
            });
        }else{
            jQuery(".siwcsp_main_side_cart").animate({
                right: '-'+siwscpData.siwscp_sidecart_width
            });
        }
        jQuery("body").removeClass("scfw_overlay");
        jQuery(".siwcsp_container_overlay").removeClass('active');
	});

	jQuery(".siwcsp_container_overlay").click(function() {
		jQuery(".siwscp_close_cart").click();
	});


	jQuery(".siwscp_cart_basket").click(function() {
	 	//alert();

		jQuery(".siwcsp_main_side_cart").css("opacity", "1");

        if(siwscpData.siwscp_cart_open_from == "left"){
                jQuery(".siwcsp_main_side_cart").animate({width:siwscpData.siwscp_sidecart_width , left:'0px'});
        }else{
             jQuery(".siwcsp_main_side_cart").animate({width:siwscpData.siwscp_sidecart_width , right:'0px'});
        }
		
		jQuery("body").addClass("scfw_overlay");

		jQuery(".siwcsp_container_overlay").addClass('active');
	});


    //   var leftArrow = siwscpData.pluginsUrl + '/images/left-arrow.svg';
    // var rightArrow = siwscpData.pluginsUrl + '/images/right-arrow.svg';

    jQuery('.siwscp_slider_inn').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        // navText:["<img src='"+ leftArrow +"'>", "<img src='"+ rightArrow +"'>"],
        navClass:['owl-prev', 'owl-next'],
        dots: false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })


    jQuery('body').on('click', '.siwscp_coupon_submit', function() { 


        var couponCode = jQuery("#siwscp_coupon_code").val();


        jQuery.ajax({
            url:ajax_postajax.ajaxurl,
            type:'POST',
            data:'action=coupon_ajax_call&coupon_code='+couponCode,
            success : function(response) {
                jQuery("#siwscp_cpn_resp").html(response.message);
                if(response.result == 'not valid' || response.result == 'already applied') {
                    jQuery("#siwscp_cpn_resp").css('color', '#e2401c');
                } else {
                    jQuery("#siwscp_cpn_resp").css('color', '#0f834d');
                }
                //jQuery(".siwscp_coupon_response").show();

                jQuery(".siwscp_coupon_response").fadeIn().delay(2000).fadeOut();
                jQuery( document.body ).trigger( 'wc_fragment_refresh' );
            }
        });
    });


    jQuery('body').on( 'added_to_cart', function() {
       
          if(siwscpData.siwscp_auto_open=='yes'){
           jQuery(".siwcsp_main_side_cart").css("opacity", "1");
           if(siwscpData.siwscp_cart_open_from == "left"){
                jQuery(".siwcsp_main_side_cart").animate({width: siwscpData.siwscp_sidecart_width, left: '0px'});
           }else{
             jQuery(".siwcsp_main_side_cart").animate({width: siwscpData.siwscp_sidecart_width, right: '0px'});
           }
           jQuery("body").addClass("scfw_overlay");
           jQuery(".siwcsp_container_overlay").addClass('active');
         }
    });

    jQuery( document.body ).trigger( 'wc_fragment_refresh' );

    if(siwscpData.siwscp_trigger_class == "yes"){

        jQuery(".wfc_trigger").click(function() {
            
              if(siwscpData.siwscp_auto_open=='yes'){
               jQuery(".siwcsp_main_side_cart").css("opacity", "1");
               if(siwscpData.siwscp_cart_open_from == "left"){
                    jQuery(".siwcsp_main_side_cart").animate({width:siwscpData.siwscp_sidecart_width, left: '0px'});
               }else{
                    jQuery(".siwcsp_main_side_cart").animate({width:siwscpData.siwscp_sidecart_width, right: '0px'});
               }
               jQuery("body").addClass("scfw_overlay");
               jQuery(".siwcsp_container_overlay").addClass('active');
             }
        });
    }

    setTimeout(function() {
        wfcGetRefreshedFragments();
    }, 100);

    jQuery(document).on('click', '.product_type_simple.add_to_cart_button', function () {
   
        var cart = jQuery('.siwscp_cart_basket');
        var imgtodrag = jQuery(this).parent('.product').find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.8',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '100'
            })
                .appendTo(jQuery('body'))
                .animate({
                'top': cart.offset().top + 10,
                'left': cart.offset().left + 10,
                'width': 75,
                'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                jQuery(this).detach()
            });
        } 

    });

    

    jQuery(document).on('click', '.siwscp_body a.siwscp_remove', function (e) {

        e.preventDefault();

        jQuery('.siwscp_body').addClass('siwscp_loader');

        var product_id = jQuery(this).attr("data-product_id"),
            cart_item_key = jQuery(this).attr("data-cart_item_key"),
            product_container = jQuery(this).parents('.siwscp_body');  
            //alert(cart_item_key);


        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_postajax.ajaxurl,
            data: {
                action: "product_remove",
                product_id: product_id,
                cart_item_key: cart_item_key
            },
            success: function(response) {

                if ( ! response || response.error )
                    return;

                var fragments = response.fragments;

                // Replace fragments
                if ( fragments ) {
                    jQuery.each( fragments, function( key, value ) {
                        jQuery( key ).replaceWith( value );
                    });
                }

                jQuery('.siwscp_body').removeClass('siwscp_loader');
            }
        });
    });

    jQuery('body').on( 'click', 'button.siwscp_plus, button.siwscp_minus', function() {
        
        jQuery('.siwscp_body').addClass('siwscp_loader');
        // Get current quantity values
        var qty  = jQuery( this ).closest( '.siwscp_cart_prods' ).find( '.siwscp_update_qty' );
        var val  = parseFloat(qty.val());
        var max  = 100000000000000;
        var min  = 1;
        var step = 1;

        // Change the value if plus or minus
        if ( jQuery( this ).is( '.siwscp_plus' ) ) {
           if ( max && ( max <= val ) ) {
              qty.val( max );
           } else {
              qty.val( val + step );
           }
        } else {
           if ( min && ( min >= val ) ) {
              qty.val( min );
           } else if ( val > 1 ) {
              qty.val( val - step );
           }
        }

        var updateQty  = jQuery( this ).closest( '.siwscp_cart_prods' ).find( '.siwscp_update_qty' );
        var updateVal  = parseFloat(updateQty.val());
        var pro_id = jQuery(this).closest('.siwscp_cart_prods').attr('product_id');
        var c_key = jQuery(this).closest('.siwscp_cart_prods').attr('c_key');
        var pro_ida = jQuery(this);
        pro_ida.prop('disabled', true);
        
        jQuery.ajax({
            url:ajax_postajax.ajaxurl,
            type:'POST',
            data:'action=siwscp_change_qty&c_key='+c_key+'&qty='+updateVal,
            success : function(response) {
                pro_ida.prop('disabled', false);
                jQuery( document.body ).trigger( 'wc_fragment_refresh' );
                jQuery('.siwscp_body').addClass('siwscp_loader');
            }
        });
     });


    jQuery('body').on('click', '.siwscp_remove_cpn', function() {

        var removeCoupon = jQuery(this).attr('cpcode');

        jQuery.ajax({
            url:ajax_postajax.ajaxurl,
            type:'POST',
            data:'action=siwscp_remove_applied_coupon_ajax_call&remove_code='+removeCoupon,
            success : function(response) {
                jQuery("#siwscp_cpn_resp").html(response);
                jQuery(".siwscp_coupon_response").fadeIn().delay(2000).fadeOut();
                jQuery( document.body ).trigger( 'wc_fragment_refresh' );
            }
        });

    });
});