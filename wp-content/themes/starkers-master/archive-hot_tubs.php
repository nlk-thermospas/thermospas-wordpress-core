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

<?php
$productIDs = "";
$args = array(
	'numberposts' => -1,
	'post_type' => 'hot_tubs',
	'orderby' => 'title',
	'order' => 'ASC'
);
$tubs = get_posts($args);
foreach($tubs as $tub) {
	$bazaarVoiceID = get_post_meta($tub->ID, 'bazaarvoice_id', true);
	$productIDs .= "'";
	$productIDs .= $bazaarVoiceID;
	$productIDs .= "'";
	$productIDs .= ", ";
}
$productIDs = rtrim($productIDs, ", ");

?>

<script type="text/javascript">
	$BV.ui( 'rr', 'inline_ratings', {
		productIds : [<?=$productIDs?>],
		containerPrefix : 'BVRRInlineRating'
	});
</script>

<div class="heading hot-tub-lists">
	<div class="series">
		<h1>Select a ThermoSpas Hot Tub <em>by Series</em></h1>
		<?php $uriArr = explode('/', $_SERVER['REQUEST_URI']); ?>
	</div>
	<div class="seats">
		<h1>Select a ThermoSpas Hot Tub <em>by Number</em></h1>
		<?php $uriArr = explode('/', $_SERVER['REQUEST_URI']); ?>
	</div>
</div>
<div class="primary">
<article class="hot-tubs-lists">

	<div class="series">

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
				echo "<h2 class=\"shadow-header\" id=\"a" . $term->slug . "\">" . $term->name . " Series</h2>";
				$args = array(
					'numberposts' => -1,
					'post_type' => 'hot_tubs',
					'series' => $term->name,
					'orderby' => 'post__in',
					'include' => array(76,77,78,79,80,81,82,83,84,85,86,87,88,89)
				);
				$tubs = get_posts($args);
				echo "<ul>";
				foreach($tubs as $tub) {
					$tubImage = get_post_meta($tub->ID, 'images', true);
					if(isset($tubImage['guid'])) {
						$tubImage = $tubImage['guid'];
					}
					echo "<li>";
					echo "<div class=\"image\"><a href=\"/hot-tubs/" . $tub->post_name . "\"><img src=\"" . $tubImage . "\" alt=\"" . $tub->post_title . "\" /></a></div>";
					echo "<h3><a href=\"/hot-tubs/" . $tub->post_name . "\">" . $tub->post_title . "</a></h3>";
					$seats = get_post_meta($tub->ID, 'seats', true);
					$jets = get_post_meta($tub->ID, 'jets', true);
					echo "<p class=\"meta\">Seats: " . $seats . " Adults | " . $jets . " Jets</p>";
					$bazaarVoiceID = get_post_meta($tub->ID, 'bazaarvoice_id', true);
					echo "<div id=\"BVRRInlineRating-" . $bazaarVoiceID . "\"></div>";
					$blurb = get_post_meta($tub->ID, 'blurb', true);
					echo "<p class=\"blurb\">";
					echo $blurb;
					echo "</p>";
					echo "<p class=\"more\"><a href=\"/hot-tubs/" . $tub->post_name . "\">Learn More</a></p>";
					echo "</li>";
				}
				echo "</ul>";
			}
		?>

	</div>

	<div class="seats">

		<div class="jump">
			<p>Jump to hot tubs designed for <a href="#seats|3">2-3 people</a> | <a href="#seats|4">4 people</a> | <a href="#seats|5">5 people</a> | <a href="#seats|6">6+ people</a>
		</div>

		<h2 class="shadow-header" id="a3">2-3 Person Hot Tubs</h2>
		<ul>
				<?php $args = array(
					'numberposts' => -1,
					'post_type' => 'hot_tubs',
					'orderby' => 'post__in',
					'include' => array(76,84,79,77,78,85,82,86,80,81,83,88,87,89),
					'number_of_seats' => '2',
				);
				$tubs = get_posts($args);
				foreach($tubs as $tub) {
					$tubImage = get_post_meta($tub->ID, 'images', true);
					if(isset($tubImage['guid'])) {
						$tubImage = $tubImage['guid'];
					}
					echo "<li>";
					echo "<div class=\"image\"><a href=\"/hot-tubs/" . $tub->post_name . "\"><img src=\"" . $tubImage . "\" alt=\"" . $tub->post_title . "\" /></a></div>";
					echo "<h3><a href=\"/hot-tubs/" . $tub->post_name . "\">" . $tub->post_title . "</a></h3>";
					$seats = get_post_meta($tub->ID, 'seats', true);
					$jets = get_post_meta($tub->ID, 'jets', true);
					echo "<p class=\"meta\">Seats: " . $seats . " Adults | " . $jets . " Jets</p>";
					$bazaarVoiceID = get_post_meta($tub->ID, 'bazaarvoice_id', true);
					echo "<div class=\"BVRRInlineRating BVRRInlineRating-" . $bazaarVoiceID . "\"></div>";
					$blurb = get_post_meta($tub->ID, 'blurb', true);
					echo "<p class=\"blurb\">" . $blurb . "</p>";
					echo "<p class=\"more\"><a href=\"/hot-tubs/" . $tub->post_name . "\">Learn More</a></p>";
					echo "</li>";
				}

				$args = array(
					'numberposts' => -1,
					'post_type' => 'hot_tubs',
					'orderby' => 'post__in',
					'include' => array(76,84,79,77,78,85,82,86,80,81,83,88,87,89),
					'number_of_seats' => '3',
				);
				$tubs = get_posts($args);
				foreach($tubs as $tub) {
					$tubImage = get_post_meta($tub->ID, 'images', true);
					if(isset($tubImage['guid'])) {
						$tubImage = $tubImage['guid'];
					}
					echo "<li>";
					echo "<div class=\"image\"><a href=\"/hot-tubs/" . $tub->post_name . "\"><img src=\"" . $tubImage . "\" alt=\"" . $tub->post_title . "\" /></a></div>";
					echo "<h3><a href=\"/hot-tubs/" . $tub->post_name . "\">" . $tub->post_title . "</a></h3>";
					$seats = get_post_meta($tub->ID, 'seats', true);
					$jets = get_post_meta($tub->ID, 'jets', true);
					echo "<p class=\"meta\">Seats: " . $seats . " Adults | " . $jets . " Jets</p>";
					$bazaarVoiceID = get_post_meta($tub->ID, 'bazaarvoice_id', true);
					echo "<div class=\"BVRRInlineRating BVRRInlineRating-" . $bazaarVoiceID . "\"></div>";
					$blurb = get_post_meta($tub->ID, 'blurb', true);
					echo "<p class=\"blurb\">" . $blurb . "</p>";
					echo "<p class=\"more\"><a href=\"/hot-tubs/" . $tub->post_name . "\">Learn More</a></p>";
					echo "</li>";
				} ?>
		</ul>
		<h2 class="shadow-header" id="a4">4 Person Hot Tubs</h2>
		<ul>
				<?php $args = array(
					'numberposts' => -1,
					'post_type' => 'hot_tubs',
					'orderby' => 'post__in',
					'include' => array(76,84,79,77,78,85,82,86,80,81,83,88,87,89),
					'number_of_seats' => '4',
				);
				$tubs = get_posts($args);
				foreach($tubs as $tub) {
					$tubImage = get_post_meta($tub->ID, 'images', true);
					if(isset($tubImage['guid'])) {
						$tubImage = $tubImage['guid'];
					}
					echo "<li>";
					echo "<div class=\"image\"><a href=\"/hot-tubs/" . $tub->post_name . "\"><img src=\"" . $tubImage . "\" alt=\"" . $tub->post_title . "\" /></a></div>";
					echo "<h3><a href=\"/hot-tubs/" . $tub->post_name . "\">" . $tub->post_title . "</a></h3>";
					$seats = get_post_meta($tub->ID, 'seats', true);
					$jets = get_post_meta($tub->ID, 'jets', true);
					echo "<p class=\"meta\">Seats: " . $seats . " Adults | " . $jets . " Jets</p>";
					$bazaarVoiceID = get_post_meta($tub->ID, 'bazaarvoice_id', true);
					echo "<div class=\"BVRRInlineRating BVRRInlineRating-" . $bazaarVoiceID . "\"></div>";
					$blurb = get_post_meta($tub->ID, 'blurb', true);
					echo "<p class=\"blurb\">" . $blurb . "</p>";
					echo "<p class=\"more\"><a href=\"/hot-tubs/" . $tub->post_name . "\">Learn More</a></p>";
					echo "</li>";
				} ?>
		</ul>
		<h2 class="shadow-header" id="a5">5 Person Hot Tubs</h2>
		<ul>
				<?php $args = array(
					'numberposts' => -1,
					'post_type' => 'hot_tubs',
					'orderby' => 'post__in',
					'include' => array(76,84,79,77,78,85,82,86,80,81,83,88,87,89),
					'number_of_seats' => '5',
				);
				$tubs = get_posts($args);
				foreach($tubs as $tub) {
					$tubImage = get_post_meta($tub->ID, 'images', true);
					if(isset($tubImage['guid'])) {
						$tubImage = $tubImage['guid'];
					}
					echo "<li>";
					echo "<div class=\"image\"><a href=\"/hot-tubs/" . $tub->post_name . "\"><img src=\"" . $tubImage . "\" alt=\"" . $tub->post_title . "\" /></a></div>";
					echo "<h3><a href=\"/hot-tubs/" . $tub->post_name . "\">" . $tub->post_title . "</a></h3>";
					$seats = get_post_meta($tub->ID, 'seats', true);
					$jets = get_post_meta($tub->ID, 'jets', true);
					echo "<p class=\"meta\">Seats: " . $seats . " Adults | " . $jets . " Jets</p>";
					$bazaarVoiceID = get_post_meta($tub->ID, 'bazaarvoice_id', true);
					echo "<div class=\"BVRRInlineRating BVRRInlineRating-" . $bazaarVoiceID . "\"></div>";
					$blurb = get_post_meta($tub->ID, 'blurb', true);
					echo "<p class=\"blurb\">" . $blurb . "</p>";
					echo "<p class=\"more\"><a href=\"/hot-tubs/" . $tub->post_name . "\">Learn More</a></p>";
					echo "</li>";
				} ?>
		</ul>
		<h2 class="shadow-header" id="a6">6+ Person Hot Tubs</h2>
		<ul>
				<?php $args = array(
					'numberposts' => -1,
					'post_type' => 'hot_tubs',
					'orderby' => pods_field('seats'),
					'include' => array(76,84,79,77,78,85,82,86,80,81,83,88,87,89),
					'number_of_seats' => '6',
				);
				$tubs = get_posts($args);
				foreach($tubs as $tub) {
					$tubImage = get_post_meta($tub->ID, 'images', true);
					if(isset($tubImage['guid'])) {
						$tubImage = $tubImage['guid'];
					}
					echo "<li>";
					echo "<div class=\"image\"><a href=\"/hot-tubs/" . $tub->post_name . "\"><img src=\"" . $tubImage . "\" alt=\"" . $tub->post_title . "\" /></a></div>";
					echo "<h3><a href=\"/hot-tubs/" . $tub->post_name . "\">" . $tub->post_title . "</a></h3>";
					$seats = get_post_meta($tub->ID, 'seats', true);
					$jets = get_post_meta($tub->ID, 'jets', true);
					echo "<p class=\"meta\">Seats: " . $seats . " Adults | " . $jets . " Jets</p>";
					$bazaarVoiceID = get_post_meta($tub->ID, 'bazaarvoice_id', true);
					echo "<div class=\"BVRRInlineRating BVRRInlineRating-" . $bazaarVoiceID . "\"></div>";
					$blurb = get_post_meta($tub->ID, 'blurb', true);
					echo "<p class=\"blurb\">" . $blurb . "</p>";
					echo "<p class=\"more\"><a href=\"/hot-tubs/" . $tub->post_name . "\">Learn More</a></p>";
					echo "</li>";
				} ?>
		</ul>

	</div>

	<?php Starkers_Utilities::get_template_parts( array( 'free-inspection' ) ); ?>

	<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

</article>
</div>

<div class="secondary">
	<?php Starkers_Utilities::get_template_parts( array( 'secondary' ) ); ?>
</div>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>