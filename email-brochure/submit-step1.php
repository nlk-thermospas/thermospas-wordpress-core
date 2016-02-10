<?php

include_once "lib/db_connect.php";



json_encode( $_POST );

// submit to lead perfection
  $comments = "Primary Use: ".$_POST['ht_use'].", People: ".$_POST['ht_seating'];
  $name = explode(" ", $_POST['name'], 2);
  $array = array(
    'Fname'      => isset( $name[0] ) ? $name[0] : $_POST['name'],
    'Lname'      => isset( $name[1] ) ? $name[1] : '',
    'Zipcode'    => $_POST['zipcode'],
    'Phone'      => $_POST['phone'],
    'Comments'   => $comments,
    'Iref'       => $_POST['iref'],
    'honeypot'   => $_POST['email-address'] // honey pot field is named "email-address"
  );
  $url = 'http://dd33.leadperfection.com/batch/addleadsinternet.asp';

  $url .= '?' . http_build_query( $array );

  $ch = curl_init( $url );
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);

  curl_close($ch);



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

<?php /* Google Conversion code moved to GTM */ ?>
<?php /* Bing Conversion code moved to GTM */ ?>