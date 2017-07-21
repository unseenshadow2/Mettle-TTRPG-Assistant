<?php


	mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
	mysql_select_db("$dbname");


	$login_username=$_POST['user_name'];
	$login_password=$_POST['pass_word'];
	$login_email=$_POST['e_mail'];

	$select = "insert into login (login_username, login_password, login_email) values ('".$login_username."', '".$login_password."', '".$login_email."')";
	$sql=mysql_query($select);

	mysql_close();

	header('Location: /my-games/select.php');
?>