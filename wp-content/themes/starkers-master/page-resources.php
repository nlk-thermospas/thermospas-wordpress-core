<?php Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

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
		<?php $uriArr = explode('/', $_SERVER['REQUEST_URI']); ?>
		<!--<p class="breadcrumb"><a href="/">Home</a> > <?=ucwords(str_replace('-', ' ', $uriArr[1]))?></p>-->
	</div>

<?php global $post; ?>

	<div class="primary" style="width: 100% !important;">
		<article style="width: 90% !important;">
			<?=apply_filters('the_content', $post->post_content) ?>
<div id="video-area">
<div id="resources-mainvideo">

	  	<script type='text/javascript' src='/jwplayer/jwplayer.js'></script>
		<div id='mediaplayer'></div>
        <script type="text/javascript">
        <?php
        	if(isset($_REQUEST['vid']))
			{
				?>
					jQuery(document).ready(function(){
						jQuery('html, body').animate({
					        scrollTop: jQuery("#resources-mainvideo").offset().top - 100
					    }, 500);
					});
				<?php
			}
        ?>
		jwplayer("mediaplayer").setup({
		flashplayer: "/jwplayer/player.swf",
		width: 480,
		height: 320,
		stretching: "fill",
	  <? 
	  	$rvid = '';
		
	  	if(isset($_REQUEST['vid']))
		{
			$rvid = $_REQUEST['vid'];
			?>
		autostart: true,
			<?php
		}
	  switch($rvid) {
		case "brochuredvd":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/info-video.jpg",
		<?
		$video_id = 'DhGM1dMjHgg';
		$vidtitle = "Thinking of Buying a ThermoSpas Hot Tub? This Information Can Help!";
		$viddesc = "ThermoSpas offers a variety of different hot tub models that are perfect for whatever your needs are. Whether it's exercise, hot water therapy, entertainment or just for relaxation, ThermoSpas makes a hot tub that will fit with your lifestyle. ";
		break;
		case "whoweare":
		$video_id = 'DhGM1dMjHgg';
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/who-are-we-video_2.jpg",
		<?
		$video_id = 'F1-0MtiVNs0';
		$vidtitle = "ThermoSpas Hot Tubs - Who Are We?";
		$viddesc = "Thermospas has been manufacturing hot tubs for over a quarter of a century and today is one of the largest retailer of hot tubs in the world.  Learn more about who ThermoSpas is along with some of our awards, testimonials and more.";
		break;
		case "funofowning":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/lifestyles-video.jpg",
		<?
		$video_id = 'dROZDbu8yWg';
		$vidtitle = "Lifestyles and Testimonials of a ThermoSpas Customer";
		$viddesc = "In 1999 ThermoSpas asked their customers to designate one night a week as family night, just 20 minutes where everyone sits in the hot tub just to relax and talk.  The response was overwhelming.  See what our customers response was long with other benefits of owning a hot tub.";
		break;
		case "therapeuticbenefits":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/warm-water-therapy-video.jpg",
		<?
		$video_id = 'DwrZlGtvn9o';
		$vidtitle = "Treat Knee Surgery and Back Injuries w/ a Hot Tub";
		$viddesc = "Warm water therapy offers many, many therapeutic benefits; such as relief for those who suffer from arthritis, better sleep, relief from aches and pains, and better range of motion in aching joints.  Find out why The Arthitis Foundation has endorsed our Healing Spa and other reasons owning a ThermoSpas can provide Therapy.";
		break;
		case "designedgoanywere":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/portable_hot_tub.jpg",
		<?
		$video_id = 'KFu8ImQLTA8';
		$vidtitle = "Portable Hot Tubs With Zero Plumbing From ThermoSpas";
		$viddesc = "ThermoSpas hot tubs may look permanent but they are actually considered portable appliances, totally self-contained.  There are no plumbing connections and all that is required is a simple electrical connection.  Learn where you can install your new hot tub and how to enjoy it year round.";
		break;
		case "bestcomponents":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/components-video.jpg",
		<?
		$video_id = 'wE7sOtErJFU';
		$vidtitle = "What Makes a Superior, Scratch Resistant Hot Tub and Spa?";
		$viddesc = "The most important component in a hot tub is the shell and that is where ThermoSpas Hot tubs really shine.  Learn more about our amazing shell along with other components that really set ThermoSpas apart from our competitors.";
		break;
		case "cabinetry":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/revolutionary-technology-video_2.jpg",
		<?
		$video_id = '2BQq_Mq34vk';
		$vidtitle = "Revolutionary Technology in Hot Tub Cabinets";
		$viddesc = "The most visible part of the hot tub is the cabinet, so along with needing to support the shell, the cabinet needs to look attractive too!  Our Designer series cabinets are made of a synthetic material that looks like wood, feels like fine furniture, but requires no maintenance.";
		break;
		case "heaters":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/titanium-heater-video.jpg",
		<?
		$video_id = 'X0itu8yKxeQ';
		$vidtitle = "Titanium HotTub Heaters by ThermoSpas";
		$viddesc = "From the moment you turn on your hot tub, every hour of every day hot tub water and sanitizing chemicals rocket through your heater.  It's no wonder heaters are the first part of the hot tub to fail.  Learn why ThermoSpas Titanium Heaters stand up and last 10x longer than standard heaters.";
		break;
		case "pumps":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/water-pump.jpg",
		<?
		$video_id = 'hmIGLxRcgtU';
		$vidtitle = "Energy efficient hot tubs and spas: ThermoSpas water pump technology";
		$viddesc = "The second most susceptible part to fail on a hot tub is the water pump.  Unique most manufacturers ThermoSpas uses pumps specifically engineered for hot tubs that are energy efficient and extremely quiet.";
		break;
		case "howitworks":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/how-it-works-video.jpg",
		<?
		$video_id = 'pfRFOTlQxsI';
		$vidtitle = "How ThermoSpas Hot Tubs Work";
		$viddesc = "ThermoSpas unique manifold plumbing system not only allows us to install more jets, but also a larger variety of jets than any other spa.  Learn all about the variety of jets, wave lounges, and bubbling systems that can be customized to your hot tub.";
		break;
		case "caremaintenance":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/care-video.jpg",
		<?
		$video_id = '8mzzDcQxfRI';
		$vidtitle = "How to take care of your hot tub and spa and clean your water";
		$viddesc = "ThermoSpas has designed the first virtually maintenace free hot tub.  The most important thing to a hot tub owner is crystal clear, healthly water.   Good filtration and care is the key to clear, healthy water.  ThermoSpas offers one of the most advanced filtration systems and ozonators to reduce chemicals costs and maintenace.";
		break;
		case "costtooperate":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/energy-efficient-video.jpg",
		<?
		$video_id = '0zqECbDMRYs';
		$vidtitle = "ThermoSpas Energy Efficient Hot Tubs and Spas";
		$viddesc = "There are four primary factors that determine how energy efficient a hot tub is - the control panel, the cover, the insulation and how the air is fed to the water jets.  Learn why ThermoSpas is one of the most energy efficient hot tubs.";
		break;
		case "swimspa":
		?>
		image: "/<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/swimming-video.jpg",
		<?
		$video_id = 'ebGELXNKN_I';
		$vidtitle = "Swimming and Water Exercises in Your Hot Tub";
		$viddesc = "Swimming and exercising in water benefits every part of the human body and is perfect for every age group.  It benefits respiration, muscle mass, bone density, cardiovascular activity and neurological functions.  Learn about ThermoSpas revolutionary hot tubs that allow you to exercise in water all year long and in the privacy of your own home.";
		break;
		case "alreadyown":
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/accessories-video.jpg",
		<?
		$video_id = 'gx7lpRVETO8';
		$vidtitle = "ThermoSpas Offers a Great Selection of Hot Tub Chemicals";
		$viddesc = "ThermoSpas offers the most complete line of hot tub chemicals and accessories in the industry.  And you don't have to be a ThermoSpas owner to purchase our products.  Our forumlas are customized for spas and not repackaged pool products.";
		break;
		default:
		?>
		image: "<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/info-video.jpg",
		<?
		$video_id = 'DhGM1dMjHgg';
		$vidtitle = "Thinking of Buying a ThermoSpas Hot Tub? This Information Can Help!";
		$viddesc = "ThermoSpas offers a variety of different hot tub models that are perfect for whatever your needs are. Whether it's exercise, hot water therapy, entertainment or just for relaxation, ThermoSpas makes a hot tub that will fit with your lifestyle. ";
		break;
	}
?>
file: "http://www.youtube.com/watch?v=<?=$video_id?>"
});
</script>
<br />
        <div id="desccontainer"> <strong>
          <?=$vidtitle?>
          </strong><br />
          <?=$viddesc?>
        </div>
</div>

<div id="resource-videos">

            <table border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=brochuredvd"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/resource-image-1.jpg" alt="Brochure DVD" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=brochuredvd"><strong>Thinking of Buying a ThermoSpas Hot Tub? This Information Can Help!</strong></a>&nbsp;&nbsp;&nbsp;10:41<br />
                  ThermoSpas offers a variety of different hot tub models that are perfect for... </td>
              </tr>
              <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=whoweare"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-2.jpg" alt="Who We Are" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=whoweare"><strong>ThermoSpas Hot Tubs - Who Are We?</strong></a>&nbsp;&nbsp;&nbsp;2:07<br />
                  Thermospas has been manufacturing hot tubs for over a quarter of a century... </td>
              </tr>
              <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=funofowning"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-3.jpg" alt="video-thumbnail-3" alt="Fun of Owning" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=funofowning"><strong>Lifestyles and Testimonials of a ThermoSpas Customer</strong></a>&nbsp;&nbsp;&nbsp;1.49<br />
                  In 1999 ThermoSpas asked their customers to designate one night a week as family night... </td>
              </tr>
             <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=therapeuticbenefits"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-4.jpg" alt="Therapeutic Benefits" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=therapeuticbenefits"><strong>Treat Knee Surgery and Back Injuries w/ a Hot Tub</strong></a>&nbsp;&nbsp;&nbsp;3:52<br />
                  Warm water therapy offers many, many therapeutic benefits... </td>
              </tr>
                        <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=designedgoanywere"><img src="<?php  bloginfo( 'template_url' ); ?>/images/portable_hot_tub.jpg" alt="Designed to Go Anywhere" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=designedgoanywere"><strong>Portable Hot Tubs With Zero Plumbing From ThermoSpas</strong></a>&nbsp;&nbsp;&nbsp;0:43<br />
                  ThermoSpas may look permanent but  are actually considered portable... </td>
              </tr>
                       <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=bestcomponents"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-6.jpg" alt="Best Components" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=bestcomponents"><strong>What Makes a Superior, Scratch Resistant Hot Tub and Spa?</strong></a>&nbsp;&nbsp;&nbsp;1:15<br />
                  The most important component in a hot tub is the shell... </td>
              </tr>
                         <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=cabinetry"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-7.jpg" alt="Cabinetry" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=cabinetry"><strong>Revolutionary Technology in Hot Tub Cabinets</strong></a>&nbsp;&nbsp;&nbsp;0:47<br />
                  The most visible part of the hot tub is the cabinet, so along with needing to support the shell... </td>
              </tr>
                         <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=heaters"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-8.jpg"  alt="Heaters" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=heaters"><strong>Titanium HotTub Heaters by ThermoSpas</strong></a>&nbsp;&nbsp;&nbsp;0:48<br />
                  Heaters are the first part of the hot tub to fail... </td>
              </tr>
                         <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=pumps"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-9.jpg" alt="Pumps" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=pumps"><strong>Energy efficient hot tubs and spas: ThermoSpas water pump technology</strong></a>&nbsp;&nbsp;&nbsp;1:43<br />
                  The second most susceptible part to fail on a hot tub is the water pump... </td>
              </tr>
                         <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=howitworks"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-10.jpg" alt="How it works" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=howitworks"><strong>How ThermoSpas Hot Tubs Work</strong></a>&nbsp;&nbsp;&nbsp;2:36<br />
                  ThermoSpas unique manifold plumbing system not only allows us to install more jets... </td>
              </tr>

              <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=caremaintenance"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-11.jpg" alt="Care and Maintenance" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=caremaintenance"><strong>How to take care of your hot tub and spa and clean your water</strong></a>&nbsp;&nbsp;&nbsp;2:18<br />
                  ThermoSpas has designed the first virtually maintenace free hot tub... </td>
              </tr>
                         <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=costtooperate"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-12.jpg" alt="Cost to Operate" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=costtooperate"><strong>ThermoSpas Energy Efficient Hot Tubs and Spas</strong></a>&nbsp;&nbsp;&nbsp;2:38<br />
                  There are four primary factors that determine how energy efficient a hot tub is... </td>
              </tr>
                         <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=swimspa"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-13.jpg" alt="Fitness Series Spas" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=swimspa"><strong>Swimming and Water Exercises in Your Hot Tub</strong></a>&nbsp;&nbsp;&nbsp;3:40<br />
                  Swimming and exercising in water benefits every part of the human body and is perfect for every age group... </td>
              </tr>
                          <tr>
                <td width="100"><a href="<?php echo home_url( '/' ); ?>resources?vid=alreadyown"><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2015/01/video-thumbnail-14.jpg" alt="already own a Hot Tub" width="100" height="66" border="0" /></a></td>
                <td valign="top"><a href="<?php echo home_url( '/' ); ?>resources?vid=alreadyown"><strong>ThermoSpas Offers a Great Selection of Hot Tub Chemicals</strong></a>&nbsp;&nbsp;&nbsp;1:22<br />
                  ThermoSpas offers the most complete line of hot tub chemicals and accessories in the industry... </td>
              </tr>
            </table>

	</div>
</div>

		</article>
	</div>

	<div class="secondary">
 <!--PUT SIDE BAR CONTENT IN HERE-->
	</div>

<?php endwhile; ?>


<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>