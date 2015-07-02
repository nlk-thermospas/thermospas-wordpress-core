<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) ); ?>



<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="heading">
		<h1><?php the_field('headline'); ?></h1>
	</div>
	<div class="billboard" style="background: url(<?php the_field('billboard_image'); ?>) no-repeat left top">
		<div class="billboard-content-container">
			<div class="billboard-content">
				<h2><?php the_field('billboard_heading'); ?></h2>
				<a href="<?php the_field('billboard_button_link'); ?>"><?php the_field('billboard_button_text'); ?></a>
				<p><?php the_field('billboard_text'); ?></p>
			</div>
		</div>
	</div>
	<div class="promo">
		<img src="<?php bloginfo('template_url');?>/images/thermo_mb.png" class="gfform-img"/>
		<?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
		<div class="privacy">
			<p><a class="privacy-modal" href="#">Privacy Policy</a></p>
			<div class="privacy-modal-container">
				<iframe src="/privacy-policy-lightbox"></iframe>
			</div>
		</div>
		<div class="awards">
			<h3>Industry Awards &amp; Recognition</h3>
			<ul>
				<li class="apsp"><a href="/about-us/company-information/#awards-section" target="_blank">The Association of Pool &amp; Spa Professionals</a></li>
				<li class="arthritis"><a href="/about-us/company-information/#awards-section" target="_blank">Arthritis Foundation</a></li>
				<li class="bbb"><a href="/about-us/company-information/#awards-section" target="_blank">Better Business Bureau</a></li>
				<li class="nspi"><a href="/about-us/company-information/#awards-section" target="_blank">National Spa &amp; Pool Institute</a></li>
			</ul>
		</div>
	</div>
	<div class="testimonials">
		<h2 class="shadow-header"><?php the_field('testimonials_heading'); ?></h2>
		<?php
			$testimonials = get_field('testimonials');
			if( $testimonials ): ?>
    			<ul>
    				<?php foreach( $testimonials as $post): ?>
        				<?php setup_postdata($post); ?>
        				<li>
        					<?php $image = pods_field('image'); ?>
        					<a href="#">
        						<img src="<?php echo($image['guid']); ?>" alt="<?=get_post_meta($image['ID'], '_wp_attachment_image_alt', true) ?>"/>
	        					<?php $video = pods_field('video'); ?>
        					</a>
        					<div class="modal">
	        					<?php echo $video[0]; ?>
	        				</div>
            				<h3><?php the_title(); ?></h3>
            				<p><?php the_field('blurb'); ?></p>
        				</li>
    				<?php endforeach; ?>
    			</ul>
    			<?php wp_reset_postdata(); ?>
			<?php endif;
		?>
	</div>
	<div class="differences">
		<h2 class="shadow-header"><?php the_field('differences_heading'); ?></h2>
		<?php
			$differences = get_field('differences');
			if( $differences ): ?>
    			<ul>
    				<?php foreach( $differences as $post): ?>
        				<?php setup_postdata($post); ?>
        				<li>
        					<?php $imageArr = pods_field('image'); ?>
            				<a href="<?php the_field('learn_more_link'); ?>"><img src="<?php echo $imageArr['guid']; ?>" alt="<?=get_post_meta($image['ID'], '_wp_attachment_image_alt', true) ?>" /></a>
            				<h3><?php the_title(); ?></h3>
            				<p><?php the_field('blurb'); ?> <a href="<?php the_field('learn_more_link'); ?>">Learn More</a></p>
        				</li>
    				<?php endforeach; ?>
    			</ul>
    			<?php wp_reset_postdata(); ?>
			<?php endif;
		?>
	</div>
	<div style="clear: both;">&nbsp;</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>