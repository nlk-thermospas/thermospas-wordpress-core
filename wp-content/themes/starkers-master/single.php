<?php
/**
 * The Template for displaying all single posts
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
	<h1><?php the_title(); ?></h1>
	<?php $uriArr = explode('/', $_SERVER['REQUEST_URI']); ?>
</div>
<div class="primary">
	<?php global $post; ?>

	<?php Starkers_Utilities::get_template_parts( array( 'blog-nav' ) ); ?>

	<article class="single">
		<?php if ( ! in_category('videos') ) { ?>
		<div class="image">
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			$imageID = get_post_thumbnail_id($post->ID);
			echo "<img src=\"" . $image[0] . "\" alt=\"" . get_post_meta($imageID, '_wp_attachment_image_alt', true) . "\" />"; ?>
		</div>
		<?php } ?>
		<div class="content">
			<?php $terms = get_the_category($post->ID);
			$termString = "";
			foreach($terms as $term) {
				$termString .= $term->name;
				$termString .= ", ";
			}
			$termString = substr($termString, 0, -2); ?>
		<?php if ( ! in_category('videos') ) { ?>
			<p class="posted-on">on <?php the_time( get_option( 'date_format' ) ); ?> in <?=$termString ?></p>
		<?php } ?>
			<?=apply_filters('the_content', $post->post_content) ?>
			<span class="share-this">Share This:</span>
			<div class="addthis_native_toolbox"></div>
		</div>
		<div class="comments">
			<h2>Comments</h2>
			<?php $uriArr = explode('/', $_SERVER['REQUEST_URI']); ?>
			<div class="fb-comments" data-href="http://<?=$_SERVER['HTTP_HOST'] ?>/<?=$uriArr[1]?>/<?=$uriArr[2]?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
		</div>
		<div class="connect-recent">
			<div class="connect">
				<h3>Sign up for E-Mail updates</h3>
				<p>Subscribe to our RSS feed to receive e-mail updates</p>
				<form class="newsletter-form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=ThermospasHotTubs', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
					<input class="email" type="text" name="email" value="E-mail" onfocus="if (this.value == 'E-mail') {this.value = '';}" onblur="if (this.value == '') {this.value = 'E-mail';}">
					<input type="hidden" value="ThermospasHotTubs" name="uri">
					<input type="hidden" value="ThermoSpas Hot Tubs" name="title">
					<input type="hidden" name="loc" value="en_US">
					<input class="submit button red-btn" type="submit" name="submit" value="Submit">
					<input type="hidden" name="submit" value="Submit">
				</form>
			</div>
			<div class="recent-container">
				<div class="recent">
					<h3>Related Posts</h3>
					<ul>
						<?php

						$tags = wp_get_post_tags($post->ID);
						if ($tags) {
							$tag_ids = array();
							foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
							$args=array(
							'tag__in' => $tag_ids,
							'post__not_in' => array($post->ID),
							'posts_per_page'=>5, // Number of related posts that will be shown.
							'caller_get_posts'=>1
							);
						}
						$popPosts = new WP_Query( $args );
						while ($popPosts->have_posts()) : $popPosts->the_post();  $more = 0;?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</li>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
			</div>
		</div>
	</article>
	<?php Starkers_Utilities::get_template_parts( array( 'free-inspection' ) ); ?>

	<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

</div>

<div class="secondary">
	<?php Starkers_Utilities::get_template_parts( array( 'blog-secondary' ) ); ?>
</div>
<?php endwhile; ?>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>