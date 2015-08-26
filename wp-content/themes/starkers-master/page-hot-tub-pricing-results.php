<?php
/**
 * The template for displaying the thank you page.
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
			<?=apply_filters('the_content', $post->post_content) ?>


<?php
$callOuts = get_post_meta($post->ID, 'call-outs', true);
if($callOuts != "") {
?>
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

<!-- Google Code for All Site Visitors -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1070435200;
    var google_conversion_label = "w9mUCOCF3QEQgJe2_gM";
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<noscript>
	<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1070435200/?value=0&amp;label=w9mUCOCF3QEQgJe2_gM&amp;guid=ON&amp;script=0"/>
	</div>
</noscript>

<?php 
/*
<!-- Bing -->
<script type="text/javascript">
	if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};
</script>
<script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/7eda56ec-dae3-4bd4-915b-8a11f9d7ad95/mstag.js"></script>
<script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"572823",type:"1",actionid:"66891"})</script>
<noscript>
	<iframe src="//flex.msn.com/mstag/tag/7eda56ec-dae3-4bd4-915b-8a11f9d7ad95/analytics.html?dedup=1&domainId=572823&type=1&actionid=66891" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe>
</noscript>

<!-- Google Code for Clix Conversion Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ * /
    var google_conversion_id = 1070435200;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "UstwCKjK2QEQgJe2_gM";
    var google_conversion_value = 0;
    var google_remarketing_only = false;
    /* ]]> * /
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<noscript>
	<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1070435200/?value=0&amp;label=UstwCKjK2QEQgJe2_gM&amp;guid=ON&amp;script=0"/>
	</div>
</noscript>
*/ ?>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>