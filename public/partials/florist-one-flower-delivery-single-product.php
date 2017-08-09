<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>


<h3 class="florist-one-flower-delivery-single-product-name-high"><?php echo $api_response_body[PRODUCTS][0][NAME] ?></h3>

<div class="florist-one-flower-delivery-single-product">
  <p class="center"><img src=" <?php echo $api_response_body[PRODUCTS][0][LARGE] ?>" /></p>
</div>

<div class="florist-one-flower-delivery-single-product">
  <p class="center"><a href="#" class="florist-one-flower-delivery-add-to-cart florist-one-flower-delivery-button center" id="florist-one-flower-delivery-add-to-cart-<?php echo $api_response_body[PRODUCTS][0][CODE] ?>-1" data-code="<?php echo $api_response_body[PRODUCTS][0][CODE] ?>">Add To Cart</a></p>
  <p>&nbsp;</p>
  <h3 class="florist-one-flower-delivery-single-product-name-low"><?php echo $api_response_body[PRODUCTS][0][NAME] ?></h3>
  <p class="florist-one-flower-delivery-single-product-description"><?php echo $api_response_body[PRODUCTS][0][DESCRIPTION] ?></p>
  <p class="florist-one-flower-delivery-single-product-price">$<?php echo $api_response_body[PRODUCTS][0][PRICE] ?></p>
  <p>&nbsp;</p>
  <p class="center"><a href="#" class="florist-one-flower-delivery-add-to-cart florist-one-flower-delivery-button center" id="florist-one-flower-delivery-add-to-cart-<?php echo $api_response_body[PRODUCTS][0][CODE] ?>-2" data-code="<?php echo $api_response_body[PRODUCTS][0][CODE] ?>">Add To Cart</a></p>
</div>
