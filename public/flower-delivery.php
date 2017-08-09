<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public
 */

  if (!session_id()) {
    session_start();
  }

  define('F1_API', 'https://www.floristone.com/api/rest');
  define('F1_SC', 14.99);
  $config_options = get_option('florist-one-flower-delivery');
  if ($config_options['currency'] == 'u'){
    define('USERNAME', '999993');
    define('PASSWORD', 'flowers');
  }
  else {
    define('USERNAME', '999994');
    define('PASSWORD', 'flowers');
  }

  if (isset($_REQUEST['action'])){
    if ($_REQUEST['action'] == "getProducts"){
      getProducts($_REQUEST['category'], $_REQUEST['page']);
    }
    else if ($_REQUEST['action'] == "getProduct"){
      getProduct($_REQUEST['code']);
    }
    else if ($_REQUEST['action'] == "addToCart"){
      addToCart($_REQUEST['code']);
    }
    else if ($_REQUEST['action'] == "removeFromCart"){
      removeFromCart($_REQUEST['code']);
    }
    else if ($_REQUEST['action'] == "getCart"){
      getCart();
    }
    else if ($_REQUEST['action'] == "getCustomerService"){
      getCustomerService();
    }
    else if ($_REQUEST['action'] == "checkout"){
      checkout($_REQUEST['page'], $_REQUEST['formdata']);
    }
    else if ($_REQUEST['action'] == "processOrder"){
      processOrder();
    }
    else if ($_REQUEST['action'] == "createFingerprint"){
      createFingerprint($_REQUEST['amount']);
    }
    else if ($_REQUEST['action'] == "checkOrder"){
      checkOrder($_REQUEST['orderno']);
    }
    else if ($_REQUEST['action'] == "get_florists_for_facility_code"){
      get_florists_for_facility_code($_REQUEST['city'],$_REQUEST['state']);
    }
  }
  else{
    fill_in_missing_options();
  }

 function getProducts($category, $page){

     $args = array(
       'method' => 'GET',
       'httpversion' => '1.1',
       'sslverify' => true,
       'headers' => array(
         'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
       )
     );

     $config_options = get_option('florist-one-flower-delivery');
     $count = $config_options['products_per_page'];

     if ($category == 'default'){
       if ($config_options['products'] == 0){
         $category = 'ao';
         if (($config_options['products_cm'] == 1) && ((date('m') == 12 && date('d') >= 15) || (date('m') == 12 && date('d') <= 26))){
           $category = 'cm';
         }
         if (($config_options['products_ea'] == 1) && ((date('m') == 03 && date('d') >= 15) || (date('m') == 04 && date('d') <= 30))){
           $category = 'ea';
         }
         if (($config_options['products_md'] == 1) && ((date('m') == 04 && date('d') >= 20) || (date('m') == 05 && date('d') <= 15))){
           $category = 'md';
         }
         if (($config_options['products_tg'] == 1) && ((date('m') == 11 && date('d') >= 01) || (date('m') == 11 && date('d') <= 30))){
           $category = 'tg';
         }
         if (($config_options['products_vd'] == 1) && ((date('m') == 01 && date('d') >= 15) || (date('m') == 02 && date('d') <= 15))){
           $category = 'vd';
         }
       }
       else {
         $category = 'fa';
       }
     }

     if ($page == 1){
       $start = 1;
     }
     else{
       $start = 1 + (($page - 1) * $count);
     }

     $url    = F1_API . '/flowershop/getproducts?category=' . $category . '&start=' . $start . '&count=' . $count;
     $api_response =	wp_remote_request( $url, $args );
     $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

     include 'partials/florist-one-flower-delivery-many-products.php';

     die();

 }

 function getProduct($code){

     $args = array(
       'method' => 'GET',
       'httpversion' => '1.1',
       'sslverify' => true,
       'headers' => array(
         'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
       )
     );
     $url    = F1_API . '/flowershop/getproducts?code=' . $code;
     $api_response =	wp_remote_request( $url, $args );
     $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

     include 'partials/florist-one-flower-delivery-single-product.php';

     die();

 }

 function checkOrder($orderno){

     $args = array(
       'method' => 'GET',
       'httpversion' => '1.1',
       'sslverify' => true,
       'headers' => array(
         'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
       )
     );
     $url    = F1_API . '/wordpress/flowershop-check-order?orderno=' . $orderno;
     $api_response =	wp_remote_request( $url, $args );
     $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

     $good_order = $api_response_body['SUCCESS'];

     if ($good_order == true){
       include 'partials/florist-one-flower-delivery-checkout-5.php';
     }
     else {
       checkout(4, array());
     }

     die();

 }

 function createCart(){

   $args = array(
     'method' => 'POST',
     'httpversion' => '1.1',
     'sslverify' => true,
     'headers' => array(
       'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
     )
   );
   $url    = F1_API . '/shoppingcart';
   $api_response =	wp_remote_request( $url, $args );
   $sessionid = json_decode(wp_remote_retrieve_body( $api_response ))->{"SESSIONID"};

   $_SESSION['sesh'] = $sessionid;

   return $sessionid;

 }

 function getCartData(){

   if (!isset($_SESSION['sesh'])){
     $sessionid = createCart();
   }
   else {
     $sessionid = $_SESSION['sesh'];
   }

   $args = array(
     'method' => 'GET',
     'httpversion' => '1.1',
     'sslverify' => true,
     'headers' => array(
       'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
     )
   );

   $url    = F1_API . '/shoppingcart?sessionid=' . $sessionid;
   $api_response =	wp_remote_request( $url, $args );
   $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

   $errors = array();
   $errors = $api_response_body[errors];

   $products = array();
   $products_for_display = array();

   $config_options = get_option('florist-one-flower-delivery');
   if (isset($_SESSION['florist-one-flower-delivery-recipient-postal-code'])){
     $zipcode = $_SESSION['florist-one-flower-delivery-recipient-postal-code'];
   }
   else if (isset($config_options['address_zipcode']) && strlen($config_options['address_zipcode']) > 0){
     $zipcode = $config_options['address_zipcode'];
   }
   else {
     $zipcode = '11779';
   }

   for($i=0;$i<count($api_response_body[products]);$i++){
     $code = $api_response_body[products][$i][CODE];
     $url  = F1_API . '/flowershop/getproducts?code=' . $code;
     $api_response =	wp_remote_request( $url, $args );
     $get_products_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );
     $product = array(
       "CODE" =>  $get_products_response_body[PRODUCTS][0][CODE],
       "PRICE" => $get_products_response_body[PRODUCTS][0][PRICE],
       "RECIPIENT" => array(
         "ZIPCODE" => "11779"
       )
     );
     array_push($products, $product);
     $product = array(
       "CODE" =>  $get_products_response_body[PRODUCTS][0][CODE],
       "PRICE" => $get_products_response_body[PRODUCTS][0][PRICE],
       "NAME" => $get_products_response_body[PRODUCTS][0][NAME]
     );
     array_push($products_for_display, $product);
  }

  $url    = F1_API . '/flowershop/gettotal?products=' . json_encode($products) . '&f1_sc=' . F1_SC . '&f1_storefront_id=' . $config_options['flower_storefront_id']  . '&f1_aff_id=' . $config_options['affiliate_id'];
  $api_response =	wp_remote_request( $url, $args );
  $get_total_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

  $vars = array(
    'get_total_response_body' => $get_total_response_body,
    'products_for_display' => $products_for_display,
    'products' => $products,
    'errors' => $errors
  );

  return $vars;

 }

 function getCart(){

    $vars = getCartData();
    $get_total_response_body = $vars[get_total_response_body];
    $products_for_display = $vars[products_for_display];
    $products = $vars[products];
    $errors = $vars[errors];
    include 'partials/florist-one-flower-delivery-cart.php';
    die();
 }

 function addToCart($code){

     if (!isset($_SESSION['sesh'])){
       $sessionid = createCart();
     }
     else {
       $sessionid = $_SESSION['sesh'];
       if (checkCartStillExists() == false){
         $sessionid = createCart();
       }
     }

     $args = array(
       'method' => 'PUT',
       'httpversion' => '1.1',
       'sslverify' => true,
       'headers' => array(
         'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD),
         'Content-Length' => 0
       )
     );
     $url    = F1_API . '/shoppingcart?action=add&sessionid=' . $sessionid . '&productcode=' . $code;
     $api_response =	wp_remote_request( $url, $args );
     getCart();

 }

 function checkCartStillExists(){
   $vars = getCartData();
   $errors = $vars[errors];

   for($i=0;$i<count($errors);$i++){
     if ($errors[$i] == 'invalid sessionid' || $errors[$i] == 'The sessionid does not exist'){
       return false;
     }
   }
   return true;
 }

 function removeFromCart($code){

     if (!isset($_SESSION['sesh'])){
       $sessionid = createCart();
     }
     else {
       $sessionid = $_SESSION['sesh'];
       if (checkCartStillExists() == false){
         $sessionid = createCart();
       }
     }

     $args = array(
       'method' => 'PUT',
       'httpversion' => '1.1',
       'sslverify' => true,
       'headers' => array(
         'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD),
         'Content-Length' => 0
       )
     );
     $url    = F1_API . '/shoppingcart?action=remove&sessionid=' . $sessionid . '&productcode=' . $code;
     $api_response =	wp_remote_request( $url, $args );
     getCart();

 }

 function getCustomerService(){
     $config_options = get_option('florist-one-flower-delivery');
     $args = array(
       'method' => 'GET',
       'httpversion' => '1.1',
       'sslverify' => true,
       'headers' => array(
         'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
       )
     );
     $url    = F1_API . '/flowershop/customerservice?currency' . $config_options['currency'];
     $api_response =	wp_remote_request( $url, $args );
     $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

     include 'partials/florist-one-flower-delivery-customer-service.php';
     die();

 }

 function createFingerprint($amount){

   $vars = getCartData();
   $get_total_response_body = $vars[get_total_response_body];
   $products_for_display = $vars[products_for_display];
   $products = $vars[products];

   $customer = json_encode(array(
     'name' => $_SESSION['florist-one-flower-delivery-customer-name'],
     'address1' => $_SESSION['florist-one-flower-delivery-customer-address-1'],
     'address2' => $_SESSION['florist-one-flower-delivery-customer-address-2'],
     'city' => $_SESSION['florist-one-flower-delivery-customer-city'],
     'state' => $_SESSION['florist-one-flower-delivery-customer-state'],
     'zipcode' => $_SESSION['florist-one-flower-delivery-customer-postal-code'],
     'country' => $_SESSION['florist-one-flower-delivery-customer-country'],
     'phone' => $_SESSION['florist-one-flower-delivery-customer-phone'],
     'email' => $_SESSION['florist-one-flower-delivery-customer-email'],
     'ip' => $_SERVER['REMOTE_ADDR']
   ));

   $ccinfo = json_encode(array(
     'type' => $_SESSION['florist-one-flower-delivery-billing-credit-card'],
     'ccnum' => $_SESSION['florist-one-flower-delivery-billing-credit-card-no'],
     'cvv2' => $_SESSION['florist-one-flower-delivery-billing-security-code'],
     'expmonth' => $_SESSION['florist-one-flower-delivery-billing-exp-month'],
     'expyear' => $_SESSION['florist-one-flower-delivery-billing-exp-year']
   ));

   $products_for_api = array();
   for($i=0;$i<count($products);$i++){
     $product = array(
       'code' => $products[$i][CODE],
       'price' => $products[$i][PRICE],
       'deliverydate' => $_SESSION['florist-one-flower-delivery-delivery-date'],
       'cardmessage' => $_SESSION['florist-one-flower-delivery-card-message'],
       'specialinstructions' => $_SESSION['florist-one-flower-delivery-special-instructions'],
       'recipient' => array(
         'name' => $_SESSION['florist-one-flower-delivery-recipient-name'],
         'institution' => $_SESSION['florist-one-flower-delivery-recipient-institution'],
         'address1' => $_SESSION['florist-one-flower-delivery-recipient-address-1'],
         'address2' => $_SESSION['florist-one-flower-delivery-recipient-address-2'],
         'city' => $_SESSION['florist-one-flower-delivery-recipient-city'],
         'state' => $_SESSION['florist-one-flower-delivery-recipient-state'],
         'country' => $_SESSION['florist-one-flower-delivery-recipient-country'],
         'phone' => $_SESSION['florist-one-flower-delivery-recipient-phone'],
         'zipcode' => $_SESSION['florist-one-flower-delivery-recipient-postal-code']
       )
     );
     array_push($products_for_api, $product);
   }
   $products_for_api = json_encode($products_for_api);

   $ordertotal = $get_total_response_body[ORDERTOTAL];

   $f1_sc = F1_SC;

   $config_options = get_option('florist-one-flower-delivery');
   $f1_aff_id = $config_options['affiliate_id'];
   $facility_id = (isset($config_options['facility_id']) ? $config_options['facility_id'] : 0 );

   $data = array(
     'amount' => $amount,
     'products' => $products_for_api,
     'customer' => $customer,
     'ccinfo' => $ccinfo,
     'ordertotal' => $ordertotal,
     'f1_sc' => $f1_sc,
     'f1_aff_id' => $f1_aff_id,
     'facility_id' => $facility_id
   );

   $args = array(
      'method' => 'POST',
      'httpversion' => '1.1',
      'sslverify' => true,
      'headers' => array(
        'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
      ),
      'body' => $data
   );

   $url    = F1_API . '/wordpress/flowershop-authnet-fingerprint';
   $api_response =	wp_remote_request( $url, $args );
   $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

   return $api_response_body;

}

function clearCart(){

    $args = array(
      'method' => 'PUT',
      'httpversion' => '1.1',
      'sslverify' => true,
      'headers' => array(
        'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD),
        'Content-Length' => 0
      )
    );
    $sessionid = $_SESSION['sesh'];
    $url    = F1_API . '/shoppingcart?action=clear&sessionid=' . $sessionid;
    $api_response =	wp_remote_request( $url, $args );

}

 function getDeliveryDates($zipcode){

     $args = array(
       'method' => 'GET',
       'httpversion' => '1.1',
       'sslverify' => true,
       'headers' => array(
         'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
       )
     );
     $url    = F1_API . '/flowershop/checkdeliverydate?zipcode=' . $zipcode;
     $api_response =	wp_remote_request( $url, $args );
     return json_decode( wp_remote_retrieve_body( $api_response ), true );

 }

 function checkout($page, $formdata){

     storeCheckoutData($formdata);

     $config_options = get_option('florist-one-flower-delivery');
     if (isset($_SESSION['florist-one-flower-delivery-recipient-postal-code'])){
       $zipcode = $_SESSION['florist-one-flower-delivery-recipient-postal-code'];
     }
     else if (isset($config_options['address_zipcode']) && strlen($config_options['address_zipcode']) > 0){
       $zipcode = $config_options['address_zipcode'];
     }
     else {
       $zipcode = '11779';
     }

     switch($page){
      case 1:
        $delivery_dates = getDeliveryDates($zipcode);
        include 'partials/florist-one-flower-delivery-checkout-1.php';
        break;
      case 2:
        include 'partials/florist-one-flower-delivery-checkout-2.php';
        break;
      case 3:
        include 'partials/florist-one-flower-delivery-checkout-3.php';
        break;
      case 4:
        $vars = getCartData();
        $get_total_response_body = $vars[get_total_response_body];
        $products_for_display = $vars[products_for_display];
        $products = $vars[products];
        $errors = $vars[errors];
        include 'partials/florist-one-flower-delivery-checkout-4.php';
        break;
      case 5:
        $orderno = $formdata[0][value];
        session_unset();
        include 'partials/florist-one-flower-delivery-checkout-5.php';
        break;
      case 6:
        include 'partials/florist-one-flower-delivery-ssl-warning.php';
        break;
     }

     die();

 }

 function storeCheckoutData($formdata){
   for($i=0;$i<count($formdata);$i++){
     $_SESSION[''.$formdata[$i][name].''] = $formdata[$i][value];
   }
 }

 function processOrder(){

    $vars = getCartData();
    $get_total_response_body = $vars[get_total_response_body];
    $products_for_display = $vars[products_for_display];
    $products = $vars[products];

    $customer = json_encode(array(
    	'name' => $_SESSION['florist-one-flower-delivery-customer-name'],
    	'address1' => $_SESSION['florist-one-flower-delivery-customer-address-1'],
    	'address2' => $_SESSION['florist-one-flower-delivery-customer-address-2'],
    	'city' => $_SESSION['florist-one-flower-delivery-customer-city'],
    	'state' => $_SESSION['florist-one-flower-delivery-customer-state'],
    	'zipcode' => $_SESSION['florist-one-flower-delivery-customer-postal-code'],
    	'country' => $_SESSION['florist-one-flower-delivery-customer-country'],
    	'phone' => $_SESSION['florist-one-flower-delivery-customer-phone'],
    	'email' => $_SESSION['florist-one-flower-delivery-customer-email'],
    	'ip' => $_SERVER['REMOTE_ADDR']
    ));

    $ccinfo = json_encode(array(
    	'type' => $_SESSION['florist-one-flower-delivery-billing-credit-card'],
    	'ccnum' => $_SESSION['florist-one-flower-delivery-billing-credit-card-no'],
    	'cvv2' => $_SESSION['florist-one-flower-delivery-billing-security-code'],
    	'expmonth' => $_SESSION['florist-one-flower-delivery-billing-exp-month'],
    	'expyear' => $_SESSION['florist-one-flower-delivery-billing-exp-year']
    ));

    $products_for_api = array();
    for($i=0;$i<count($products);$i++){
      $product = array(
        'code' => $products[$i][CODE],
        'price' => $products[$i][PRICE],
        'deliverydate' => $_SESSION['florist-one-flower-delivery-delivery-date'],
        'cardmessage' => $_SESSION['florist-one-flower-delivery-card-message'],
        'specialinstructions' => $_SESSION['florist-one-flower-delivery-special-instructions'],
        'recipient' => array(
          'name' => $_SESSION['florist-one-flower-delivery-recipient-name'],
          'institution' => $_SESSION['florist-one-flower-delivery-recipient-institution'],
          'address1' => $_SESSION['florist-one-flower-delivery-recipient-address-1'],
          'address2' => $_SESSION['florist-one-flower-delivery-recipient-address-2'],
          'city' => $_SESSION['florist-one-flower-delivery-recipient-city'],
          'state' => $_SESSION['florist-one-flower-delivery-recipient-state'],
          'country' => $_SESSION['florist-one-flower-delivery-recipient-country'],
          'phone' => $_SESSION['florist-one-flower-delivery-recipient-phone'],
          'zipcode' => $_SESSION['florist-one-flower-delivery-recipient-postal-code']
        )
      );
      array_push($products_for_api, $product);
    }
    $products_for_api = json_encode($products_for_api);

    $ordertotal = $get_total_response_body[ORDERTOTAL];

    $f1_sc = F1_SC;

    $config_options = get_option('florist-one-flower-delivery');
    $f1_aff_id = $config_options['affiliate_id'];
    $flower_storefront_id = $config_options['flower_storefront_id'];
    $facility_id = (isset($config_options['facility_id']) ? $config_options['facility_id'] : 0 );

    $data = array('products' => $products_for_api, 'customer' => $customer, 'ccinfo' => $ccinfo, 'ordertotal' => $ordertotal, 'f1_sc' => $f1_sc, 'f1_aff_id' => $f1_aff_id, 'f1_storefront_id' => $flower_storefront_id, 'facility_id' => $facility_id);

    $args = array(
       'method' => 'POST',
       'httpversion' => '1.1',
       'sslverify' => true,
       'headers' => array(
         'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
       ),
       'body' => $data
    );

    $url    = F1_API . '/flowershop/placeorder';
    $api_response =	wp_remote_request( $url, $args );
    $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

    echo json_encode($api_response_body);

    die();

 }

 function get_florists_for_facility_code($city, $state){
   $args = array(
     'method' => 'GET',
     'httpversion' => '1.1',
     'sslverify' => true,
     'headers' => array(
       'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD)
     )
   );
   $url    = F1_API . '/flowershop/chooseflorists?city=' . $city . '&state=' . $state;
   $api_response =	wp_remote_request( $url, $args );
   $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );
   echo json_encode($api_response_body);
   die();
 }

 function init_flower_delivery($atts) {

    //default category
    $a = shortcode_atts( array(
       'category' => '',
       'product_code' => ''
    ), $atts );
    $flower_del_def_cat = $a["category"];
    $flower_del_def_product = $a["product_code"];

    $htmlString = '';
    $htmlString = $htmlString.'<div class="florist-one-flower-delivery-container"'. (strlen($flower_del_def_cat) > 0 ? ' data-def_cat="' . $flower_del_def_cat . '"' : '') . ' ' . (strlen($flower_del_def_product) > 0 ? ' data-def_product="' . $flower_del_def_product . '"' : '') . '>';
    $htmlString = $htmlString.init_flower_delivery_menu();
    $htmlString = $htmlString.'<div class="florist-one-flower-delivery" name="florist-one-flower-delivery" id="florist-one-flower-delivery"></div>';
    $htmlString = $htmlString.'<div class="florist-one-flower-delivery-loading"></div>';
    $htmlString = $htmlString.'</div>';

    return $htmlString;

  }

  function init_flower_delivery_menu(){
      ob_start();
      include 'partials/florist-one-flower-delivery-menu.php';
      $buffer = ob_get_clean();
      return $buffer;

  }

  function fill_in_missing_options(){

    $options = get_option('florist-one-flower-delivery');
    $missing = 0;

    if (count($options) < 30){
      if (!(isset($options['navigation_color']))){
        $options['navigation_color'] = '#8db6d9';
        $missing++;
      }
      if (!(isset($options['navigation_hover_color']))){
        $options['navigation_hover_color'] = '#18477d';
        $missing++;
      }
      if (!(isset($options['navigation_text_color']))){
        $options['navigation_text_color'] = '#FFF';
        $missing++;
      }
      if (!(isset($options['navigation_hover_text_color']))){
        $options['navigation_hover_text_color'] = '#000';
        $missing++;
      }
      if (!(isset($options['button_color']))){
        $options['button_color'] = '#8db6d9';
        $missing++;
      }
      if (!(isset($options['button_hover_color']))){
        $options['button_hover_color'] = '#8db6d9';
        $missing++;
      }
      if (!(isset($options['button_text_color']))){
        $options['button_text_color'] = '#FFF';
        $missing++;
      }
      if (!(isset($options['button_hover_text_color']))){
        $options['button_hover_text_color'] = '#000';
        $missing++;
      }
      if (!(isset($options['link_color']))){
        $options['link_color'] = '#18477d';
        $missing++;
      }
      if (!(isset($options['heading_color']))){
        $options['heading_color'] = '#000';
        $missing++;
      }
      if (!(isset($options['text_color']))){
        $options['text_color'] = '#000';
        $missing++;
      }
      if (!(isset($options['products_per_page']))){
        $options['products_per_page'] = 12;
        $missing++;
      }
      if (!(isset($options['address_institution']))){
        $options['address_institution'] = '';
        $missing++;
      }
      if (!(isset($options['address_1']))){
        $options['address_1'] = '';
        $missing++;
      }
      if (!(isset($options['address_city']))){
        $options['address_city'] = '';
        $missing++;
      }
      if (!(isset($options['address_state']))){
        $options['address_state'] = '';
        $missing++;
      }
      if (!(isset($options['address_zipcode']))){
        $options['address_zipcode'] = '';
        $missing++;
      }
      if (!(isset($options['address_country']))){
        $options['address_country'] = '';
        $missing++;
      }
      if (!(isset($options['currency']))){
        $options['currency'] = 'u';
        $missing++;
      }
      if (!(isset($options['affiliate_id']))){
        $options['affiliate_id'] = '0';
        $missing++;
      }
      if (!(isset($options['flower_storefront_id']))){
        $options['flower_storefront_id'] = 0;
        $missing++;
      }
      if (!(isset($options['products_cw']))){
        $options['products_cw'] = 0;
        $missing++;
      }
      if (!(isset($options['products_ea']))){
        $options['products_ea'] = 0;
        $missing++;
      }
      if (!(isset($options['products_md']))){
        $options['products_md'] = 0;
        $missing++;
      }
      if (!(isset($options['products_tg']))){
        $options['products_tg'] = 0;
        $missing++;
      }
      if (!(isset($options['products_vd']))){
        $options['products_vd'] = 0;
        $missing++;
      }
      if (!(isset($options['rotation']))){
        $options['rotation'] = 0;
        $missing++;
      }
      if (!(isset($options['florists_of_choice']))){
        $options['florists_of_choice'] = array();
        $missing++;
      }
      if (!(isset($options['facility_id']))){
        $options['facility_id'] = 0;
        $missing++;
      }
      if (!(isset($options['florist_selection']))){
        $options['florist_selection'] = 0;
        $missing++;
      }
      if ($missing > 0){
        add_option('florist-one-flower-delivery', $options);
      }
    }
    return true;

  }

  add_shortcode('flower-delivery','init_flower_delivery');

?>
