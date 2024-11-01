<?php
if (!defined('ABSPATH'))
    exit;

if (!class_exists('SIWSCP_menu')) {

   	class SIWSCP_menu {

      	protected static $instance;

  		function SIWSCP_create_menu() {

			add_menu_page('Woocommerce cart Plus', 'Shopping cart', 'manage_options', 'shop_cart' , array($this, 'SIWSCP_menu_page_general_setting') , 'dashicons-cart' );

		}

		function SIWSCP_menu_page_general_setting(){

            global $SIWSCP_option; global $siwscp_svg; 
           
            ?>

            <div class="siwscp_main_generate">
                <form method="post">
                    <?php wp_nonce_field( 'SIWSCP_nonce_action', 'SIWSCP_nonce_field' ); ?>
                    <div class="siwscp_tab">
                        <ul>
                        <li class="tablinks current" data-tab="siwscp-tab-general"><?php echo __('General Settings',SIWSCP_DOMAIN );?></li>
                        <li class="tablinks" data-tab="siwscp-tab-header"><?php echo __( 'Side cart Header',SIWSCP_DOMAIN );?></li>
                        <li class="tablinks" data-tab="siwscp-tab-body"><?php echo __( 'Side cart body',SIWSCP_DOMAIN );?></li>
                        <li class="tablinks" data-tab="siwscp-tab-footer"><?php echo __( 'Side cart footer',SIWSCP_DOMAIN );?></li>
                         <li class="tablinks" data-tab="siwscp-tab-sli_copon"><?php echo __( 'Slider/Coupon Setting',SIWSCP_DOMAIN );?></li>
                        <ul>
                    </div>

                    <div id="siwscp-tab-general" class="tabcontent current">
                        <h3>Side Cart General Setting</h3>
                        <table class="data_table">
                            <tr>
                                <th><?php echo __('Page not reload Direct Product add to cart' ,SIWSCP_DOMAIN); ?></th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_ajax_cart]" value="yes" <?php if ($SIWSCP_option['siwscp_ajax_cart'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong><?php echo __('Add to cart without page refresh.',SIWSCP_DOMAIN); ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo __('Page not reload Direct Side Cart ' ,SIWSCP_DOMAIN); ?></th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_reload_side_cart]" value="yes" <?php if ($SIWSCP_option['siwscp_reload_side_cart'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong><?php echo __('Page not reload Direct Side Cart.' ,SIWSCP_DOMAIN); ?></strong>
                                </td>
                            </tr>
                             <tr>
                                

                            <tr>
                                <th><?php echo __('Trigger to class open cart ' ,SIWSCP_DOMAIN); ?></th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_trigger_to_class_side_cart]" value="yes" <?php if ($SIWSCP_option['siwscp_trigger_to_class_side_cart'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>After Enable trigger then side cart open automatically</strong>
                                    <p class="wfc-tips">Note:If Enable then You need to add this class <strong>wfc_trigger</strong> where you want to add triggers.</p>
                                </td>
                            </tr>
                            <tr>
                                <th>Auto Open Cart</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_auto_open]" value="yes" <?php if ($SIWSCP_option['siwscp_auto_open'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>After Add to Cart Immeditaliy Open</strong>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo __('Side Cart Width'); ?></th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_sidecart_width]" value="<?php echo $SIWSCP_option['siwscp_sidecart_width']; ?>">
                                    <strong><?php echo __('(in px - eg. 350)'); ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo __('Side Cart Height'); ?></th>
                                <td>
                                    <select name="SIWSCP_option[siwscp_cart_height]">
                                            <option value="full" <?php if ($SIWSCP_option['siwscp_cart_height'] == "full" ) { echo 'selected'; } ?>><?php echo __('Full'); ?></option>
                                            <option value="auto" <?php if ($SIWSCP_option['siwscp_cart_height'] == "auto" ) { echo 'selected'; } ?>><?php echo __('Auto'); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo __('Open Side Cart From'); ?></th>
                                <td>
                                    <select name="SIWSCP_option[siwscp_cart_open_from]">
                                            <option value="right" <?php if ($SIWSCP_option['siwscp_cart_open_from'] == "right" ) { echo 'selected'; } ?>><?php echo __('Right'); ?></option>
                                            <option value="left" <?php if ($SIWSCP_option['siwscp_cart_open_from'] == "left" ) { echo 'selected'; } ?>><?php echo __('Left'); ?></option>
                                    </select>
                                </td>
                            </tr>
                            
                        </table>
                        <table class="data_table">
                           <h3>Cart basket</h3>
                           <tr>
                                <th>Enable </th>
                                <td>
                                    <select name="SIWSCP_option[siwscp_cart_show_hide]">
                                            <option value="siwscp_cart_show" <?php if ($SIWSCP_option['siwscp_cart_show_hide'] == "siwscp_cart_show" ) { echo 'selected'; } ?>>Always Show</option>
                                            <option value="siwscp_cart_hide" <?php if ($SIWSCP_option['siwscp_cart_show_hide'] == "siwscp_cart_hide" ) { echo 'selected'; } ?>>Always Hide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Cart Icon</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_show_cart_icn]" value="yes" <?php if ($SIWSCP_option['siwscp_show_cart_icn'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show Cart Icon</strong>
                                </td>
                            </tr> 
                            <tr>
                                <th>Hide Basket Pages</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_on_pages]" value="<?php echo $SIWSCP_option['siwscp_on_pages'] ?>">
                                    <strong>Do not show basket on pages.</strong>
                                    <strong>Use page id separated by comma. For eg: 31,41,51</strong>
                                </td>
                            </tr> 
                            <tr>
                                <th>Basket Product ordering</th>
                                <td>
                                    <select name="SIWSCP_option[siwscp_cart_ordering]">
                                            <option value="asc" <?php if ($SIWSCP_option['siwscp_cart_ordering'] == "asc" ) { echo 'selected'; } ?>>Recently added item at last (Asc)</option>
                                            <option value="desc" <?php if ($SIWSCP_option['siwscp_cart_ordering'] == "desc" ) { echo 'selected'; } ?>>Recently added item on top (Desc)</option>
                                    </select>
                                </td>
                            </tr> 
                            <tr>
                                <th>Basket Count Type</th>
                                <td>
                                    <select name="SIWSCP_option[siwscp_product_cnt_type]">
                                            <option value="sum_qty" <?php if ($SIWSCP_option['siwscp_product_cnt_type'] == "sum_qty" ) { echo 'selected'; } ?>>Sum of Quantity of all the products</option>
                                            <option value="num_qty" <?php if ($SIWSCP_option['siwscp_product_cnt_type'] == "num_qty" ) { echo 'selected'; } ?>>Number of products</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Product Count</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_product_cnt]" value="yes" <?php if ($SIWSCP_option['siwscp_product_cnt'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show Product Count.</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Cart on Mobile</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_mobile]" value="yes" <?php if ($SIWSCP_option['siwscp_mobile'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show Cart on mobile device.</strong>
                                </td>
                            </tr> 
                            <tr>
                                <th>On Cart & Checkout Page</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_cart_check_page]" value="yes" <?php if ($SIWSCP_option['siwscp_cart_check_page'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show Cart Basket on cart and checkout pages.</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Side cart Basket Icon</th>

                                <td class="ocwqv_icon_choice">
                                    <input type="radio" name="SIWSCP_option[siwscp_scfw_icon]" value="ocwqv_qscfw_icon" <?php if ($SIWSCP_option['siwscp_scfw_icon'] == "ocwqv_qscfw_icon" ) { echo 'checked'; } ?>>
                                    <label>
                                          <?php echo  $siwscp_svg['ocwqv_qscfw_icon']; ?>
                                    </label>
                                    <input type="radio" name="SIWSCP_option[siwscp_scfw_icon]" value="ocwqv_scfw_icon_1" <?php if ($SIWSCP_option['siwscp_scfw_icon'] == "ocwqv_scfw_icon_1" ) { echo 'checked'; } ?>>
                                    <label>
                                       <?php echo  $siwscp_svg['ocwqv_scfw_icon_1']; ?>
                                    </label>
            
                                    <input type="radio" name="SIWSCP_option[siwscp_scfw_icon]" value="ocwqv_scfw_icon_4" <?php if ($SIWSCP_option['siwscp_scfw_icon'] == "ocwqv_scfw_icon_4" ) { echo 'checked'; } ?>>
                                    <label>
                                          <?php echo  $siwscp_svg['ocwqv_scfw_icon_4']; ?>
                                    </label>

                                    <input type="radio" name="SIWSCP_option[siwscp_scfw_icon]" value="ocwqv_scfw_icon_2"  <?php if ($SIWSCP_option['siwscp_scfw_icon'] == "ocwqv_scfw_icon_2" ) { echo 'checked';} ?>>
                                    <label>
                                          <?php echo $siwscp_svg['ocwqv_scfw_icon_2']; ?>
                                    </label>
                                    <input type="radio" name="SIWSCP_option[siwscp_scfw_icon]" value="ocwqv_scfw_icon_5" <?php if ($SIWSCP_option['siwscp_scfw_icon'] == "ocwqv_scfw_icon_5" ) { echo 'checked'; } ?>>
                                    <label>
                                         <?php echo  $siwscp_svg['ocwqv_scfw_icon_5']; ?>
                                    </label>
                                    <input type="radio" name="SIWSCP_option[siwscp_scfw_icon]" value="ocwqv_scfw_icon_3"  <?php if ($SIWSCP_option['siwscp_scfw_icon'] == "ocwqv_scfw_icon_3" ) { echo 'checked'; } ?>>
                                    <label>
                                       <?php echo  $siwscp_svg['ocwqv_scfw_icon_3']; ?>
                                    </label> 

                                    <input type="radio" name="SIWSCP_option[siwscp_scfw_icon]" value="ocwqv_scfw_icon_6"  <?php if ($SIWSCP_option['siwscp_scfw_icon'] == "ocwqv_scfw_icon_6" ) { echo 'checked'; } ?>>
                                    <label>
                                        <?php echo  $siwscp_svg['shop_icon_4']; ?>
                                    </label>
                                     <input type="radio" name="SIWSCP_option[siwscp_scfw_icon]" value="ocwqv_scfw_icon_7"  <?php if ($SIWSCP_option['siwscp_scfw_icon'] == "ocwqv_scfw_icon_7" ) { echo 'checked'; } ?>>
                                    <label>
                                        <?php echo  $siwscp_svg['ocwqv_scfw_icon_7']; ?>
                                    </label>
                                </td>
                            </tr> 
                            <tr>
                                <th>Side cart Basket Shape</th>
                                <td>
                                    <select name="SIWSCP_option[siwscp_basket_shape]">
                                        <option value="square" <?php  if($SIWSCP_option['siwscp_basket_shape'] == "square" || empty($SIWSCP_option['siwscp_basket_shape'])){ echo "selected"; } ?>>Square</option>
                                        <option value="round" <?php if($SIWSCP_option['siwscp_basket_shape'] == "round"){ echo "selected"; } ?>>Round</option>
                                        
                                    </select>
                                </td>
                            </tr> 
                            <tr>
                                <th>Basket Count  Position</th>
                                <td>
                                    <select name="SIWSCP_option[siwscp_basket_count_position]">
                                        <option value="top-left" <?php if($SIWSCP_option['siwscp_basket_count_position'] == "top"){ echo "selected"; } ?>>Top Left</option>
                                        <option value="bottom-right" <?php  if($SIWSCP_option['siwscp_basket_count_position'] == "bottom-right" || empty($SIWSCP_option['siwscp_basket_count_position'])){ echo "selected"; } ?>>Bottom Right</option>
                                        <option value="bottom-left" <?php if($SIWSCP_option['siwscp_basket_count_position'] == "bottom-left"){ echo "selected"; } ?>>Bottom Left</option>
                                        <option value="top-right" <?php  if($SIWSCP_option['siwscp_basket_count_position'] == "top-right" || empty($SIWSCP_option['siwscp_basket_count_position'])){ echo "selected"; } ?>>Top-right</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>Basket Position</th>
                                <td>
                                    <select name="SIWSCP_option[siwscp_basket_position]">
                                        <option value="top" <?php if($SIWSCP_option['siwscp_basket_position'] == "top"){ echo "selected"; } ?>>Top</option>
                                        <option value="bottom" <?php  if($SIWSCP_option['siwscp_basket_position'] == "bottom" || empty($SIWSCP_option['siwscp_basket_position'])){ echo "selected"; } ?>>Bottom</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Basket Icon Size</th>
                                <td>
                                    <input type="number" name="SIWSCP_option[siwscp_basket_icn_size]" value="<?php echo $SIWSCP_option['siwscp_basket_icn_size']; ?>">
                                </td>
                            </tr> 
                             <tr>
                                <th>Basket Background Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_basket_bg_clr']; ?>" name="SIWSCP_option[siwscp_basket_bg_clr]" value="<?php echo $SIWSCP_option['siwscp_basket_bg_clr']; ?>"/>
                                </td>

                            </tr>
                            <tr>
                                <th>Basket Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_basket_clr']; ?>" name="SIWSCP_option[siwscp_basket_clr]" value="<?php echo $SIWSCP_option['siwscp_basket_clr']; ?>"/>
                                </td>

                            </tr> 
                            <tr>
                                <th>Count Background Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_cnt_bg_clr']; ?>" name="SIWSCP_option[siwscp_cnt_bg_clr]" value="<?php echo $SIWSCP_option['siwscp_cnt_bg_clr']; ?>"/>
                                </td>
                            </tr> 
                            <tr>
                                <th>Count Text Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_cnt_txt_clr']; ?>" name="SIWSCP_option[siwscp_cnt_txt_clr]" value="<?php echo $SIWSCP_option['siwscp_cnt_txt_clr']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Count Text Size</th>
                                <td>
                                    <input type="number" name="SIWSCP_option[siwscp_cnt_txt_size]" value="<?php echo $SIWSCP_option['siwscp_cnt_txt_size']; ?>">
                                </td>
                            </tr> 
                                    
                       </table>
                        
                    </div>
                    <div id="siwscp-tab-header" class="tabcontent">
                       <h3>Side Cart General Setting</h3>
                        <table class="data_table">
                            <tr>
                                <th>Show in Header</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_header_cart_icon]" value="yes" <?php if ($SIWSCP_option['siwscp_header_cart_icon'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Basket Icon</strong><br/>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_header_close_icon]" value="yes" <?php if ($SIWSCP_option['siwscp_header_close_icon'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Close Icon</strong><br/>
                                </td>
                            </tr>
                            <tr>
                                <th>Show text in Header</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_show_text_header]" value="yes" <?php if ($SIWSCP_option['siwscp_show_text_header'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                </td>
                            </tr>
                            <tr>
                                <th>Header Text Add Here</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_header_text]" value="<?php echo $SIWSCP_option['siwscp_header_text']; ?>" >
                                    <span class="ocwg_desc">this text use if you check show text in header.</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Header Font Size</th>
                                <td>
                                    <input type="number" name="SIWSCP_option[siwscp_head_font_size]" value="<?php echo $SIWSCP_option['siwscp_head_font_size']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Header Backgrond Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_head_background_clr'];?>" name="SIWSCP_option[siwscp_head_background_clr]" value="<?php echo $SIWSCP_option['siwscp_head_background_clr'];?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Header Font Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_head_ft_clr'];?>" name="SIWSCP_option[siwscp_head_ft_clr]" value="<?php echo $SIWSCP_option['siwscp_head_ft_clr'];?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Header cart icon</th>
                                <td class="ocwqv_icon_choice">
                                     <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_7"  <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_7" ) { echo 'checked'; } ?>>
                                    <label>
                                        <?php echo  $siwscp_svg['shop_icon_7']; ?>
                                    </label>
                                    <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_8"  <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_8" ) { echo 'checked'; } ?>>
                                    <label>
                                        <?php echo  $siwscp_svg['shop_icon_8']; ?>
                                    </label>
                                    <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_9"  <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_9" ) { echo 'checked'; } ?>>
                                    <label>
                                        <?php echo  $siwscp_svg['shop_icon_9']; ?>
                                    </label>
                                     <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_10"  <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_10" ) { echo 'checked'; } ?>>
                                    <label>
                                        <?php echo  $siwscp_svg['shop_icon_10']; ?>
                                    </label>
                                    
                                    <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_1" <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_1" ) { echo 'checked'; } ?>>
                                    <label>
                                       <?php echo  $siwscp_svg['shop_icon_1']; ?>
                                    </label>
            
                                    <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_2" <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_2" ) { echo 'checked'; } ?>>
                                    <label>
                                          <?php echo  $siwscp_svg['shop_icon_2']; ?>
                                    </label>

                                    <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_3"  <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_3" ) { echo 'checked'; } ?>>
                                    <label>
                                          <?php echo $siwscp_svg['shop_icon_3']; ?>
                                    </label>
                                
                                    <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_4" <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_4" ) { echo 'checked'; } ?>>
                                    <label>
                                         <?php echo  $siwscp_svg['shop_icon_4']; ?>
                                    </label>

                                    <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_5"  <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_5" ) { echo 'checked'; } ?>>
                                    <label>
                                       <?php echo  $siwscp_svg['shop_icon_5']; ?>
                                    </label> 

                                    <input type="radio" name="SIWSCP_option[siwscp_shop_icon]" value="shop_icon_6"  <?php if ($SIWSCP_option['siwscp_shop_icon'] == "shop_icon_6" ) { echo 'checked'; } ?>>
                                    <label>
                                        <?php echo  $siwscp_svg['shop_icon_6']; ?>
                                    </label>
                                </td>    
                            </tr>
                            <tr>
                                <th>Header cart icon Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_header_cart_icon_clr']; ?>" name="SIWSCP_option[siwscp_header_cart_icon_clr]" value="<?php echo $SIWSCP_option['siwscp_header_cart_icon_clr']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Header Close Icon</th>
                                <td class="ocwqv_icon_choice_close"> 
                                    <input type="radio" name="SIWSCP_option[siwscp_close_icon]" value="close_icon" <?php if ($SIWSCP_option['siwscp_close_icon'] == "close_icon" ) { echo 'checked'; } ?>>
                                    <label>
                                       <?php echo  $siwscp_svg['close_icon']; ?>
                                    </label>
            
                                    <input type="radio" name="SIWSCP_option[siwscp_close_icon]" value="close_icon_1" <?php if ($SIWSCP_option['siwscp_close_icon'] == "close_icon_1" ) { echo 'checked'; } ?>>
                                    <label>
                                          <?php echo  $siwscp_svg['close_icon_1']; ?>
                                    </label>

                                    <input type="radio" name="SIWSCP_option[siwscp_close_icon]" value="close_icon_2"  <?php if ($SIWSCP_option['siwscp_close_icon'] == "close_icon_2" ) { echo 'checked'; } ?>>
                                    <label>
                                          <?php echo $siwscp_svg['close_icon_2']; ?>
                                    </label>
                                
                                    <input type="radio" name="SIWSCP_option[siwscp_close_icon]" value="close_icon_3" <?php if ($SIWSCP_option['siwscp_close_icon'] == "close_icon_3" ) { echo 'checked'; } ?>>
                                    <label>
                                         <?php echo  $siwscp_svg['close_icon_3']; ?>
                                    </label>

                                    <input type="radio" name="SIWSCP_option[siwscp_close_icon]" value="close_icon_4"  <?php if ($SIWSCP_option['siwscp_close_icon'] == "close_icon_4" ) { echo 'checked'; } ?>>
                                    <label>
                                       <?php echo  $siwscp_svg['close_icon_4']; ?>
                                    </label> 
                                    <input type="radio" name="SIWSCP_option[siwscp_close_icon]" value="close_icon_5"  <?php if ($SIWSCP_option['siwscp_close_icon'] == "close_icon_5" ) { echo 'checked'; } ?>>
                                    <label>
                                       <?php echo  $siwscp_svg['close_icon_5']; ?>
                                    </label> 
                                </td>  
                            </tr>
                            <tr>
                                <th>Header Close icon Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_header_close_icon_clr']; ?>" name="SIWSCP_option[siwscp_header_close_icon_clr]" value="<?php echo $SIWSCP_option['siwscp_header_close_icon_clr']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Show Freeshipping Text in Header color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_header_shipping_text_color']; ?>" name="SIWSCP_option[siwscp_header_shipping_text_color]" value="<?php echo $SIWSCP_option['siwscp_header_shipping_text_color']; ?>"/>
                                </td>
                            </tr>
                            
                        </table>
                    </div>

                    <div id="siwscp-tab-body" class="tabcontent">
                       <h3>Side Cart General Setting</h3>
                        <table class="data_table">
                            <tr>
                                <th>Show in Loop </th>
                                <td>
                                            <input type="checkbox" name="SIWSCP_option[siwscp_loop_img]" value="yes" <?php if ($SIWSCP_option['siwscp_loop_img'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Product Image</strong><br/>
                                            <input type="checkbox" name="SIWSCP_option[siwscp_loop_product_name]" value="yes" <?php if ($SIWSCP_option['siwscp_loop_product_name'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Product Name</strong><br/>
                                            <input type="checkbox" name="SIWSCP_option[siwscp_loop_product_price]" value="yes" <?php if ($SIWSCP_option['siwscp_loop_product_price'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Product Price</strong><br/>
                                            <input type="checkbox" name="SIWSCP_option[siwscp_loop_total]" value="yes" <?php if ($SIWSCP_option['siwscp_loop_total'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Product Total</strong><br/>
                                            <input type="checkbox" name="SIWSCP_option[siwscp_loop_variation]" value="yes" <?php if ($SIWSCP_option['siwscp_loop_variation'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Product Variations</strong><br/>
                                            <input type="checkbox" name="SIWSCP_option[siwscp_loop_link]" value="yes" <?php if ($SIWSCP_option['siwscp_loop_link'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Link to Product Page</strong><br/>
                                            <input type="checkbox" name="SIWSCP_option[siwscp_loop_delete]" value="yes" <?php if ($SIWSCP_option['siwscp_loop_delete'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Delete Product</strong><br/>
                                        </td>
                            </tr>
                            <tr>
                                <th>Display Qty Box</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_qty_box]" value="yes" <?php if ($SIWSCP_option['siwscp_qty_box'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Display Product Qty box.</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Product Title Font Size</th>
                                <td>
                                    <input type="number" name="SIWSCP_option[siwscp_product_ft_size]" value="<?php echo $SIWSCP_option['siwscp_product_ft_size']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Product Title Font Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_product_ft_clr']; ?>" name="SIWSCP_option[siwscp_product_ft_clr]" value="<?php echo $SIWSCP_option['siwscp_product_ft_clr']; ?>"/>
                                </td>
                            </tr>
                             <tr>
                                <th>Delete Icons</th>
                                <td class="ocwqv_icon_choice">
                                        <input type="radio" name="SIWSCP_option[siwscp_delete_icon]" value="ocwqv_trash" <?php if ($SIWSCP_option['siwscp_delete_icon'] == "ocwqv_trash" ) { echo 'checked'; } ?>>
                                        <label>
                                              <?php echo  $siwscp_svg['ocwqv_trash']; ?>
                                        </label>
                                        <input type="radio" name="SIWSCP_option[siwscp_delete_icon]" value="trash_1" <?php if ($SIWSCP_option['siwscp_delete_icon'] == "trash_1" ) { echo 'checked'; } ?>>
                                        <label>
                                           <?php echo  $siwscp_svg['trash_1']; ?>
                                        </label>
                
                                        <input type="radio" name="SIWSCP_option[siwscp_delete_icon]" value="trash_2" <?php if ($SIWSCP_option['siwscp_delete_icon'] == "trash_2" ) { echo 'checked'; } ?>>
                                        <label>
                                              <?php echo  $siwscp_svg['trash_2']; ?>
                                        </label>

                                        <input type="radio" name="SIWSCP_option[siwscp_delete_icon]" value="trash_3"  <?php if ($SIWSCP_option['siwscp_delete_icon'] == "trash_3" ) { echo 'checked'; } ?>>
                                        <label>
                                              <?php echo $siwscp_svg['trash_3']; ?>
                                        </label>
                                    
                                        <input type="radio" name="SIWSCP_option[siwscp_delete_icon]" value="trash_4" <?php if ($SIWSCP_option['siwscp_delete_icon'] == "trash_4" ) { echo 'checked'; } ?>>
                                        <label>
                                             <?php echo  $siwscp_svg['trash_4']; ?>
                                        </label>

                                        <input type="radio" name="SIWSCP_option[siwscp_delete_icon]" value="trash_5"  <?php if ($SIWSCP_option['siwscp_delete_icon'] == "trash_5" ) { echo 'checked'; } ?>>
                                        <label>
                                           <?php echo  $siwscp_svg['trash_5']; ?>
                                        </label> 

                                        <input type="radio" name="SIWSCP_option[siwscp_delete_icon]" value="trash_6"  <?php if ($SIWSCP_option['siwscp_delete_icon'] == "trash_6" ) { echo 'checked'; } ?>>
                                        <label>
                                            <?php echo  $siwscp_svg['trash_6']; ?>
                                        </label>
                                </td>
                            </tr>
                            <tr>
                                <th>Delete icon Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_delect_icon_clr']; ?>" name="SIWSCP_option[siwscp_delect_icon_clr]" value="<?php echo $SIWSCP_option['siwscp_delect_icon_clr']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Product Font Size</th>
                                <td>
                                    <input type="number" name="SIWSCP_option[siwscp_sld_product_ft_size]" value="<?php echo $SIWSCP_option['siwscp_sld_product_ft_size']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Product Font Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_sld_product_ft_clr']; ?>" name="SIWSCP_option[siwscp_sld_product_ft_clr]" value="<?php echo $SIWSCP_option['siwscp_sld_product_ft_clr']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Cart Empty show/hide all cart detail</th>
                                <td>
                                    <select name="SIWSCP_option[siwscp_cart_empty_hide_show]">
                                            <option value="show" <?php if ($SIWSCP_option['siwscp_cart_empty_hide_show'] == "show" ) { echo 'selected'; } ?>>Show All Detail</option>
                                            <option value="hide" <?php if ($SIWSCP_option['siwscp_cart_empty_hide_show'] == "hide" ) { echo 'selected'; } ?>>Hide All Detail</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Cart is empty Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_cart_is_empty]" value="<?php echo $SIWSCP_option['siwscp_cart_is_empty']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Show All Total </th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_total_all_option]" value="yes" <?php if ($SIWSCP_option['siwscp_total_all_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show All Total.</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Total Text </th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_apply_total_text]" value="<?php echo $SIWSCP_option['siwscp_apply_total_text']; ?>">
                                </td>
                            </tr>


                        </table>

                    </div>
                    <div id="siwscp-tab-footer" class="tabcontent">
                        <h3>Footer Setting</h3>
                        <table>
                            <tr>
                                <th>Show Shipping Total </th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_total_shipping_option]" value="yes" <?php if ($SIWSCP_option['siwscp_total_shipping_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show Shipping Total.</strong>
                                </td>
                            </tr>
                             <tr>
                                <th>Show Shipping Total </th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_total_shipping_option]" value="yes" <?php if ($SIWSCP_option['siwscp_total_shipping_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show Shipping Total.</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Show All Total </th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_total_shipping_option]" value="yes" <?php if ($SIWSCP_option['siwscp_total_shipping_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show All Total.</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Show ViewCart Button</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_cart_option]" value="yes" <?php if ($SIWSCP_option['siwscp_cart_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show Viewcart Button.</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Show Checkout Button</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_checkout_option]" value="yes" <?php if ($SIWSCP_option['siwscp_checkout_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show Checkout Button.</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Show Continue Shopping Button</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_conshipping_option]" value="yes" <?php if ($SIWSCP_option['siwscp_conshipping_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Show Continue Shipping Button.</strong>
                                </td>
                            </tr>
                           
                        </table>
                        <table class="data_table">
                            <h3>Footer Button Settings</h3>
                                <tr>
                                    <th>Button Row</th>
                                    <td>
                                        <select name="SIWSCP_option[siwscp_footer_button_row]">
                                            <option value="one" <?php if($SIWSCP_option['siwscp_footer_button_row'] == "one"){ echo "selected"; } ?>>One in a row ( 1+1+1 )</option>
                                            <option value="two_one" <?php if($SIWSCP_option['siwscp_footer_button_row'] == "two_one"){ echo "selected"; } ?>>Two in first row ( 2 + 1 )</option>
                                            <option value="one_two" <?php if($SIWSCP_option['siwscp_footer_button_row'] == "one_two"){ echo "selected"; } ?>>Two in last row ( 1 + 2 )</option>
                                            <option value="three" <?php if($SIWSCP_option['siwscp_footer_button_row'] == "three"){ echo "selected"; } ?>>Three in one row( 3 )</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Footer Viewcart Buttons Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_ft_viewbtn_clr']; ?>" name="SIWSCP_option[siwscp_ft_viewbtn_clr]" value="<?php echo $SIWSCP_option['siwscp_ft_viewbtn_clr']; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Footer checkout Buttons Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_ft_checkoutbtn_clr']; ?>" name="SIWSCP_option[siwscp_ft_checkoutbtn_clr]" value="<?php echo $SIWSCP_option['siwscp_ft_checkoutbtn_clr']; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Footer shipping Buttons Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_ft_shippingbtn_clr']; ?>" name="SIWSCP_option[siwscp_ft_shippingbtn_clr]" value="<?php echo $SIWSCP_option['siwscp_ft_shippingbtn_clr']; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                <th>Footer Buttons Text Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_ft_btn_txt_clr']; ?>" name="siwscp_ft_btn_txt_clr" value="<?php echo $SIWSCP_option['siwscp_ft_btn_txt_clr']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Footer Buttons Margin</th>
                                <td>
                                    <input type="number" name="SIWSCP_option[siwscp_ft_btn_mrgin]" value="<?php echo $SIWSCP_option['siwscp_ft_btn_mrgin']; ?>">
                                </td>
                            </tr>
                             <tr>
                                <th>Shipping Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_ship_txt]" value="<?php echo $SIWSCP_option['siwscp_ship_txt']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Shipping Text Font Size</th>
                                <td>
                                    <input type="number" name="SIWSCP_option[siwscp_ship_ft_size]" value="<?php echo $SIWSCP_option['siwscp_ship_ft_size']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Shipping Text Font Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_ship_ft_clr']; ?>" name="SIWSCP_option[siwscp_ship_ft_clr]" value="<?php echo $SIWSCP_option['siwscp_ship_ft_clr']; ?>"/>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <h3>Footer Text Setting</h3>
                             <tr>
                                        <th>Subtotal Text</th>
                                        <td>
                                            <input type="text" name="SIWSCP_option[siwscp_subtotal_txt]" value="<?php echo $SIWSCP_option['siwscp_subtotal_txt']; ?>">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th>View Cart Button Text</th>
                                        <td>
                                            <input type="text" name="SIWSCP_option[siwscp_cart_txt]" value="<?php echo $SIWSCP_option['siwscp_cart_txt']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Checkout Button Text</th>
                                        <td>
                                            <input type="text" name="SIWSCP_option[siwscp_checkout_txt]" value="<?php echo $SIWSCP_option['siwscp_checkout_txt']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Continue Shopping Button Text</th>
                                        <td>
                                            <input type="text" name="SIWSCP_option[siwscp_conshipping_txt]" value="<?php echo $SIWSCP_option['siwscp_conshipping_txt']; ?>">
                                        </td>
                                    </tr>
                                      <!--     <tr>
                                        <th>Shipping</th>
                                        <td>
                                            <input type="text" name="scfw_comman[wfc_shipping_text_trans]" value="<?php echo $scfw_comman['wfc_shipping_text_trans']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tax</th>
                                        <td>
                                            <input type="text" name="scfw_comman[wfc_apply_taxt_testx]" value="<?php echo $scfw_comman['wfc_apply_taxt_testx']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>
                                            <input type="text" name="scfw_comman[wfc_apply_total_text]" value="<?php echo $scfw_comman['wfc_apply_total_text']; ?>">
                                        </td>
                                    </tr>
                                -->
                        </table>
                    </div>
                    <div id="siwscp-tab-sli_copon" class="tabcontent">

                        <h3>Coupon Field Setting</h3>
                        <table class="data_table">
                            <tr>
                                <th>Coupon Field on Mobile</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_coupon_field_mobile]" value="yes" <?php if ($SIWSCP_option['siwscp_coupon_field_mobile'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Enable Coupon Field on Mobile</strong>
                                </td>
                            </tr> 
                            <tr>
                                <th>Coupon icon</th>
                                <td class="ocwqv_icon_choice">
                                       
                                        <input type="radio" name="SIWSCP_option[siwscp_coupon_icon]" value="coupon" <?php if ($SIWSCP_option['siwscp_coupon_icon'] == "coupon" ) { echo 'checked'; } ?>>
                                        <label>
                                           <?php echo  $siwscp_svg['coupon']; ?>
                                        </label>
                
                                        <input type="radio" name="SIWSCP_option[siwscp_coupon_icon]" value="coupon_1" <?php if ($SIWSCP_option['siwscp_coupon_icon'] == "coupon_1" ) { echo 'checked'; } ?>>
                                        <label>
                                              <?php echo  $siwscp_svg['coupon_1']; ?>
                                        </label>

                                        <input type="radio" name="SIWSCP_option[siwscp_coupon_icon]" value="coupon_2"  <?php if ($SIWSCP_option['siwscp_coupon_icon'] == "coupon_2" ) { echo 'checked'; } ?>>
                                        <label>
                                              <?php echo $siwscp_svg['coupon_2']; ?>
                                        </label>
                                    
                                        <input type="radio" name="SIWSCP_option[siwscp_coupon_icon]" value="coupon_3" <?php if ($SIWSCP_option['siwscp_coupon_icon'] == "coupon_3" ) { echo 'checked'; } ?>>
                                        <label>
                                             <?php echo  $siwscp_svg['coupon_3']; ?>
                                        </label>

                                        <input type="radio" name="SIWSCP_option[siwscp_coupon_icon]" value="coupon_4"  <?php if ($SIWSCP_option['siwscp_coupon_icon'] == "coupon_4" ) { echo 'checked'; } ?>>
                                        <label>
                                           <?php echo  $siwscp_svg['coupon_4']; ?>
                                        </label> 

                                        <input type="radio" name="SIWSCP_option[siwscp_coupon_icon]" value="coupon_5"  <?php if ($SIWSCP_option['siwscp_coupon_icon'] == "coupon_5" ) { echo 'checked'; } ?>>
                                        <label>
                                            <?php echo  $siwscp_svg['coupon_5']; ?>
                                        </label>
                                </td>
                                
                            </tr>
                            <tr>
                                <th>Apply Coupon icon Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_apply_cpn_icon_clr']; ?>" name="SIWSCP_option[siwscp_apply_cpn_icon_clr]" value="<?php echo $SIWSCP_option['siwscp_apply_cpn_icon_clr']; ?>"/>
                                </td>
                            </tr> 
                            <tr>
                                <th>Apply Coupon Font Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_apply_cpn_ft_clr']; ?>" name="SIWSCP_option[siwscp_apply_cpn_ft_clr]" value="<?php echo $SIWSCP_option['siwscp_apply_cpn_ft_clr']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Apply Button Text Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_applybtn_cpn_ft_clr']; ?>" name="SIWSCP_option[siwscp_applybtn_cpn_ft_clr]" value="<?php echo $SIWSCP_option['siwscp_applybtn_cpn_ft_clr']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Apply Button Background Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_applybtn_cpn_bg_clr']; ?>" name="SIWSCP_option[siwscp_applybtn_cpn_bg_clr]" value="<?php echo $SIWSCP_option['siwscp_applybtn_cpn_bg_clr']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Apply Coupon Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_apply_cpn_txt]" value="<?php echo $SIWSCP_option['siwscp_apply_cpn_txt']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Apply Coupon Placeholder Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_apply_cpn_plchldr_txt]" value="<?php echo $SIWSCP_option['siwscp_apply_cpn_plchldr_txt']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Apply Coupon Apply Button Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_apply_cpn_apbtn_txt]" value="<?php echo $SIWSCP_option['siwscp_apply_cpn_apbtn_txt']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Coupon Field Empty Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_cpnfield_empty_txt]" value="<?php echo $SIWSCP_option['siwscp_cpnfield_empty_txt']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Coupon Already Applied Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_cpn_alapplied_txt]" value="<?php echo $SIWSCP_option['siwscp_cpn_alapplied_txt']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Invalid Coupon Code Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_invalid_coupon_txt]" value="<?php echo $SIWSCP_option['siwscp_invalid_coupon_txt']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Coupon Applied Successfully Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_coupon_applied_suc_txt]" value="<?php echo $SIWSCP_option['siwscp_coupon_applied_suc_txt']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Coupon Removed Successfully Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_coupon_removed_suc_txt]" value="<?php echo $SIWSCP_option['siwscp_coupon_removed_suc_txt']; ?>">
                                </td>
                            </tr>
                        </table>
                        <table>
                            <h3>Cart Slider Setting</h3>
                            <tr>
                                <th>Product Slider on Desktop</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_prodslider_desktop]" value="yes" <?php if ($SIWSCP_option['siwscp_prodslider_desktop'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Enable Product Slider on Desktop</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Product Slider on Mobile</th>
                                <td>
                                    <input type="checkbox" name="SIWSCP_option[siwscp_prodslider_mobile]" value="yes" <?php if ($SIWSCP_option['siwscp_prodslider_mobile'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    <strong>Enable Product Slider on Mobile</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Select Product</th>
                                <td>
                                    <select id="siwscp_select_product" name="siwscp_select2[]" multiple="multiple" style="width:100%;max-width:15em;">
                                        <?php 
                                            $productsa = get_option('siwscp_select2');
                                            foreach ($productsa as $value) {
                                                $productc = wc_get_product( $value );
                                                if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                                                    $title = $productc->get_name();
                                                    ?>
                                                        <option value="<?php echo $value; ?>" selected="selected"><?php echo $title; ?></option>
                                                    <?php   
                                                }
                                            }
                                        ?>
                                   </select> 
                                </td>
                            </tr>
                            <tr>
                                <th>Product Font Size</th>
                                <td>
                                    <input type="number" name="SIWSCP_option[siwscp_sld_product_ft_size]" value="<?php echo $SIWSCP_option['siwscp_sld_product_ft_size']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>Product Font Color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_sld_product_ft_clr']; ?>" name="SIWSCP_option[siwscp_sld_product_ft_clr]" value="<?php echo $SIWSCP_option['siwscp_sld_product_ft_clr']; ?>"/>
                                </td>
                            </tr> 
                            <tr>
                                <th>slider button color</th>
                                <td>
                                    <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $SIWSCP_option['siwscp_ft_sliderbtn_clr']; ?>" name="SIWSCP_option[siwscp_ft_sliderbtn_clr]" value="<?php echo $SIWSCP_option['siwscp_ft_sliderbtn_clr']; ?>"/>
                                </td>
                            </tr> 
                            <tr>
                                <th>Add to Cart Button Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_slider_atcbtn_txt]" value="<?php echo $SIWSCP_option['siwscp_slider_atcbtn_txt']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>View Options Button Text</th>
                                <td>
                                    <input type="text" name="SIWSCP_option[siwscp_slider_vwoptbtn_txt]" value="<?php echo $SIWSCP_option['siwscp_slider_vwoptbtn_txt']; ?>">
                                </td>
                            </tr> 

                        </table>

                    </div>
                   <input type="hidden" name="SIWSCP_action" value="SIWSCP_save_option_data"/>
                <input type="submit" value="Save changes" name="submit" class="button-primary" id="SIWSCP-btn-space">
            </form>
			</div>

		
        <?php }

        function recursive_sanitize_text_field($array) {

            $new_arr = array();
            foreach ( $array as $key => $value ) {
                if ( is_array( $value ) ) {
                        $value = recursive_sanitize_text_field($value);
                    } else {
                        $value = sanitize_text_field( $value );
                        $new_arr[] = $value;
                    }
            }
            return $new_arr;

        } 



        function SIWSCP_save_options() {


            if( current_user_can('administrator') ) { 

                
                if(isset($_REQUEST['SIWSCP_action']) && $_REQUEST['SIWSCP_action'] == 'SIWSCP_save_option_data'){

                    if(!isset( $_POST['SIWSCP_nonce_field'] ) || !wp_verify_nonce( $_POST['SIWSCP_nonce_field'], 'SIWSCP_nonce_action' ) ){

                        print 'Sorry, your nonce did not verify.';

                        exit;

                    }else{

                        $isecheckbox = array(

                            'siwscp_ajax_cart',
                            'siwscp_reload_side_cart',
                            'siwscp_trigger_to_class_side_cart',
                            'siwscp_header_close_icon',
                            'siwscp_header_cart_icon',
                            'siwscp_show_text_header',
                            'siwscp_loop_img',
                            'siwscp_loop_product_name',
                            'siwscp_loop_product_price',
                            'siwscp_loop_total',
                            'siwscp_loop_variation',
                            'siwscp_loop_link',
                            'siwscp_loop_delete',
                            'siwscp_auto_open',
                            'siwscp_trigger_class',
                            'siwscp_ajax_cart',
                            'siwscp_qty_box',
                            'siwscp_total_shipping_option',
                            'siwscp_total_tax_option',
                            'siwscp_total_all_option',
                            'siwscp_cart_option',
                            'siwscp_checkout_option',
                            'siwscp_conshipping_option',
                            'siwscp_coupon_field_mobile',
                            'siwscp_prodslider_desktop',
                            'siwscp_prodslider_mobile',
                            'siwscp_show_cart_icn',
                            'siwscp_cart_check_page',
                            'siwscp_mobile',
                            'siwscp_product_cnt',
                        );


                        foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {

                           if(!isset($_REQUEST['SIWSCP_option'][$value_isecheckbox])){

                                $_REQUEST['SIWSCP_option'][$value_isecheckbox] ='no';

                            }

                        }
                        
                        foreach ($_REQUEST['SIWSCP_option'] as $key_SIWSCP_comman => $value_SIWSCP_comman) {

                            update_option($key_SIWSCP_comman, sanitize_text_field($value_SIWSCP_comman), 'yes');

                        }

                       
                        if(isset($_REQUEST['siwscp_select2'])) {
                            $siwscp_select2 = $this->recursive_sanitize_text_field($_REQUEST['siwscp_select2'] );
                            update_option('siwscp_select2', $siwscp_select2, 'yes');
                        }

                          wp_redirect( admin_url( '/admin.php?page=shop_cart' ) );
                        exit;

            
                        
                    }
                }
            }

        }

        function scfw_product_ajax() {
          
            $return = array();
            $post_types = array( 'product','product_variation');

            $search_results = new WP_Query( array( 
                's'=> sanitize_text_field($_GET['q']),
                'post_status' => 'publish',
                'post_type' => $post_types,
                'posts_per_page' => -1,
                'meta_query' => array(
                                    array(
                                        'key' => '_stock_status',
                                        'value' => 'instock',
                                        'compare' => '=',
                                    )
                                )
                ) );
             

            if( $search_results->have_posts() ) :
               while( $search_results->have_posts() ) : $search_results->the_post();   
                  $productc = wc_get_product( $search_results->post->ID );
                  if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                     $title = $search_results->post->post_title;
                     $price = $productc->get_price_html();
                     $return[] = array( $search_results->post->ID, $title, $price);   
                  }
               endwhile;
            endif;
            echo json_encode( $return );
            die;
        }

		
		function init() {

      		add_action( 'admin_menu', array($this, 'SIWSCP_create_menu'));

            add_action( 'admin_init',  array($this, 'SIWSCP_save_options'));

            add_action( 'wp_ajax_nopriv_WFC_product_ajax',array($this, 'scfw_product_ajax') );

            add_action( 'wp_ajax_WFC_product_ajax', array($this, 'scfw_product_ajax') );
    

      	}

		public static function instance() {

         	if (!isset(self::$instance)) {

            	self::$instance = new self();

            	self::$instance->init();

         	}

         	return self::$instance;
      	}
	}

	SIWSCP_menu::instance();
}