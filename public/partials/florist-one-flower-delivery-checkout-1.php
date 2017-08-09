<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<h3>Delivery Information</h3>

<h5>Orders placed now can be delivered on:</h5>

<form class="checkout-form">

  <select class="florist-one-flower-delivery-delivery-date full" id="florist-one-flower-delivery-delivery-date" name="florist-one-flower-delivery-delivery-date">
    <?php
      for($i=0;$i<count($delivery_dates[DATES]);$i++){
        if ($delivery_dates[DATES][$i] == $_SESSION["florist-one-flower-delivery-delivery-date"]){
          echo '<option value="'.$delivery_dates[DATES][$i].'" selected="selected">'.$delivery_dates[DATES][$i].' - '.date("l", mktime(0, 0, 0, substr($delivery_dates[DATES][$i],0,2), substr($delivery_dates[DATES][$i],3,2), substr($delivery_dates[DATES][$i],6,4))) .'</option>';
        }
        else{
          echo '<option value="'.$delivery_dates[DATES][$i].'">'.$delivery_dates[DATES][$i].' - '.date("l", mktime(0, 0, 0, substr($delivery_dates[DATES][$i],0,2), substr($delivery_dates[DATES][$i],3,2), substr($delivery_dates[DATES][$i],6,4))) .'</option>';
        }
      }
    ?>
  </select>

  <p>&nbsp;</p>

  <h5>Gift Card Message (200 characters max)*</h5>

  <textarea class="florist-one-flower-delivery-card-message" id="florist-one-flower-delivery-card-message" name="florist-one-flower-delivery-card-message"><?php echo $_SESSION["florist-one-flower-delivery-card-message"] ?></textarea>

  <p>Please remember to include who the flowers are from in your message.</p>

  <h5>Optional: Special Delivery Instructions (100 characters max)</h5>

  <textarea class="florist-one-flower-delivery-special-instructions" id="florist-one-flower-delivery-special-instructions" name="florist-one-flower-delivery-special-instructions"><?php echo $_SESSION["florist-one-flower-delivery-special-instructions"] ?></textarea>

  <p>Please enter any information that would help us in the delivery of your order.</p>

  <input type="hidden" class="florist-one-flower-delivery-checkout-page" value="2">

  <a href="#" class="florist-one-flower-delivery-checkout-continue-checkout large-button">Continue Checkout</a>

</form>
