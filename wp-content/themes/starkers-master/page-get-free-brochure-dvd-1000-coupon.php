<?php Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="heading">
		<h1>
<?php
$main = get_post_meta($post->ID, 'main_heading', true);
if($main != "") {
	echo $main;
} else {
	the_title();
}
?>
		</h1>
		<?php $uriArr = explode('/', $_SERVER['REQUEST_URI']); ?>
		<!--<p class="breadcrumb"><a href="/">Home</a> > <?=ucwords(str_replace('-', ' ', $uriArr[1]))?></p>-->
	</div>

<?php global $post; ?>

	<div class="primary">
		<article>
			<?=apply_filters('the_content', $post->post_content) ?>
		</article>
	</div>

<?php endwhile; ?>

<div class="secondary">
	<div class="image">
		<img src="/dress/pages/free-brochure.png" />
	</div>
	<?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true]'); ?>
	<div class="privacy">
		<p><a class="privacy-modal" href="#">Privacy Policy</a></p>
		<div class="privacy-modal-container">
			<iframe src="/privacy-policy-lightbox"></iframe>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>