<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<p class="florist-one-flower-delivery-review-error-message" style="display: none; color: red; text-align: center;">Please correct the fields in red below and then click on 'Process Order'.</p>

<h3>Review Your Order</h3>

<?php $dont_show_remove_button=1 ?>

<table class="florist-one-flower-delivery-review-order half">
  <tr>
    <td><h5>Deliver To</h5></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-recipient-name"><?php echo $_SESSION['florist-one-flower-delivery-recipient-name'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-recipient-institution"><?php echo $_SESSION['florist-one-flower-delivery-recipient-institution'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-recipient-address-1"><?php echo $_SESSION['florist-one-flower-delivery-recipient-address-1'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-recipient-address-2"><?php echo $_SESSION['florist-one-flower-delivery-recipient-address-2'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-recipient-city"><?php echo $_SESSION['florist-one-flower-delivery-recipient-city'] ?>, <?php echo $_SESSION['florist-one-flower-delivery-recipient-state'] ?> <?php echo $_SESSION['florist-one-flower-delivery-recipient-postal-code'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-recipient-phone"><?php echo $_SESSION['florist-one-flower-delivery-recipient-phone'] ?></td>
  </tr>
  <tr>
    <td>
      <a href="#" id="florist-one-flower-delivery-checkout-page-edit-2" class="florist-one-flower-delivery-checkout-page-edit" data-page="2">Edit</a>
    </td>
  </tr>
</table>

<table class="florist-one-flower-delivery-review-order half">
  <tr>
    <td><h5>Bill To</h5></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-customer-name"><?php echo $_SESSION['florist-one-flower-delivery-customer-name'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-customer-address-1"><?php echo $_SESSION['florist-one-flower-delivery-customer-address-1'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-customer-address-2"><?php echo $_SESSION['florist-one-flower-delivery-customer-address-2'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-customer-city"><?php echo $_SESSION['florist-one-flower-delivery-customer-city'] ?>, <?php echo $_SESSION['florist-one-flower-delivery-customer-state'] ?> <?php echo $_SESSION['florist-one-flower-delivery-customer-postal-code'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-customer-phone"><?php echo $_SESSION['florist-one-flower-delivery-customer-phone'] ?></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-customer-email"><?php echo $_SESSION['florist-one-flower-delivery-customer-email'] ?></td>
  </tr>
  <?php
    if ( (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){
      echo '<tr>' . '<td><span class="florist-one-flower-delivery-review-credit-card-card-number florist-one-flower-delivery-review-credit-card">' . ( $_SESSION['florist-one-flower-delivery-billing-credit-card'] == 'AX' ? '**** ******* ' : '**** **** **** ' ) . substr($_SESSION['florist-one-flower-delivery-billing-credit-card-no'], -4) . '</span> <span class="florist-one-flower-delivery-review-credit-card-expiration florist-one-flower-delivery-review-credit-card">' . $_SESSION['florist-one-flower-delivery-billing-exp-month'] . '/' . $_SESSION['florist-one-flower-delivery-billing-exp-year'] . '</span></td>' . '</tr>';
    }
  ?>
  <tr>
    <td>
      <a href="#" id="florist-one-flower-delivery-checkout-page-edit-3" class="florist-one-flower-delivery-checkout-page-edit" data-page="3">Edit</a>
    </td>
  </tr>
</table>

<table class="florist-one-flower-delivery-review-order full">
  <tr>
    <td><h5>Gift Card Message</h5></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-card-message"><?php echo $_SESSION['florist-one-flower-delivery-card-message'] ?></td>
  </tr>
  <tr>
    <td>
      <a href="#" id="florist-one-flower-delivery-checkout-page-edit-1" class="florist-one-flower-delivery-checkout-page-edit" data-page="1">Edit</a>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<table class="florist-one-flower-delivery-review-order full">
  <tr>
    <td><h5>Special Instructions</h5></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-special-instructions"><?php echo $_SESSION['florist-one-flower-delivery-special-instructions'] ?></td>
  </tr>
  <tr>
    <td>
      <a href="#" id="florist-one-flower-delivery-checkout-page-edit-1-3" class="florist-one-flower-delivery-checkout-page-edit" data-page="1">Edit</a>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<table class="florist-one-flower-delivery-review-order full">
  <tr>
    <td><h5>Delivery Date</h5></td>
  </tr>
  <tr>
    <td class="florist-one-flower-delivery-review-delivery-date"><?php echo $_SESSION['florist-one-flower-delivery-delivery-date'] ?></td>
  </tr>
  <tr>
    <td>
      <a href="#" id="florist-one-flower-delivery-checkout-page-edit-1-2" class="florist-one-flower-delivery-checkout-page-edit" data-page="1">Edit</a>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<?php
  include 'florist-one-flower-delivery-cart-body.php';
  if(count($products_for_display) > 0){
    if ( ( (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) && ($config_options['affiliate_id'] != 0)){
      //cc processing through f1, needs ssl
      echo '<a href="#" class="florist-one-flower-delivery-checkout-process-order large-button" data-page="5">Process Order</a>';
    }
    else{
      //no ssl, use auth net solution
      $fingerprint = createFingerprint(number_format($get_total_response_body[ORDERTOTAL], 2));

      echo '<form method="POST" id="authnet_form" action="' . $fingerprint["POST_URL"] . '" target="authnet_window" ',((!(isset($fingerprint["errors"]))) ? 'onsubmit="intervalID = window.setInterval(checkWindow, 500); childWindow = window.open(\'about:blank\',\'authnet_window\',\'width=\' + w + \',height=\' + h + \',top=\' + top + \',left=\' + left);"' : '') . '>';

      echo '<input type="hidden" name="x_login" value="' . $fingerprint['LOGIN'] . '" />';
      echo '<input type="hidden" name="x_amount" value="' . $fingerprint['AMOUNT'] . '" />';
      echo '<input type="hidden" name="x_type" value="AUTH_CAPTURE" />';
      echo '<input type="hidden" name="x_show_form" value="PAYMENT_FORM" />';
      echo '<input type="hidden" name="x_fp_sequence" value="' . $fingerprint['ORDERNO'] . '" />';
      echo '<input type="hidden" name="x_fp_timestamp" value="' . $fingerprint['TIMESTAMP'] . '" />';
      echo '<input type="hidden" name="x_fp_hash" value="' . $fingerprint['FINGERPRINT'] . '" />';
      echo '<input type="hidden" name="x_method" value="CC" />';
      echo '<input type="hidden" name="x_relay_response" value="TRUE" />';

      echo '<input type="hidden" name="x_ship_to_last_name" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-recipient-name"]) . '" />';
      echo '<input type="hidden" name="x_rename" value="x_ship_to_last_name,Name">';
      echo '<input type="hidden" name="x_ship_to_company" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-recipient-institution"]) . '" />';
      echo '<input type="hidden" name="x_rename" value="x_ship_to_company,Institution">';
      echo '<input type="hidden" name="x_ship_to_address" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-recipient-address-1"]) . '" />';
      echo '<input type="hidden" name="x_ship_to_city" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-recipient-city"]) . '" />';
      echo '<input type="hidden" name="x_ship_to_state" value="' . $_SESSION["florist-one-flower-delivery-recipient-state"] . '" />';
      echo '<input type="hidden" name="x_ship_to_zip" value="' . $_SESSION["florist-one-flower-delivery-recipient-postal-code"] . '" />';
      echo '<input type="hidden" name="x_ship_to_country" value="' . $_SESSION["florist-one-flower-delivery-recipient-country"] . '" />';
      echo '<input type="hidden" name="x_last_name" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-customer-name"]) . '" />';
      echo '<input type="hidden" name="x_first_name" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-customer-name"]) . '" />';
      echo '<input type="hidden" name="x_address" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-customer-address-1"]) . '" />';
      echo '<input type="hidden" name="x_city" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-customer-city"]) . '" />';
      echo '<input type="hidden" name="x_state" value="' . $_SESSION["florist-one-flower-delivery-customer-state"] . '" />';
      echo '<input type="hidden" name="x_zip" value="' . $_SESSION["florist-one-flower-delivery-customer-postal-code"] . '" />';
      echo '<input type="hidden" name="x_country" value="' . $_SESSION["florist-one-flower-delivery-customer-country"] . '" />';
      echo '<input type="hidden" name="x_email" value="' . $_SESSION["florist-one-flower-delivery-customer-email"] . '" />';
      echo '<input type="hidden" name="x_email_customer" value="FALSE" />';
      echo '<input type="hidden" name="x_phone" value="' . $_SESSION["florist-one-flower-delivery-customer-phone"] . '" />';
      echo '<input type="hidden" name="x_invoice_num" value="' . $fingerprint['ORDERNO'] . '" />';
      echo '<input type="hidden" name="x_relay_response" value="TRUE" />';
      echo '<input type="hidden" name="x_relay_always" value="TRUE" />';
      echo '<input type="hidden" name="x_relay_url" value="' . $fingerprint['RELAY_URL'] . '" />';

      // User Fields
      echo '<input type="hidden" name="x_delivery_date" value="' . $_SESSION["florist-one-flower-delivery-delivery-date"] . '" />';
      echo '<input type="hidden" name="x_special_instructions" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-special-instructions"]) . '" />';
      echo '<input type="hidden" name="x_enclosure_card" value="' . htmlspecialchars($_SESSION["florist-one-flower-delivery-card-message"]) . '" />';
      echo "<input type='hidden' name='x_products' value='" . json_encode($products) . "'>";
      echo '<input type="hidden" name="x_api_key" value="' . USERNAME . '">';
      echo '<input type="hidden" name="x_affiliate_id" value="' . $config_options["affiliate_id"] . '">';
      echo '<input type="hidden" name="x_storefront_id" value="' . $config_options["flower_storefront_id"] . '">';
      echo '<input type="hidden" name="x_facility_id" value="' . $config_options["facility_id"] . '">';
      echo '<input type="hidden" name="x_recipient_phone" value="' . $_SESSION["florist-one-flower-delivery-recipient-phone"] . '" />';

      echo '<input type="hidden" class="child_window_closed" value="' . $fingerprint['ORDERNO'] . '">';

      echo '<input type="hidden" class="errors" value="' . ((isset($fingerprint['errors'])) ? json_encode($fingerprint['errors']) : "") . '">';

      echo '<input type="submit" class="large-button" value="Continue To Payment Gateway" />';

      echo '</form>';

    }
  }
  else{
    echo '<table><tr><td><h5>Shopping Cart</h5></td></tr><tr><td>Your shopping cart is empty.</td></tr></table>';
  }
?>




  <?php if (!(isset($fingerprint["errors"]))) : ?>
    <script>
      var w = 800;
      var h = 800;

      var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
      var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

      var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
      var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

      var left = ((width / 2) - (w / 2)) + dualScreenLeft;
      var top = ((height / 2) - (h / 2)) + dualScreenTop;

      function checkWindow() {
          if (childWindow && childWindow.closed) {
              window.clearInterval(intervalID);
              jQuery(".child_window_closed").trigger("click");
          }
      }

      if (typeof childWindow !== 'undefined'){
        delete childWindow;
      }
    </script>
  <?php else : ?>
    <script>

      var errors = jQuery.parseJSON(jQuery("input.errors").val());

      if (errors.length > 0){
        $(".florist-one-flower-delivery-review-error-message").css("display","block");
      }

      for(i=0;i<errors.length;i++){
        if (errors[i].substr(0, 21) == 'invalid delivery date'){
          jQuery(".florist-one-flower-delivery-review-delivery-date").css("color", "red");
        }
        else if (errors[i].substr(0, 11) == 'cardmessage'){
          jQuery(".florist-one-flower-delivery-review-card-message").css("color", "red");
        }
        else if (errors[i].substr(0, 19) == 'specialinstructions'){
          jQuery(".florist-one-flower-delivery-review-special-instructions").css("color", "red");
        }
        else if (errors[i].substr(0, 14) == 'recipient name'){
          jQuery(".florist-one-flower-delivery-review-recipient-name").css("color", "red");
        }
        else if (errors[i].substr(0, 21) == 'recipient institution'){
          jQuery(".florist-one-flower-delivery-review-recipient-institution").css("color", "red");
        }
        else if (errors[i].substr(0, 18) == 'recipient address1'){
          jQuery(".florist-one-flower-delivery-review-recipient-address-1").css("color", "red");
        }
        else if (errors[i].substr(0, 18) == 'recipient address2'){
          jQuery(".florist-one-flower-delivery-review-recipient-address-2").css("color", "red");
        }
        else if (errors[i].substr(0, 14) == 'recipient city'){
          jQuery(".florist-one-flower-delivery-review-recipient-city").css("color", "red");
        }
        else if (errors[i].substr(0, 15) == 'recipient state'){
          jQuery(".florist-one-flower-delivery-review-recipient-city").css("color", "red");
        }
        else if (errors[i].substr(0, 17) == 'recipient country'){
          jQuery(".florist-one-flower-delivery-review-recipient-country").css("color", "red");
        }
        else if (errors[i].substr(0, 15) == 'recipient phone'){
          jQuery(".florist-one-flower-delivery-review-recipient-phone").css("color", "red");
        }
        else if (errors[i].substr(0, 17) == 'recipient zipcode'){
          jQuery(".florist-one-flower-delivery-review-recipient-city").css("color", "red");
        }
        else if (errors[i].substr(0, 13) == 'customer name'){
          jQuery(".florist-one-flower-delivery-review-customer-name").css("color", "red");
        }
        else if (errors[i].substr(0, 17) == 'customer address1'){
          jQuery(".florist-one-flower-delivery-review-customer-address-1").css("color", "red");
        }
        else if (errors[i].substr(0, 17) == 'customer address2'){
          jQuery(".florist-one-flower-delivery-review-customer-address-2").css("color", "red");
        }
        else if (errors[i].substr(0, 13) == 'customer city'){
          jQuery(".florist-one-flower-delivery-review-customer-city").css("color", "red");
        }
        else if (errors[i].substr(0, 14) == 'customer state'){
          jQuery(".florist-one-flower-delivery-review-customer-city").css("color", "red");
        }
        else if (errors[i].substr(0, 16) == 'customer country'){
          jQuery(".florist-one-flower-delivery-review-customer-country").css("color", "red");
        }
        else if (errors[i].substr(0, 14) == 'customer phone'){
          jQuery(".florist-one-flower-delivery-review-customer-phone").css("color", "red");
        }
        else if (errors[i].substr(0, 16) == 'customer zipcode'){
          jQuery(".florist-one-flower-delivery-review-customer-city").css("color", "red");
        }
        else if (errors[i].substr(0, 14) == 'customer email'){
          jQuery(".florist-one-flower-delivery-review-customer-email").css("color", "red");
        }
        else{
          alert(errors[i]);
        }
      }

      jQuery("#authnet_form").submit(function( event ) {
          event.preventDefault();
          alert( "Please correct fields marked in red before continuing to payment" );
      });


    </script>
  <?php endif; ?>
