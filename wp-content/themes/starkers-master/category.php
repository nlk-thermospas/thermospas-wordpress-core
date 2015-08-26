<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) ); ?>

<?php if ( have_posts() ): ?>
	<div class="heading">
		<h1>ThermoSpas Blog - <?php echo single_cat_title( '', false ); ?></h1>
		<?php $uriArr = explode('/', $_SERVER['REQUEST_URI']); ?>
	</div>


<div class="primary">

<?php Starkers_Utilities::get_template_parts( array( 'blog-nav' ) ); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php global $post; ?>

	<article>
		<div class="image">
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			echo "<img src=\"" . $image[0] . "\" />"; ?>
		</div>
		<div class="content">
			<h2><a href="/blog/<?=$post->post_name ?>"><?php the_title(); ?></a></h2>
			<?php $terms = get_the_category($post->ID);
			$termString = "";
			foreach($terms as $term) {
				$termString .= $term->name;
				$termString .= ", ";
			}
			$termString = substr($termString, 0, -2); ?>
			<p class="posted-on">on <?php the_time( get_option( 'date_format' ) ); ?> in <?=$termString ?></p>
			<p class="blurb"><?php the_excerpt() ?></p>
			<p class="more"><a href="/blog/<?=$post->post_name ?>">Read more...</a></p>
		</div>
	</article>
<?php endwhile; ?>

<div class="pagination">
	<p class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></p>
	<p class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></p>
</div>

<?php else: ?>
<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
<?php endif; ?>

	<?php Starkers_Utilities::get_template_parts( array( 'free-inspection' ) ); ?>

	<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

</div>

<div class="secondary">
	<?php Starkers_Utilities::get_template_parts( array( 'blog-secondary' ) ); ?>
</div>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>