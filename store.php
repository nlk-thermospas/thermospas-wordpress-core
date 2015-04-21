<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include 'dbconn.php';

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

// check connection
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

$comments = '{"model" : "' . $_POST['Model'] . '", "jets" : "' . $_POST['Jets'] . '", "shell" : "' . $_POST['Shell'] . '", "cabinet" : "' . $_POST['Cabinet'] . '", "options" : "' . $_POST['Options'] . '"}';

$sql = "";
$sql .= "INSERT INTO ht_form";
$sql .= "(name, address1, city, state, zipcode, phone, email, comments, iref, ht_date)";
$sql .= "VALUES";
$sql .=	"('" . $_POST['Name'] . "', '" . $_POST['Address'] . "', '" . $_POST['City'] . "', '" . $_POST['State'] . "', '" . $_POST['Zip'] . "', '" . $_POST['Phone'] . "', '" . $_POST['Email'] . "', '" . $comments . "', 'iDYO', '" . date("Y-m-d") . "')";

if($conn->query($sql) === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
  $last_inserted_id = $conn->insert_id;
  $affected_rows = $conn->affected_rows;

  //Send an Email!
  $to = "web@thermospas.com";
  $from = "info@thermospas.com";
  $subject = "HT Form Submission";
  $headers = 'From: ThermoSpas <' . $from . '>' . "\r\n";
  $message = "Source: DYO\r\n";
  $message .= "Date & Time: " . date('F j, Y h:i:s A') . "\r\n";
  $message .= "Name: " . $_POST['Name'] . "\r\n";
  $message .= "Address: " . $_POST['Address'] . "\r\n";
  $message .= "City: " . $_POST['City'] . "\r\n";
  $message .= "State: " . $_POST['State'] . "\r\n";
  $message .= "Zip: " . $_POST['Zip'] . "\r\n";
  $message .= "Phone: " . $_POST['Phone'] . "\r\n";
  $message .= "Email: " . $_POST['Email'] . "\r\n";
  $message .= "Model: " . $_POST['Model'] . "\r\n";
  $message .= "Jets: " . $_POST['Jets'] . "\r\n";
  $message .= "Shell: " . $_POST['Shell'] . "\r\n";
  $message .= "Cabinet: " . $_POST['Cabinet'] . "\r\n";
  $message .= "Options: " . $_POST['Options'] . "\r\n";

  mail($to, $subject, $message, $headers);

  _submit_to_sharpspring($_POST);
  _submit_to_leadperfect($_POST);

}




function _submit_to_sharpspring($data) {
  $endPoint = "52ac184a-53e1-4bf3-8fd7-537509a75d63";
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


function _submit_to_leadperfect($data)
{
	$comments = 'Model: ' . $data['Model'] . ', Jets: ' . $data['Jets'] . ', Shell: ' . $data['Shell'] . ', Cabinet: ' . $data['Cabinet'] . ', Options: ' . $data['Options']; // options are comma separated values
	$array = array(
	'Fname'      => $data['Name'],
	'Lname'      => $data['Name'],
	'Address1'   => $data['Address'],
	'Address2'   => '',
	'City'       => $_POST['City'],
	'State'      => $_POST['State'],
	'Zipcode'    => $_POST['Zip'],
	'Email'      => $_POST['Email'],
	'Phone'      => $_POST['Phone'],
	'Comments'   => $comments,
	'Ht_date'    => '',
	'Iref'       => 'IDYO',
	);
	
	$url = 'http://dd33.leadperfection.com/batch/addleadsinternet.asp';
	$url .= '?' . http_build_query( $array );
	$ch = curl_init( $url );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
		
}

?>