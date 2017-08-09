(function( $ ) {
	'use strict';

	var ajaxurl = ajax_object.ajax_url;

  $(function(){

    var colorPickerInputs = $( '.florist-one-flower-delivery-color-picker' );
  	$( '.florist-one-flower-delivery-color-picker' ).wpColorPicker();

		$('input[name="florist-one-flower-delivery\\[products\\]"]').on("change", function(){
			if ($('input[name="florist-one-flower-delivery\\[products\\]"]:checked').val() == 1){
				$('.autopop-address').css('display','table-row');
				$('.florist_selection_section').css('display','block');
				$('.additional_holidays').css('display','none');
			}
			else{
				$('.additional_holidays').css('display','table-row');
				$('.autopop-address').css('display','none');
				$('.florist_selection_section').css('display','none');
			}

		})

		$(".florist-one-flower-delivery-show_add_another_florist_btn").click(function(e){
			e.preventDefault();
			$('.florist-one-flower-delivery-show_add_another_florist_row').css('display','table-row');
			$(".florist-one-flower-delivery-show_add_another_florist_btn").css('display', 'none');
		});

		$(".florist-one-flower-delivery-cancel_add_another_florist_btn").click(function(e){
			e.preventDefault();
			$('.florist-one-flower-delivery-show_add_another_florist_row').css('display','none');
			$(".florist-one-flower-delivery-show_add_another_florist_btn").css('display', 'block');
		});

		$(".florist-one-flower-delivery-add_another_florist_btn").click(function(e){
			e.preventDefault();

			var florists = ( $.parseJSON( $('.florist-one-flower-delivery-florists_of_choice').val()) != null ? $.parseJSON( $('.florist-one-flower-delivery-florists_of_choice').val() ) : [] );
			florists.push({code: $(".new_florist_code option:selected").val(), name: $(".new_florist_code option:selected").html() });
			$('.florist-one-flower-delivery-florists_of_choice').val(JSON.stringify(florists));
			update_your_florists();
		});

		$(document).on("click", "a.delete_florist", function(e){
			e.preventDefault();
			var florists = ( $.parseJSON( $('.florist-one-flower-delivery-florists_of_choice').val()) != null ? $.parseJSON( $('.florist-one-flower-delivery-florists_of_choice').val() ) : [] );
			florists.splice($(this).attr("data-array-index"), 1);
			$('.florist-one-flower-delivery-florists_of_choice').val(JSON.stringify(florists));
			update_your_florists();
		});

		var update_your_florists = function(){
			var your_florists = $.parseJSON( $('.florist-one-flower-delivery-florists_of_choice').val() );
			var htmlString = '';
			htmlString = htmlString + '<table>';
			if (your_florists.length < 1){ htmlString = htmlString + '<tr><td colspan="2">You have no selected florists</td></tr>'; }
			for(var i=0;i<your_florists.length;i++){
				htmlString = htmlString + '<tr>';
				htmlString = htmlString + '<td>' + 'Florist ' + (i+1) + ' - </td>';
				htmlString = htmlString + '<td>' + your_florists[i]["name"] + ' </td>';
				htmlString = htmlString + '<td>' + '<a href="#" id="delete_florist-' + i + '" class="delete_florist" data-array-index="' + i + '">delete</a>' + '</td>';
				htmlString = htmlString + '</tr>';
			}
			htmlString = htmlString + '</table>';
			$(".your_florists").html(htmlString);

			if (your_florists.length >= 2){
				$('.florist-one-flower-delivery-show_add_another_florist_btn').css('display','none');
				$('.florist-one-flower-delivery-show_add_another_florist_row').css('display','none');
			}
			else{
				$('.florist-one-flower-delivery-show_add_another_florist_btn').css('display','block');
				$('.florist-one-flower-delivery-show_add_another_florist_row').css('display','none');
			}

		}

		var get_florists = function(){

			var city  = $("#florist-one-flower-delivery-address_city" ).val();
			var state = $("#florist-one-flower-delivery-address_state").val();

			var data = {
				'action': 'get_florists_for_facility_code',
				'city': city,
				'state': state,
			};

			jQuery.post(ajaxurl, data, function(response, status){
				var options = $("#new_florist_code");
				options.empty();
				$.each($.parseJSON(response).FLORISTS, function() {
				    options.append($("<option />").val(this.CODE).text(this.NAME.replace(/["']/g, "")));
				});
			}, "html");
		}

		var show_hide_florist_selection_row = function(){
			var show_hide  = $("input:radio[name=florist-one-flower-delivery\\[florist_selection\\]]:checked" ).val();
			if (show_hide == 1){
				$(".florist-selection-row").css("display","table-row");
				$(".florist-one-flower-delivery-show_add_another_florist_row").css("display","none");
			}
			else{
				$(".florist-selection-row").css("display","none");
				$(".florist-one-flower-delivery-show_add_another_florist_row").css("display","none");
			}
		}

		$("input:radio[name=florist-one-flower-delivery\\[florist_selection\\]]" ).on("change", function(){
			show_hide_florist_selection_row();
		});

		$("#florist-one-flower-delivery-address_state, #florist-one-flower-delivery-address_city" ).on("change", function(){
			get_florists();
		});

		$(document).ready(function(){
			$('input[name="florist-one-flower-delivery\\[products\\]"]').trigger("change");
			get_florists();
			show_hide_florist_selection_row();
			update_your_florists();
		});

  });

})( jQuery );
