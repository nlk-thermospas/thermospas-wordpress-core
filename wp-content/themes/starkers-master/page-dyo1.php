<?php
/**
 *  Template Name: DYO 1
 */
?>

<?php Starkers_Utilities::get_template_parts( array( 'html-header', 'header' ) ); ?>

	<div class="heading">
		<h1>Design Your Own Hot Tub</h1>
	</div>

	<div class="primary">

		<article>

			<iframe src="http://thermospas-dyo.herokuapp.com?display=false/"></iframe>

		</article>


		<?php Starkers_Utilities::get_template_parts( array( 'footer' ) ); ?>

	</div>

<div style="clear: both;">&nbsp;</div>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'html-footer' ) ); ?>