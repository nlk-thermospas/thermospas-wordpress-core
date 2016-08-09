<?php

// short variables

$first_name= $_POST[first_name];
$last_name= $_POST[last_name];
$email= $_POST[email];
$phone=$_POST[phone];
$question=$_POST[question];
$date= date('Y-m-d');
$subform= $_POST[subform];

//body email
//concatenate name
$name=trim($first_name)." ".trim($last_name);

$body="Thank you, your question has been submitted: \r\n".trim($question)."\r\n \r\nEmail: \r\n".trim($email)."\r\n \r\nPhone: \r\n".trim($phone)."\r\n \r\nQuestion From: \r\n".$name;

// insert into database

$dbname = "admin_thermo_wp";
$db = mysql_connect("localhost", "admin_thermo_wp", "ko*3pR68k>Gf<nsuvGrcm7ET{f");


//create first query

$insertsql = "INSERT INTO `online_store_dr_bob` (`firstname`, `lastname` , `email`, `phone`, `question`, `date`)"
			." VALUES ( "
			." '$first_name', '$last_name', '$email', '$phone', '$question', '$date')";

//insert into db

$insert = MySQL($dbname,$insertsql);

$MessageSubject="Ask a Service Professional";

$sendto="service@thermospas.com";

$headers = 'From: '.$email.'' . "\r\n" .
			'Reply-To: '.$email.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

mail($sendto, $MessageSubject, $body, $headers);

header( "Location: http://online.thermospas.com/Articles.asp?ID=145" );

/*
$body = "";
		$body .= "First Name: ".$first_name."\n";
		$body .= "Last Name: ".$last_name."\n";
		$body .= "Address: ".$address."\n";
		$body .= "City: ".$city."\n";
		$body .= "State: ".$state."\n";
		$body .= "Zip: ".$zipcode."\n";
		$body .= "Email Address: ".$email."\n";
		if($row){
		$body .= "Service Available: YES\n";
		}

		$body = str_replace(',',' ',$body);
		$body = str_replace('"',' ',$body);
		$body = str_replace("'"," ",$body);

		$to = $request_email;
		if($row){
			$subject = "Hot Tub Service Location Request: ".$zipcode."";
		} else {
			$subject = "Hot Tub Service Area Request: ".$zipcode."";
		}

		$headers = 'From: '.$email.'' . "\r\n" .
			'Reply-To: '.$email.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $body, $headers);*/
?>