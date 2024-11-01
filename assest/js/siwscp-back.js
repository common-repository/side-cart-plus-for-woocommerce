jQuery(document).ready(function(){
	 jQuery('.siwscp_main_generate div.siwscp_tab li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');
        jQuery('.siwscp_main_generate div.siwscp_tab li').removeClass('current');
        jQuery('.siwscp_main_generate .tabcontent').removeClass('current');
        jQuery(this).addClass('current');
        jQuery("#"+tab_id).addClass('current');
    })  
	 jQuery('#siwscp_select_product').select2({
  	    ajax: {
    			url: ajaxurl,
    			dataType: 'json',
    			allowClear: true,
    			data: function (params) {
    				return {
        				q: params.term,
        				action: 'WFC_product_ajax'
      				};
      			},
    			processResults: function( data ) {
  					var options = [];
  					if ( data ) {
  	 					jQuery.each( data, function( index, text ) { 
  							options.push( { id: text[0], text: text[1], 'price': text[2]} );
  						});
  	 				}
  					return {
  						results: options
  					};
				},
				cache: true
		},
		minimumInputLength: 3 
	});

})