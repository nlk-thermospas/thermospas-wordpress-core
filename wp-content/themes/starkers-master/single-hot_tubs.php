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

Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) );

if ( have_posts() ) while ( have_posts() ) : the_post();

$bazaarVoiceID = pods_field('bazaarvoice_id');
if ( function_exists('thermo_server') ) {
	$thermo_server = thermo_server();
	$is_staging = ( $thermo_server == 'dev' ? TRUE : FALSE );
} else {
	$is_staging = FALSE;
}
$bv = new BV(
    array(
        'deployment_zone_id' => 'Main_Site-en_US',
        'product_id' => $bazaarVoiceID[0], // must match ExternalID in the BV product feed
        'cloud_key' => 'thermospas-b54386e4fe2a2ebd9478b68fca20be5b',
        'staging' => $is_staging
        )
    );

?>

<script type="text/javascript">
	$BV.configure('global', { productId : '<?=$bazaarVoiceID[0]?>' });
	$BV.ui( 'rr', 'inline_ratings', {
		productIDs : ['<?=$bazaarVoiceID[0]?>'],
		containerPrefix : 'BVRRInlineRating'
	});
</script>

<div class="heading">
	<h1><?php $heading = pods_field('main_heading');
	echo $heading[0]; ?></h1>
</div>
<div class="primary">
<article>
	<div class="visuals">
		<div class="slider">
			<ul>
				<?php $images = pods_field('images');
				foreach($images as $image) {
					echo "<li><img src=\"" . $image['guid'] . "\" /></li>";
				} ?>
			</ul>
			<div id="bx-pager">
				<?php $counter = 0;
				foreach($images as $image) {
					echo "<a data-slide-index=\"" . $counter . "\" href=\"#\"><img src=\"" . $image['guid'] . "\" /></a>";
					$counter++;
				} ?>
			</div>
		</div>
		<div class="meta">
			<div class="main-info">
				<h2><?php the_title(); ?></h2>
				<p>Seats: <?php $seats = pods_field('seats'); echo $seats[0]; ?> Adults <br/>
					Jets: <?php $jets = pods_field('jets'); echo $jets[0]; ?></p>
			</div>
			<div class="reviews">
				<div id="BVRRInlineRating-<?=$bazaarVoiceID[0]?>"></div>
			</div>
			<div class="blurb">
				<p><?php $blurb = pods_field('blurb'); echo $blurb[0]; ?></p>
			</div>
			<div class="swatches">
				<h3>Available Shell Colors</h3>
				<ul>
					<?php $swatches = pods_field('shell_swatches');
						$swatchIDs = array();
						foreach($swatches as $swatch) {
							array_push($swatchIDs, get_post_meta($swatch['ID'], 'swatch', true));
						}
						foreach($swatchIDs as $swatch) {
							echo "<li><img src=\"" . $swatch['guid'] . "\" alt=\"" . $swatch['post_title'] . "\" />";
						}
					?>
				</ul>

				<h3>Available Cabinet Colors</h3>
				<ul>
					<?php $swatches = pods_field('cabinet_swatches');
						$swatchIDs = array();
						foreach($swatches as $swatch) {
							array_push($swatchIDs, get_post_meta($swatch['ID'], 'swatch', true));
						}
						foreach($swatchIDs as $swatch) {
							echo "<li><img src=\"" . $swatch['guid'] . "\" alt=\"" . $swatch['post_title'] . "\" />";
						}
					?>
				</ul>
			</div>
			<div class="dyo-promo only-desktop">
				<p>Click the button below to interactively customize colors, jets, options & more!</p>
				<a href="/dyo" class="btn blue-btn">Design Your Own!</a>
			</div>
			<div class="dyo-promo only-phone">
				<a href="/get-pricing" class="btn blue-btn">Get Pricing!</a>
			</div>
		</div>
	</div>

	<div class="information">
		<div itemscope itemtype="http://schema.org/Product">
			<div class="summary">
				<h2 class="shadow-header"><?php the_title(); ?> Summary</h2>
				<p><?php $summary = pods_field('summary'); echo $summary[0]; ?></p>
			</div>
			<div class="more-information">
				<h2 class="shadow-header"><?php the_title(); ?> Details</h2>
				<div class="tabs">
					<ul class="tab-nav">
						<li><a href="#features">Features</a></li>
						<li><a href="#options">Options</a></li>
						<li><a href="#specs">Specs</a></li>
						<li><a href="#warranty">Warranty</a></li>
						<li><a href="#reviews">Reviews</a></li>
					</ul>
					<div id="features" class="tab">
						<p><?php $features_text = pods_field('features_text'); echo $features_text[0]; ?></p>
						<ul class="features">
							<?php $feature = pods_field('feature_1'); ?>
							<?php if($feature != null) { ?>
							<li>
								<?php
								$featureImage = get_post_meta($feature['ID'], 'image', true);
								$featureText = get_post_meta($feature['ID'], 'text', true);
								$featureAlt = get_post_meta($featureImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $featureImage['guid'] . "\" alt=\"" . $featureAlt . "\" />";
								echo $featureText;
								?>
							</li>
							<?php } ?>
							<?php $feature = pods_field('feature_2'); ?>
							<?php if($feature != null) { ?>
							<li>
								<?php
								$featureImage = get_post_meta($feature['ID'], 'image', true);
								$featureText = get_post_meta($feature['ID'], 'text', true);
								$featureAlt = get_post_meta($featureImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $featureImage['guid'] . "\" alt=\"" . $featureAlt . "\" />";
								echo $featureText;
								?>
							</li>
							<?php } ?>
							<?php $feature = pods_field('feature_3'); ?>
							<?php if($feature != null) { ?>
							<li>
								<?php
								$featureImage = get_post_meta($feature['ID'], 'image', true);
								$featureText = get_post_meta($feature['ID'], 'text', true);
								$featureAlt = get_post_meta($featureImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $featureImage['guid'] . "\" alt=\"" . $featureAlt . "\" />";
								echo $featureText;
								?>
							</li>
							<?php } ?>
							<?php $feature = pods_field('feature_4'); ?>
							<?php if($feature != null) { ?>
							<li>
								<?php
								$featureImage = get_post_meta($feature['ID'], 'image', true);
								$featureText = get_post_meta($feature['ID'], 'text', true);
								$featureAlt = get_post_meta($featureImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $featureImage['guid'] . "\" alt=\"" . $featureAlt . "\" />";
								echo $featureText;
								?>
							</li>
							<?php } ?>
							<?php $feature = pods_field('feature_5'); ?>
							<?php if($feature != null) { ?>
							<li>
								<?php
								$featureImage = get_post_meta($feature['ID'], 'image', true);
								$featureText = get_post_meta($feature['ID'], 'text', true);
								$featureAlt = get_post_meta($featureImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $featureImage['guid'] . "\" alt=\"" . $featureAlt . "\" />";
								echo $featureText;
								?>
							</li>
							<?php } ?>
							<?php $feature = pods_field('feature_6'); ?>
							<?php if($feature != null) { ?>
							<li>
								<?php
								$featureImage = get_post_meta($feature['ID'], 'image', true);
								$featureText = get_post_meta($feature['ID'], 'text', true);
								$featureAlt = get_post_meta($featureImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $featureImage['guid'] . "\" alt=\"" . $featureAlt . "\" />";
								echo $featureText;
								?>
							</li>
							<?php } ?>
						</ul>
						<?php $more_features = pods_field('more_standard_features'); ?>
						<?=apply_filters('the_content', $more_features[0]) ?>
					</div>
					<div id="options" class="tab">
						<p><?php $options_text = pods_field('options_text'); echo $options_text[0]; ?></p>
						<ul class="options">
							<?php $option = pods_field('option_1'); ?>
							<?php if($option != null) { ?>
							<li>
								<?php
								$optionImage = get_post_meta($option['ID'], 'image', true);
								$optionText = get_post_meta($option['ID'], 'text', true);
								$optionAlt = get_post_meta($optionImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $optionImage['guid'] . "\" alt=\"" . $optionAlt . "\" />";
								echo $optionText;
								echo "</li>";
								?>
							</li>
							<?php } ?>
							<?php $option = pods_field('option_2'); ?>
							<?php if($option != null) { ?>
							<li>
								<?php
								$optionImage = get_post_meta($option['ID'], 'image', true);
								$optionText = get_post_meta($option['ID'], 'text', true);
								$optionAlt = get_post_meta($optionImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $optionImage['guid'] . "\" alt=\"" . $optionAlt . "\" />";
								echo $optionText;
								echo "</li>";
								?>
							</li>
							<?php } ?>
							<?php $option = pods_field('option_3'); ?>
							<?php if($option != null) { ?>
							<li>
								<?php
								$optionImage = get_post_meta($option['ID'], 'image', true);
								$optionText = get_post_meta($option['ID'], 'text', true);
								$optionAlt = get_post_meta($optionImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $optionImage['guid'] . "\" alt=\"" . $optionAlt . "\" />";
								echo $optionText;
								echo "</li>";
								?>
							</li>
							<?php } ?>
							<?php $option = pods_field('option_4'); ?>
							<?php if($option != null) { ?>
							<li>
								<?php
								$optionImage = get_post_meta($option['ID'], 'image', true);
								$optionText = get_post_meta($option['ID'], 'text', true);
								$optionAlt = get_post_meta($optionImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $optionImage['guid'] . "\" alt=\"" . $optionAlt . "\" />";
								echo $optionText;
								echo "</li>";
								?>
							</li>
							<?php } ?>
							<?php $option = pods_field('option_5'); ?>
							<?php if($option != null) { ?>
							<li>
								<?php
								$optionImage = get_post_meta($option['ID'], 'image', true);
								$optionText = get_post_meta($option['ID'], 'text', true);
								$optionAlt = get_post_meta($optionImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $optionImage['guid'] . "\" alt=\"" . $optionAlt . "\" />";
								echo $optionText;
								echo "</li>";
								?>
							</li>
							<?php } ?>
							<?php $option = pods_field('option_6'); ?>
							<?php if($option != null) { ?>
							<li>
								<?php
								$optionImage = get_post_meta($option['ID'], 'image', true);
								$optionText = get_post_meta($option['ID'], 'text', true);
								$optionAlt = get_post_meta($optionImage['ID'], '_wp_attachment_image_alt', true);
								echo "<img src=\"" . $optionImage['guid'] . "\" alt=\"" . $optionAlt . "\" />";
								echo $optionText;
								echo "</li>";
								?>
							</li>
							<?php } ?>
						</ul>
						<?php $more_options = pods_field('more_available_options'); ?>
						<?=apply_filters('the_content', $more_options[0]) ?>
					</div>
					<div id="specs" class="tab">
						<?php $specs = pods_field('specs'); ?>
						<?=apply_filters('the_content', $specs[0]) ?>
					</div>
					<div id="warranty" class="tab">
						<?php $warranty = pods_field('warranty'); ?>
						<?=apply_filters('the_content', $warranty[0]) ?>
					</div>
					<div id="reviews" class="tab">
							<meta itemprop="name" content="<?php echo the_title(); ?>" />
							<div id="BVRRContainer"><?php echo $bv->reviews->getContent();?></div>
							<script type="text/javascript">
							  $BV.ui( 'rr', 'show_reviews', {
							    doShowContent : function () {
							      // If the container is hidden (such as behind a tab), put code here to make it visible
							      // (open the tab).
							    }
							  });
							</script>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php Starkers_Utilities::get_template_parts( array( 'free-inspection' ) ); ?>

	<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

</article>
</div>

<div class="secondary">
	<?php Starkers_Utilities::get_template_parts( array( 'secondary' ) ); ?>
</div>
<?php endwhile; ?>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>