<?php
/**
 * Template Name: Reviews
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

$bv = new BV(
    array(
        'deployment_zone_id' => 'ReadOnly-en_US',
        'product_id' => "TS-ALL-REVIEWS", // must match ExternalID in the BV product feed
        'cloud_key' => 'thermospas-b54386e4fe2a2ebd9478b68fca20be5b',
        'staging' => false
        )
    );


?>
<?php Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php global $post; ?>

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

	<div class="primary">
		<article>
			<script>
				$BV.configure("global", { "productId" : "TS-ALL-REVIEWS" });
				$BV.ui( 'rr', 'show_reviews', {
					doShowContent : function () {
				    	// If the container is hidden (such as behind a tab), put code here to make it visible (open the tab).
					}
				});
				function submitGeneric() {
				    $BV.ui(
				        "rr",
				        "submit_generic",
				        { "categoryId" : "TS" }
				    );
				}
			</script>
				<?=apply_filters('the_content', $post->post_content) ?>
			<div itemscope itemtype="http://schema.org/Product">
				<meta itemprop="name" content="<?php echo the_title(); ?>" />
				<button type="button" class="button btn red-btn bv-write-review bv-focusable bv-submission-button" onclick="submitGeneric();">Write a Review</button>
				<div id="BVRRContainer">
		    		<?php echo $bv->reviews->getContent();?>
				</div>
			</div>
			<?php
			$callOuts = get_post_meta($post->ID, 'call-outs', true);
			if($callOuts != "") { ?>
				<div class="call-outs-container" style="display: block; float: left; background: yellow">
					<div class="call-outs">
						<?php
						echo apply_filters('the_content', $callOuts);
						?>
					</div>
				</div>
			<?php } ?>
		</article>

		<?php

			$tubs = get_post_meta($post->ID, 'recommended_hot_tubs');

			if(count($tubs) > 0) {
				if(count($tubs) >= 1 && $tubs[0] != "") {

					echo "<div class=\"recommended-hot-tubs\">";
					echo "<h2 class=\"shadow-header\">Recommended Hot Tubs</h2>";
					echo "<ul>";

					$tubs = $tubs[0];
					for($i = 0; $i < count($tubs); $i++) {
						$tub = get_post($tubs[$i]);
						$hotTubImage = get_post_meta($tubs[$i], 'images', true);
						$hotTubBlurb = get_post_meta($tubs[$i], 'blurb', true);
						echo "<li>";
						if(isset($hotTubImage)) {
							echo "<div class=\"image\">";
							echo "<a href=\"/hot-tubs/" . $tub->post_name . "\">";
							if(isset($hotTubImage['guid'])) {
								echo "<img src=\"" . $hotTubImage['guid'] . "\" alt=\"" . $tub->post_title . "\" />";
							}
							echo "</a>";
							echo "</div>";
						}
						echo "<h3><a href\"/hot-tubs/" . $tub->post_name . "\">" . $tub->post_title . "</a></h3>";
						echo "<p class=\"blurb\">" . substr($hotTubBlurb, 0, 100) . "... <a href=\"/hot-tubs/" . $tub->post_name . "\">Learn More</a></p>";
						echo "</li>";
					}
					echo "</ul>";
					echo "</div>";

				}
			}

			$videos = get_post_meta($post->ID, 'related_videos');

			if(count($videos) > 0) {
				if(count($videos) >= 1 && $videos[0] != "") {

					echo "<div class=\"videos\">";
					echo "<h2 class=\"shadow-header\">Videos</h2>";
					echo "<ul>";

					$videos = $videos[0];
					for($i = 0; $i < count($videos); $i++) {
						$video = get_post($videos[$i]);
						$videoCode = get_post_meta($videos[$i], 'video', true);
						$videoImage = get_post_meta($videos[$i], 'image', true);
						echo "<li>";
						if(isset($videoImage['guid'])) {
							echo "<a href=\"#\"><img src=\"" . $videoImage['guid'] . "\" alt=\"" . get_post_meta($videoImage['ID'], '_wp_attachment_image_alt', true) . "\" />";
							echo "</a>";
						}
						echo "<div class=\"modal\">" . $videoCode . "</div>";
						echo "<h3>" . $video->post_title . "</h3>";
						echo "</li>";
					}
					echo "</ul>";
					echo "</div>";
				}
			}
		?>

<?php

$additonalResources = get_post_meta($post->ID, 'additonal_resources', true);

?>

		<article>
			<?=apply_filters('the_content', $additonalResources) ?>
		</article>

		<?php Starkers_Utilities::get_template_parts( array( 'free-inspection' ) ); ?>

		<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>
	</div>

<?php endwhile; ?>

<div class="secondary">
	<?php Starkers_Utilities::get_template_parts( array( 'secondary' ) ); ?>
</div>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>