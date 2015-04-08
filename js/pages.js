jQuery(function(){
	jQuery('table').each(function(){
		jQuery(this).find('tr:odd').addClass('odd');
	});

	/**jQuery('.call-outs img').each(function(){
		jQuery(this).parent().addClass('image');
	});
	jQuery('.call-outs hr').each(function(){
		var callout = jQuery('<div class="call-out"></div>');
		callout.append(jQuery(this).prevAll());
		jQuery(this).prevAll().remove();
		callout.insertAfter('.call-outs');
	});
	jQuery('.call-outs').addClass('call-out').removeClass('call-outs');
	jQuery('.call-out').find('hr').remove();
	jQuery('.call-out').wrapAll('<div class="call-outs"></div>');
	jQuery('.call-outs').append(jQuery('.call-out').get().reverse())
	jQuery('.call-out').each(function(){
		var callout = jQuery(this);
		if(!callout.children(':first').hasClass('image') || callout.children(':first').hasClass('ignore')) {
			if(callout.children(':first').is('div')) {

			} else {
				var calloutItems = jQuery(this).children();
				callout.append(calloutItems.get().reverse());
			}
		}
	});
	jQuery('.call-outs .image').each(function(){
		jQuery(this).nextAll().wrapAll('<div class="co-content"></div>');
	});**/

	jQuery('.modal').hide();
	jQuery('.videos ul li a, .secondary .privacy p a').on('click', function() {
		jQuery(this).parent().find('.modal').modal();
	});
});