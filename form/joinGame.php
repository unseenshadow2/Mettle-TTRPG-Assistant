<?php
	//Database Information
	$hostname="";
	$username="";
	$password="";
	$dbname="";

	//Connect to Database
	mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
	mysql_select_db("$dbname");

	//Begin the session for the user
	session_start();

	//Get the values from the Join Game form using POST method
	$the_name=$_POST['campaign_num'];
	$the_userRole=$_POST['j_role'];

	//Perform SQL command
	$select = "insert into gamePlayers (j_userName, j_gameNumber, j_userType) values 
    ('".$_SESSION["USERNAME"]."', '".$the_name."', '".$the_userRole."')";
	$sql=mysql_query($select);

	//Close the connection
	mysql_close();

	//Direct the user back to the same page (refresh page)
	header('Location: /my-games/select.php');
?>