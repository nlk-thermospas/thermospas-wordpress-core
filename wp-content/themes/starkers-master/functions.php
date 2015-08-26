<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================

	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

	======================================================================================================================== */

	add_theme_support('post-thumbnails');

	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================

	Actions and Filters

	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );
	add_action("gform_post_submission", "set_post_content", 10, 2);

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	add_filter('gform_confirmation_anchor','theme_gform_confirmation_anchor');
	add_filter('gform_confirmation_anchor_1','theme_gform_confirmation_anchor_1');
	add_filter('gform_confirmation_anchor_2','theme_gform_confirmation_anchor_2');
	add_filter('gform_confirmation_anchor_3','theme_gform_confirmation_anchor_3');
	add_filter('gform_confirmation_anchor_4','theme_gform_confirmation_anchor_4');
	add_filter('gform_confirmation_anchor_5','theme_gform_confirmation_anchor_5');

	/* ========================================================================================================================

	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

	======================================================================================================================== */



	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
		wp_enqueue_style( 'screen' );
	}

	/* ========================================================================================================================

	Comments

	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}


	function theme_gform_confirmation_anchor($enabled) {
		return false;
	}
	function theme_gform_confirmation_anchor_1($enabled) {
		return false;
	}
	function theme_gform_confirmation_anchor_2($enabled) {
		return false;
	}
	function theme_gform_confirmation_anchor_3($enabled) {
		return false;
	}
	function theme_gform_confirmation_anchor_4($enabled) {
		return false;
	}
	function theme_gform_confirmation_anchor_5($enabled) {
		return false;
	}

	function set_post_content( $entries, $form )
	{
		if($entries['form_id'] > 5) return;
		
		include $_SERVER['DOCUMENT_ROOT'] . '/dbconn.php';

		// Parse our gravity form smartly
		$data = _parse_gravity_form( $entries, $form );

		// Submit tracking via curl to Sharpspring
		_submit_to_sharpspring( $data );

		$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

		// check connection
		if ($conn->connect_error) {
		  	trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
		}

		$sql = "";
		$sql .= "INSERT INTO ht_form";

		if($entries['form_id'] == 1) { //homepage
			$iref = "iHome";
			if($entries['16.1'] == "Yes") {
				$comments = '{"Joing Mailing List" : "' . $entries['16.1'] . '"}';
			}
			$sql .= "(name, zipcode, phone, email, iref, ht_date)";
			$sql .= "VALUES";
			$sql .=	"('" . $entries[9] . "', '" . $entries[4] . "', '" . $entries[14] . "', '" . $entries[8] . "', '" . $iref . "', '" . date("Y-m-d") . "')";
		} elseif($entries['form_id'] == 2) { //sidebar
			$iref = "iSide";
			if($entries['9.1'] == "Yes") {
				$comments = '{"Joing Mailing List" : "' . $entries['9.1'] . '"}';
			}
			$sql .= "(name, zipcode, phone, email, comments, iref, ht_date)";
			$sql .= "VALUES";
			$sql .=	"('" . $entries[8] . "', '" . $entries[2] . "', '" . $entries[10] . "', '" . $entries[7] . "', '" . $comments . "', '" . $iref . "', '" . date("Y-m-d") . "')";
		} elseif($entries['form_id'] == 3) { //dvd/brochure
			$iref = "iDVD";
			if($entries['12.1'] == "Yes") {
				$comments = '{"Joing Mailing List" : "' . $entries['12.1'] . '"}';
			}
			$sql .= "(name, address1, city, state, zipcode, phone, email, comments, iref, ht_date)";
			$sql .= "VALUES";
			$sql .=	"('" . $entries[8] . "', '" . $entries[4] . "', '" . $entries[5] . "', '" . $entries[11] . "', '" . $entries[2] . "', '" . $entries[9] . "', '" . $entries[7] . "', '" . $comments . "', '" . $iref . "', '" . date("Y-m-d") . "')";
		} elseif($entries['form_id'] == 4) { //site inspection
			$iref = "iSite";
			$comments = $entries[9] . " " . $entries[13];
			$sql .= "(name, address1, city, state, zipcode, phone, email, ht_siteinspection, iref, ht_date)";
			$sql .= "VALUES";
			$sql .=	"('" . $entries[11] . "', '" . $entries[2] . "', '" . $entries[3] . "', '" . $entries[4] . "', '" . $entries[6] . "', '" . $entries[12] . "', '" . $entries[8] . "', '" . $comments . "', '" . $iref . "', '" . date("Y-m-d") . "')";
		} elseif($entries['form_id'] == 5) { //get pricing
			$iref = "iPrice";
			$sql .= "(name, address1, city, state, zipcode, phone, email, comments, iref, ht_date)";
			$sql .= "VALUES";
			$sql .=	"('" . $entries[8] . "', '" . $entries[4] . "', '" . $entries[5] . "', '" . $entries[11] . "', '" . $entries[2] . "', '" . $entries[9] . "', '" . $entries[7] . "', '" . $comments . "', '" . $iref . "', '" . date("Y-m-d") . "')";
		}

		if($conn->query($sql) === false) {
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		}
	}

	function _parse_gravity_form($entries, $form)
	{
		$data = array();
		foreach($form['fields'] as $field) {
			$result = _parse_gravity_form_field($field, $entries);
			if($result) {
				$data = $data + $result;
			}
		}

		return $data;
	}

	function _parse_gravity_form_field($field, $entries) {
		if ( $field['type'] === 'hidden' ) {
			return array( $field['label'] => $entries[$field['id']] );
		}

		if ( $field['type'] === 'checkbox' ) {
			$checked = array();
			foreach ( $field['inputs'] as $checkbox ) {
				if ( isset( $entries[ $checkbox['id'] ] ) ) {
					$checked = $checked + array( $field['adminLabel'] => $entries[ $checkbox['id'] ] );
				}
			}
			return $checked;
		}

		if ( isset( $entries[$field['id']] ) && $field['adminLabel'] ) {
			return array( $field['adminLabel'] => $entries[$field['id']] );
		}

		return false;
	}

	function _submit_to_sharpspring($data)
	{
		$endPoint = isset($data['sharpspring']) ? $data['sharpspring'] : '';

		// SharpSpring URL
		$baseURL = "https://app-PLBR48.sharpspring.com/webforms/receivePostback/MzQyNQAA/";

		// Try to grab tracking cookie if it exists
		if (isset($_COOKIE['__ss_tk'])) {
			$data['trackingid__sb'] = $_COOKIE['__ss_tk'];
		}

		// Parameterize
		$params = http_build_query($data);

		// Prepare URL
		$ssRequest = $baseURL . $endPoint . "/jsonp/?" . $params;

		// Send request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $ssRequest);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		curl_close($ch);
	}

	
	add_action('pre_get_posts','wpse67626_exclude_posts_from_search');
	
	function wpse67626_exclude_posts_from_search( $query ){
	
	    if( $query->is_main_query() && is_search() ){
	         //Exclude posts by ID
	         $post_ids = array(6546,7339);
	         $query->set('post__not_in', $post_ids);
	    }
	
	}
	

/** BV : BazaarVoice Integrations **/

	// load SDK
	require('includes/bvseosdk.php');

	// Enqueue BV scripts
	if ( ! function_exists('bazaar_voice_scripts') ) {
		function bazaar_voice_scripts() {
			$root = ( get_bloginfo('url') == 'http://www.thermospas.com' ) ? '//display.ugc.bazaarvoice.com' : '//display-stg.ugc.bazaarvoice.com';
			// load bvpai.js
			if ( is_page('reviews') ) {
				wp_enqueue_script( 'bvapi-js', $root . '/static/thermospas/ReadOnly/en_US/bvapi.js', array(), '1.0', false);
				//wp_enqueue_script( 'bvapi-js', $root . '/static/thermospas/en_US/bvapi.js', array(), '1.0', false);
			}
			else {
				wp_enqueue_script( 'bvapi-js', $root . '/static/thermospas/en_US/bvapi.js', array(), '1.0', false); //staging
			}
		}
		add_action( 'wp_enqueue_scripts', 'bazaar_voice_scripts' );
	}

	// Remove Canonical Link Added By Yoast WordPress SEO Plugin if URL has query string (this is for BV SEO Pagination)
	function remove_yoast_canonical_link() {
		return false;
	}
	if ( $_GET )
		add_filter( 'wpseo_canonical', 'remove_yoast_canonical_link' );

	/* This is a Jacuzzi thing, so commenting out for now... */
	function pixel_bazaarinvoice() {
		global $post;
		$custom = get_post_meta($post->ID,'jht_specs');
		$jht_specs = $custom[0];
		$prod = esc_attr($jht_specs['product_id']);
		$val = get_post_meta( $post->ID, 'lead-type', true );
		if ( !empty( $prod ) ) { ?>
			<script type="text/javascript"> 
			$BV.configure("global", { productId : "<?php echo $prod; ?>" });
			</script>
		<?php }
		if ( !empty( $val ) ) { ?>
			<script>
			$BV.SI.trackConversion({
			"type" : "lead-<?php echo $val; ?>",
			"value" : "<?php echo $val; ?>"
			});
			</script>
		<?php }
	}
	//add_action('wp_head', 'pixel_bazaarinvoice');

/** END BazaarVoice **/

function thermo_server() {
	$url = get_bloginfo('url');
	$server = 'live';
	switch ( $url ) {
		case 'http://new.thermospas.com':
		case 'http://new.thermospas.com/':
			$server = 'dev';
			break;
		case 'http://www.thermospas.com':
		case 'http://www.thermospas.com/':
		default:
			$server = 'live';
			break;
	}
	return $server;
}

/* Remove EMOJI CODE */

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

