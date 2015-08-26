<?php
/**
 * The template for displaying Taxonomy Archive pages
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
		<!--<p class="breadcrumb"><a href="/">Home</a> > <a href="/<?=substr($uriArr[1], 0, -1)?>"><?=substr(ucwords(str_replace('-', ' ', $uriArr[1])), 0, -1)?></a> > <?=ucwords(str_replace('-', ' ', $uriArr[2]))?></p>-->
	</div>


<div class="primary">

	<div class="categories">
		<ul>
			<?php
				$taxonomies = array(
					'categories'
				);
				$args = array(
					'hide_empty' => false
				);
				$terms = get_terms($taxonomies, $args);
				foreach($terms as $term) {
					echo "<li class=\"";
					if($term->slug == $uriArr[2]) { echo "active "; }
					echo $term->slug . "\">";
					echo "<a class=\"image\" href=\"/blogs/" . $term->slug . "\"><img src=\"/dress/blog/category-" . $term->slug . ".png\" /></a>";
					echo "<a class=\"term\" href=\"/blogs/" . $term->slug . "\">" . $term->name . "</a>";
					echo "</li>";
				}
			?>
		</ul>
	</div>

<?php while ( have_posts() ) : the_post(); ?>
	<?php global $post; ?>

	<article>
		<div class="image">
			<?php $image = pods_field('featured_image');
			echo "<img src=\"" . $image['guid'] . "\" />"; ?>
		</div>
		<div class="content">
			<h2><a href="/blog/<?=$post->post_name ?>"><?php the_title(); ?></a></h2>
			<?php $terms = get_the_terms($post->ID, "blog_category");
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

<?php else: ?>
<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

</div>

<div class="secondary">
	<?php Starkers_Utilities::get_template_parts( array( 'blog-secondary' ) ); ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>