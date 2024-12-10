jQuery(document).ready(function($) {


	if (window.innerWidth <= 992) {

		$('.galleryMobile .galleryMobilePager').bxSlider({
			mode: 'fade',
			controls: false,
			captions: true
		});

	}

	$("[href='#galleryMobile-modal-video']").fancybox({
		padding 	: 0,
		margin 		: 0,
		openEffect  : 'none',
		closeEffect : 'none',
		helpers 	: {
	        overlay : {
	            css : {
	                'background' : 'rgba(0,0,0,0.9)'
	            }
	        }
	    },
	    afterClose: function(){
	    	if (typeof window.currentVideoId != 'undefined')
	    		hasher.setHash(window.currentVideoId);
	    }
	});

	$("[href='#galleryMobile-modal-video']").on('click', function(){
 
    	var $gallery = $('#galleryMobile-modal-video');

    	$gallery.find('.galleryMobile-modal-title').html($(this).attr('data-name'));
    	$gallery.find('.galleryMobile-modal-subtitle').html($(this).attr('data-site'));

    	var $modalVideo = $gallery.find('.js-movie-container');

    	$modalVideo.html('');
    	$modalVideo.html($('#video_template').html().replace('{{video}}', $(this).attr('data-video')));


	})

});