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
	</div>

<?php global $post; ?>

	<div class="primary">
		<article>
			<?=apply_filters('the_content', $post->post_content) ?>
		</article>
	</div>

<?php endwhile; ?>

<div class="secondary">
	<?php echo do_shortcode('[gravityform id=4 title=false description=false ajax=true]'); ?>
	<script>
		jQuery(document).ready(function(){
			jQuery('#input_4_9').datepicker({ 
		   					minDate: 0,
		  					maxDate: +7
						});	
		});
	</script>
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