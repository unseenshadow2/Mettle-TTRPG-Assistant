<?php
	$hostname="";
	$username="";
	$password="";
	$dbname="";
	$usertable="";

	mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
	mysql_select_db("$dbname");


	$the_name=$_POST['campaign_name'];
	$the_userRole=$_POST['user_role'];
	
	$select = "insert into games (userType, gameName) values ('".$the_userRole."', '".$the_name."')";
	$sql=mysql_query($select);

	mysql_close();

	header('Location: /my-games/select.php');
?>