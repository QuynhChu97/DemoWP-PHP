jQuery(document).ready(function($){
	jQuery('.switch_options').each(function() {

		//This object
		var obj = jQuery(this);

		var enb = obj.children('.switch_enable'); //cache first element, this is equal to ON
		var dsb = obj.children('.switch_disable'); //cache first element, this is equal to OFF
		var input = obj.children('input'); //cache the element where we must set the value
		var input_val = obj.children('input').val(); //cache the element where we must set the value

		/* Check selected */
		if( 0 == input_val ){
			dsb.addClass('selected');
		}
		else if( 1 == input_val ){
			enb.addClass('selected');
		}

		//Action on user's click(ON)
		enb.on('click', function(){
			$(dsb).removeClass('selected'); //remove "selected" from other elements in this object class(OFF)
			$(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(ON) 
			$(input).val(1).change(); //Finally change the value to 1
		});

		//Action on user's click(OFF)
		dsb.on('click', function(){
			$(enb).removeClass('selected'); //remove "selected" from other elements in this object class(ON)
			$(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(OFF) 
			$(input).val(0).change(); // //Finally change the value to 0
		});

	});

	var upgrade_notice = '<div class="notice-up">';
	upgrade_notice += '<a class="upgrade-pro-demo" target="_blank" href="http://8degreethemes.com/demos/?theme=wimpie-pro">View WIMPIE PRO</a></div>';
	jQuery('#customize-info').append(upgrade_notice);


	/** Ajax Plugin Installation **/
	$(".install").on('click', function (e) {
		e.preventDefault();
		var el = $(this);

		is_loading = true;
		el.addClass('installing');
		var plugin = $(el).attr('data-slug');
		var plugin_file = $(el).attr('data-file');
		var ajaxurl = wimpieWelcomeObject.ajaxurl;
		var plhref = $(el).attr('href');
		var newPlhref = plhref.split('&');
		var plNonce = newPlhref[newPlhref.length-1];
		var newPlhref = plNonce.split('=');
		var plNonce = newPlhref[newPlhref.length-1];
		if(plNonce==''){
			var plNonce = wimpieWelcomeObject.admin_nonce;
		}

		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'wimpie_lite_plugin_installer',
				plugin: plugin,
				plugin_file: plugin_file,
				nonce: plNonce,
			},
			success: function(response) {

				if(response == 'success'){
					
					el.attr('class', 'installed button');
					el.html(wimpieWelcomeObject.installed_btn);
					
				}

				el.removeClass('installing');
				is_loading = false;
		   		//location.reload();
		   	},
		   	error: function(xhr, status, error) {
		   		console.log(status);
		   		el.removeClass('installing');
		   		is_loading = false;
		   	}
		   });
	});

	/** Ajax Plugin Installation (Offlines) **/
	$('.install-offline').on('click', function (e) {
		e.preventDefault();
		var el = $(this);

		is_loading = true;
		el.addClass('installing');

		var file_location = el.attr('href');
		var github = $(el).attr('data-github');
		var slug = $(el).attr('data-slug');
		var file = el.attr('data-file');
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'wimpie_lite_plugin_offline_installer',
				file_location: file_location,
				file: file,
				slug: slug,
				github: github,
				dataType: 'json'
			},
			success: function(response) {

				if(response == 'success'){
					
					el.attr('class', 'installed button');
					el.html(wimpieWelcomeObject.installed_btn);
					
				}

				is_loading = false;
				location.reload();
			},
			error: function(xhr, status, error) {
				el.removeClass('installing');
				is_loading = false;
			}
		});
	});

	/** Ajax Plugin Activation **/
	$(".activate").on('click', function (e) {
		
		var el = $(this);
		var plugin = $(el).attr('data-slug');

		var ajaxurl = wimpieWelcomeObject.ajaxurl;
		
		
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'wimpie_lite_plugin_activation',
				plugin: plugin,
				nonce: wimpieWelcomeObject.activate_nonce,
				dataType: 'json'
			},
			success: function(response) {
				if(response){
					if(response.status === 'success'){
						el.attr('class', 'installed button');
						el.html(wimpieWelcomeObject.installed_btn);
					}
				}
				is_loading = false;
				location.reload();
			},
			error: function(xhr, status, error) {
				console.log(status);
				is_loading = false;
			}
		});
	});

	/** Ajax Plugin Activation Offline **/
	$('.activate-offline').on('click', function (e) {
		e.preventDefault();
		
		var el = $(this);
		var plugin = $(el).attr('data-slug');

		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'wimpie_lite_plugin_offline_activation',
				plugin: plugin,
				nonce: wimpieWelcomeObject.activate_nonce,
				dataType: 'json'
			},
			success: function(response) {
				if(response){
					el.attr('class', 'installed button');
					el.html(wimpieWelcomeObject.installed_btn);
				}
				is_loading = false;
				location.reload();
			},
			error: function(xhr, status, error) {
				console.log(status);
				is_loading = false;
			}
		});
	});

});
