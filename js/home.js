jQuery(function(){
	jQuery('.modal').hide();
	jQuery('.testimonials ul li a').on('click', function() {
		jQuery(this).parent().find('.modal').modal();
	});
});