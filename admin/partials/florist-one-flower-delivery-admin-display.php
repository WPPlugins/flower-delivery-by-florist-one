<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/admin/partials
 */
?>

<h2><?php echo esc_html(get_admin_page_title()); ?></h2>

<form method="post" name="delivery_config" action="options.php">

    <?php

        $options = get_option($this->plugin_name);

        if (!(isset($options['products_cm']))){
          $options['products_cm'] = 0;
          $options['products_ea'] = 0;
          $options['products_md'] = 0;
          $options['products_tg'] = 0;
          $options['products_vd'] = 0;
        }

        $affiliate_id = $options['affiliate_id'];
        $products = $options['products'];

        $products_cm = $options['products_cm'];
        $products_ea = $options['products_ea'];
        $products_md = $options['products_md'];
        $products_tg = $options['products_tg'];
        $products_vd = $options['products_vd'];

        $navigation_color = $options['navigation_color'];
        $navigation_hover_color = $options['navigation_hover_color'];
        $navigation_text_color = $options['navigation_text_color'];
        $navigation_hover_text_color = $options['navigation_hover_text_color'];
        $button_color = $options['button_color'];
        $button_hover_color = $options['button_hover_color'];
        $button_text_color = $options['button_text_color'];
        $button_hover_text_color = $options['button_hover_text_color'];
        $link_color = $options['link_color'];
        $heading_color = $options['heading_color'];
        $text_color = $options['text_color'];
        $products_per_page = $options['products_per_page'];
        $address_institution = $options['address_institution'];
        $address_1 = $options['address_1'];
        $address_city = $options['address_city'];
        $address_state = $options['address_state'];
        $address_country = $options['address_country'];
        $address_zipcode = $options['address_zipcode'];
        $address_phone = $options['address_phone'];
        $currency = $options['currency'];
        $flower_storefront_id = $options['flower_storefront_id'];

        // $rotation = $options['rotation'];
        $rotation = 0;
        $florist_selection = $options['florist_selection'];
        $florists_of_choice = $options['florists_of_choice'];
        $facility_id = ( isset($options['facility_id']) ? json_encode($options['facility_id']) : 0 );        //echo $options['facility_id'];

    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>

    <table class="admin_section">
      <tr>
        <td><h3>Affiliate</h3></td>
        <td></td>
      </tr>
      <tr>
        <td>Affiliate ID</td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo $this->plugin_name; ?>-affiliate_id" name="<?php echo $this->plugin_name; ?>[affiliate_id]" value="<?php echo $affiliate_id ?>" />
          </fieldset>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>To obtain a Florist One Affiliate ID, <a href="https://www.floristone.com/affiliate/aff_manager/index.cfm?fuseaction=newaff&newafftype=flower_plugin">sign up here</a>.</td>
      </tr>
      <tr>
        <td colspan="2"><hr /></td>
      </tr>
      <tr>
        <td><h3>Products</h3></td>
        <td></td>
      </tr>
      <tr>
        <td>Products</td>
        <td>
          <fieldset>
            <input type="radio" id="<?php echo $this->plugin_name; ?>-products-1" name="<?php echo $this->plugin_name; ?>[products]" value="0" <?php checked( $products, 0 ); ?>> All Flower Categories  <input type="radio" id ="<?php echo $this->plugin_name; ?>-products-1" name="<?php echo $this->plugin_name; ?>[products]" value="1"<?php checked( $products, 1 ); ?>> Only Funeral &amp; Sympathy
          </fieldset>
        </td>
        <td></td>
      </tr>

      <tr class="additional_holidays">
        <td colspan="3"><h4>Additional Occasions and Holidays</h4></td>
      </tr>
      <tr class="additional_holidays">
        <td>Christmas</td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-products_cm" name="<?php echo $this->plugin_name; ?>[products_cm]" <?php echo $products_cm == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays">
        <td>Easter</td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-products_ea" name="<?php echo $this->plugin_name; ?>[products_ea]" <?php echo $products_ea == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays">
        <td>Mother's Day</td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-products_md" name="<?php echo $this->plugin_name; ?>[products_md]" <?php echo $products_md == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays">
        <td>Thanksgiving</td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-products_tg" name="<?php echo $this->plugin_name; ?>[products_tg]" <?php echo $products_tg == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr class="additional_holidays">
        <td>Valentine's Day</td>
        <td>
          <fieldset>
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-products_vd" name="<?php echo $this->plugin_name; ?>[products_vd]" <?php echo $products_vd == 1 ? 'checked="checked"' : ''; ?> value="1">
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>

      <tr>
        <td>Products Per Page</td>
        <td>
          <fieldset>
            <select id="<?php echo $this->plugin_name; ?>-products_per_page" name="<?php echo $this->plugin_name; ?>[products_per_page]">
              <option value="6"  <?php if ($products_per_page == 6){ echo 'selected="selected"'; } ?>>6</option>
              <option value="12" <?php if ($products_per_page == 12){ echo 'selected="selected"'; } ?>>12</option>
              <option value="18" <?php if ($products_per_page == 18){ echo 'selected="selected"'; } ?>>18</option>
              <option value="24" <?php if ($products_per_page == 24){ echo 'selected="selected"'; } ?>>24</option>
            </select>
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2"><hr /></td>
      </tr>
      <tr class="autopop-address">
        <td colspan="2"><h3>Default Delivery Address</h3></td>
      </tr>
      <tr class="autopop-address">
        <td>Funeral Home Name</td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo $this->plugin_name; ?>-address_institution" name="<?php echo $this->plugin_name; ?>[address_institution]" value="<?php echo $address_institution ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td>Address</td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo $this->plugin_name; ?>-address_1" name="<?php echo $this->plugin_name; ?>[address_1]" value="<?php echo $address_1 ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td>City</td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo $this->plugin_name; ?>-address_city" name="<?php echo $this->plugin_name; ?>[address_city]" value="<?php echo $address_city ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td>State</td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo $this->plugin_name; ?>-address_state" name="<?php echo $this->plugin_name; ?>[address_state]" value="<?php echo $address_state ?>" maxlength="2" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td>Zip</td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo $this->plugin_name; ?>-address_zipcode" name="<?php echo $this->plugin_name; ?>[address_zipcode]" value="<?php echo $address_zipcode ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td>Country</td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo $this->plugin_name; ?>-address_country" name="<?php echo $this->plugin_name; ?>[address_country]" value="<?php echo $address_country ?>" maxlength="2" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td>Phone</td>
        <td>
          <fieldset>
            <input type="text" id="<?php echo $this->plugin_name; ?>-address_phone" name="<?php echo $this->plugin_name; ?>[address_phone]" value="<?php echo $address_phone ?>" />
          </fieldset>
        </td>
      </tr>
      <tr class="autopop-address">
        <td colspan="2"><hr /></td>
      </tr>
    </table>

    <table class="admin_section florist_selection_section">
      <tr>
        <td colspan="2"><h3>Florist Selection</h3></td>
      </tr>
      <tr>
        <td colspan="2">
          <fieldset>
            <input type="radio" id="<?php echo $this->plugin_name; ?>-florist_selection" name="<?php echo $this->plugin_name; ?>[florist_selection]" value="0" <?php checked( $florist_selection, 0 ); ?>> Let Florist One choose the florists  <input type="radio" id ="<?php echo $this->plugin_name; ?>-florist_selection-1" name="<?php echo $this->plugin_name; ?>[florist_selection]" value="1" <?php checked( $florist_selection, 1 ); ?>> I want to make florist selections
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr class="florist-selection-row">
        <td colspan="2">
          <input type="hidden" id="<?php echo $this->plugin_name; ?>-facility_id" class="<?php echo $this->plugin_name; ?>-facility_id" name="<?php echo $this->plugin_name; ?>[facility_id]" value="<?php echo $facility_id; ?>">
        </td>
      </tr>
      <tr class="florist-selection-row_" style="display: none;">
        <td>First Choice / Rotation</td>
        <td>
          <fieldset>
            <input type="radio" id="<?php echo $this->plugin_name; ?>-rotation" name="<?php echo $this->plugin_name; ?>[rotation]" value="0" <?php checked( $rotation, 0 ); ?>> First Choice  <input type="radio" id ="<?php echo $this->plugin_name; ?>-rotation-1" name="<?php echo $this->plugin_name; ?>[rotation]" value="1" <?php checked( $rotation, 1 ); ?>> Rotation
          </fieldset>
        </td>
      </tr>
      <tr class="florist-selection-row">
        <td colspan="2">
          <h4>Your Florists</h4>
        </td>
      </tr>
      <tr class="florist-selection-row">
        <td colspan="2">
          <div class="your_florists"></div>
          <input type="hidden" id="<?php echo $this->plugin_name; ?>-florists_of_choice" class="<?php echo $this->plugin_name; ?>-florists_of_choice" name="<?php echo $this->plugin_name; ?>[florists_of_choice]" value='<?php echo json_encode($florists_of_choice); ?>' />
        </td>
      <tr class="florist-selection-row">
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr class="<?php echo $this->plugin_name; ?>-show_add_another_florist_row florist-selection-row">
        <td colspan="2">
          <select id="new_florist_code" class="new_florist_code"></select>
          <button id="<?php echo $this->plugin_name; ?>-add_another_florist_btn" class="<?php echo $this->plugin_name; ?>-add_another_florist_btn">Add</button>
          <button id="<?php echo $this->plugin_name; ?>-cancel_add_another_florist_btn" class="<?php echo $this->plugin_name; ?>-cancel_add_another_florist_btn">Cancel</button>
        </td>
      </tr>
      <tr class="florist-selection-row">
        <td colspan="2">
          <button id="<?php echo $this->plugin_name; ?>-show_add_another_florist_btn" class="<?php echo $this->plugin_name; ?>-show_add_another_florist_btn">Add A New Florist</button>
        </td>
      </tr>
      <tr class="florist-selection-row">
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>

    <table class="admin_section">
      <tr class="autopop-address">
        <td colspan="2"><hr /></td>
      </tr>
      <tr>
        <td colspan="2"><h3>Colors</h3></td>
      </tr>
      <tr>
        <td colspan="2"><h4>Navigation</h4></td>
      </tr>
      <tr>
        <td>Color 1</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <label for="<?php echo $this->plugin_name;?>-navigation_color">
              <!-- <span class="florist-one-delivery-admin-config-label"><?php esc_attr_e('Background', $this->plugin_name);?></span> -->
              <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-navigation_color" name="<?php echo $this->plugin_name;?>[navigation_color]" value="<?php echo $navigation_color;?>" />
            </label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td>Color 2</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <label for="<?php echo $this->plugin_name;?>-navigation_hover_color">
              <!-- <span class="florist-one-delivery-admin-config-label"><?php esc_attr_e('Background', $this->plugin_name);?></span> -->
              <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-navigation_hover_color" name="<?php echo $this->plugin_name;?>[navigation_hover_color]" value="<?php echo $navigation_hover_color;?>" />
            </label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td>Text Color</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <label for="<?php echo $this->plugin_name;?>-navigation_text_color">
              <!-- <span class="florist-one-delivery-admin-config-label"><?php esc_attr_e('Text', $this->plugin_name);?></span> -->
              <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-navigation_text_color" name="<?php echo $this->plugin_name;?>[navigation_text_color]" value="<?php echo $navigation_text_color;?>" />
            </label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td>Hover Text Color</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <label for="<?php echo $this->plugin_name;?>-navigation_hover_text_color">
              <!-- <span class="florist-one-delivery-admin-config-label"><?php esc_attr_e('Text', $this->plugin_name);?></span> -->
              <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-navigation_hover_text_color" name="<?php echo $this->plugin_name;?>[navigation_hover_text_color]" value="<?php echo $navigation_hover_text_color;?>" />
            </label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="2"><h4>Buttons</h4></td>
      </tr>
      <tr>
        <td>Color 1</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <label for="<?php echo $this->plugin_name;?>-button_color">
              <!-- <span class="florist-one-delivery-admin-config-label"><?php esc_attr_e('Background', $this->plugin_name);?></span> -->
              <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-button_color" name="<?php echo $this->plugin_name;?>[button_color]" value="<?php echo $button_color;?>" />
            </label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td>Color 2</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <label for="<?php echo $this->plugin_name;?>-button_hover_color">
              <!-- <span class="florist-one-delivery-admin-config-label"><?php esc_attr_e('Background', $this->plugin_name);?></span> -->
              <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-button_hover_color" name="<?php echo $this->plugin_name;?>[button_hover_color]" value="<?php echo $button_hover_color;?>" />
            </label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td>Text Color</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <label for="<?php echo $this->plugin_name;?>-button_text_color">
              <!-- <span class="florist-one-delivery-admin-config-label"><?php esc_attr_e('Text', $this->plugin_name);?></span> -->
              <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-button_text_color" name="<?php echo $this->plugin_name;?>[button_text_color]" value="<?php echo $button_text_color;?>" />
            </label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td>Hover Text Color</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <label for="<?php echo $this->plugin_name;?>-button_hover_text_color">
              <!-- <span class="florist-one-delivery-admin-config-label"><?php esc_attr_e('Text', $this->plugin_name);?></span> -->
              <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-button_hover_text_color" name="<?php echo $this->plugin_name;?>[button_hover_text_color]" value="<?php echo $button_hover_text_color;?>" />
            </label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="2"><h4>Other Color Options</h4></td>
      </tr>
      <tr>
        <td>Link Color</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-link_color" name="<?php echo $this->plugin_name;?>[link_color]" value="<?php echo $link_color;?>" />
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr>
        <td>Heading Color</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-heading_color" name="<?php echo $this->plugin_name;?>[heading_color]" value="<?php echo $heading_color;?>" />
          </fieldset>
        </td>
        <td></td>
      </tr>
      <tr>
        <td>Text Color</td>
        <td>
          <fieldset class="<?php echo $this->plugin_name;?>-admin-colors">
            <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-text_color" name="<?php echo $this->plugin_name;?>[text_color]" value="<?php echo $text_color;?>" />
          </fieldset>
        </td>
        <td></td>
      </tr>
    </table>

    <input type="hidden" id="<?php echo $this->plugin_name; ?>-flower_storefront_id" name="<?php echo $this->plugin_name; ?>[flower_storefront_id]" value="<?php echo $flower_storefront_id;?>" />

<?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

</form>
