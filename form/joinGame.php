<?php
		$hostname="";
		$username="";
		$password="";
		$dbname="";

	mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
	mysql_select_db("$dbname");

	session_start();
	$the_name=$_POST['campaign_num'];
	$the_userRole=$_POST['j_role'];

	$select = "insert into gamePlayers (j_userName, j_gameNumber, j_userType) values 
    ('".$_SESSION["USERNAME"]."', '".$the_name."', '".$the_userRole."')";
	$sql=mysql_query($select);

	mysql_close();

	header('Location: /my-games/select.php');
?>