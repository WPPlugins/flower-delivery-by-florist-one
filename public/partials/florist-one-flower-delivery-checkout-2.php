<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<h3>Deliver To</h3>

<?php
  $config_options = get_option('florist-one-flower-delivery');
  if ($config_options['products'] == 0){
    $autopop = 0;
  }
  else{
    $autopop = 1;
  }
?>

<form class="checkout-form">

  <table class="florist-one-flower-delivery-review-order full">
    <tr>
      <td><h5>Name*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-recipient-name" id="florist-one-flower-delivery-recipient-name" name="florist-one-flower-delivery-recipient-name" value="<?php echo $_SESSION["florist-one-flower-delivery-recipient-name"] ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Please enter the full name of the person to whom the flowers are to be delivered or the name of the deceased for funeral home orders.</td>
    </tr>
    <tr>
      <td><h5>Institution</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-recipient-institution" id="florist-one-flower-delivery-recipient-institution" name="florist-one-flower-delivery-recipient-institution" value="<?php if (empty($_SESSION["florist-one-flower-delivery-recipient-institution"]) && $autopop == 1){ echo $config_options['address_institution']; } else { echo $_SESSION["florist-one-flower-delivery-recipient-address-institution"]; } ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Please enter the name of the business, hospital, funeral home or institution if delivery is to be made to a non-residential address. If delivery is to a residence, leave blank.</td>
    </tr>
    <tr>
      <td><h5>Address*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-recipient-address-1" id="florist-one-flower-delivery-recipient-address-1" name="florist-one-flower-delivery-recipient-address-1" value="<?php if (empty($_SESSION["florist-one-flower-delivery-recipient-address-1"]) && $autopop == 1){ echo $config_options['address_1']; } else { echo $_SESSION["florist-one-flower-delivery-recipient-address-1"]; } ?>"></td>
    </tr>
    <tr>
      <td><h5>Address 2</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-recipient-address-2" id="florist-one-flower-delivery-recipient-address-2" name="florist-one-flower-delivery-recipient-address-2" value="<?php echo $_SESSION["florist-one-flower-delivery-recipient-address-2"] ?>"></td>
    </tr>
    <tr>
      <td><h5>City*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-recipient-city" id="florist-one-flower-delivery-recipient-city" name="florist-one-flower-delivery-recipient-city" value="<?php if (empty($_SESSION["florist-one-flower-delivery-recipient-city"]) && $autopop == 1){ echo $config_options['address_city']; } else { echo $_SESSION["florist-one-flower-delivery-recipient-city"]; } ?>"></td>
    </tr>
    <tr>
      <td><h5>State*</h5></td>
      <td>
        <select class="florist-one-flower-delivery-recipient-state full" id="florist-one-flower-delivery-recipient-state" name="florist-one-flower-delivery-recipient-state">
          <?php include 'recipient-state-list.php' ?>
        </select>
      </td>
    </tr>
    <tr>
      <td><h5>Country*</h5></td>
      <td>
        <select class="florist-one-flower-delivery-recipient-country full" id="florist-one-flower-delivery-recipient-country" name="florist-one-flower-delivery-recipient-country">
          <option value='US' <?php if (empty($_SESSION["florist-one-flower-delivery-recipient-country"]) && $autopop == 1){ echo ($config_options['address_country']=='US'? 'selected="selected"' : '' ); } else { echo ($_SESSION['florist-one-flower-delivery-recipient-country']=='US'? 'selected="selected"' : '' ); } ?>>United States</option>
        <option value='CA' <?php if (empty($_SESSION["florist-one-flower-delivery-recipient-country"]) && $autopop == 1){ echo ($config_options['address_country']=='CA'? 'selected="selected"' : '' ); } else { echo ($_SESSION['florist-one-flower-delivery-recipient-country']=='CA'? 'selected="selected"' : '' ); } ?>>Canada</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><h5>Zip Code / Postal Code*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-recipient-postal-code" id="florist-one-flower-delivery-recipient-postal-code" name="florist-one-flower-delivery-recipient-postal-code" value="<?php if (empty($_SESSION["florist-one-flower-delivery-recipient-postal-code"]) && $autopop == 1){ echo $config_options['address_zipcode']; } else { echo $_SESSION["florist-one-flower-delivery-recipient-postal-code"]; } ?>"></td>
    </tr>
    <tr>
      <td><h5>Phone</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-recipient-phone" id="florist-one-flower-delivery-recipient-phone" name="florist-one-flower-delivery-recipient-phone" value="<?php if (empty($_SESSION["florist-one-flower-delivery-recipient-phone"]) && $autopop == 1){ echo $config_options['address_phone']; } else { echo $_SESSION["florist-one-flower-delivery-recipient-phone"]; } ?>"></td>
    </tr>
  </table>

  <input type="hidden" class="florist-one-flower-delivery-checkout-page" value="3">

  <a href="#" class="florist-one-flower-delivery-checkout-continue-checkout large-button">Continue Checkout</a>

</form>
