<table class="florist-one-flower-delivery-table full"<?php if (count($products_for_display) == 0){ echo ' style="display: none;"'; }?>>
  <?php
    if (isset($dont_show_remove_button)){
      echo '<tr><td colspan="4"><h5>Shopping Cart</h5></td></tr>';
    }
  ?>
  <tr>
    <td class="left">Item</td>
    <td class="left">Name</td>
    <td class="right">Price</td>
    <td class="left"></td>
  </tr>
<?php
  for($i=0;$i<count($products_for_display);$i++){
    echo '<tr>';
    echo '<td class="left"><a href="#" id="'.$api_response_body[PRODUCTS][$i][CODE].'" class="florist-one-flower-delivery-many-products-single-product" data-code="'.$products_for_display[$i][CODE].'">'.$products_for_display[$i][CODE].'</a></td>';
    echo '<td class="left"><a href="#" id="'.$api_response_body[PRODUCTS][$i][CODE].'" class="florist-one-flower-delivery-many-products-single-product" data-code="'.$products_for_display[$i][CODE].'">'.$products_for_display[$i][NAME].'</a></td>';
    echo '<td class="right">$'.$products_for_display[$i][PRICE].'</td>';
    if (!isset($dont_show_remove_button)){
      echo '<td class="right"><a href="#" class="florist-one-flower-delivery-cart-remove-item florist-one-flower-delivery-button" id="florist-one-flower-delivery-cart-remove-item-'.$products_for_display[$i][CODE].'" data-code="'.$products_for_display[$i][CODE].'">Remove</a></td>';
    }
    else{
      echo '<td></td>';
    }
    echo '</tr>';
  }
?>
</table>

<table class="florist-one-flower-delivery-table full"<?php if (count($products_for_display) == 0){ echo ' style="display: none;"'; }?>>
  <tr>
    <td class="right">Subtotal</td>
    <td class="right">$<?php echo number_format($get_total_response_body[SUBTOTAL], 2) ?></td>
  </tr>
  <tr>
    <td class="right">Service Charge</td>
    <td class="right">$<?php echo number_format($get_total_response_body[FLORISTONESERVICECHARGE], 2) ?></td>
  </tr>
  <tr>
    <td class="right">Sales Tax</td>
    <td class="right">$<?php echo  number_format($get_total_response_body[TAXTOTAL], 2) ?></td>
  </tr>
  <tr>
    <td class="right">Total</td>
    <td class="right">$<?php echo  number_format($get_total_response_body[ORDERTOTAL], 2) ?></td>
  </tr>
</table>
