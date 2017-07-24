<?php
		$hostname="";
		$username="";
		$password="";
		$dbname="";
		$usertable="login";

	mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
	mysql_select_db("$dbname");

	$login_username=$_POST['user_name'];
	$login_password=$_POST['pass_word'];
	$select = ("select * from login where login_username = ('".$login_username."')");
	$sql=mysql_query($select);
	$exist = mysql_num_rows($sql);

	if( $exist ){
        mysql_close();
    	header('Location: /my-games/select.php');
	} else {
        mysql_close();
    	echo "nA";
	}
	mysql_close();
?>