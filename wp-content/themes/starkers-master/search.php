<?php
/**
 * Search results page
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) ); ?>

<div class="heading">
	<?php if(isset($_GET['post_type']) && $_GET['post_type'] == "post") { ?>
		<h1>Blog Search Results for '<?php echo get_search_query(); ?>'</h1>
	<?php } else { ?>
		<h1>Search Results for '<?php echo get_search_query(); ?>'</h1>
	<?php } ?>
</div>

<div class="primary">
	<?php if ( have_posts() ): ?>
		<article>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php global $post; ?>
			<?php if(isset($_GET['post_type']) && $_GET['post_type'] == "post") { ?>
				<?php if($post->post_type == "post") { ?>
					<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p class="date"><?php echo mysql2date('M j, Y', get_the_date()); ?></p>
					<p><?php echo the_excerpt(); ?></p>
					<p class="read-more"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">Read More...</a></h2>
				<?php } ?>
			<?php } else { ?>
				<?php if($post->post_type == "post") { ?>
					<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p class="date"><?php echo mysql2date('M j, Y', get_the_date()); ?></p>
					<p><?php echo the_excerpt(); ?></p>
					<p class="read-more"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">Read More...</a></h2>
				<?php } elseif($post->post_type == "page") { ?>
					<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p><?php echo the_excerpt(); ?></p>
					<p class="read-more"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">Read More...</a></h2>
				<?php } elseif($post->post_type == "hot_tubs") { ?>
					<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php $blurb = get_post_meta($post->ID, 'blurb', true); ?>
					<p><?php echo $blurb; ?></p>
					<p class="read-more"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">Read More...</a></h2>
				<?php } ?>
			<?php } ?>
			<hr />
		<?php endwhile; ?>

			<div class="pagination">
				<p class="nav-previous alignleft"><?php next_posts_link( 'Next Page' ); ?></p>
				<p class="nav-next alignright"><?php previous_posts_link( 'Previous Page', $custom_query->max_num_pages ); ?></p>
			</div>
		</article>
	<?php else: ?>

		<h2>No results found for '<?php echo get_search_query(); ?>'</h2>

	<?php endif; ?>

	<?php Starkers_Utilities::get_template_parts( array( 'free-inspection' ) ); ?>

	<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>
</div>

<div class="secondary">
	<?php if(isset($_GET['post_type']) && $_GET['post_type'] == "post") { ?>
		<?php Starkers_Utilities::get_template_parts( array( 'blog-secondary' ) ); ?>
	<?php } else { ?>
		<?php Starkers_Utilities::get_template_parts( array( 'secondary' ) ); ?>
	<?php } ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>