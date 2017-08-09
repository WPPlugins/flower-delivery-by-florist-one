(function( $ ) {
	'use strict';

var ajaxurl = ajax_object.ajax_url;
var historyBool = false;

$(window).ready(function() {
	if($(".florist-one-flower-delivery-menu").get(0)){
		var pagetitle = $(document).find("title").text();
		if (getUrlParameter('viewitem')){
			var data = {
		    'action' : 'getProduct',
		    'code' : getUrlParameter('viewitem'),
				'random' : Math.random()
		  };
		}
		else if (getUrlParameter('buyitem')){
			var data = {
		    'action' : 'addToCart',
		    'code' : getUrlParameter('buyitem'),
				'random' : Math.random()
			};
		}
		else if ($(".florist-one-flower-delivery-container").attr("data-def_cat")){
			if ($(".florist-one-flower-delivery-container").attr("data-def_cat") != 'cart'){
				var data = {
					'action' : 'getProducts',
					'category' : $(".florist-one-flower-delivery-container").attr("data-def_cat"),
					'page' : 1,
					'random' : Math.random()
				};
			}
			else{
				var data = {
					'action' : 'getCart',
					'random' : Math.random()
				};
			}
		}
		else{
			var data = {
				'action' : 'getProducts',
				'category' : ( ( $(".florist-one-flower-delivery-container").attr("data-def_cat") ) ? $(".florist-one-flower-delivery-container").attr("data-def_cat") : 'default' ),
				'page' : 1,
				'random' : Math.random()
			};
		}
		History.pushState(data, pagetitle, "");
	}
});

$(document).on("click", "a.florist-one-flower-delivery-menu-link", function(e){
	e.preventDefault();
  var data = {
    'action' : 'getProducts',
    'category' : $(this).attr("data-category"),
    'page' : $(this).attr("data-page")
  };
  History.pushState(data, "", "");
});

$(document).on("click", "a.florist-one-flower-delivery-many-products-single-product", function(e){
	if ( $(this).attr("href") == '#' ){
		e.preventDefault();
	  var data = {
	    'action' : 'getProduct',
	    'code' : $(this).attr("data-code")
	  };
	  History.pushState(data, "", "");
	}
});

$(document).on("click", "a.florist-one-flower-delivery-add-to-cart", function(e){
	if ( $(this).attr("href") == '#' ){
		historyBool = true;
		e.preventDefault();
		var data = {
	  	'action' : 'addToCart',
	  	'code' : $(this).attr("data-code")};
		History.pushState(data, "", "");
	}
});

$(document).on("click", ".florist-one-flower-delivery-menu-cart", function(e){
	e.preventDefault();
  var data = {
    'action' : 'getCart'
  };
  History.pushState(data, "", "");
});

$(document).on("click", "a.florist-one-flower-delivery-cart-remove-item", function(e){
	e.preventDefault();
	removeFromCart($(this).attr("data-code"));
});

$(document).on("click", "a.florist-one-flower-delivery-menu-customer-service-link", function(e){
	e.preventDefault();
  var data = {
    'action' : 'getCustomerService'
  };
  History.pushState(data, "", "");
});

$(document).on("click", "a.florist-one-flower-delivery-checkout", function(e){
		e.preventDefault();
    var page = $(this).attr("data-page");
    var data = {
      'action' : 'checkout',
      'page' : page,
      'random' : Math.random()
    };
    History.pushState(data, "", "");
});

$(document).on("click", "a.florist-one-flower-delivery-checkout-process-order", function(e){
	e.preventDefault();
	processOrder();
});

$(document).ready(function(){
	$('.florist-one-flower-delivery-menu-desktop-menu').slicknav({
		label: 'FLOWERS MENU',
		prependTo:'.florist-one-flower-delivery-menu-mobile-menu',
		closeOnClick: true
	});
});

$(document).on("click","a.florist-one-flower-delivery-checkout-continue-checkout", function(e){
	historyBool = true;
	e.preventDefault();
	var page = $(".florist-one-flower-delivery-checkout-page").val();
	var data = {
		'action' : 'continue-checkout-' + page,
		'page' : page,
		'random' : Math.random()
	};
	History.pushState(data, "", "");
});

$(document).on("click","a.florist-one-flower-delivery-checkout-page-edit", function(e){
	e.preventDefault();
	checkout($(this).attr("data-page"), []);
});

$(document).on("click", ".child_window_closed", function(e){
	e.preventDefault();

  //check order & redirect user accordingly
	var data = {
		'action': 'checkOrder',
		'orderno': $(".child_window_closed").val()
	};

	jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");

});

History.Adapter.bind(window, "statechange", function() {

  var state = History.getState();

  if (state.data.action == 'getProducts'){
		$("a.florist-one-flower-delivery-menu-link").removeClass("active");
		$("a.florist-one-flower-delivery-menu-customer-service-link").removeClass("active");
		if(state.data.category != "default"){
			$("a.florist-one-flower-delivery-menu-link[data-category='" + state.data.category + "']").addClass("active");
		}
		else{
			$("#florist-one-flower-delivery-menu-link-0").addClass("active");
		}
    getProducts(state.data.category, state.data.page);
  }
  else if (state.data.action == 'getProduct'){
    getProduct(state.data.code);
  }
  else if (state.data.action == 'addToCart'){
		$("a.florist-one-flower-delivery-menu-link").removeClass("active");
		if(historyBool){
    	addToCart(state.data.code);
		}
		else{
			getCart();
		}
		historyBool = false;
  }
  else if (state.data.action == 'getCart'){
		$("a.florist-one-flower-delivery-menu-link").removeClass("active");
    getCart();
  }
  else if (state.data.action == 'getCustomerService'){
		$("a.florist-one-flower-delivery-menu-link").removeClass("active");
		$("a.florist-one-flower-delivery-menu-customer-service-link").addClass("active");
    showCustomerService();
  }
  else if (state.data.action == 'checkout'){
		$("a.florist-one-flower-delivery-menu-link").removeClass("active");
    checkout(state.data.page, state.data.formdata);
  }
	else if (state.data.action.substring(0,18) == 'continue-checkout-'){
		if(historyBool){
			var $form = $(".checkout-form");
			$form.submit();
		}
		else{
			checkout(state.data.page, state.data.formdata);
		}
		historyBool = false;
  }

});

var getProducts = function(category, page){

		var data = {
			'action': 'getProducts',
			'category': category,
			'page': page
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");

}

var getProduct = function(code){

		var data = {
			'action': 'getProduct',
			'code': code
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");

}

var addToCart = function(code){

		var data = {
			'action': 'addToCart',
			'code': code
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");

}

var removeFromCart = function(code){

		var data = {
			'action': 'removeFromCart',
			'code': code
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");

}

var getCart = function(code){

		var data = {
			'action': 'getCart'
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");

}

var showCustomerService = function(code){

		var data = {
			'action': 'getCustomerService'
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");

}

var checkout = function(page, formdata){

		var data = {
			'action': 'checkout',
			'page': page,
			'formdata': formdata
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status, page); }, "html");

}

var processOrder = function(){

		var data = {
			'action': 'processOrder'
		};

		jQuery.post(ajaxurl, data, function(response, status){
			if ( typeof response.errors !== 'undefined' ) {

				if (response.errors.length > 0){
					$(".florist-one-flower-delivery-review-error-message").css("display","block");
				}

				for(var i=0;i<response.errors.length;i++){
	        if (response.errors[i].substr(0, 21) == 'invalid delivery date'){
	          jQuery(".florist-one-flower-delivery-review-delivery-date").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 11) == 'cardmessage'){
	          jQuery(".florist-one-flower-delivery-review-card-message").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 19) == 'specialinstructions'){
	          jQuery(".florist-one-flower-delivery-review-special-instructions").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'recipient name'){
	          jQuery(".florist-one-flower-delivery-review-recipient-name").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 21) == 'recipient institution'){
	          jQuery(".florist-one-flower-delivery-review-recipient-institution").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 18) == 'recipient address1'){
	          jQuery(".florist-one-flower-delivery-review-recipient-address-1").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 18) == 'recipient address2'){
	          jQuery(".florist-one-flower-delivery-review-recipient-address-2").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'recipient city'){
	          jQuery(".florist-one-flower-delivery-review-recipient-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 15) == 'recipient state'){
	          jQuery(".florist-one-flower-delivery-review-recipient-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 17) == 'recipient country'){
	          jQuery(".florist-one-flower-delivery-review-recipient-country").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 15) == 'recipient phone'){
	          jQuery(".florist-one-flower-delivery-review-recipient-phone").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 17) == 'recipient zipcode'){
	          jQuery(".florist-one-flower-delivery-review-recipient-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 13) == 'customer name'){
	          jQuery(".florist-one-flower-delivery-review-customer-name").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 17) == 'customer address1'){
	          jQuery(".florist-one-flower-delivery-review-customer-address-1").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 17) == 'customer address2'){
	          jQuery(".florist-one-flower-delivery-review-customer-address-2").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 13) == 'customer city'){
	          jQuery(".florist-one-flower-delivery-review-customer-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'customer state'){
	          jQuery(".florist-one-flower-delivery-review-customer-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 16) == 'customer country'){
	          jQuery(".florist-one-flower-delivery-review-customer-country").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'customer phone'){
	          jQuery(".florist-one-flower-delivery-review-customer-phone").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 16) == 'customer zipcode'){
	          jQuery(".florist-one-flower-delivery-review-customer-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'customer email'){
	          jQuery(".florist-one-flower-delivery-review-customer-email").css("color", "red");
	        }
					else if (
						response.errors[i] == 'credit card number is required' ||
						response.errors[i] == 'invalid card for american express' ||
						response.errors[i] == 'invalid card for visa, discovery, or mastercard'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card-card-number").css("color", "red");
					}
					else if (
						response.errors[i] == 'credit card failure'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card").css("color", "red");
					}
					else if (
						response.errors[i] == 'security code is required'  ||
						response.errors[i] == 'invalid security code for american express' ||
						response.errors[i] == 'invalid security code for visa, discovery, or mastercard'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card-cvv2").css("color", "red");
					}
					else if (
						response.errors[i] == 'invalid expiration year' ||
						response.errors[i] == 'invalid expiration month' ||
						response.errors[i] == 'credit card expiration month is required' ||
						response.errors[i] == 'credit card expiration year is required'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card-expiration").css("color", "red");
					}
					else if (
						response.errors[i] == 'invalid credit card type' ||
						response.errors[i] == 'credit card type is required'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card-card-type").css("color", "red");
					}
	        else{
	          alert(response.errors[i]);
	        }
				}
			}
			else{
				checkout(5, new Array({name:"orderno", value:response.ORDERNO}) );
			}
		}, "json");

}

var make_page = function(response, status, page){

  $(".florist-one-flower-delivery").html(response);

  if (page !== undefined) {
    initCheckoutFormValidation();
  }

}

var scroll_to_top = function(){

	window.scrollTo(0, $('.florist-one-flower-delivery-menu').offset().top - 60);

}

var initCheckoutFormValidation = function(){
  $(document).ready(function(){
  	var $form = $(".checkout-form")
  	$form.validate({
  		rules: {
  			"florist-one-flower-delivery-delivery-date": {
  				required: true
  			},
  			"florist-one-flower-delivery-card-message": {
  				required: true,
  				maxlength: 200
  			},
  			"florist-one-flower-delivery-special-instructions": {
  				required: false,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-name": {
  				required: true,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-institution": {
  				required: false,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-address-1": {
  				required: true,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-address-2": {
  				required: false,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-city": {
  				required: true,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-state": {
  				required: true,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-recipient-country": {
  				required: true,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-recipient-postal-code": {
  				required: true,
  				maxlength: 7,
					recipientZip: true
  			},
  			"florist-one-flower-delivery-recipient-phone": {
  				required: true,
  				maxlength: 20,
					phoneUS: true
  			},
  			"florist-one-flower-delivery-customer-name": {
  				required: true,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-customer-address-1": {
  				required: true,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-customer-address-2": {
  				required: false,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-customer-city": {
  				required: true,
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-customer-state": {
  				required: false,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-customer-country": {
  				required: true,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-customer-phone": {
  				required: true,
  				maxlength: 20
  			},
  			"florist-one-flower-delivery-customer-email": {
  				required: true,
  				maxlength: 100,
					email: true
  			},
  			"florist-one-flower-delivery-customer-postal-code": {
  				required: true,
  				maxlength: 7
  			},
  			"florist-one-flower-delivery-billing-credit-card": {
  				required: true,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-billing-credit-card-no": {
  				required: true,
  				maxlength: 16,
					creditCardNumber: true
  			},
  			"florist-one-flower-delivery-billing-exp-month": {
  				required: true,
  				maxlength: 2,
					CCExp: {
						month: '#florist-one-flower-delivery-billing-exp-month',
						year: '#florist-one-flower-delivery-billing-exp-year'
					}
  			},
  			"florist-one-flower-delivery-billing-security-code": {
  				required: true,
  				maxlength: 4,
					CCCVV2: {
						cc_type: '#florist-one-flower-delivery-billing-credit-card',
						cc_cvv2: '#florist-one-flower-delivery-billing-security-code'
					}
  			}
  		},
  		onkeyup: false,
  		onblur: false,
  		onchange: false,
  		errorClass: "florist-one-flower-delivery-error",
  		invalidHandler: function(event, validator) {

  		},
  		showErrors: function(errorMap, errorList) {
        this.defaultShowErrors();
      },
  		submitHandler: function(){
  			checkout($(".florist-one-flower-delivery-checkout-page").val(), $form.serializeArray());
  		}
  	});
  });
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document)
	.ready(function(){

		$('.florist-one-flower-delivery-loading').hide();

		jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
			phone_number = phone_number.replace(/\s+/g, "");
			return this.optional(element) || phone_number.length > 9 &&
				phone_number.match(/^\(?[\d]{3}\)?[\s-]?[\d]{3}[\s-]?[\d]{4}$/);
		}, "Please specify a valid phone number");

		jQuery.validator.addMethod("recipientZip", function(value, element) {
			return this.optional(element) || /(^\d{5}$)|(^[A-Za-z]{1}\d{1}[A-Za-z]{1} *\d{1}[A-Za-z]{1}\d{1}$)/.test(value)
		}, "This is not a valid US or Canadian ZIP");

		jQuery.validator.addMethod("CCExp", function(value, element, params) {
			var minMonth = new Date().getMonth() + 1;
			var minYear = new Date().getFullYear();
			minYear = (minYear + '').substring(2, 4);
			var month = parseInt($(params.month).val(), 10);
			var year = parseInt($(params.year).val(), 10);
			return this.optional(element) || (year > minYear || (year == minYear && month >= minMonth));
		}, "Your Credit Card Expiration date is invalid.");

		jQuery.validator.addMethod("CCCVV2", function(value, element, params) {
			var cc_type = $(params.cc_type).val();
			var cc_cvv2 = $(params.cc_cvv2).val();
			return this.optional(element) || ((cc_type == 'AX' && cc_cvv2.length == 4) || (cc_type != 'AX' && cc_cvv2.length == 3));
		}, "Your CVV2 is invalid.");

		jQuery.validator.addMethod("creditCardNumber", function(value, element) {
			var strippedValue = value.replace(/[^0-9]+/g,'');
			return this.optional(element) ||  /^.{15,16}$/.test(strippedValue)
		}, "Please enter a valid credit card number.");

	})
  .ajaxStart(function () {

    $('.florist-one-flower-delivery-loading').show();

  })
  .ajaxStop(function () {

    $('.florist-one-flower-delivery-loading').hide();

  });

})( jQuery );
