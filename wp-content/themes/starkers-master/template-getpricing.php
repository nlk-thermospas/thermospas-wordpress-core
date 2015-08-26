<?php
/*
 *  Template Name: Get Pricing New
 * 
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) ); ?>
<link rel="stylesheet" href="/dress/css/get-pricing-new.css" />
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
	</div>

<?php global $post; ?>

		<div class="primary">
			<article>
				<div class="grid getpricingnew">
				  <div class="grid__col grid__col--6-of-12">
				    <?php the_content(); ?>
				  </div>
				  <div class="grid__col grid__col--6-of-12">
				    <div class="hero-box">
						<div class="grid">
							<div class="grid__col grid__col--7-of-12 hero-box-text">
								<?php the_field('call-outs'); ?>
							</div>
							<div class="grid__col grid__col--5-of-12">
								<div class="hero-box-image"></div>
							</div>
						</div>
					</div>
				  </div>
				</div>
			</article>
		</div>

<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>
