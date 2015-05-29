<?php
/**
 *  Template Name: Alabama Landing Page
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
?>
<?php Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) ); ?>


<link rel="stylesheet" href="/dress/css/home.css" />
<script src="/js/home.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fancybox/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<script src="/js/hot-tubs.js"></script>

<?php
	$productIDs = "";
?>

<script>
	
		jQuery(document).ready(function() {
			jQuery('.fancybox').fancybox({

			});
			jQuery('.fancybox-media').fancybox({
				openEffect : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',
				arrows: false,
				helpers: {
					media: {},
					buttons: {}
				},
			});
		});
</script>
<style>
	.hot-tubs-seats ul li
	{
		 display: block;
		 float: left;
		 width: 183px;
		 margin-right: 5px;
		 margin-bottom: 30px;
		 list-style: none;
		 background: none !important;
	}
	
	.hot-tubs-seats ul li .image {
	  display: block;
	  float: left;
	  background: #f2f2f2;
	  width: 100%;
	  height: 131px;
 	}
 	
 	.hot-tubs-seats ul li h3 {
	  margin: 141px 0px 0px 0px;
	  font: 300 18px/18px "Open Sans", sans-serif;
	  text-align: center;
	}
 	
 	.hot-tubs-seats ul li p.meta {
	  margin: 5px 0px;
	  font: 400 12px/12px "Open Sans", sans-serif;
	  color: #323232;
	  text-align: center;
	}
	
	.hot-tubs-seats ul li p.blurb {
	  margin: 5px 0px;
	  font: 300 11px/16px "Open Sans", sans-serif;
	  color: #6e6e6e;
	}
	
	.hot-tubs-seats ul li p.more {
	  text-align: center;
	  margin: 5px 0px;
	  font: 300 13px/17px "Open Sans", sans-serif;
	}
	
	#salesRepContainer .topInfoContainer img {
	    float: left;
	    width: 137px;
	}
	
	#salesRepContainer .topInfoContainer .topInfo {
	    float: left;
	    margin-left: 17px;
	    width: 511px;
	}
	
	#salesRepContainer .bottomInfoContainer {
	    margin-top: 20px;
	}
	
	.bottomInfoContainer p, .quoteFull p {
	    margin: 10px 0px;
	}
	
	#salesRepContainer .topInfoContainer .topInfo div.phone {
	    font-size: 14px;
	    line-height: 20px;
	    font-weight: bold;
	    color: #20508D;
	}
	
	#salesRepContainer .topInfoContainer .topInfo ul.serviceAreas {
	    margin: 2px 0px 10px;
	    padding: 0px;
	}
	
	#salesRepContainer .topInfoContainer .topInfo ul.serviceAreas li {
	    display: block;
	    float: left;
	    width: 25%;
	    font-size: 10px;
	    line-height: 16px;
	    color: #5B5B5B;
	}
	
	#salesRepContainer .topInfoContainer .topInfo a.moreServiceArea {
	    color: #20508D;
	    text-decoration: none;
	    font-size: 12px;
	    padding-top: 5px;
	}
	
	.topInfoContainer
	{
		width: 100%;	
	}
	
	.clear
	{
		clear: both;
	}
	
	.topInfo h3, .topInfo h4
	{
		margin-bottom: 5px;
	}
	
	.secondary
	{
		margin-top: 115px;
	}
	
	.allservicesarea
	{
		width: 100%;
		margin: 45px auto 0px;
		float: left;
		display: block;
	}
	
	.allservicesarea img
	{
		display: block;
		margin: 0px auto;	
	}
	
	#allServiceAreas ul {
	  float: left;
	  text-align: left;
	  width: 20%;
	}
	
	#allServiceAreas ul li
	{
		list-style: none;
		font-size: 13px;
		line-height: 16px;
		padding-left: 0px;
	}
	
	@media only screen and (max-width : 767px) {
		#allServiceAreas ul {
		  float: left;
		  text-align: left;
		  width: 48%;
		  margin: 20px 0px;
		}
		
		#salesRepContainer .topInfoContainer .topInfo ul.serviceAreas li
		{
			 width: 50%;
		} 
		
		#salesRepContainer .topInfoContainer img, #salesRepContainer .topInfoContainer .topInfo
		{
			float: none;
			display: block;
			margin: 20px auto;
		}
		
		.shadow-header
		{
			float: none;
		}
	}
</style>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="heading">
		<h1><?php the_field('headline'); ?></h1>
	</div>
	<div class="billboard" style="background: url(<?php the_field('billboard_image'); ?>) no-repeat left top">
		<div class="billboard-content-container">
			<div class="billboard-content">
				<h2><?php the_field('billboard_heading'); ?></h2>
				<a href="<?php the_field('billboard_button_link'); ?>"><?php the_field('billboard_button_text'); ?></a>
				<p><?php the_field('billboard_text'); ?></p>
			</div>
		</div>
	</div>
	<div class="promo">
		<?php echo do_shortcode('[gravityform id=6 title=false description=false ajax=true]'); ?>
		<div class="privacy">
			<p><a class="privacy-modal" href="#">Privacy Policy</a></p>
			<div class="privacy-modal-container">
				<iframe src="/privacy-policy-lightbox"></iframe>
			</div>
		</div>
		<div class="awards">
			<h3>Industry Awards &amp; Recognition</h3>
			<ul>
				<li class="apsp"><a href="/about-us/company-information/#awards-section" target="_blank">The Association of Pool &amp; Spa Professionals</a></li>
				<li class="arthritis"><a href="/about-us/company-information/#awards-section" target="_blank">Arthritis Foundation</a></li>
				<li class="bbb"><a href="/about-us/company-information/#awards-section" target="_blank">Better Business Bureau</a></li>
				<li class="nspi"><a href="/about-us/company-information/#awards-section" target="_blank">National Spa &amp; Pool Institute</a></li>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
	<div class="primary">
		<article>
			<div class="call-outs alabama-landing">
				<?php the_content(); ?>
				<hr>
				<div class="hot-tubs-seats">
					<h2 class="shadow-header"><?php the_field('hotubs_heading'); ?></h2>
					<ul>
								<?php
								$tubs = get_field('hotubs');
								if( $tubs ): ?>
									<?php
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
										echo "<div id=\"BVRRInlineRating-" . $bazaarVoiceID . "\" class=\"BVRRInlineRating\"></div>";
										$blurb = get_post_meta($tub->ID, 'blurb', true);
										echo "<p class=\"blurb\">" . $blurb . "</p>";
										echo "<p class=\"more\"><a href=\"/hot-tubs/" . $tub->post_name . "\">Learn More</a></p>";
										echo "</li>";
										
										$bazaarVoiceID = get_post_meta($tub->ID, 'bazaarvoice_id', true);
										$productIDs .= "'";
										$productIDs .= $bazaarVoiceID;
										$productIDs .= "'";
										$productIDs .= ", ";
									}

									$productIDs = rtrim($productIDs, ", ");
										
								endif;
						?>
					</ul>
				</div>
				<hr>
				<div class="sales-rep" id="salesRepContainer">
					<h2 class="shadow-header">Alabama Sales Representative <?php //the_field('hotubs_heading'); ?></h2>
					<div class="topInfoContainer clearfix">
						<img src="<?php bloginfo('template_url'); ?>/images/alabama_sales_rep_scott_mccook_sr.jpg">
						<div class="topInfo">
							<h3>Meet Scott McCook, Sr.</h3>
							<div class="phone">1-800-876-0158</div>
							<h4>Service Areas:</h4>
							<ul class="serviceAreas clearfix">
								<li>CALHOUN</li>
								<li>ETOWAH</li>
								<li>JEFFERSON</li>
								<li>LAUDERDALE</li>
								<li>LEE</li>
								<li>LIMESTONE</li>
								<li>MADISON</li>
								<li>MARSHALL</li>
								<li>MONTGOMERY</li>
								<li>MORGAN</li>
								<li>SHELBY</li>
								<li>TUSCALOOSA</li>
							</ul>
							<a href="#allServiceAreas" class="moreServiceArea fancybox">View full service area...</a>
							<div id="allServiceAreas" style="width: 640px; display: none;">
								<img src="<?php bloginfo('template_url'); ?>/images/alabama_coverage_map_large.jpg">
								<br>
								<ul>
									<li>AUTAUGA</li>
									<li>BIBB</li>
									<li>BLOUNT</li>
									<li>BULLOCK</li>
									<li>CALHOUN</li>
									<li>CHAMBERS</li>
									<li>CHEROKEE</li>
									<li>CHILTON</li>
									<li>CLAY</li>
									<li>CLEBURNE</li>
								</ul>
								<ul>
									<li>COLBERT</li>
									<li>COOSA</li>
									<li>CULLMAN</li>
									<li>DALLAS</li>
									<li>DE KALB</li>
									<li>ELMORE</li>
									<li>ETOWAH</li>
									<li>FAYETTE</li>
									<li>FRANKLIN</li>
									<li>GREENE</li>
								</ul>
								<ul>
									<li>HALE</li>
									<li>JACKSON</li>
									<li>JEFFERSON</li>
									<li>KEMPER</li>
									<li>LAMAR</li>
									<li>LAUDERDALE</li>
									<li>LAWRENCE</li>
									<li>LEE</li>
									<li>LIMESTONE</li>
									<li>LOWNDES</li>
								</ul>
								<ul>
									<li>MACON</li>
									<li>MADISON</li>
									<li>MARENGO</li>
									<li>MARION</li>
									<li>MARSHALL</li>
									<li>MONTGOMERY</li>
									<li>MORGAN</li>
									<li>NOXUBEE</li>
									<li>PERRY</li>
									<li>PICKENS</li>
								</ul>
								<ul>
									<li>RANDOLPH</li>
									<li>SAINT CLAIR</li>
									<li>SHELBY</li>
									<li>SUMTER</li>
									<li>TALLADEGA</li>
									<li>TALLAPOOSA</li>
									<li>TUSCALOOSA</li>
									<li>WALKER</li>
									<li>WILCOX</li>
									<li>WINSTON</li>
								</ul>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="bottomInfoContainer">
						<p>
							Scott McCook has earned the title of “ThermoSpas Top Alabama Salesman” each of his five years employed. This comes as no surprise to anyone who knows the 25-year veteran of in-home sales. At an early age, McCook learned that without perseverance, dedication, and a respect for others, you won’t achieve a lot in life.
						</p>
	
							<p>
								McCook is living proof that perseverance leads to success. After working in the construction industry for several years, McCook tried enlisting in the military, but was rejected because he is partially blind. This didn’t discourage him though. For McCook, rejection is just a door to another opportunity. And this particular door led McCook into a completely new field: sales.
							</p>
	
							<p>
								After several years honing his sales craft, McCook was interested in doing more innovative work. This desire led him to a sales opportunity with ThermoSpas. McCook was a perfect match for the forward-thinking hot tub manufacturer, which collaborated with the Arthritis Foundation to develop the Healing Spa. The Healing Spa is the only hot tub to receive the prestigious “Ease of Use Commendation” from the Arthritis Foundation.
							</p>
	
							<p>
								Though many of his evenings and weekends are happily spent espousing the virtues of ThermoSpas, McCook is also proud to call himself a family man. He is the proud father of 5 children, ranging in age from 14 to 24, and a blessed “Papa” of two.
							</p>
	
							<p>
								<a target="_blank" href="#">Schedule a free, no obligation site inspection today</a> with ThermoSpas<sup>®</sup> hot tub in Alabama. One of our expert sales representatives – perhaps even Scott McCook -- will come to your home to help you choose the best hot tub for you and the perfect place to put it.
							</p>
					</div>
				</div>	
			</div>
		</article>
	</div>
	<div class="secondary">
		
		<?php
		
			$testimonials = get_post_meta($post->ID, 'sidebar_testimonial');
		
			if(isset($testimonials[0])) {
				$testimonials = $testimonials[0];
			}
		
			if((count($testimonials) == 1 && $testimonials[0] != "") || isset($testimonials['ID'])) {
		
				if(isset($testimonials['ID'])) {
					$testimonial = get_post($testimonials['ID']);
					$blurb = get_post_meta($testimonials['ID'], 'blurb', true);
					$person = get_post_meta($testimonials['ID'], 'person', true);
				} else {
					$testimonial = get_post($testimonials[0]);
					$blurb = get_post_meta($testimonials[0], 'blurb', true);
					$person = get_post_meta($testimonials[0], 'person', true);
				}
		
				echo "<div class=\"testimonial\">";
				echo "<div class=\"content\">";
				echo "<p>";
				echo $blurb;
				echo "</p>";
				echo "</div>";
				echo "<div class=\"person\">";
				echo "<p>";
				echo $person;
				echo "</p>";
				echo "</div>";
				echo "</div>";
		
			} else { ?>
		
				<div class="testimonial">
					<?php
						$args = array(
							'numberposts' => 1,
							'post_type' => 'testimonial',
							'orderby' => 'rand',
							'type' => 'text'
						);
						$testimonials = get_posts($args);
						$testimonialIDs = array();
						foreach($testimonials as $testimonial) {
							array_push($testimonialIDs, get_post_meta($testimonial->ID));
						}
					?>
					<div class="content">
						<p>
							<?php echo $testimonialIDs[0]['blurb'][0]; ?>
						</p>
					</div>
					<div class="person">
						<p>
							<?php echo $testimonialIDs[0]['person'][0]; ?>
						</p>
					</div>
				</div>
		
			<?php }
		?>
		<div class="allservicesarea">
			<a class="fancybox" href="#allServiceAreas">
				<img src="<?php bloginfo('template_url'); ?>/images/alabama_state_map.jpg">
			</a>
		</div>
		<div class="recent-posts">
			<h4>Recent Blog Posts</h4>
			<ul>
				<?php
					$args = array(
						'numberposts' => 3,
						'post_type' => 'post'
					);
					$blogs = get_posts($args);
					foreach ($blogs as $blog) {
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $blog->ID ), 'single-post-thumbnail' );
						$featured_image = $featured_image[0];
		
						echo "<li>";
						echo "<a href=\"/blog/" . $blog->post_name . "\">";
						echo "<img src=\"" . $featured_image . "\"/>";
						echo $blog->post_title . "</a><br/>";
						echo mysql2date('M j, Y', $blog->post_date);
						echo "</li>";
					}
				?>
			</ul>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
<?php endwhile; ?>
<div class="footer">
		<p>&copy; <?php echo date("Y"); ?> ThermoSpas Hot Tubs. All rights reserved. <a href="/thermospas-privacy-policy/">Privacy Policy</a> | <a href="/about-us/contact-us">Contact Us</a> | <a href="/site-map">Site Map</a> | <a href="/patents">Patents</a> | <a href="http://online.thermospas.com/" target="_blank">ThermoSpas Online Store</a></p>
		<ul class="social">
			<li class="facebook"><a href="https://www.facebook.com/ThermoSpas" target="_blank">Facebook</a></li>
			<li class="twitter"><a href="https://twitter.com/thermospas" target="_blank">Twitter</a></li>
			<li class="youtube"><a href="https://www.youtube.com/user/ThermoSpaInc" target="_blank">YouTube</a></li>
			<li class="pinterest"><a href="https://www.pinterest.com/thermospas/" target="_blank">Pinterest</a></li>
		</ul>
</div>
<?php //Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

</div>

<script type="text/javascript">
	$BV.ui( 'rr', 'inline_ratings', {
		productIds : [<?=$productIDs?>],
		containerPrefix : 'BVRRInlineRating'
	});
</script>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>
