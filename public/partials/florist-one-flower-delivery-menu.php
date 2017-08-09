<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<?php $config_options = get_option('florist-one-flower-delivery'); ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
  .florist-one-flower-delivery{
    color: <?php echo $config_options['text_color'] ?>
  }
  .florist-one-flower-delivery a, .florist-one-flower-delivery a:link, .florist-one-flower-delivery a:hover, .florist-one-flower-delivery a:active, .florist-one-flower-delivery a:visited{
    color: <?php echo $config_options['link_color'] ?>
  }
  ul.florist-one-flower-delivery-menu-desktop-menu,
  div.florist-one-flower-delivery-menu-mobile-menu .slicknav_menu,
  div.florist-one-flower-delivery-menu-cart {
    background: <?php echo $config_options['navigation_color'] ?>;
    background: -moz-linear-gradient(top, <?php echo $config_options['navigation_color'] ?> 0%, <?php echo $config_options['navigation_hover_color'] ?> 40%, <?php echo $config_options['navigation_hover_color'] ?> 60%, <?php echo $config_options['navigation_color'] ?> 100%);
    background: -webkit-linear-gradient(top, <?php echo $config_options['navigation_color'] ?> 0%, <?php echo $config_options['navigation_hover_color'] ?> 40%, <?php echo $config_options['navigation_hover_color'] ?> 60%, <?php echo $config_options['navigation_color'] ?> 100%);
    background: linear-gradient(to bottom, <?php echo $config_options['navigation_color'] ?> 0%, <?php echo $config_options['navigation_hover_color'] ?> 40%, <?php echo $config_options['navigation_hover_color'] ?> 60%, <?php echo $config_options['navigation_color'] ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $config_options['navigation_color'] ?>', endColorstr='<?php echo $config_options['navigation_hover_color'] ?>',GradientType=0 );
    color: <?php echo $config_options['navigation_text_color'] ?>;
    text-decoration: none;
  }
  a.florist-one-flower-delivery-button,
  a.large-button,
  a.large-button:link,
  a.large-button:visited,
  a.large-button:active,
  input.large-button,
  a.florist-one-flower-delivery-button,
  a.florist-one-flower-delivery-button:link,
  a.florist-one-flower-delivery-button:visited,
  a.florist-one-flower-delivery-button:active {
    background: <?php echo $config_options['button_color'] ?>;
    background: -moz-linear-gradient(top,  <?php echo $config_options['button_color'] ?> 0%, <?php echo $config_options['button_hover_color'] ?> 40%, <?php echo $config_options['button_hover_color'] ?> 60%, <?php echo $config_options['button_color'] ?> 100%);
    background: -webkit-linear-gradient(top,  <?php echo $config_options['button_color'] ?> 0%, <?php echo $config_options['button_hover_color'] ?> 40%, <?php echo $config_options['button_hover_color'] ?> 60%, <?php echo $config_options['button_color'] ?> 100%);
    background: linear-gradient(to bottom,  <?php echo $config_options['button_color'] ?> 0%, <?php echo $config_options['button_hover_color'] ?> 40%, <?php echo $config_options['button_hover_color'] ?> 60%, <?php echo $config_options['button_color'] ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $config_options['button_color'] ?>', endColorstr='<?php echo $config_options['button_hover_color'] ?>',GradientType=0 );
    color: <?php echo $config_options['button_text_color'] ?>;
    text-decoration: none;
  }
  ul.florist-one-flower-delivery-menu-desktop-menu a:hover,
  ul.florist-one-flower-delivery-menu-desktop-menu a.active,
  div.florist-one-flower-delivery-menu-mobile-menu .slicknav_menu .slicknav_nav a:hover,
  div.florist-one-flower-delivery-menu-cart:hover {
    background: <?php echo $config_options['navigation_hover_color'] ?>;
    background: -moz-linear-gradient(top, <?php echo $config_options['navigation_hover_color'] ?> 0%, <?php echo $config_options['navigation_color'] ?> 40%, <?php echo $config_options['navigation_color'] ?> 60%, <?php echo $config_options['navigation_hover_color'] ?> 100%);
    background: -webkit-linear-gradient(top, <?php echo $config_options['navigation_hover_color'] ?> 0%, <?php echo $config_options['navigation_color'] ?> 40%, <?php echo $config_options['navigation_color'] ?> 60%, <?php echo $config_options['navigation_hover_color'] ?> 100%);
    background: linear-gradient(to bottom, <?php echo $config_options['navigation_hover_color'] ?> 0%, <?php echo $config_options['navigation_color'] ?> 40%, <?php echo $config_options['navigation_color'] ?> 60%, <?php echo $config_options['navigation_hover_color'] ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $config_options['navigation_hover_color'] ?>', endColorstr='<?php echo $config_options['navigation_color'] ?>',GradientType=0 );
    color: <?php echo $config_options['navigation_hover_text_color'] ?>;
  }
  a.florist-one-flower-delivery-button:hover,
  a.large-button:hover,
  input.large-button:hover,
  a.florist-one-flower-delivery-button:hover  {
    background: <?php echo $config_options['button_hover_color'] ?>;
    background: -moz-linear-gradient(top,  <?php echo $config_options['button_hover_color'] ?> 0%, <?php echo $config_options['button_color'] ?> 40%, <?php echo $config_options['button_color'] ?> 60%, <?php echo $config_options['button_hover_color'] ?> 100%);
    background: -webkit-linear-gradient(top,  <?php echo $config_options['button_hover_color'] ?> 0%, <?php echo $config_options['button_color'] ?> 40%, <?php echo $config_options['button_color'] ?> 60%, <?php echo $config_options['button_hover_color'] ?> 100%);
    background: linear-gradient(to bottom,  <?php echo $config_options['button_hover_color'] ?> 0%, <?php echo $config_options['button_color'] ?> 40%, <?php echo $config_options['button_color'] ?> 60%, <?php echo $config_options['button_hover_color'] ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $config_options['button_hover_color'] ?>', endColorstr='<?php echo $config_options['button_color'] ?>',GradientType=0 );
    color: <?php echo $config_options['button_hover_text_color'] ?>;
    text-decoration: none;
  }
  ul.florist-one-flower-delivery-menu-desktop-menu a:link, ul.florist-one-flower-delivery-menu-desktop-menu a:visited, ul.florist-one-flower-delivery-menu-desktop-menu a:active, div.florist-one-flower-delivery-menu-cart a{
    text-decoration: none;
    color: <?php echo $config_options['navigation_text_color'] ?>;
  }
  ul.florist-one-flower-delivery-menu-desktop-menu a:hover, div.florist-one-flower-delivery-menu-cart a:hover,
  ul.florist-one-flower-delivery-menu-desktop-menu a.active, div.florist-one-flower-delivery-menu-cart a.active{
    text-decoration: none;
    color: <?php echo $config_options['navigation_hover_text_color'] ?>;
  }
  .florist-one-flower-delivery-loading:not(:required):after {
   -webkit-box-shadow: <?php echo $config_options['navigation_color'] ?> 1.5em 0 0 0, <?php echo $config_options['navigation_color'] ?> 1.1em 1.1em 0 0, <?php echo $config_options['navigation_color'] ?> 0 1.5em 0 0, <?php echo $config_options['navigation_color'] ?> -1.1em 1.1em 0 0, <?php echo $config_options['navigation_color'] ?> -1.5em 0 0 0, <?php echo $config_options['navigation_color'] ?> -1.1em -1.1em 0 0, <?php echo $config_options['navigation_color'] ?> 0 -1.5em 0 0, <?php echo $config_options['navigation_color'] ?> 1.1em -1.1em 0 0;
   box-shadow: <?php echo $config_options['navigation_color'] ?> 1.5em 0 0 0, <?php echo $config_options['navigation_color'] ?> 1.1em 1.1em 0 0, <?php echo $config_options['navigation_color'] ?> 0 1.5em 0 0, <?php echo $config_options['navigation_color'] ?> -1.1em 1.1em 0 0, <?php echo $config_options['navigation_color'] ?> -1.5em 0 0 0, <?php echo $config_options['navigation_color'] ?> -1.1em -1.1em 0 0, <?php echo $config_options['navigation_color'] ?> 0 -1.5em 0 0, <?php echo $config_options['navigation_color'] ?> 1.1em -1.1em 0 0;
  }
  .florist-one-flower-delivery h1, .florist-one-flower-delivery h2, .florist-one-flower-delivery h3, .florist-one-flower-delivery h4{
    color: <?php echo $config_options['heading_color'] ?>
  }
</style>

<?php
  if ($config_options['affiliate_id'] == 0){
    echo '<div class="florist-one-flower-delivery-ssl-warning">&#9888; A valid Florist One AffiliateID is required for the Florist One Flower Delivery plugin to work!</div>';
  }
?>

<div class="florist-one-flower-delivery-menu">

  <?php

    $categories = array();

    if ($config_options['products'] == 0){
      // special occasions / holidays added to the list first
      if (($config_options['products_cm'] == 1) && ((date('m') == 12 && date('d') >= 15) || (date('m') == 12 && date('d') <= 26))){
        array_push($categories, array('short' => 'cm', 'long' => 'Christmas'));
      }
      if (($config_options['products_ea'] == 1) && ((date('m') == 03 && date('d') >= 15) || (date('m') == 04 && date('d') <= 30))){
        array_push($categories, array('short' => 'ea', 'long' => 'Easter'));
      }
      if (($config_options['products_md'] == 1) && ((date('m') == 04 && date('d') >= 20) || (date('m') == 05 && date('d') <= 15))){
        array_push($categories, array('short' => 'md', 'long' => 'Mother\'s Day'));
      }
      if (($config_options['products_tg'] == 1) && ((date('m') == 11 && date('d') >= 01) || (date('m') == 11 && date('d') <= 30))){
        array_push($categories, array('short' => 'tg', 'long' => 'Thanksgiving'));
      }
      if (($config_options['products_vd'] == 1) && ((date('m') == 01 && date('d') >= 15) || (date('m') == 02 && date('d') <= 15))){
        array_push($categories, array('short' => 'vd', 'long' => 'Valentine\'s Day'));
      }
      // regular products
      array_push($categories, array('short' => 'ao', 'long' => 'Everyday'));
      array_push($categories, array('short' => 'gw', 'long' => 'Get Well'));
      array_push($categories, array('short' => 'nb', 'long' => 'New Baby'));
      array_push($categories, array('short' => 'ty', 'long' => 'Thank You'));
      array_push($categories, array('short' => 'bd', 'long' => 'Birthday'));
      array_push($categories, array('short' => 'lr', 'long' => 'Love &amp; Romance'));
      array_push($categories, array('short' => 'an', 'long' => 'Anniversary'));
      array_push($categories, array('short' => 'sy', 'long' => 'Funeral &amp; Sympathy'));
      array_push($categories, array('short' => 'v', 'long' => 'Vase Arrangements'));
      array_push($categories, array('short' => 'p', 'long' => 'Plants'));
      array_push($categories, array('short' => 'b', 'long' => 'Balloons'));
      array_push($categories, array('short' => 'r', 'long' => 'Roses'));
      array_push($categories, array('short' => 'c', 'long' => 'Centerpieces'));
      array_push($categories, array('short' => 'o', 'long' => 'One Sided Arrangements'));
      array_push($categories, array('short' => 'x', 'long' => 'Fruit Baskets'));
    }
    else{
      // funeral & sympathy products
      array_push($categories, array('short' => 'fa', 'long' => 'Table Arrangements'));
      array_push($categories, array('short' => 'fb', 'long' => 'Baskets'));
      array_push($categories, array('short' => 'fs', 'long' => 'Sprays'));
      array_push($categories, array('short' => 'fp', 'long' => 'Plants'));
      array_push($categories, array('short' => 'fl', 'long' => 'Inside Casket'));
      array_push($categories, array('short' => 'fw', 'long' => 'Wreaths'));
      array_push($categories, array('short' => 'fh', 'long' => 'Hearts'));
      array_push($categories, array('short' => 'fx', 'long' => 'Crosses'));
      array_push($categories, array('short' => 'fc', 'long' => 'Casket Sprays'));
    }

  ?>

  <?php
    if ($config_options['products'] == 0){
        echo '<ul class="florist-one-flower-delivery-menu-desktop-menu all">';
        for($i=0;$i<count($categories);$i++){
            if ($i == 7){
              echo '<li class="florist-one-flower-delivery-menu-link-last"><a href="#" id="florist-one-flower-delivery-menu-link-'.$i.'" class="florist-one-flower-delivery-menu-link" data-page="1" data-category="'.$categories[$i]['short'].'">'.$categories[$i]['long'].'</a></li>';
            }
            else if ($i < 7){
              echo '<li><a href="#" id="florist-one-flower-delivery-menu-link-'.$i.'" class="florist-one-flower-delivery-menu-link' . ($i == 0 ? ' active' : '') . '" data-page="1" data-category="'.$categories[$i]['short'].'">'.$categories[$i]['long'].'</a></li>';
            }
            else{
              echo '<li class="florist-one-flower-delivery-menu-link-bottom"><a href="#" id="florist-one-flower-delivery-menu-link-'.$i.'" class="florist-one-flower-delivery-menu-link" data-page="1" data-category="'.$categories[$i]['short'].'">'.$categories[$i]['long'].'</a></li>';
            }
        }
        echo '<li class="florist-one-flower-delivery-menu-link-last florist-one-flower-delivery-menu-link-bottom"><a href="#" id="florist-one-flower-delivery-menu-link-99" class="florist-one-flower-delivery-menu-customer-service-link" data-category="">Customer Service</a></li>';
        echo '<li class="florist-one-flower-delivery-menu-cart"><a href="#" id="florist-one-flower-delivery-menu-link-100" class="florist-one-flower-delivery-menu-cart" data-category=""><i class="material-icons">shopping_cart</i> My Cart</a></li>';
        echo '</ul>';
    }
    else{
      echo '<ul class="florist-one-flower-delivery-menu-desktop-menu">';
      for($i=0;$i<count($categories);$i++){
          echo '<li><a href="#" id="florist-one-flower-delivery-menu-link-'.$i.'" class="florist-one-flower-delivery-menu-link' . ($i == 0 ? ' active' : '') . '" data-page="1" data-category="'.$categories[$i]['short'].'">'.$categories[$i]['long'].'</a></li>';
      }
      echo '<li class="florist-one-flower-delivery-menu-link-last"><a href="#" id="florist-one-flower-delivery-menu-link-99" class="florist-one-flower-delivery-menu-customer-service-link" data-category="">Customer Service</a></li>';
      echo '<li class="florist-one-flower-delivery-menu-cart"><a href="#" id="florist-one-flower-delivery-menu-link-100" class="florist-one-flower-delivery-menu-cart" data-category=""><i class="material-icons">shopping_cart</i> My Cart</a></li>';
      echo '</ul>';
    }

  ?>

 </ul>


<div class="florist-one-flower-delivery-menu-mobile-menu"></div>

<div class="florist-one-flower-delivery-menu-cart"><a href="#">
<i class="material-icons">shopping_cart</i>
My Cart</a></div>
</div>
