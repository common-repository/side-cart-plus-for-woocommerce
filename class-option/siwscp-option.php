<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('SIWSCP_option')) {

    class SIWSCP_option {

        protected static $instance;

        public static function instance() {

            if (!isset(self::$instance)) {

                self::$instance = new self();

                self::$instance->init();

            }

             return self::$instance;

        }

        function init() {

            global $SIWSCP_option;

            $optionget = array(
                'siwscp_ajax_cart' => 'yes',
                'siwscp_reload_side_cart'=>'yes',
                'siwscp_trigger_to_class_side_cart'=>'',
                'siwscp_sidecart_width'=>'350',
                'siwscp_cart_height'=>'full',
                'siwscp_cart_open_from'=>'right',
                'siwscp_header_cart_icon'=>'yes',
                'siwscp_header_close_icon'=>'yes',
                'siwscp_show_text_header'=>'yes',
                'siwscp_header_text'=>'Get code Codtest to get 100 OFF',
                'siwscp_head_ft_clr'=>'#000000',
                'siwscp_auto_open'=>'yes',
                'siwscp_head_font_size'=>'16',
                'siwscp_shop_icon'=>'shop_icon_1',
                'siwscp_header_cart_icon_clr'=>'#000000',
                'siwscp_header_close_icon_clr'=>'#000000',
                'siwscp_close_icon'=>'close_icon',
                'siwscp_header_shipping_text_color'=>'#000000',
                'siwscp_loop_img'=>'yes',
                'siwscp_loop_product_name'=>'yes',
                'siwscp_loop_product_price'=>'yes',
                'siwscp_loop_total'=>'yes',
                'siwscp_loop_variation'=>'yes',
                'siwscp_loop_link'=>'yes',
                'siwscp_loop_delete'=>'yes',
                'siwscp_qty_box'=>'yes',
                'siwscp_auto_open'=>'yes',
                'siwscp_head_background_clr'=>'#fad3a7',
                'siwscp_product_ft_size'=>'16',
                'siwscp_product_ft_clr'=>'#000000',
                'siwscp_delete_icon'=>'ocwqv_trash',  
                'siwscp_total_all_option'=>'yes',
                'siwscp_apply_total_text'=>'Grand Total',
                'siwscp_delect_icon_clr'=>'#000000',
                'siwscp_sld_product_ft_size'=>'16',
                'siwscp_sld_product_ft_clr'=>'#000000',
                'siwscp_cart_empty_hide_show'=>'show',
                'siwscp_cart_is_empty'=>'',
                'siwscp_cart_show_hide'=>'siwscp_cart_show',
                'siwscp_cart_is_empty'=>'Cart Empty',
                'siwscp_show_cart_icn'=>'yes',
                'siwscp_on_pages'=>'',
                'siwscp_cart_ordering'=>'asc',
                'siwscp_product_cnt_type'=>'sum_qty',
                'siwscp_mobile'=>'yes',
                'siwscp_product_cnt'=>'yes',
                'siwscp_cart_check_page'=>'yes',
                'siwscp_scfw_icon'=>'ocwqv_scfw_icon_7',
                'siwscp_basket_shape'=>'square',
                'siwscp_basket_count_position'=>'top-left',
                'siwscp_basket_position'=>'bottom',
                'siwscp_basket_icn_size'=>'59',
                'siwscp_basket_bg_clr'=>'#ffffff',
                'siwscp_basket_clr'=>'#dd3333',
                'siwscp_cnt_bg_clr'=>'#000000',
                'siwscp_cnt_txt_clr'=>'#ffffff',
                'siwscp_cnt_txt_size'=>'12',
                'siwscp_total_shipping_option'=>'yes',
                'siwscp_cart_option'=>'yes',
                'siwscp_checkout_option'=>'yes',
                'siwscp_conshipping_option'=>'yes',
                'siwscp_ft_viewbtn_clr'=>'#d14444',
                'siwscp_ft_checkoutbtn_clr'=>'#cecece',
                'siwscp_ft_shippingbtn_clr'=>'#000000',
                'siwscp_ft_sliderbtn_clr'=>'#000000',
                'siwscp_ft_btn_mrgin'=>'5',
                'siwscp_ft_btn_txt_clr'=>'#ffffff',
                'siwscp_checkout_txt'=>'Checkout',
                'siwscp_subtotal_txt'=>'Subtotal',
                'siwscp_conshipping_txt'=>'Continue Shopping',
                'siwscp_cart_txt'=>'View Cart',
                'siwscp_coupon_field_mobile'=>'yes',
                'siwscp_coupon_icon'=>'coupon',
                'siwscp_apply_cpn_icon_clr'=>'#000000',
                'siwscp_apply_cpn_ft_clr'=>'#000000',
                'siwscp_applybtn_cpn_ft_clr'=>'#ffffff',
                'siwscp_applybtn_cpn_bg_clr'=>'#000000',
                'siwscp_apply_cpn_txt'=>'Apply Coupon',
                'siwscp_apply_cpn_plchldr_txt'=>'Enter your promo code',
                'siwscp_apply_cpn_apbtn_txt'=>'APPLY',
                'siwscp_cpn_alapplied_txt'=>'Coupon Code Already Applied.',
                'siwscp_cpnfield_empty_txt'=>'Coupon Code Field is Empty!',
                'siwscp_invalid_coupon_txt'=>'Invalid code entered. Please try again.',
                'siwscp_coupon_applied_suc_txt'=>'Coupon Applied Successfully.',
                'siwscp_coupon_removed_suc_txt'=>'Coupon Removed Successfully',
                'siwscp_prodslider_desktop'=>'yes',
                'siwscp_prodslider_mobile'=>'yes',
                'siwscp_sld_product_ft_size'=>'18',
                'siwscp_sld_product_ft_clr'=>'#000000',
                'siwscp_slider_atcbtn_txt'=>'Add to cart',
                'siwscp_slider_vwoptbtn_txt'=>'View Options',
                'siwscp_ship_txt'=>'Shipping And Taxes Calculated at Checkout',
                'siwscp_ship_ft_size'=>'16',
                'siwscp_ship_ft_clr'=>'#000000',
                'siwscp_footer_button_row'=>'two_one',


            );

            foreach ($optionget as $key_optionget => $value_optionget) {

               $SIWSCP_option[$key_optionget] = get_option( $key_optionget,$value_optionget );

            }
        }
    }
    SIWSCP_option::instance();
}