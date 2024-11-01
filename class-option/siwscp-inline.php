<?php 
if (!defined('ABSPATH'))
  exit;

//class define

 /**
 * front end SIWSCP_style_inline,css inline
 *
* @param {objects} {$level} {Passes the $level object}
 */



if (!class_exists('SIWSCP_style_inline')) {

   



    class SIWSCP_style_inline {


        protected static $instance;

        function SCFW_craete_cart(){

        	global $SIWSCP_option , $siwscp_svg; ?>

        	 <style>

        	  	 <?php
                if($SIWSCP_option['siwcsp_cart_open_from']=='left'){?>

                   .siwcsp_main_side_cart{
                   
                    	width: <?php echo $SIWSCP_option[ 'siwscp_sidecart_width'].'px'; ?>;

                    	left: -<?php echo $SIWSCP_option[ 'siwscp_sidecart_width'].'px'; ?>;

                 	}

                <?php }else{ ?>

                	.siwcsp_main_side_cart{

                    	width: <?php echo $SIWSCP_option[ 'siwscp_sidecart_width'].'px'; ?>;

                    	right: -<?php echo $SIWSCP_option[ 'siwscp_sidecart_width'].'px'; ?>;
                	}

                <?php } 

        	 	if($SIWSCP_option['siwscp_cart_height']=='auto'){?>

                 	.siwcsp_main_side_cart{

                    	top:auto;

                    	max-height: 100%;

                	}

                <?php } ?>

                	.siwscp_item_count{

                        background-color: <?php echo $SIWSCP_option[ 'siwscp_cnt_bg_clr'] ?>;

                        color: <?php echo $SIWSCP_option['siwscp_cnt_txt_clr'] ?>;

                        font-size: <?php echo $SIWSCP_option['siwscp_cnt_txt_size']."px" ?>;

	                    <?php if($SIWSCP_option['siwscp_basket_count_position'] == "top-right"){?>

	                        top: -10px;

	                        right: -12px;

	                    <?php }elseif($SIWSCP_option['siwscp_basket_count_position'] == "bottom-left"){ ?>

	                        bottom: -10px;

	                        left: -12px;

	                    <?php }elseif($SIWSCP_option['siwscp_basket_count_position'] == "bottom-right"){ ?>

	                        bottom: -10px;

	                        right: -12px;

	                    <?php }else{ ?>

	                        top: -10px;

	                        left: -12px;

	                    <?php } ?>
                	}
                	.siwscp_cart_basket{

	                    <?php 
	                    if($SIWSCP_option['siwscp_basket_position'] == "top"){ ?>

	                    	top: 15px;

	                    <?php }elseif($SIWSCP_option['siwscp_basket_position']== "bottom") { ?>

	                    	bottom: 15px;

	                    <?php } 

	                    if($SIWSCP_option['siwscp_cart_open_from'] == "left"){ ?>

	                        left: 15px;

	                    <?php }else { ?>

	                    	right: 15px;

	                    <?php }

	                    if($SIWSCP_option['siwscp_basket_shape'] == "round"){ ?>

	                        border-radius: 100%;

	                    <?php }else { ?>

	                        border-radius: 10px;

	                    <?php } 

	                     if($SIWSCP_option['siwscp_cart_show_hide'] == "wfc_cart_hide"){ ?>

	                           display: none;

	                    <?php }else { ?>

	                        	display:block;
	                       
	                    <?php } ?>
	                      
	                    	height: <?php echo $SIWSCP_option[ 'siwscp_basket_icn_size']."px" ?>;

	                    	width: <?php echo $SIWSCP_option[ 'siwscp_basket_icn_size']."px" ?>;

	                    	background-color: <?php echo $SIWSCP_option['siwscp_basket_bg_clr'] ?>;
                 
                	}
                	.desktop_cart_box svg {
                    	fill : <?php echo $SIWSCP_option[ 'siwscp_basket_clr']; ?> ;
                	}
                	.siwcsp_header{
                	background-color: <?php echo $SIWSCP_option['siwscp_head_background_clr']; ?>;
                	}
                }

          	</style>
        	<?php

        }

        function SIWSCP_main_front() {

            add_action('wp_head', array( $this, 'SCFW_craete_cart' ));

            add_action( 'wp_footer', array($this, 'SCFW_single_added_to_cart_event'));

        }

        function SCFW_single_added_to_cart_event(){
            global $SIWSCP_option, $siwscp_svg;
            if( isset($_POST['add-to-cart']) && isset($_POST['quantity']) ) {?>
                <script>

                    jQuery(function($){

                        jQuery('.siwscp_cart_basket').click();

                    });

                </script>
                <?php
            }

            ?>
            <?php $siwscp_sidecart_width = $SIWSCP_option[ 'siwscp_sidecart_width'].'px'; ?>
           <!--  <div class="siwscp_coupon_response" style="left: calc(100% - <?php echo $siwscp_sidecart_width ; ?>);">
                <div class="siwscp_inner_div" style="width:<?php echo $siwscp_sidecart_width ; ?>;">
                    <span id="siwscp_cpn_resp" style="width:<?php echo $siwscp_sidecart_width ; ?>;"></span>
                </div>
            </div> -->
            <?php
        }


        public static function instance() {

            if (!isset(self::$instance)) {

                self::$instance = new self();

                self::$instance->SIWSCP_main_front();


            }

             return self::$instance;

        }

    }
    SIWSCP_style_inline::instance();
}
