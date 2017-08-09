<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<table class="florist-one-flower-delivery-table product-heading-paging-table">
  <tr>
    <td align="left" class="left">
      <h3 class="florist-one-flower-delivery-many-products-category">
        <?php
          switch($category){
            case 'fa':
              echo 'Table Arrangements';
              break;
            case 'fb':
              echo 'Baskets';
              break;
            case 'fs':
              echo 'Sprays';
              break;
            case 'fp':
              echo 'Plants';
              break;
            case 'fl':
              echo 'Inside Casket';
              break;
            case 'fw':
              echo 'Wreaths';
              break;
            case 'fh':
              echo 'Hearts';
              break;
            case 'fx':
              echo 'Crosses';
              break;
            case 'fc':
              echo 'Casket Sprays';
              break;
            case 'ao':
              echo 'Everyday Arrangements';
              break;
            case 'gw':
              echo 'Get Well';
              break;
            case 'nb':
              echo 'New Baby';
              break;
            case 'bd':
              echo 'Birthday';
              break;
            case 'ty':
              echo 'Thank You';
              break;
            case 'lr':
              echo 'Love &amp; Romance';
              break;
            case 'an':
              echo 'Anniversary';
              break;
            case 'sy':
              echo 'Funeral & Sympathy';
              break;
            case 'v':
              echo 'Vase Arrangements';
              break;
            case 'p':
              echo 'Plants';
              break;
            case 'b':
              echo 'Balloons';
              break;
            case 'r':
              echo 'Roses';
              break;
            case 'c':
              echo 'Centerpieces';
              break;
            case 'o':
              echo 'One Sided Arrangements';
              break;
            case 'x':
              echo 'Fruit Baskets';
              break;
            case 'u60':
              echo 'Under $60';
              break;
            case 'bt60-80':
              echo '$60 - $80';
              break;
            case 'bt80-100':
              echo '$80 - $100';
              break;
            case 'o100':
              echo 'Over $100';
              break;
            case 'cm':
              echo 'Christmas';
              break;
            case 'ea':
              echo 'Easter';
              break;
            case 'md':
              echo 'Mother\'s Day';
              break;
            case 'tg':
              echo 'Thanksgiving';
              break;
            case 'vd':
              echo 'Valentine\'s Day';
              break;
          }
        ?>
      </h3>
    </td>
    <td align="right" class="right">
      <?php
        //paging
        $config_options = get_option('florist-one-flower-delivery');
        $total_products = $api_response_body[TOTAL];
        $pages = ceil($api_response_body[TOTAL] / $config_options['products_per_page']);
        $pages_shown = 0;
        $start_at = 1;
        $end_at = $start_at + 9;
        if ($pages > 9 && $page >= 5 && $page <= $pages - 4){
          $start_at = $page - 4;
          $end_at = $start_at + 9;
        }
        else if ($pages > 9 && $page >= 5){
          $start_at = $page - (8 - ($pages - $page));
          $end_at = $start_at + 9;
        }
        else if ($pages <= 9){
          $start_at = 1;
          $end_at = $pages;
        }
        if ($page!= 1){ $prev_page = $page - 1; echo '<a href="#" class="florist-one-flower-delivery-menu-link" id="florist-one-flower-delivery-menu-link-prev-' . $prev_page . '" data-page="' . $prev_page . '" data-category="' . $category . '">Previous</a> | '; }
        for($i=$start_at;$i<=$end_at;$i++){
          if ($i != 1){ echo ' '; }
          if ($page == $i){
            echo $i;
          }
          else if ($pages_shown < 9){
            echo '<a href="#" class="florist-one-flower-delivery-menu-link" id="florist-one-flower-delivery-menu-link' . $i . '" data-page="' . $i . '" data-category="' . $category . '">' . $i . '</a>';
          }
          if ($i != $pages && $pages_shown < 8) {
            echo ' | ';
          }
          $pages_shown++;
        }
        if ($page <= $pages && $page != $pages){ $next_page = $page + 1; echo ' | <a href="#" class="florist-one-flower-delivery-menu-link" id="florist-one-flower-delivery-menu-link-next-' . $next_page . '" data-page="' . $next_page . '" data-category="' . $category . '">Next</a>'; }
      ?>
    </td>
  </tr>
</table>

</div>

<?php

  $htmlString = '';

  for($i=0;$i<count($api_response_body[PRODUCTS]);$i++){
    $htmlString = $htmlString.'<div class="florist-one-flower-delivery-many-products-single-product">';
    $htmlString = $htmlString.'<a href="#" id="'.$api_response_body[PRODUCTS][$i][CODE].'-1" class="florist-one-flower-delivery-many-products-single-product" data-code="'.$api_response_body[PRODUCTS][$i][CODE].'">';
    $htmlString = $htmlString.'<div class="florist-one-flower-delivery-many-products-single-product-image"><img src="'.$api_response_body[PRODUCTS][$i][SMALL].'" /></div>';
    $htmlString = $htmlString.'</a>';
    $htmlString = $htmlString.'<div class="florist-one-flower-delivery-many-products-single-product-name"><span>'.$api_response_body[PRODUCTS][$i][NAME].'</span></div>';
    $htmlString = $htmlString.'<div class="florist-one-flower-delivery-many-products-single-product-price">$'.$api_response_body[PRODUCTS][$i][PRICE].'</div>';
    $htmlString = $htmlString.'<div>';
    $htmlString = $htmlString.'<table class="florist-one-flower-delivery-table florist-one-flower-delivery-table-center"><tr>';
    $htmlString = $htmlString.'<td class="center"><a href="#" id="'.$api_response_body[PRODUCTS][$i][CODE].'-2" class="florist-one-flower-delivery-many-products-single-product florist-one-flower-delivery-button center" data-code="'.$api_response_body[PRODUCTS][$i][CODE].'">View Item</a></td>';
    $htmlString = $htmlString.'<td class="center"><a href="#" class="florist-one-flower-delivery-add-to-cart florist-one-flower-delivery-button center" id="florist-one-flower-delivery-add-to-cart-'.$api_response_body[PRODUCTS][$i][CODE].'" data-code="'.$api_response_body[PRODUCTS][$i][CODE].'">Add To Cart</a></td>';
    $htmlString = $htmlString.'</tr></table>';
    $htmlString = $htmlString.'</div>';
    $htmlString = $htmlString.'</div>';
    $htmlString = $htmlString.'</div>';
  }

  echo $htmlString;

?>
