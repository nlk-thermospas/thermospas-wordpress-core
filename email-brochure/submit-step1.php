<?php

include_once "lib/db_connect.php";



json_encode( $_POST );

$phone = $_POST['phone'];

$search1  = array('(', ')');

$search2  = array('+', ' ');

$phone = str_replace($search1, "", $phone);

$phone = str_replace($search2, "-", $phone);



$sql_ht_form = "INSERT INTO ht_form

		(`ht_date`, `ht_use`,`ht_seating`,`zipcode`,`iref`,`name`,`phone`,`ht_token`)

		VALUES ('".$_POST['ht_date']."','".$_POST['ht_use']."','".$_POST['ht_seating']."','".$_POST['zipcode']."','".$_POST['iref']."','".$_POST['name']."','".$phone."','".$_POST['ht_token']."')";



$lead_date = date('m-d-y', strtotime($_POST['ht_date']));

$lead_time = date('H:i:s');

$sql_leads = "INSERT INTO leads

		(`create_date`,`create_time`, `DYO_use`,`DYO_tub`,`zip`,`referrer`,`name`,`phone`,`leads_token`)

		VALUES ('".$lead_date."','".$lead_time."','".$_POST['ht_use']."','".$_POST['ht_seating']."','".$_POST['zipcode']."','".$_POST['iref']."','".$_POST['name']."','".$phone."','".$_POST['ht_token']."')";


mysql_query($sql_ht_form);
$ht_id = mysql_insert_id();

mysql_query($sql_leads);
$lead_id = mysql_insert_id();

// Send Email Notification
require_once($_SERVER['DOCUMENT_ROOT'] . '/email-brochure/classes/HtDb.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/email-brochure/classes/HtEmail.php');

$db = new HtDb();
$email = new HtEmail();

$submission = $db->get('ht_form', array('ht_id', $ht_id));
$lead = $db->get('leads', $lead_id);
$email->sendSubmission($submission, 'hot-tub-pricing-1.php - step 1', $lead);
// End Send Email Notification



		echo "Google Covnersion Fired";

		?>

		<!-- Google Code for Clix Conversion Conversion Page installed 8/02/12 -->

		<script type="text/javascript">

		/* <![CDATA[ */

		var google_conversion_id = 1070435200;

		var google_conversion_language = "en";

		var google_conversion_format = "3";

		var google_conversion_color = "ffffff";

		var google_conversion_label = "UstwCKjK2QEQgJe2_gM";

		var google_conversion_value = 0;

		/* ]]> */

		</script>

		<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">

		</script>

		<noscript>

		<div style="display:inline;">

		<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1070435200/?value=0&amp;label=UstwCKjK2QEQgJe2_gM&amp;guid=ON&amp;script=0"/>

		</div>

		</noscript>



		<!-- Start AdCenter Code 8/02/12-->

		<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.atdmt.com/mstag/site/7eda56ec-dae3-4bd4-915b-8a11f9d7ad95/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"572823",type:"1",actionid:"66891"})</script> <noscript> <iframe src="//flex.atdmt.com/mstag/tag/7eda56ec-dae3-4bd4-915b-8a11f9d7ad95/analytics.html?dedup=1&domainId=572823&type=1&actionid=66891" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>

		<!-- End AdCenter Code 8/02/12 -->
