<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
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
	<h1>ThermoSpas Blog</h1>
</div>

<div class="primary">

<?php Starkers_Utilities::get_template_parts( array( 'blog-nav' ) ); ?>

<?php
	$args = array(
		'numberposts' => 1,
		'post_type' => 'post',
		'featured' => 'featured',
	);
	$featuredBlogs = get_posts($args);
	echo "<article class=\"featured\">";
	foreach($featuredBlogs as $featuredBlog) {
		$featureBlogID = $featuredBlog->ID;

		$featuredBlogImage = wp_get_attachment_image_src( get_post_thumbnail_id( $featuredBlog->ID ), 'single-post-thumbnail' );

		$imageID = get_post_thumbnail_id($featuredBlog->ID);

		echo "<div class=\"image\">";
		echo "<img src=\"" . $featuredBlogImage[0] . "\" alt=\"" . get_post_meta($imageID, '_wp_attachment_image_alt', true) . "\" />";
		echo "</div>";

		echo "<div class=\"content\">";
		echo "<h2><a href=\"/blog/" . $featuredBlog->post_name . "\"><span>Featured Post | </span>" . $featuredBlog->post_title . "</a></h2>";
		$terms = get_the_category($featureBlogID);
		$termString = "";
		foreach($terms as $term) {
			$termString .= $term->name;
			$termString .= ", ";
		}
		$termString = substr($termString, 0, -2);
		echo "<p class=\"posted-on\">on " . mysql2date('M j, Y', $featuredBlog->post_date) . " in " . $termString . "</p>";
		$featuredBlogContent = substr($featuredBlog->post_content, 0, 200);
		$featuredBlogContent .= "...";
		echo "<p class=\"blurb\">" . $featuredBlogContent . "</p>";
		echo "<p class=\"more\"><a href=\"/blog/" . $featuredBlog->post_name . "\">Read more...</a></p>";
		do_action( 'addthis_widget' );
		echo "</div>";
	}
	echo "</article>";
?>

	<?php
		// set up or arguments for our custom query
	  	$query_args = array(
	    	'post_type' => 'post',
	    	'post__not_in' => array($featureBlogID)
	  	);
		$query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	  	// create a new instance of WP_Query
	  	$custom_query = new WP_Query( $query_args );

	  	// Pagination fix
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $custom_query;
	?>

	<?php if ( $custom_query->have_posts() ) while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

	<?php global $post; ?>

	<article>
		<div class="image">
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			$imageID = get_post_thumbnail_id($post->ID);
			echo "<img src=\"" . $image[0] . "\" alt=\"" . get_post_meta($imageID, '_wp_attachment_image_alt', true) . "\" />"; ?>
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
			<?php $postContent = substr($post->post_content, 0, 200);
			$postContent .= "...";?>
			<p class="blurb"><?=$postContent ?></p>
			<p class="more"><a href="/blog/<?=$post->post_name ?>">Read more...</a></p>
		</div>
	</article>

	<?php endwhile; ?>

	<?php // Reset postdata
	wp_reset_postdata(); ?>

	<div class="pagination">
		<p class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></p>
		<p class="nav-next alignright"><?php previous_posts_link( 'Newer posts', $custom_query->max_num_pages ); ?></p>
	</div>

	<?php
	// Reset main query object
	$wp_query = NULL;
	$wp_query = $temp_query; ?>

	<?php Starkers_Utilities::get_template_parts( array( 'free-inspection' ) ); ?>

	<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

</div>

<div class="secondary">
	<?php Starkers_Utilities::get_template_parts( array( 'blog-secondary' ) ); ?>
</div>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>