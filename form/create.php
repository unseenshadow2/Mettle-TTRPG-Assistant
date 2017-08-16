<?php
	//Database Information
	$hostname="";
	$username="";
	$password="";
	$dbname="";

	//Connect to Database
	mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
	mysql_select_db("$dbname");

	//Get the user values from the Create form using POST method
	$login_username=$_POST['user_name'];
	$login_password=$_POST['pass_word'];
	$login_email=$_POST['e_mail'];

	//Perform SQL command
	$select = "insert into login (login_username, login_password, login_email) values ('".$login_username."', '".$login_password."', '".$login_email."')";
	$sql=mysql_query($select);

	//Begin session for this user
	session_start();
	$_SESSION["USERNAME"] = $login_username;

	//Close the connection
	mysql_close();

	//Direct the user to the game selection page
	header('Location: /my-games/select.php');
?>