<div class="free-quote">
	<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]'); ?>
	<div class="privacy">
		<p><a class="privacy-modal" href="#">Privacy Policy</a></p>
		<div class="privacy-modal-container">
		<iframe src="/privacy-policy-lightbox"></iframe>
		</div>
	</div>
</div>

<?php

	$testimonials = get_post_meta($post->ID, 'sidebar_testimonial');

	if(isset($testimonials[0])) {
		$testimonials = $testimonials[0];
	}

	if((count($testimonials) == 1 && !empty($testimonials[0])) || isset($testimonials['ID'])) {

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

<div class="free-media">
	<h4>Get a Free Brochure, DVD &amp; $1,000 Coupon!</h4>
	<img src="/dress/secondary/free-media.jpg" alt="Get a Free Brochure, DVD &amp; $1,000 Coupon!" />
	<a class="btn red-btn" href="/get-free-brochure-dvd-1000-coupon">Get Yours Now!</a>
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