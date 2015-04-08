<div class="blog-search">
	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<input type="text" name="s" id="s" placeholder="Search Blog" />
		<input type="hidden" name="post_type" value="post" />
		<input type="submit" id="searchsubmit" value="Search" />
	</form>
</div>

<div class="featured-review">
	<h2>Featured Review</h2>
	<?php Starkers_Utilities::get_template_parts( array( 'featured-review' ) ); ?>
	<!--<a href="#" class="more-reviews">Read more customer reviews</a> -->
</div>

<div class="free-quote">
	<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]'); ?>
<div class="privacy">
		<p><a class="privacy-modal" href="#">Privacy Policy</a></p>
		<div class="privacy-modal-container">
			<iframe src="/privacy-policy-lightbox"></iframe>
		</div>
	</div>

</div>

<div class="facebook-feed">
	<div class="fb-like-box" data-href="https://www.facebook.com/ThermoSpas" data-width="215" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
</div>

<div class="social">
	<ul>
		<li class="facebook"><a href="https://www.facebook.com/ThermoSpas" target="_blank">Facebook</a></li>
		<li class="twitter"><a href="https://twitter.com/thermospas" target="_blank">Twitter</a></li>
		<li class="youtube"><a href="https://www.youtube.com/user/ThermoSpaInc" target="_blank">YouTube</a></li>
		<li class="pinterest"><a href="https://www.pinterest.com/thermospas/" target="_blank">Pinterest</a></li>
		<li class="google-plus"><a href="https://plus.google.com/105685619272308310345/posts" target="_blank">Google+</a></li>
		<li class="rss"><a href="https://feeds.feedburner.com/ThermospasHotTubs" target="_blank">RSS</a></li>
	</ul>
</div>