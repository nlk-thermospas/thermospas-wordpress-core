<div class="container">
	<header class="header">
		<div class="utility">
			<ul>
				<li class="call"><a href="tel:1-800-876-0158">Call Us <strong>1-800-876-0158</strong></a></li>
				<li class="pricing"><a href="/get-pricing">Get Pricing</a></li>
			</ul>
		</div>
	</header>
</div>
<div class="stripe-container">
	<div class="stripe">
		<div class="logo">
			<a href="/"><img src="/dress/global/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
		</div>

		<?php $uri = $_SERVER['REQUEST_URI'];
			$uriArr = explode('/', $uri);
		?>

		<div class="nav">
			<a class="touch-activator"></a>
			<ul>
				<?php if($uriArr[1] == "hot-tubs") { ?>
				<li class="current">
				<?php } else { ?>
				<li>
				<?php } ?>
					<a href="/hot-tubs/#seats" onclick="return false">Hot Tubs</a>
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
                        <li><a href="/dyo/">Design Your Own</a>
                        <li><a href="/reviews/">Reviews</a>
					</ul>
				</li>
				<?php if($uriArr[1] == "why-get-a-hot-tub") { ?>
				<li class="current">
				<?php } else { ?>
				<li>
				<?php } ?>
					<a href="#" onclick="return false">Why Get a Hot Tub?</a>
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
				<?php if($uriArr[1] == "features") { ?>
				<li class="current">
				<?php } else { ?>
				<li>
				<?php } ?>
					<a href="#" onclick="return false">ThermoSpas Features</a>
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
				<?php if($uriArr[1] == "about-us") { ?>
				<li class="current">
				<?php } else { ?>
				<li>
				<?php } ?>
					<a href="#" onclick="return false">About Us</a>
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
				<?php if($uriArr[1] == "blog" || $uriArr[1] == "blogs") { ?>
				<li class="current">
				<?php } else { ?>
				<li>
				<?php } ?>
					<a href="/blog">Blog</a>
				</li>
			</ul>
		</div>
		<div class="search">
			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
				<input type="text" name="s" id="s" placeholder="Search ThermoSpas" />
				<input type="submit" id="searchsubmit" value="Search" />
			</form>
		</div>
	</div>
</div>

<div class="container">
