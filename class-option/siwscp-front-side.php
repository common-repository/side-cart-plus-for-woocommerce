<?php 
if (!defined('ABSPATH'))
  exit;

//class define

 /**
 * front end SIWSCP_sidecart,Ajax cart to sidecart,footer call side cartbody
 *
* @param {objects} {$level} {Passes the $level object}
 */



if (!class_exists('SIWSCP_sidecart')) {

   



    class SIWSCP_sidecart {



        protected static $instance;


        function siwscp_counter_value(){

            global $SIWSCP_option;

            if( $SIWSCP_option['siwscp_product_cnt_type']=='sum_qty'){
                return '<span class="cart_counter">'.WC()->cart->get_cart_contents_count().'</span>';
            }else{
                return '<span class="cart_counter">'.count(WC()->cart->get_cart()).'</span>';
            }
            
        }


        function SIWSCP_cart_create_header() { 
            global $woocommerce ,$SIWSCP_option , $siwscp_svg; 
            ?>

            <div class="siwcsp_main_side_cart">
                <div class="siwcsp_header">
                    <?php if($SIWSCP_option['siwscp_header_cart_icon'] == "yes"){ ?>
                        <span class="siwcsp_first_icon_cart">
                            <?php
                            if($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_2"){
                                echo  $siwscp_svg['shop_icon_2'];
                            }elseif($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_3"){
                                echo  $siwscp_svg['shop_icon_3'];
                            }elseif($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_4"){
                                echo  $siwscp_svg['shop_icon_4'];
                            }elseif($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_5"){
                                echo  $siwscp_svg['shop_icon_5'];
                            }elseif($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_6"){
                                echo  $siwscp_svg['shop_icon_6'];
                            }elseif($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_7"){
                                echo  $siwscp_svg['shop_icon_7'];
                            }elseif($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_8"){
                                echo  $siwscp_svg['shop_icon_8'];
                            }elseif($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_9"){
                                echo  $siwscp_svg['shop_icon_9'];
                            }elseif($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_10"){
                                echo  $siwscp_svg['shop_icon_10'];
                            }else{
                                 echo  $siwscp_svg['shop_icon_1'];
                            }
                            ?>
                        </span>
                    <?php } ?>
                        <?php if($SIWSCP_option['siwscp_show_text_header'] == 'yes'){ ?>

                            <p><img src='<?php echo SIWSCP_PLUGIN_DIR .'/assest/images/crown.png'; ?>'><?php echo $SIWSCP_option['siwscp_header_text']; ?></p>
                        <?php  } ?>
                        <?php if($SIWSCP_option['siwscp_header_close_icon'] == 'yes'){ ?>
                            <span class="siwscp_close_cart">
                               <?php
                                if($SIWSCP_option['siwscp_close_icon'] == "close_icon_1"){
                                    echo  $siwscp_svg['close_icon_1'];
                                }elseif($SIWSCP_option['siwscp_close_icon'] == "close_icon_2"){
                                    echo  $siwscp_svg['close_icon_2'];
                                }elseif($SIWSCP_option['siwscp_close_icon'] == "close_icon_3"){
                                    echo  $siwscp_svg['close_icon_3'];
                                }elseif($SIWSCP_option['siwscp_close_icon'] == "close_icon_4"){
                                    echo  $siwscp_svg['close_icon_4'];
                                }elseif($SIWSCP_option['siwscp_close_icon'] == "close_icon_5"){
                                    echo  $siwscp_svg['close_icon_5'];
                                }else{
                                     echo  $siwscp_svg['close_icon'];
                                }
                                ?>
                            </span>
                        <?php } ?>

                </div>
                <?php

                //body part cart

                    echo $this->SIWSCP_body_reference();

                //mobile view true/false
            
                    $showCouponField = 'true';

                    if(wp_is_mobile()) {

                        if($SIWSCP_option['siwscp_coupon_field_mobile'] == 'no') {

                            $showCouponField = 'false';

                        }

                    } ?>


                <div class="siwscp_trcpn">

                    <!-- Coupon fields -->


                    <?php  if($showCouponField == 'true') { ?>

                        <div class='siwscp_coupon'>
                            
                            <div class="siwscp_coupon_field">
                                <div class='siwscp_apply_coupon_link' style="color: <?php echo $SIWSCP_option['siwscp_apply_cpn_ft_clr']; ?>">
                              
                                    <?php if($SIWSCP_option['siwscp_coupon_icon']== 'coupon_1'){
                                        echo  $siwscp_svg['coupon_1']; 
                                    }elseif($SIWSCP_option['siwscp_coupon_icon']== 'coupon_2'){
                                        echo  $siwscp_svg['coupon_2']; 
                                    }elseif($SIWSCP_option['siwscp_coupon_icon']== 'coupon_3'){
                                        echo  $siwscp_svg['coupon_3']; 
                                    }elseif($SIWSCP_option['siwscp_coupon_icon']== 'coupon_4'){
                                        echo  $siwscp_svg['coupon_4']; 
                                    }elseif($SIWSCP_option['siwscp_coupon_icon']== 'coupon_5'){
                                        echo  $siwscp_svg['coupon_5']; 
                                    }else{
                                        echo  $siwscp_svg['coupon']; 
                                    }
                                    ?> 
                                </div>
                                <input type="text" id="siwscp_coupon_code" placeholder="<?php echo $SIWSCP_option['siwscp_apply_cpn_plchldr_txt']; ?>">
                                <span class="siwscp_coupon_submit" style="background-color: <?php echo $SIWSCP_option[ 'siwscp_applybtn_cpn_bg_clr']; ?>; color: <?php echo $SIWSCP_option['siwscp_applybtn_cpn_ft_clr']; ?>;"><?php echo $SIWSCP_option['siwscp_apply_cpn_apbtn_txt']; ?></span>
                            </div>
                            <?php $siwscp_sidecart_width = $SIWSCP_option[ 'siwscp_sidecart_width'].'px'; ?>
                            <div class="siwscp_coupon_response" style="left: calc(100% - <?php echo $siwscp_sidecart_width ; ?>);">
                                <div class="siwscp_inner_div" style="width:<?php echo $siwscp_sidecart_width ; ?>;">
                                    <span id="siwscp_cpn_resp" style="width:<?php echo $siwscp_sidecart_width ; ?>;"></span>
                                </div>
                            </div> 

                            <?php
                            $applied_coupons = WC()->cart->get_applied_coupons();
                            if(!empty($applied_coupons)) {  ?>
                                <ul class='siwscp_applied_cpns'>
                                    <?php
                                        foreach($applied_coupons as $cpns ) {
                                        ?>    
                                        <li class='siwscp_remove_cpn' cpcode='<?php echo $cpns; ?>'><?php echo $cpns; ?><span class='dashicons dashicons-no'></span></li>
                                        
                                        <?php
                                        }
                                    ?>    
                                </ul>
                            <?php } ?>
                        </div>

                    <?php  } ?>

                    <!-- Coupon fields End-->

                    <!-- TOtal  fields -->

                   <?php  if ($SIWSCP_option['siwscp_total_all_option'] == "yes" ) { ?>

                        <div class="siwscp_oc_total_oc">
                            <div class="siwscp_total_label">
                                 <span><?php echo $SIWSCP_option['siwscp_apply_total_text']; ?></span>
                            </div>
                            <div class="siwscp_total_innwer_full">
                                <span class='siwscp_fragtotall_full'><?php echo get_woocommerce_currency_symbol().number_format(WC()->cart->total, 2); ?></span>
                            </div>
                        </div>
                        
                    <?php } ?>

                    <!-- TOtal  fields END -->

                </div>

                <?php
                    $showSlider = 'true';
                    if(wp_is_mobile()) {
                        if($SIWSCP_option['siwscp_prodslider_mobile'] == 'yes') {
                           // $showSlider = 'false';
                            ?>
                            <div class="siwscp_slider">
                                <div class="siwscp_slider_inn owl-carousel owl-theme">
                                    <?php 
                                        foreach ($productsa as $value) {
                                            $productc = wc_get_product( $value );
                                            $title = $productc->get_name();
                                            $price = $productc->get_price();
                                            $cart_product_ids = array();
                                            foreach( WC()->cart->get_cart() as $cart_item ){
                                                // compatibility with WC +3
                                                if( version_compare( WC_VERSION, '3.0', '<' ) ) {
                                                    $cart_product_ids[] = $cart_item['data']->id; // Before version 3.0
                                                } else {
                                                    $cart_product_ids[] = $cart_item['data']->get_id(); // For version 3 or more
                                                }
                                            }

                                            if (!in_array($value, $cart_product_ids)) {?>
                                                <div class="item siwscp_gift_product">
                                                    <a href="<?php echo get_permalink( $productc->get_id() ); ?>">

                                                        <div class="siwscp_left_div"><?php echo $productc->get_image(); ?></div>
                                                        <div class="siwscp_right_div">
                                                            <h3 style="color: <?php echo $SIWSCP_option['siwscp_sld_product_ft_clr']; ?>;font-size: <?php echo $SIWSCP_option['siwscp_sld_product_ft_size']; ?>px;"><?php echo $title; ?></h3>
                                                            <span style="color: <?php echo $SIWSCP_option['siwscp_sld_product_ft_clr']; ?>;font-size: <?php echo$SIWSCP_option[ 'siwscp_sld_product_ft_size']; ?>px;"><?php echo wc_price($price); ?></span>

                                                            <?php

                                                            if ($productc->get_type() == 'simple') {
                                                                echo "<a href='?add-to-cart=".$value."' data-quantity='1' class='siwscp_pslide_atc' data-product_id='".$value."' style='background-color: ".$SIWSCP_option['siwscp_ft_sliderbtn_clr']."; color: ".$SIWSCP_option[ 'siwscp_ft_btn_txt_clr'].";'>".$SIWSCP_option[ 'siwscp_slider_vwoptbtn_txt']."</a>";
                                                            } elseif ($productc->get_type() == 'variable' ) {
                                                                echo "<a href='".get_permalink($value)."' data-quantity='1' class='siwscp_pslide_prodpage' data-product_id='".$value."' style='background-color: ".$SIWSCP_option[ 'siwscp_ft_sliderbtn_clr']."; color: ".$SIWSCP_option[ 'siwscp_ft_btn_txt_clr'].";'>".$SIWSCP_option[ 'siwscp_slider_vwoptbtn_txt']."</a>";
                                                            } elseif ($productc->get_type() == 'variation') {
                                                                $prod_id = $productc->get_parent_id();
                                                                echo "<a href='?add-to-cart=".$value."' data-quantity='1' class='siwscp_pslide_atc' data-product_id='".$prod_id."' variation-id='".$value."' style='background-color: ".$SIWSCP_option[ 'siwscp_ft_sliderbtn_clr']."; color: ".$SIWSCP_option['siwscp_ft_btn_txt_clr' ].";'>".$SIWSCP_option['siwscp_slider_vwoptbtn_txt']."</a>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>

                                                </div>
                                            <?php
                                            }
                                        }?>
                                </div>
                            </div>
                        
                        <?php }
                    }

                    if ($showSlider == 'true') {
                        $productsa = get_option('siwscp_select2');
                        if(!empty($productsa)) {?>
                    
                        
                        <?php  if($SIWSCP_option['siwscp_prodslider_desktop'] == 'yes') { ?>
                            <div class="siwscp_slider desktop_oc">
                                <div class="siwscp_slider_inn owl-carousel owl-theme">
                                    <?php 
                                    
                                        foreach ($productsa as $value) {
                                            $productc = wc_get_product( $value );
                                            $title = $productc->get_name();
                                            $price = $productc->get_price();
                                            $cart_product_ids = array();
                                            foreach( WC()->cart->get_cart() as $cart_item ){
                                                // compatibility with WC +3
                                                if( version_compare( WC_VERSION, '3.0', '<' ) ) {
                                                    $cart_product_ids[] = $cart_item['data']->id; // Before version 3.0
                                                } else {
                                                    $cart_product_ids[] = $cart_item['data']->get_id(); // For version 3 or more
                                                }
                                            }

                                            if (!in_array($value, $cart_product_ids)) {

                                            ?>
                                                <div class="item siwscp_gift_product">
                                                    <div class="inner_mainf">
                                                        <a href="<?php echo get_permalink( $productc->get_id() ); ?>">
                                                           
                                                                <div class="siwscp_left_div"><?php echo $productc->get_image(); ?></div>
                                                                <div class="siwscp_right_div">
                                                                    <h3 style="color: <?php echo $SIWSCP_option['siwscp_sld_product_ft_clr']; ?>;font-size: <?php echo $SIWSCP_option['siwscp_sld_product_ft_size']; ?>px;"><?php echo $title; ?></h3>
                                                                    <span style="color: <?php echo $SIWSCP_option[ 'siwscp_sld_product_ft_clr'] ?>;font-size: <?php echo$SIWSCP_option[ 'siwscp_sld_product_ft_size']; ?>px;"><?php echo wc_price($price); ?></span>

                                                                    <?php

                                                                    if ($productc->get_type() == 'simple') {
                                                                        echo "<a href='?add-to-cart=".$value."' data-quantity='1' class='siwscp_pslide_atc' data-product_id='".$value."' style='background-color: ".$SIWSCP_option[ 'siwscp_ft_sliderbtn_clr']."; color: ".$SIWSCP_option['siwscp_ft_btn_txt_clr'].";'>".$SIWSCP_option[ 'siwscp_slider_vwoptbtn_txt']."</a>";
                                                                    } elseif ($productc->get_type() == 'variable' ) {
                                                                        echo "<a href='".get_permalink($value)."' data-quantity='1' class='siwscp_pslide_prodpage' data-product_id='".$value."' style='background-color: ".$SIWSCP_option[ 'siwscp_ft_sliderbtn_clr']."; color: ".$SIWSCP_option[ 'siwscp_ft_btn_txt_clr'].";'>".$SIWSCP_option['siwscp_slider_vwoptbtn_txt']."</a>";
                                                                    } elseif ($productc->get_type() == 'variation') {
                                                                        $prod_id = $productc->get_parent_id();
                                                                        echo "<a href='?add-to-cart=".$value."' data-quantity='1' class='siwscp_pslide_atc' data-product_id='".$prod_id."' variation-id='".$value."' style='background-color: ".$SIWSCP_option[ 'siwscp_ft_sliderbtn_clr']."; color: ".$SIWSCP_option[ 'siwscp_ft_btn_txt_clr'].";'>".$SIWSCP_option[ 'siwscp_slider_vwoptbtn_txt']."</a>";
                                                                    }
                                                                    ?>
                                                                </div>
                                                          
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }  ?>
                                </div>
                            </div>
                        <?php } ?>

                    <?php

                        }
                    }?>
                   

                   <div class="siwscp_footer">
                        <div class="siwscp_ship_txt" style="color: <?php echo $SIWSCP_option['siwscp_ship_ft_clr'] ?>;font-size: <?php echo $SIWSCP_option[ 'siwscp_ship_ft_size']."px" ?>;"><?php echo $SIWSCP_option['siwscp_ship_txt']; ?></div>
                        <?php

                        ?>
                        <div class="siwscp_button_fort siwscp_dyamic_<?php echo $SIWSCP_option['siwscp_footer_button_row']; ?>">
                        <?php  if($SIWSCP_option['siwscp_cart_option']== "yes") { ?>
                            <a  class="siwscp_bn_1" href="<?php if(!empty($SIWSCP_option['siwscp_orgcart_link'])){echo $SIWSCP_option['siwscp_orgcart_link']; }else{  echo wc_get_cart_url(); }?>" style="background-color: <?php echo $SIWSCP_option['siwscp_ft_viewbtn_clr'] ?>;margin: <?php echo $SIWSCP_option['siwscp_ft_btn_mrgin']."px" ?>;color: <?php echo $SIWSCP_option['siwscp_ft_btn_txt_clr'] ?>;">
                                <?php echo $SIWSCP_option['siwscp_cart_txt']; ?>
                            </a>
                        <?php } ?>
                        <?php  if($SIWSCP_option['siwscp_checkout_option'] == "yes"){ ?>
                            <a class="siwscp_bn_2" href="<?php if(!empty($SIWSCP_option['siwscp_orgcheckout_link'])){echo $SIWSCP_option['siwscp_orgcheckout_link'];}else{echo wc_get_checkout_url();} ?>" style="background-color: <?php echo $SIWSCP_option['siwscp_ft_checkoutbtn_clr'] ?>;margin: <?php echo $SIWSCP_option['siwscp_ft_btn_mrgin']."px" ?>;color: <?php echo $SIWSCP_option[ 'siwscp_ft_btn_txt_clr'] ?>;">
                                <?php echo $SIWSCP_option['siwscp_checkout_txt']; ?>
                            </a>
                        <?php } ?>
                        <?php  if($SIWSCP_option['siwscp_conshipping_option'] == "yes"){ ?>
                            <a class="siwscp_bn_3" href="<?php echo $SIWSCP_option['siwscp_conshipping_link'] ?>" style="background-color: <?php echo $SIWSCP_option[ 'siwscp_ft_shippingbtn_clr'] ?>;margin: <?php echo $SIWSCP_option['siwscp_ft_btn_mrgin']."px" ?>;color: <?php echo $SIWSCP_option['siwscp_ft_btn_txt_clr'] ?>;">
                                <?php echo $SIWSCP_option['siwscp_conshipping_txt']; ?>
                            </a>
                        <?php } ?>
                        </div>
                    </div> 
            </div>

            <div class="siwcsp_container_overlay">
            </div>


                <div class="siwscp_cart_basket">
                    <div class="desktop_cart_box">
                       
                        <?php if($SIWSCP_option['siwscp_scfw_icon'] == 'ocwqv_scfw_icon_1'){ ?>

                           <?php echo  $siwscp_svg['ocwqv_scfw_icon_1']; ?>

                        <?php }else if($SIWSCP_option['siwscp_scfw_icon'] == 'ocwqv_scfw_icon_2'){ ?>

                            <?php echo  $siwscp_svg['ocwqv_scfw_icon_2']; ?>

                        <?php }else if($SIWSCP_option['siwscp_scfw_icon'] == 'ocwqv_scfw_icon_3'){ ?>

                            <?php echo  $siwscp_svg['ocwqv_scfw_icon_3']; ?>

                        <?php }else if($SIWSCP_option['siwscp_scfw_icon'] == 'ocwqv_scfw_icon_4'){ ?>

                            <?php echo  $siwscp_svg['ocwqv_scfw_icon_4']; ?>

                        <?php }else if($SIWSCP_option['siwscp_scfw_icon'] == 'ocwqv_scfw_icon_5'){ ?>

                            <?php echo  $siwscp_svg['ocwqv_scfw_icon_5']; ?>

                        <?php }else if($SIWSCP_option['siwscp_scfw_icon'] == 'ocwqv_scfw_icon_6'){ ?>

                            <?php echo  $siwscp_svg['shop_icon_4']; ?>

                        <?php }else if($SIWSCP_option['siwscp_scfw_icon'] == 'ocwqv_qscfw_icon'){ ?>

                              <?php echo  $siwscp_svg['ocwqv_qscfw_icon']; ?>

                        <?php }else{ ?>
                             <?php echo  $siwscp_svg['ocwqv_scfw_icon_7']; ?>

                        <?php } ?>
                        
                    </div>

                    <?php if($SIWSCP_option['siwscp_product_cnt'] == "yes"){ ?>

                        <div class="siwscp_item_count" >
                            <?php
                            echo $this->siwscp_counter_value();
                            ?>
                        </div>
                    <?php } ?>

                </div>

                <?php
          

           
        }




        function SIWSCP_craete_cart_footer(){

            add_filter( 'wp_footer', array($this, 'SIWSCP_cart_create'));

        }






        function SIWSCP_main_front() {

            add_action('wp_head', array( $this, 'SIWSCP_cart_create_header' ));
            add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'SCFW_cart_count_fragments' ), 10, 1 );
            add_action( 'wp_ajax_coupon_ajax_call', array( $this, 'SCFW_coupon_ajax_call_func') );
            add_action( 'wp_ajax_nopriv_coupon_ajax_call', array( $this, 'SCFW_coupon_ajax_call_func') );
            add_action( 'wp_ajax_wfc_get_refresh_fragments', array( $this, 'SCFW_get_refreshed_fragments' ) );
            add_action( 'wp_ajax_nopriv_wfc_get_refresh_fragments', array( $this, 'SCFW_get_refreshed_fragments' ) );
            add_action( 'wp_ajax_product_remove', array( $this, 'SCFW_ajax_product_remove') );
            add_action( 'wp_ajax_nopriv_product_remove', array( $this, 'SCFW_ajax_product_remove') );
             add_action( 'wp_ajax_siwscp_change_qty', array( $this, 'SIWSCP_change_qty_cust') );
            add_action( 'wp_ajax_nopriv_siwscp_change_qty', array( $this, 'SIWSCP_change_qty_cust') );
            add_action( 'wp_ajax_siwscp_remove_applied_coupon_ajax_call', array( $this, 'SIWSCP_remove_applied_coupon_ajax_call_func') );
            add_action( 'wp_ajax_nopriv_siwscp_remove_applied_coupon_ajax_call', array( $this, 'SIWSCP_remove_applied_coupon_ajax_call_func') );
           

        }


        function SCFW_ajax_product_remove() {
            ob_start();
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
                {
                    WC()->cart->remove_cart_item($cart_item_key);
                }
            }

            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();

            woocommerce_mini_cart();

            $mini_cart = ob_get_clean();

            // Fragments and mini cart are returned
            $data = array(
                'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                        'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
                    )
                ),
                'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
            );

            wp_send_json( $data );

            die();
        }
        



        function SCFW_get_refreshed_fragments(){
            WC_AJAX::get_refreshed_fragments();
        }

        function SCFW_coupon_ajax_call_func() {
            global $SIWSCP_option;
            $code = sanitize_text_field($_REQUEST['coupon_code']);
            $code = strtolower($code);

            // Check coupon code to make sure is not empty
            if( empty( $code ) || !isset( $code ) ) {

                $siwscp_cpnfield_empty_txt = $SIWSCP_option[ 'siwscp_cpnfield_empty_txt'];
                // Build our response
                $response = array(
                    'result'    => 'empty',
                    'message'   => $siwscp_cpnfield_empty_txt
                );

                header( 'Content-Type: application/json' );
                echo json_encode( $response );

                // Always exit when doing ajax
                WC()->cart->calculate_totals();
                WC()->cart->maybe_set_cart_cookies();
                WC()->cart->set_session();
                exit();
            }

            // Create an instance of WC_Coupon with our code
            $coupon = new WC_Coupon( $code );

            if (in_array($code, WC()->cart->get_applied_coupons())) {

                $siwscp_cpn_alapplied_txt =$SIWSCP_option['siwscp_cpn_alapplied_txt'];

                $response = array(
                    'result'    => 'already applied',
                    'message'   => $siwscp_cpn_alapplied_txt
                );

                header( 'Content-Type: application/json' );
                echo json_encode( $response );

                // Always exit when doing ajax
                WC()->cart->calculate_totals();
                WC()->cart->maybe_set_cart_cookies();
                WC()->cart->set_session();
                exit();

            } elseif( !$coupon->is_valid() ) {

                $siwscp_invalid_coupon_txt = $SIWSCP_option[ 'siwscp_invalid_coupon_txt'];
                // Build our response
                $response = array(
                    'result'    => 'not valid',
                    'message'   => $siwscp_invalid_coupon_txt
                );

                header( 'Content-Type: application/json' );
                echo json_encode( $response );

                // Always exit when doing ajax
                WC()->cart->calculate_totals();
                WC()->cart->maybe_set_cart_cookies();
                WC()->cart->set_session();
                exit();

            } else {
                
                WC()->cart->apply_coupon( $code );

                $siwscp_coupon_applied_suc_txt = $SIWSCP_option[ 'siwscp_coupon_applied_suc_txt'];
                // Build our response
                $response = array(
                    'result'    => 'success',
                    'message'      => $siwscp_coupon_applied_suc_txt
                );

                header( 'Content-Type: application/json' );
                echo json_encode( $response );

                // Always exit when doing ajax
                WC()->cart->calculate_totals();
                WC()->cart->maybe_set_cart_cookies();
                WC()->cart->set_session();
                wc_clear_notices();
                exit();

            }
        }


        function SIWSCP_body_reference(){
            global $SIWSCP_option, $siwscp_svg;
            
            $siwscp_body = '<div class="siwscp_body">';

                if ( ! WC()->cart->is_empty() ) {

                    global $woocommerce;


                    if($SIWSCP_option['siwscp_cart_ordering']=='asc'){
                        $items = WC()->cart->get_cart(); 
                    }else{
                        $items = array_reverse(WC()->cart->get_cart()); 
                    }

                    $siwscp_body .= "<div class='siwscp_mini_cart'>";
                    // $siwscp_body .= "<h3>".WC()->cart->get_cart_contents_count(). " item In Your Cart</h3>";

                    $items = WC()->cart->get_cart(); 


                         foreach($items as $item => $values) { 

                           $_product = apply_filters( 'woocommerce_cart_item_product', $values['data'], $values, $item );

                            $siwscp_body .= "<div class='siwscp_cart_prods' product_id='".$values['product_id']."' c_key='".$values['key']."'>";
                            $siwscp_body .= "<div class='siwscp_cart_prods_inner'>";
                            
                            $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $values['product_id'], $values, $item );
                            $getProductDetail = wc_get_product( $values['product_id'] );

                            if($SIWSCP_option['siwscp_loop_img']=='yes'){
                                $siwscp_body .= "<div class='image_div'>";
                                $siwscp_body .= $getProductDetail->get_image('thumbnail');
                                $siwscp_body .= '</div>';  
                             }
                           
                            $siwscp_body .= "<div class='description_div'>";
                         
                     
                            if($SIWSCP_option['siwscp_delete_icon'] == 'trash_1'){
                                $siwscp_delete_icon =  $siwscp_svg['trash_1'];
                            }elseif($SIWSCP_option['siwscp_delete_icon'] == 'trash_2'){
                                $siwscp_delete_icon =  $siwscp_svg['trash_2'];
                            }elseif($SIWSCP_option['siwscp_delete_icon'] == 'trash_3'){
                                $siwscp_delete_icon =  $siwscp_svg['trash_3'];
                            }elseif($SIWSCP_option['siwscp_delete_icon'] == 'trash_4'){
                                $siwscp_delete_icon =  $siwscp_svg['trash_4'];
                            }elseif($SIWSCP_option['siwscp_delete_icon'] == 'trash_5'){
                                $siwscp_delete_icon =  $siwscp_svg['trash_5'];
                            }elseif($SIWSCP_option['siwscp_delete_icon'] == 'trash_6'){
                                $siwscp_delete_icon =  $siwscp_svg['trash_6'];
                            }else{
                                $siwscp_delete_icon =  $siwscp_svg['ocwqv_trash'];
                            }
                            

                            

                            
                                $siwscp_body .= "<div class='siwscp_prodline_title' >";
                                
                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $values ) : '', $values, $item );
                                        if ( $_product && $_product->exists() && $values['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $values, $item ) ) {
                                            $siwscp_body .= "<div class='siwscp_prodline_title_inner' >";
                                            if($SIWSCP_option['siwscp_loop_product_name']=='yes'){
                                                if($SIWSCP_option['siwscp_loop_link']=='yes'){
                                                    $siwscp_body .= apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $values, $item )  . '&nbsp;'; 
                                                }else{
                                                    $siwscp_body .= apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $values, $item ) . '&nbsp;'; 
                                                }
                                               
                                            }
                                            $siwscp_body .= "</div>";
                                            $siwscp_body .= "<div class='oc_metadata'>"; 

                                            $siwscp_body .= wc_get_formatted_cart_item_data( $values ); 
                                                
                                            $siwscp_body .= "</div>";
                                            // if($SIWSCP_option['siwscp_loop_product_price']=='yes'){
                                            //     $siwscp_body .= "<div class='siwscp_price_single'>".wc_price($_product->get_price())."</div>"; 
                                            // }   
                                        }

                                $siwscp_body .= "</div>";
                                $siwscp_body .= "<div class='siwscp_pr_qnt_remoev'>";

                                    $siwscp_body .= "<div class='siwscp_prodline_qty'>";

                                        if ($SIWSCP_option['siwscp_loop_total'] == "yes" ) {
                                            $siwscp_body .= "<div class='siwscp_prodline_price'>";

                                            $siwscp_product = $values['data'];
                                            $siwscp_product_subtotal = WC()->cart->get_product_subtotal( $siwscp_product, $values['quantity'] );

                                            $siwscp_body .= $siwscp_product_subtotal;

                                            $siwscp_body .= "</div>";
                                        }
                                        $siwscp_body .= '<div class="siwscp_qupdiv">';
                                            if ($SIWSCP_option['siwscp_qty_box'] == "yes" ) {
                                               /* $html .= $values['quantity'];*/
                                                $siwscp_body .= '<button type="button" class="siwscp_minus" >-</button>';
                                                $siwscp_body .= '<input type="text" class="siwscp_update_qty" name="update_qty" value="'.$values['quantity'].'">';
                                                $siwscp_body .= '<button type="button" class="siwscp_plus" >+</button>';
                                                
                                            }else {
                                                $siwscp_body .= $SIWSCP_option['siwscp_qty_text']." : ".$values['quantity'];
                                            }
                                        $siwscp_body .= '</div>';
                                    

                                    $siwscp_body .= "</div>";



                                    if($SIWSCP_option['siwscp_loop_delete']=='yes'){
                                        $siwscp_body .= "<div class='siwscp_prcdel_div'>";
                                        $siwscp_body .= apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="siwscp_remove"  aria-label="%s" data-product_id="%s" data-product_sku="%s" data-cart_item_key="%s">'.$siwscp_delete_icon.'</a>', 
                                                esc_url(wc_get_cart_remove_url($item)), 
                                                esc_html__('Remove this item', 'evolve'),
                                                esc_attr( $product_id ),
                                                esc_attr( $_product->get_sku() ),
                                                esc_attr( $item )
                                                ), $item);
                                        $siwscp_body .= "</div>";
                                    }

                                $siwscp_body .= "</div>";
                            
                            $siwscp_body .= "</div>";
                            $siwscp_body .= "</div>";
                            $siwscp_body .= "</div>";
                        }
                     $siwscp_body .= "</div>"; 
                }else{
                        if($SIWSCP_option['siwscp_emptycart_link']!=''){
                             $siwscp_body .= "<h3 class='empty_cart_text'><a href='".$SIWSCP_option['siwscp_emptycart_link']."'>".$SIWSCP_option[ 'siwscp_cart_is_empty']."</a></h3>";
                        }else{
                         $siwscp_body .= "<h3 class='empty_cart_text'>".$SIWSCP_option['siwscp_cart_is_empty']."</h3>";
                        }
                }

            $siwscp_body .= '</div>';
            return $siwscp_body;
        }


        function SCFW_cart_count_fragments( $fragments ) {
            global $SIWSCP_option,$siwscp_svg,$woocommerce;



            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();

            

            $fragments['div.siwscp_body'] = $this->SIWSCP_body_reference();

            
           
            $fragments['span.cart_counter'] = $this->siwscp_counter_value();
            
             ob_start();
            if($SIWSCP_option['wfc_cart_empty_hide_show'] == "hide" && WC()->cart->is_empty() ){ ?>
                <script type="text/javascript">
                    jQuery( ".siwcsp_main_side_cart" ).addClass( "wfc_cart_empty" );
                </script>

            <?php }else{ ?>
                 <script type="text/javascript">
                    jQuery( ".siwcsp_main_side_cart" ).removeClass( "wfc_cart_empty" );
                </script>
                
            <?php }
            $wfc_total_innwerscript = ob_get_clean();
            $wfc_total_innwer .= $wfc_total_innwerscript;
            // $fragments['div.wfc_total_innwer_full'] = $wfc_fulltotal;
            // $fragments['div.wfc_total_amount'] = $wfc_fragtotal;
            // $fragments['div.wfc_total_amountt'] = $wfc_total_amountt;
            // $fragments['span.wfc_fragtotall'] = $wfc_total_innwer;
            ob_start();
            ?>
            <div class="siwscp_slider_inn owl-carousel owl-theme">
                    <?php 
                      $productsa = get_option('siwscp_select2');
                    
                    if(!empty($productsa)) {
                    
                        foreach ($productsa as $value) {
                            $productc = wc_get_product( $value );
                            $title = $productc->get_name();
                            $price = $productc->get_price();
                            $cart_product_ids = array();
                            foreach( WC()->cart->get_cart() as $cart_item ){
                                // compatibility with WC +3
                                if( version_compare( WC_VERSION, '3.0', '<' ) ) {
                                    $cart_product_ids[] = $cart_item['data']->id; // Before version 3.0
                                } else {
                                    $cart_product_ids[] = $cart_item['data']->get_id(); // For version 3 or more
                                }
                            }

                            if (!in_array($value, $cart_product_ids)) {

                            ?>
                                <div class="item siwscp_gift_product">
                                     <div class="inner_mainf">
                                        <a href="<?php echo get_permalink( $productc->get_id() ); ?>">
                                           
                                                <div class="siwscp_left_div"><?php echo $productc->get_image(); ?></div>
                                                <div class="siwscp_right_div">
                                                    <h3 style="color: <?php echo $SIWSCP_option['siwscp_sld_product_ft_clr']; ?>;font-size: <?php echo $SIWSCP_option['siwscp_sld_product_ft_size']; ?>px;"><?php echo $title; ?></h3>
                                                    <span style="color: <?php echo $SIWSCP_option[ 'siwscp_sld_product_ft_clr'] ?>;font-size: <?php echo$SIWSCP_option[ 'siwscp_sld_product_ft_size']; ?>px;"><?php echo wc_price($price); ?></span>

                                                    <?php

                                                    if ($productc->get_type() == 'simple') {
                                                        echo "<a href='?add-to-cart=".$value."' data-quantity='1' class='siwscp_pslide_atc' data-product_id='".$value."' style='background-color: ".$SIWSCP_option[ 'siwscp_ft_sliderbtn_clr']."; color: ".$SIWSCP_option['siwscp_ft_btn_txt_clr'].";'>".$SIWSCP_option[ 'siwscp_slider_vwoptbtn_txt']."</a>";
                                                    } elseif ($productc->get_type() == 'variable' ) {
                                                        echo "<a href='".get_permalink($value)."' data-quantity='1' class='siwscp_pslide_prodpage' data-product_id='".$value."' style='background-color: ".$SIWSCP_option[ 'siwscp_ft_sliderbtn_clr']."; color: ".$SIWSCP_option[ 'siwscp_ft_btn_txt_clr'].";'>".$SIWSCP_option['siwscp_slider_vwoptbtn_txt']."</a>";
                                                    } elseif ($productc->get_type() == 'variation') {
                                                        $prod_id = $productc->get_parent_id();
                                                        echo "<a href='?add-to-cart=".$value."' data-quantity='1' class='siwscp_pslide_atc' data-product_id='".$prod_id."' variation-id='".$value."' style='background-color: ".$SIWSCP_option[ 'siwscp_ft_sliderbtn_clr']."; color: ".$SIWSCP_option[ 'siwscp_ft_btn_txt_clr'].";'>".$SIWSCP_option[ 'siwscp_slider_vwoptbtn_txt']."</a>";
                                                    }
                                                    ?>
                                                </div>
                                          
                                        </a>
                                      </div>

                                </div>
                            <?php
                            }
                        }  
                    }?>
            </div>

            <script type="text/javascript">
               

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

            </script>
            <?php

            $siwscp_product_slider = ob_get_clean();

            $fragments['div.siwscp_slider_inn'] = $siwscp_product_slider;

            $siwscp_coupon_fragmentartion = "<div class='siwscp_coupon'>";
            $siwscp_coupon_fragmentartion .= "<div class='siwscp_coupon_field'>";
                $siwscp_coupon_fragmentartion .="<div class='siwscp_apply_coupon_link' style='color:".$SIWSCP_option['siwscp_apply_cpn_ft_clr'].";'>";             
                              
                                    if($SIWSCP_option['siwscp_coupon_icon']== 'coupon_1'){
                                        $coupon_icondddd=  $siwscp_svg['coupon_1']; 
                                    }elseif($SIWSCP_option['siwscp_coupon_icon']== 'coupon_2'){
                                        $coupon_icondddd=$siwscp_svg['coupon_2']; 
                                    }elseif($SIWSCP_option['siwscp_coupon_icon']== 'coupon_3'){
                                          $coupon_icondddd=$siwscp_svg['coupon_3']; 
                                    }elseif($SIWSCP_option['siwscp_coupon_icon']== 'coupon_4'){
                                         $coupon_icondddd=$siwscp_svg['coupon_4']; 
                                    }elseif($SIWSCP_option['siwscp_coupon_icon']== 'coupon_5'){
                                         $coupon_icondddd=$siwscp_svg['coupon_5']; 
                                    }else{
                                         $coupon_icondddd=$siwscp_svg['coupon']; 
                                    }
                                    
            $siwscp_coupon_fragmentartion .= "".$coupon_icondddd."</div>";
                $siwscp_coupon_fragmentartion .='<input type="text" id="siwscp_coupon_code" placeholder="'.$SIWSCP_option['siwscp_apply_cpn_plchldr_txt'].'">';
                $siwscp_coupon_fragmentartion .="<span class='siwscp_coupon_submit' style='background-color:". $SIWSCP_option[ 'siwscp_applybtn_cpn_bg_clr']."; color:".$SIWSCP_option['siwscp_applybtn_cpn_ft_clr'].";'>".$SIWSCP_option['siwscp_apply_cpn_apbtn_txt']."</span>";
            $siwscp_coupon_fragmentartion .="</div>";
                $siwscp_sidecart_width = $SIWSCP_option[ 'siwscp_sidecart_width'].'px';
                $siwscp_coupon_fragmentartion .="<div class='siwscp_coupon_response' style='left: calc(100% - ".$siwscp_sidecart_width.");'>";
                $siwscp_coupon_fragmentartion .="<div class='siwscp_inner_div' style='width:".$siwscp_sidecart_width.";'>";
                $siwscp_coupon_fragmentartion .="<span id='siwscp_cpn_resp' style='width:".$siwscp_sidecart_width.";'></span>";
                //
                 $siwscp_coupon_fragmentartion .="</div>";

                 $applied_coupons = WC()->cart->get_applied_coupons();
                    if(!empty($applied_coupons)) {
                        $siwscp_coupon_fragmentartion .= "<ul class='siwscp_applied_cpns'>";

                        foreach($applied_coupons as $cpns ) {

                            $siwscp_coupon_fragmentartion .= "<li class='siwscp_remove_cpn' cpcode='".$cpns."'>".$cpns." <span class='dashicons dashicons-no'></span></li>";
                            
                        }

                        $siwscp_coupon_fragmentartion .= "</ul>";
                    }

                    $siwscp_coupon_fragmentartion .= "</div>";
                    $siwscpgrand_fragmentartion ="<div class='siwscp_total_innwer_full'><span class='siwscp_fragtotall_full'>".get_woocommerce_currency_symbol().number_format(WC()->cart->total, 2)."</span></div>";
                     
                  
                      $fragments['div.siwscp_total_innwer_full'] = $siwscpgrand_fragmentartion;

                    $fragments['div.siwscp_coupon'] = $siwscp_coupon_fragmentartion;



            return $fragments;
        }


        function SIWSCP_remove_applied_coupon_ajax_call_func() {

            global $SIWSCP_option,$siwscp_svg;
            $code = sanitize_text_field($_REQUEST['remove_code']);
            
            $siwscp_coupon_removed_suc_txt =$SIWSCP_option['siwscp_coupon_removed_suc_txt'];

            if(WC()->cart->remove_coupon( $code )) {
                echo $siwscp_coupon_removed_suc_txt;
            }
            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();
            WC()->cart->set_session();
            exit();
        }




        function SIWSCP_change_qty_cust() {

            $c_key = sanitize_text_field($_REQUEST['c_key']);
            $qty = sanitize_text_field($_REQUEST['qty']);
            WC()->cart->set_quantity($c_key, $qty, true);
            WC()->cart->set_session();
            exit();
        }


        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->SIWSCP_main_front();
            }
             return self::$instance;
        }

    }
    SIWSCP_sidecart::instance();
}
