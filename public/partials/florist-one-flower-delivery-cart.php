<?php

/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<h3>Shopping Cart</h3>

<?php

  $config_options = get_option('florist-one-flower-delivery');

  if (count($products_for_display) == 0){
    echo '<p>Your shopping cart is empty</p>';
  }
  else {
    include 'florist-one-flower-delivery-cart-body.php';
    if ($config_options['affiliate_id'] != 0){
      echo '<a href="#" class="florist-one-flower-delivery-checkout large-button" data-page="1">Checkout</a>';
    }
    else{
      echo '<a href="#" class="florist-one-flower-delivery-checkout large-button" data-page="6">Checkout</a>';
    }
  }

?>
