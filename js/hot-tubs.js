jQuery(function(){

	/* SLIDER */
	/* jQuery('.slider ul').bxSlider({
		pagerCustom: '#bx-pager',
		controls: false
	}); */

	/* TABS */
	jQuery('.tabs').tabs();

	/* LISTING PAGES */
	function hashTracker() {
		jQuery('.series, .seats').hide();
		if(window.location.hash != "") {
			var hash = window.location.hash;
			var hashArr = hash.split("|");
			if(hashArr.length == 1) {
				hash = hashArr[0].substring(1);
				jQuery('.' + hash).show();
			} else {
				hash = hashArr[0].substring(1);
				jQuery('.' + hash).show();
				if(hashArr[1] == 3 || hashArr[1] == 7) {
					hashArr[1]--;
				}
				setTimeout(function(){jQuery(window).scrollTop(jQuery('#a' + hashArr[1]).offset().top-40);	}, 100);
			}
		}
		else
		{
			jQuery('.series, .seats').show();
		}
	}

	hashTracker();
	jQuery(window).on('hashchange', function() {
		hashTracker();
	});

});

jQuery( window ).load(function() {
	jQuery('.BVRRInlineRating').each(function(){
		console.log("hit");
		jQuery(this).removeClass('BVRRInlineRating');
		var thisClass = jQuery(this).attr('class');
		console.log(thisClass);
		jQuery('#' + thisClass).clone().insertAfter(jQuery(this));
	});
});