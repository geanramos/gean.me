jQuery(document).ready(function($) {
	$('.launch-sliderthumb .slider-pager-wrapper .scrollbox').jScrollPane();

	var $slider = $('.launch-sliderthumb .slider'),
		$sliderClone = $slider.clone(),
		$sliderPager = $('.slider-pager'),
		$sliderPagerItem = $('.launch-sliderthumb .slider-pager-item'),
		$sliderPagerScrollbox = $('.slider-pager-wrapper .scrollbox'),
		$bxSlider,
		sliderBxActive = false,
		sliderNumber,
		reg = new RegExp('^[0-9]+$'),
		hashUrl = location.hash.split('#')[1];

		try{
			hashUrl = hashUrl.split('/')[0];	
			
		}catch(e){
			hashUrl = false;
		}

		//Check if the hash is empty
		if (hashUrl){
			
			// Check if the hash is greater than the amount of slide OR hash = 0 OR if the hash contains letters
			if ( (parseInt(hashUrl) > $('.launch-sliderthumb .slider').children().length) || parseInt(hashUrl) === 0 || !reg.test(hashUrl)) {
				// location.hash = '#1';
				sliderNumber = 1;
			} else {
				sliderNumber = parseInt(hashUrl);
			}

		} else {
			// location.hash = '#1';
			sliderNumber = 1;
		}

	if (window.innerWidth >= 992) {

		$bxSlider = $slider.bxSlider({
			useCSS: false,
			infiniteLoop: false,
			controls: false,
			pagerCustom: '.launch-sliderthumb .slider-pager',
			startSlide: sliderNumber-1, 
			onSlideBefore: function($slideElement, oldIndex, newIndex){
				var newHash = newIndex+1;
				location.hash = '#' + newHash;
				sliderNumber = newHash;
			}
		});
		
		sliderBxActive = true;

		$sliderPagerItem.unbind('click').click(function() {

			number = $(this).find(".slider-pager-num").text().replace(". ", "");
			title = $(this).find(".slider-pager-title").text();

			$("header hgroup .launch-header-title").html('<span>Video ' + number + '</span><span>'+ title +'</span>');
		});

	} else {

		$sliderPagerItem.each(function(index) {
			$(this).prependTo('.slider li:eq('+index+')');
			$slider.children().eq(sliderNumber-1).css('height', 'auto').find('a').addClass('active');
		});

		$sliderPagerItem.unbind('click').click(function() {

			var $sliderPagerItemActive = $sliderPagerItem.filter('.active'),
				reducedHeight = $(this).outerHeight(),
				mediaHeight = $(this).siblings().innerHeight(),
				expandedHeight = reducedHeight + mediaHeight,
				isActive = $(this).hasClass('active');

			$sliderPagerItemActive.removeClass('active').parent().stop().animate({
				height: reducedHeight
			}, 500, 'easeInOutExpo', function(){
				$sliderPagerItemActive.parent().css('height','');
			});

			if (!isActive) {
				$(this).parent().stop().animate({
					height: expandedHeight
				}, 500, 'easeInOutExpo', function() {
					$(this).css('height', 'auto');
					$('html, body').stop().animate({
						scrollTop: $sliderPagerItem.filter('.active').offset().top - $('.launch-header').innerHeight()
					}, 500, 'easeOutExpo');
					var newHash = $sliderPagerItem.filter('.active').parent().index()+1;
					location.hash = '#' + newHash;
					sliderNumber = newHash;
				}).find('.slider-pager-item').addClass('active');
			}

		});

	}

	$(window).resize(function() {

		if (window.innerWidth >= 992) {

			if (sliderBxActive === false) {

				$sliderPagerItem.removeClass('active').each(function(index) {
					$(this).appendTo('.slider-pager');
				});

				$slider.children().stop().css('height', '');

				$bxSlider = $slider.bxSlider({
					useCSS: false,
					infiniteLoop: false,
					controls: false,
					pagerCustom: '.launch-sliderthumb .slider-pager',
					startSlide: sliderNumber-1,
					onSlideBefore: function($slideElement, oldIndex, newIndex){
						var newHash = newIndex+1;
						location.hash = '#' + newHash;
						sliderNumber = newHash;
					}
				});
				sliderBxActive = true;

			}

		} else {

			if (sliderBxActive === true) {	

				$bxSlider.destroySlider();
				$slider.parents('.bx-wrapper').replaceWith($sliderClone.clone());
				sliderBxActive = false;

				$sliderPagerItem.removeClass('active').each(function(index) {
					$(this).prependTo('.slider li:eq('+index+')');
					$slider.children().eq(sliderNumber-1).css('height', 'auto').find('a').addClass('active');					
				});

			}

			$sliderPagerItem.unbind('click').click(function() {

				var $sliderPagerItemActive = $sliderPagerItem.filter('.active'),
					reducedHeight = $(this).outerHeight(),
					mediaHeight = $(this).siblings().innerHeight(),
					expandedHeight = reducedHeight + mediaHeight,
					isActive = $(this).hasClass('active');

				$sliderPagerItemActive.removeClass('active').parent().stop().animate({
					height: reducedHeight
				}, 500, 'easeInOutExpo', function(){
					$sliderPagerItemActive.parent().css('height','');
				});

				if (!isActive) {
					$(this).parent().stop().animate({
						height: expandedHeight
					}, 500, 'easeInOutExpo', function() {
						$(this).css('height', 'auto');
						$('html, body').stop().animate({
							scrollTop: $sliderPagerItem.filter('.active').offset().top - $('.launch-header').innerHeight()
						}, 500, 'easeOutExpo');
						
						var newHash = $sliderPagerItem.filter('.active').parent().index()+1;
						location.hash = '#' + newHash;
						sliderNumber = newHash;
					}).find('.slider-pager-item').addClass('active');
				}

			});

		}

	});

	titleVideo ();

	function titleVideo (){
		var number = $(".launch-sliderthumb .slider-pager .slider-pager-item:eq("+(sliderNumber-1)+") .slider-pager-num").text().replace(". ", "");
		var title = $(".launch-sliderthumb .slider-pager .slider-pager-item:eq("+(sliderNumber-1)+") .slider-pager-title").text();
		$("header hgroup").append('<h2 class="launch-header-title hidden-xs"><span>Video ' + number + '</span><span>'+ title +'</span></h2>');
	}

});
