
jQuery(function($){

	// on upload button click
	$('body').on( 'click', '.misha-upl', function(e){

		e.preventDefault();

		var button = $(this),
		custom_uploader = wp.media({
			title: 'Insert image',
			library : {
				// uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
				type : 'image'
			},
			button: {
				text: 'Use this image' // button label text
			},
			multiple: false
		}).on('select', function() { // it also has "open" and "close" events
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			// button.html('<img src="' + attachment.url + '">').next().val(attachment.id).next().show();
			jQuery('input#image_id').val(attachment.id);
			document.getElementById("misha-rmv").style.display = "block";
			document.getElementById("misha-upl").style.display = "none";
			document.getElementById("misha-img").style.display = "block";
			$('#misha-img').attr('src', attachment.url);

		}).open();
	
	});

	// on remove button click
	$('body').on('click', '.misha-rmv', function(e){

		e.preventDefault();

		var button = $(this);
		document.getElementById("misha-rmv").style.display = "none";
		document.getElementById("misha-upl").style.display = "block";
		document.getElementById("misha-img").style.display = "none";
		jQuery('input#image_id').val("");

	});

});