<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<h3>Bill To</h3>

<form class="checkout-form">

  <table class="florist-one-flower-delivery-review-order full">
    <tr>
      <td><h5>Name*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-customer-name" id="florist-one-flower-delivery-customer-name" name="florist-one-flower-delivery-customer-name" value="<?php echo $_SESSION["florist-one-flower-delivery-customer-name"] ?>"></td>
    </tr>
    <tr>
      <td><h5>Address*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-customer-address-1" id="florist-one-flower-delivery-customer-address-1" name="florist-one-flower-delivery-customer-address-1" value="<?php echo $_SESSION["florist-one-flower-delivery-customer-address-1"] ?>"></td>
    </tr>
    <tr>
      <td><h5>Address 2</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-customer-address-2" id="florist-one-flower-delivery-customer-address-2" name="florist-one-flower-delivery-customer-address-2" value="<?php echo $_SESSION["florist-one-flower-delivery-customer-address-2"] ?>"></td>
    </tr>
    <tr>
      <td><h5>City*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-customer-city" id="florist-one-flower-delivery-customer-city" name="florist-one-flower-delivery-customer-city" value="<?php echo $_SESSION["florist-one-flower-delivery-customer-city"] ?>"></td>
    </tr>
    <tr>
      <td><h5>State</h5></td>
      <td>
        <select class="florist-one-flower-delivery-customer-state full" id="florist-one-flower-delivery-customer-state" name="florist-one-flower-delivery-customer-state">
          <?php include 'customer-state-list.php' ?>
        </select>
      </td>
    </tr>
    <tr>
      <td><h5>Country*</h5></td>
      <td>
        <select class="florist-one-flower-delivery-customer-country full" id="florist-one-flower-delivery-customer-country" name="florist-one-flower-delivery-customer-country">
          <option value='US' <?php echo ($_SESSION['florist-one-flower-delivery-customer-country']=='US'? 'selected="selected"' : '' ) ?>>United States</option>
          <option value='CA' <?php echo ($_SESSION['florist-one-flower-delivery-customer-country']=='CA'? 'selected="selected"' : '' ) ?>>Canada</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><h5>Zip Code / Postal Code*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-customer-postal-code" id="florist-one-flower-delivery-customer-postal-code" name="florist-one-flower-delivery-customer-postal-code" value="<?php echo $_SESSION["florist-one-flower-delivery-customer-postal-code"] ?>"></td>
    </tr>
    <tr>
      <td><h5>Phone*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-customer-phone" id="florist-one-flower-delivery-customer-phone" name="florist-one-flower-delivery-customer-phone" value="<?php echo $_SESSION["florist-one-flower-delivery-customer-phone"] ?>"></td>
    </tr>
    <tr>
      <td><h5>Email Address*</h5></td>
      <td><input type="text" class="florist-one-flower-delivery-customer-email" id="florist-one-flower-delivery-customer-email" name="florist-one-flower-delivery-customer-email" value="<?php echo $_SESSION["florist-one-flower-delivery-customer-email"] ?>"></td>
    </tr>
    <?php
    if ( (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){
      include 'florist-one-flower-delivery-checkout-credit-card-section.php';
    }
    ?>
  </table>

  <input type="hidden" class="florist-one-flower-delivery-checkout-page" value="4">

  <a href="#" class="florist-one-flower-delivery-checkout-continue-checkout large-button">Continue Checkout</a>

</form>
