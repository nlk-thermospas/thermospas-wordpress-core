function navigation() {
	jQuery('.nav ul li').hoverIntent(
		function() {
			jQuery(this).addClass('active');
			jQuery(this).find('>ul').show();
		},
		function() {
			jQuery(this).removeClass('active');
			jQuery(this).find('>ul').hide();
		}
	);
}

function killNavigation() {
	jQuery('.nav ul li').unbind('mouseenter').unbind('mouseleave');
	jQuery('.nav ul li').removeProp('hoverIntent_t');
	jQuery('.nav ul li').removeProp('hoverIntent_s');
}

function mobileNavigation() {
	jQuery('.stripe .nav>ul').hide();
	jQuery('.stripe .search').hide();
	jQuery('a.touch-activator').on('click', function(){
		jQuery('.stripe .nav>ul').toggle();
		jQuery('.stripe .search').toggle();
	});
	jQuery('.nav>ul>li>a, .nav>ul>li>ul>li>a').on('click', function(){
		if(jQuery(this).parent().find('>ul').length > 0) {
			jQuery(this).parent().find('>ul').toggle();
			return false;
		} else {
			return true;
		}
	});
}

function killMobileNavigation() {
	jQuery('a.touch-activator').off();
	jQuery('.nav>ul>li>a, .nav>ul>li>ul>li>a').unbind('click');
	jQuery('.stripe .nav>ul').show();
	jQuery('.stripe .search').show();
}

function navManager() {
	if(jQuery(window).width() > 1024) {
		killMobileNavigation();
		navigation();
	} else {
		killNavigation();
		killMobileNavigation();
		mobileNavigation();
	}
}

function moveFooter() {
	if(window.location.pathname != "/get-free-site-inspection/" && window.location.pathname != "/get-free-brochure-dvd-1000-coupon/" && window.location.pathname != "/get-pricing/") {
		if(jQuery(window).width() > 1024) {
			jQuery('footer').insertAfter('.primary');
			jQuery('footer').insertAfter('.free-inspection');
		} else {
			jQuery('footer').insertAfter('.secondary');
		}
	}
}

function equalizer() {
	if(jQuery(window).width() > 1024) {
		var primaryHeight = jQuery('.primary').height();
		var secondaryHeight = jQuery('.secondary').height();
		if(primaryHeight > secondaryHeight) {
			jQuery('.secondary').height(primaryHeight);
		} else {
			jQuery('.primary').height(secondaryHeight);
		}
	} else {
		jQuery('.primary').css('height', 'auto');
		jQuery('.secondary').css('height', 'auto');
	}
}

function privacyModal() {
	jQuery('.privacy-modal').on('click', function(){
		if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/iPod/i))) {
			window.location.href = "/thermospas-privacy-policy/";
		} else {
			jQuery(this).parent().parent().find('.privacy-modal-container').modal();
			return false;
		}
	});
}

var doit;

jQuery(function() {
	navManager();
	moveFooter();
	privacyModal();
	jQuery(window).resize(function(){
		clearTimeout(doit);
  		doit = setTimeout(navManager, 100);
  		moveFooter();
	});
});