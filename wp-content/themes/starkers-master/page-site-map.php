<?php
/**
 * The Template for displaying all single pages
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
		<!--<p class="breadcrumb"><a href="/">Home</a> > Site Map</p>-->
	</div>

	<div class="primary">

		<article>

			<ul>
				<li><a href="/hot-tubs/#seats">Hot Tubs</a>
					<ul>
						<li><a href="/hot-tubs/#seats">Select By Number of People</a>
							<ul>
								<li><a href="/hot-tubs/#seats|3">Up to 3 people</a></li>
								<li><a href="/hot-tubs/#seats|4">Up to 4 people</a></li>
								<li><a href="/hot-tubs/#seats|5">Up to 5 people</a></li>
								<li><a href="/hot-tubs/#seats|6">More than 5 people</a></li>
							</ul>
						</li>
						<li><a href="/hot-tubs/#series">Select By Series</a>
							<ul>
								<?php
									$taxonomies = array(
    									'series'
									);
									$args = array(
										'hide_empty' => false,
										'orderby' => 'id'
									);
									$terms = get_terms($taxonomies, $args);
									foreach($terms as $term) {
										echo "<li><a href=\"/hot-tubs/#series|" . $term->slug . "\">" . $term->name . "</a></li>";
									}
								?>
							</ul>
						</li>
						<li><a href="/hot-tubs/#series">Select By Model</a>
							<ul>
								<?php
									$args = array(
										'numberposts' => -1,
    									'post_type' => 'hot_tubs',
    									'orderby' => 'title',
    									'order' => 'ASC'
									);
									$tubs = get_posts($args);
									foreach($tubs as $tub) {
										echo "<li><a href=\"/hot-tubs/" . $tub->post_name . "\">" . $tub->post_title . "</a></li>";
									}
								?>
							</ul>
						</li>
					</ul>
				</li>
				<li><span>Why Get a Hot Tub?</span>
					<?php
						$my_wp_query = new WP_Query();
						$all_wp_pages = $my_wp_query->query(array('post_type' => 'page','posts_per_page' => '-1', 'order' => 'ASC'));
						$children = get_page_children( 187, $all_wp_pages );
						echo "<ul>";
						foreach($children as $child) {
							echo "<li>";
							echo "<a href=\"/why-get-a-hot-tub/" . $child->post_name . "\">" . $child->post_title . "</a>";
							echo "</li>";
						}
						echo "</ul>";
					?>
				</li>
				<li><span>Features</span>
					<?php
						$my_wp_query = new WP_Query();
						$all_wp_pages = $my_wp_query->query(array('post_type' => 'page','posts_per_page' => '-1', 'order' => 'ASC'));
						$children = get_page_children( 175, $all_wp_pages );
						echo "<ul>";
						foreach($children as $child) {
							echo "<li>";
							echo "<a href=\"/features/" . $child->post_name . "\">" . $child->post_title . "</a>";
							echo "</li>";
						}
						echo "</ul>";
					?>
				</li>
				<li><span>About Us</span>
					<?php
						$my_wp_query = new WP_Query();
						$all_wp_pages = $my_wp_query->query(array('post_type' => 'page','posts_per_page' => '-1', 'order' => 'ASC'));
						$children = get_page_children( 128, $all_wp_pages );
						echo "<ul>";
						foreach($children as $child) {
							echo "<li>";
							echo "<a href=\"/about-us/" . $child->post_name . "\">" . $child->post_title . "</a>";
							echo "</li>";
						}
						echo "</ul>";
					?>
				</li>
				<li><a href="/reviews">Reviews</a></li>
				<li><a href="/blog">Blog</a></li>
				<li><a href="/privacy-policy">Privacy Policy</a></li>
				<li><a href="/contact-us">Contact Us</a></li>
				<li><a href="/site-map">Site Map</a></li>
				<li><a href="/patents">Patents</a></li>
			</ul>

		</article>

		<?php Starkers_Utilities::get_template_parts( array( 'free-inspection' ) ); ?>

		<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

	</div>

<div class="secondary">
	<?php Starkers_Utilities::get_template_parts( array( 'secondary' ) ); ?>
</div>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>