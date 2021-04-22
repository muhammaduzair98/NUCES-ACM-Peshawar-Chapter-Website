(function($) {
	
	$(document).ready(function($){
		var template = $('.jr-container select[id$="template"]')
		if ( template.val() == 'thumbs' || template.val() == 'thumbs-no-border' || template.val() == 'slider' || template.val() == 'slider-overlay') {
			template.closest('.jr-container').find('select[id$="images_link"] option[value="popup"]').animate({opacity: 'hide' , height: 'hide'}, 200);

			window.image_link_val = template.closest('.jr-container').find('select[id$="images_link"]').val();
			template.closest('.jr-container').find('select[id$="images_link"]').val("image_link");
		}
		else {
			template.closest('.jr-container').find('select[id$="images_link"] option[value="popup"]').animate({opacity: 'show' , height: 'show'}, 200);
			template.closest('.jr-container').find('select[id$="images_link"]').val(window.image_link_val);
		}

		// Hide Custom Url if image link is not set to custom url
		$('body').on('change', '.jr-container select[id$="images_link"]', function(e){
			var images_link = $(this);
			if ( images_link.val() != 'custom_url' ) {
				images_link.closest('.jr-container').find('input[id$="custom_url"]').val('').parent().animate({opacity: 'hide' , height: 'hide'}, 200);
			} else {
				images_link.closest('.jr-container').find('input[id$="custom_url"]').parent().animate({opacity: 'show' , height: 'show'}, 200);
			}
		});

		// Modify options based on template selections
		$('body').on('change', '.jr-container select[id$="template"]', function(e){
			var template = $(this);
			if ( template.val() == 'thumbs' || template.val() == 'thumbs-no-border' ) {
				template.closest('.jr-container').find('.jr-slider-options').animate({opacity: 'hide' , height: 'hide'}, 200);
				template.closest('.jr-container').find('input[id$="columns"]').closest('p').animate({opacity: 'show' , height: 'show'}, 200);
			} else {
				template.closest('.jr-container').find('.jr-slider-options').animate({opacity: 'show' , height: 'show'}, 200);
				template.closest('.jr-container').find('input[id$="columns"]').closest('p').animate({opacity: 'hide' , height: 'hide'}, 200);
			}
			if( template.val() != 'masonry') {
				template.closest('.jr-container').find('.masonry_settings').animate({opacity: 'hide' , height: 'hide'}, 200);
				template.closest('.jr-container').find('.masonry_notice').animate({opacity: 'hide' , height: 'hide'}, 200);
			} else {
				template.closest('.jr-container').find('.masonry_settings').animate({opacity: 'show' , height: 'show'}, 200);
				template.closest('.jr-container').find('.masonry_notice').animate({opacity: 'show' , height: 'show'}, 200);
			}
			if( template.val() != 'slick_slider') {
				template.closest('.jr-container').find('.slick_settings').animate({opacity: 'hide' , height: 'hide'}, 200);
			} else {
				template.closest('.jr-container').find('.slick_settings').animate({opacity: 'show' , height: 'show'}, 200);
			}
			if( template.val() != 'highlight') {
				template.closest('.jr-container').find('.highlight_settings').animate({opacity: 'hide' , height: 'hide'}, 200);
			} else {
				template.closest('.jr-container').find('.highlight_settings').animate({opacity: 'show' , height: 'show'}, 200);
			}
			if( template.val() != 'slider' && template.val() != 'slider-overlay') {
				template.closest('.jr-container').find('.slider_normal_settings').animate({opacity: 'hide' , height: 'hide'}, 200);
			} else {
				template.closest('.jr-container').find('.slider_normal_settings').animate({opacity: 'show' , height: 'show'}, 200);
			}
			if( template.val() == 'highlight' || template.val() == 'slick_slider' || template.val() == 'thumbs' || template.val() == 'thumbs-no-border'){
				template.closest('.jr-container').find('.words_in_caption').animate({opacity: 'hide' , height: 'hide'}, 200);
			} else {
				template.closest('.jr-container').find('.words_in_caption').animate({opacity: 'show' , height: 'show'}, 200);
			}

			if ( template.val() == 'thumbs' || template.val() == 'thumbs-no-border' || template.val() == 'slider' || template.val() == 'slider-overlay') {
				template.closest('.jr-container').find('select[id$="images_link"] option[value="popup"]').animate({opacity: 'hide' , height: 'hide'}, 200);

				window.image_link_val = template.closest('.jr-container').find('select[id$="images_link"]').val();
				template.closest('.jr-container').find('select[id$="images_link"]').val("image_link");
			}
			else {
				template.closest('.jr-container').find('select[id$="images_link"] option[value="popup"]').animate({opacity: 'show' , height: 'show'}, 200);
				template.closest('.jr-container').find('select[id$="images_link"]').val(window.image_link_val);
			}
		});

		// Modfiy options when search for is changed
		$('body').on('change', '.jr-container input:radio[id$="search_for"]', function(e){
			var search_for = $(this);
			if ( search_for.val() === 'hashtag' ) {
				search_for.closest('.jr-container').find('[id$="attachment"]:checkbox').closest('p').animate({opacity: 'hide' , height: 'hide'}, 200);
				search_for.closest('.jr-container').find('select[id$="images_link"] option[value="user_url"]').animate({opacity: 'hide' , height: 'hide'}, 200);			
				search_for.closest('.jr-container').find('select[id$="images_link"] option[value="attachment"]').animate({opacity: 'hide' , height: 'hide'}, 200);
				search_for.closest('.jr-container').find('select[id$="images_link"]').val('image_link');				
				search_for.closest('.jr-container').find('select[id$="description"] option[value="username"]').animate({opacity: 'hide' , height: 'hide'}, 200);
				search_for.closest('.jr-container').find('input[id$="blocked_users"]').closest('p').animate({opacity: 'show' , height: 'show'}, 200);
				search_for.closest('.jr-container').find('input[id$="show_feed_header"]').closest('p').animate({opacity: 'hide' , height: 'hide'}, 200);
				$('#img_to_show').animate({opacity: 'hide' , height: 'hide'}, 200);


			} else if(search_for.val() === 'username') {
				search_for.closest('.jr-container').find('[id$="attachment"]:checkbox').closest('p').animate({opacity: 'show' , height: 'show'}, 200);				
				search_for.closest('.jr-container').find('select[id$="images_link"] option[value="user_url"]').animate({opacity: 'show' , height: 'show'}, 200);			
				search_for.closest('.jr-container').find('select[id$="images_link"] option[value="attachment"]').animate({opacity: 'show' , height: 'show'}, 200);		
				search_for.closest('.jr-container').find('select[id$="images_link"]').val('image_link');
				search_for.closest('.jr-container').find('select[id$="description"] option[value="username"]').animate({opacity: 'show' , height: 'show'}, 200);
				search_for.closest('.jr-container').find('input[id$="blocked_users"]').closest('p').animate({opacity: 'hide' , height: 'hide'}, 200);
				search_for.closest('.jr-container').find('input[id$="show_feed_header"]').closest('p').animate({opacity: 'show' , height: 'show'}, 200);
				$('#img_to_show').animate({opacity: 'hide' , height: 'hide'}, 200);

			} else if(search_for.val() === 'account') {
				search_for.closest('.jr-container').find('[id$="attachment"]:checkbox').closest('p').animate({opacity: 'hide' , height: 'hide'}, 200);
				search_for.closest('.jr-container').find('select[id$="images_link"] option[value="user_url"]').animate({opacity: 'hide' , height: 'hide'}, 200);
				search_for.closest('.jr-container').find('select[id$="images_link"] option[value="attachment"]').animate({opacity: 'hide' , height: 'hide'}, 200);
				search_for.closest('.jr-container').find('select[id$="images_link"]').val('image_link');
				search_for.closest('.jr-container').find('select[id$="description"] option[value="username"]').animate({opacity: 'hide' , height: 'hide'}, 200);
				search_for.closest('.jr-container').find('input[id$="blocked_users"]').closest('p').animate({opacity: 'hide' , height: 'hide'}, 200);
				search_for.closest('.jr-container').find('input[id$="show_feed_header"]').closest('p').animate({opacity: 'show' , height: 'show'}, 200);
				$('#img_to_show').animate({opacity: 'show' , height: 'show'}, 200);

			}
		});
	
		// Hide blocked images if not checked attachments
		$('body').on('change', '.jr-container [id$="attachment"]:checkbox', function(e){
			var attachment = $(this);
			if ( this.checked ) {
				attachment.closest('.jr-container').find('select[id$="images_link"] option[value="attachment"]').animate({opacity: 'show' , height: 'show'}, 200);
				attachment.closest('.jr-container').find('select[id$="images_link"]').val('image_link');
			} else {
				attachment.closest('.jr-container').find('select[id$="images_link"] option[value="attachment"]').animate({opacity: 'hide' , height: 'hide'}, 200);				
				attachment.closest('.jr-container').find('select[id$="images_link"]').val('image_link');
			}
		});

		// Toggle advanced options
		$('body').on('click', '.jr-advanced', function(e){
			e.preventDefault();
			var advanced_container = $(this).parent().next();
			
			if ( advanced_container.is(':hidden') ) {
				$(this).html('[ - Close ]');
			} else {
				$(this).html('[ + Open ]');
			}
			advanced_container.toggle();
		});	
		
		// Remove blocked images with ajax
		$('body').on('click', '.jr-container .jr-delete-instagram-dupes', function(e){
			e.preventDefault();
			var $this  = $(this),
				username  = $(this).data("username"),
				ajaxNonce = $(this).closest('.jr-container').find('input[name=delete_insta_dupes_nonce]').val();

			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'jr_delete_insta_dupes',
					username : username,
					_ajax_nonce: ajaxNonce
				},
				beforeSend: function () {
					$this.prop('disabled', true);
					$this.closest('.jr-container').find('.jr-spinner').addClass( 'spinner' ).css({'visibility':'visible','float':'none'});
				},
				success: function(data, textStatus, XMLHttpRequest) {
					$this.closest('.jr-container').find('.deleted-dupes-info').text( 'Removed Duplicates: '+  data.deleted);
				},
				complete: function () {
					$this.prop('disabled', false);
					$this.closest('.jr-container').find('.jr-spinner').addClass( 'spinner' ).css({'visibility':'hidden','float':'none'});
				},				
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					//console.log(XMLHttpRequest.responseText);
				}
			});
		});
		// Delete account with ajax
		$('.wis-delete-account').on('click', function (e) {
			e.preventDefault();

			var c = confirm(wis.remove_account);

			if (!c) {
				return false;
			}

			var $item = $(this),
				$tr = $item.closest('tr'),
				$spinner = $('#wis-delete-spinner-'+$item.data('item_id'));

			$.ajax({
				url: ajaxurl,
				type: 'post',
				data: {
					action: 'wis_delete_account',
					item_id: $item.data('item_id'),
					_ajax_nonce: wis.nonce
				},
				beforeSend: function () {
					$spinner.addClass('is-active');
				},
				success: function (response) {
					if (response.success) {
						$tr.fadeOut();
						//window.location.reload();
					} else {
						alert(response.data);
					}
				},
				complete: function () {
					$spinner.removeClass('is-active');
				},
				error: function (jqXHR, textStatus) {
					console.log(textStatus);
				}
			});
		});

		$('.wis-not-working').on('click', function (e) {
			e.preventDefault();
			$('#wis-add-token').animate({opacity: 'show' , height: 'show'}, 200)
		});

		$('#wis-btn-manual-token').on('click', function (e) {
			e.preventDefault();
			var tok = $('#wis-manual-token').val();
			var spin = $('#wis-add-token-spinner');
			spin.addClass('is-active');
			$('#wis-btn-manual-token').attr('disabled','disabled');

			jQuery.post ( ajaxurl, {
				action:      'wis_add_account_by_token',
				insttoken:       tok,
				_ajax_nonce: add_account_nonce.nonce,
			}).done( function( html ) {
				console.log(html + ": " + tok);
				window.location.reload();
			});

		});
	}); // Document Ready

})(jQuery);
