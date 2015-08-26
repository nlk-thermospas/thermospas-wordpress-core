<?php
/**
 * Template Name: Download Brochure
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
<?php Starkers_Utilities::get_template_parts( array( 'html-header2') ); ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.gform_footer').append('<span class="requiredSpan">*Indicates required field</span>');
		});
	</script>
	<style>
		body.page-template-template-downloadbrochure-php
		{
			opacity:1 !important;filter:alpha(opacity=100) !important; background:none !important;
		}
	</style>	
	<section class="wrapper headerwrap">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-5	logocontainer">
								<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/bootstrap/images/logov2.png" class="img-responsive "/></a>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-7 headercontent">
								<h2>ThermoSpas Simply Builds the Best Hot Tubs in the World!</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="bannerandform">
			<section class="wrapper bannercase">
				<div class="container blockspan" id="bannerblock">
					<div class="row">
						<div class="col-xs-12">
							<div class="">
								<h1>Get a <span>FREE</span> Brochure, DVD</h1>
								<h1>& $1,000 Savings Coupon!</h1>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="wrapper formcase" id="formwrap">
				<div class="container">
					<div class="row formcontent" id="formcontent">
							<div class="col-xs-12 col-sm-12 col-md-3 freebrochure">
								<img src="<?php bloginfo('template_url'); ?>/bootstrap/images/brochure_top_callout.png"/>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-9 formmenu">
								<?php echo do_shortcode('[gravityform id="9" name="Download Brochure" title="false" description="false"]'); ?>
							</div>
					</div>
					<div class="more-fold">
						<a href="#contentlist"></a>
					</div>
				</div>
			</section>
		</div>
		<section class="listimg" id="contentlist">
			<div class="container bigcontainer">
				<div class="row eachContent">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<img src="<?php bloginfo('template_url'); ?>/bootstrap/images/brochure_spread_11.jpg" class="img-responsive float-right-md"/>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 content contenttext">
						<h2>See Spa Models at a Glance</h2>
						<ul>
							<li>
								Explore detailed spa photos
							</li>
							<li>
								Choose spa sizes and seating that fit your needs
							</li>
							<li>
								Dive into spa features and details
							</li>
						</ul>
					</div>
				</div>
				<div class="row eachContent">
					<div class="col-xs-12 col-sm-6 col-md-5 hydrotherapy contenttext col-md-offset-1">
						<h2>Explore Unique</br> ThermoSpas&reg; Features</h2>
						<ul>
							<li>
								Unique Total Control Therapy® for individual jet control
							</li>
							<li>
								Powerful Wave Lounge offers a progressive full-body massage 
							</li>
							<li>
								Warm air bubbling system aids comfort and relaxation
							</li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 carefree ">
						<img src="<?php bloginfo('template_url'); ?>/bootstrap/images/brochure_spread_12.jpg" class="img-responsive float-left-md margintopm30"/>
					</div>
				</div>
			</div>
			<div class="container marginbottom50">
				<div class="row eachContent">
					<div class="col-xs-12 col-sm-6 col-md-5">
						<img src="<?php bloginfo('template_url'); ?>/bootstrap/images/couple_image_shadow.jpg" class="img-responsive float-right-md"/>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-7 recommend contenttext">
						<h2>Access Essential<br/>ThermoSpas&reg; Resources</h2>
						<ul>
							<li>
								$1,000 Savings Coupon
							</li>
							<li>
								Helpful Backyard Resorts Guide
							</li>
							<li>
								Valuable videos
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<div class="award_and_testimonial">
			<div class="container">
				<div class="award">
					<div class="row eachaward">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<h3>Awards & Recognition</h3>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-8">
							<img src="<?php bloginfo('template_url'); ?>/bootstrap/images/awards_and_recognition.png" class="ximg-responsive xfloat-right-md"/>
						</div>
					</div>
				</div>
				<div class="wrapper videobar">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 testimonialText">
							<p>
								"After viewing the free DVD and information package from ThermoSpas, I decided to purchase the ThermoSpas for 2 reasons. First, was jets, jets and more jets! The second reason was the unique insulation system."
							</p>
							<p class="person">
								– Sharon M.
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<a href="#" data-toggle="modal" data-target="#iframeVideo"><img src="<?php bloginfo('template_url'); ?>/bootstrap/images/video_test2.png" class="img-responsive"/></a>
							<div class="modal fade" id="iframeVideo" tabindex="-1" role="dialog" aria-labelledby="iframeVideoLabel">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-body">
							      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <iframe src="//www.youtube.com/embed/KvsrZTVev2c?rel=0&amp;controls=1&amp;showinfo=1" allowfullscreen="" frameborder="0" height="315" width="560"></iframe>
							        <p>Dr. Michael and Shannon Holloway describe how their ThermoSpas<sup>®</sup> hot tub has become the family hub.</p>
							      </div>
							    </div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						</div>
					</div
				</div>
			</div>
		</div>
		</div>
		<div class="wrapper bottomcallout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4">
						<img src="<?php bloginfo('template_url'); ?>/bootstrap/images/thermo_brochure.png" class="img-responsive "/>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 texthero">
						<p>Learn more about how a ThermoSpas® hot tub can improve your life with Free informational videos and brochure! <strong>Plus, receive a bonus coupon for $1,000 in instant savings!</strong></p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3">
						<a href="#formcontent" class="btn btn-primary">Get Yours Now!</a>
					</div>	
				</div>	
			</div>	
		</div>
		
		<div style="clear: both;">&nbsp;</div>
		<div class="wrapper footerwrap">
			<div class="container">
				<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>		
			</div>
		</div>
		<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>
