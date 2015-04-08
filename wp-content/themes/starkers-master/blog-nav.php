	<?php $uriArr = explode('/', $_SERVER['REQUEST_URI']); ?>
	<div class="categories">
		<ul>
			<?php

				$args = array(
					'type' => 'post',
				);
				$categories = get_categories( $args );
				foreach($categories as $category) {
					if($category->slug == "care-maintenance" || $category->slug == "fitness" || $category->slug == "health" || $category->slug == "lifestyle" || $category->slug == "videos") {
						echo "<li class=\"" . $category->slug . ($uriArr[2] == $category->slug ? " active" : "") . "\">";
						echo "<a class=\"image\" href=\"/blog/category/" . $category->slug . "\"><img src=\"/dress/blog/category-" . $category->slug . ".png\" /></a>";
						echo "<a class=\"term\" href=\"/blog/category/" . $category->slug . "\">" . $category->name . "</a>";
						echo "</li>";
					}
				}
			?>
		</ul>
	</div>