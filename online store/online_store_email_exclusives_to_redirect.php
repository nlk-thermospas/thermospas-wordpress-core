<?php

// short variables

$first_name= $_POST[first];
$last_name= $_POST[last];
$email= $_POST[email];
$date= date("Y-m-d");
$subform= $_POST[subform];


// insert into database

$dbname = "admin_thermo_wp";
$db = mysql_connect("localhost", "admin_thermo_wp", "ko*3pR68k>Gf<nsuvGrcm7ET{f");


//create first query

$insertsql = "INSERT INTO `online_store_email_exsclusives` (`firstname`, `lastname` , `email`, `date`)"
			." VALUES ( "
			." '$first_name', '$last_name', '$email', '$date')";

//insert into db

$insert = MySQL($dbname,$insertsql);


header( "Location: http://online.thermospas.com/Articles.asp?ID=144" );

//header if I can get the get variables out of the link with asp
//header( "Location: http://online.thermospas.com/Articles.asp?ID=144&first=".$first_name."&last=".$last_name."&email=".$email );
?>