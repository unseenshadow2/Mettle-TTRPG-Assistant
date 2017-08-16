<?php
	//Database Information
	$hostname="";
	$username="";
	$password="";
	$dbname="";

	//Connect to Database
	mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
	mysql_select_db("$dbname");

	//Get the values from the Login form using POST method
	$login_username=$_POST['user_name'];
	$login_password=$_POST['pass_word'];

	//Perform SQL commands
	$select = "select ('".$login_username."') from login where login_password = ('".$login_password."')";
	$sql = mysql_query($select);
	//See if the username exists
	$exist = mysql_num_rows($sql);

	if( $exist )
    { //If the username + password exists
        session_start(); //Start user session
        $_SESSION["USERNAME"] = $login_username;
        mysql_close(); //Close the connection
    	header('Location: /my-games/select.php'); //Direct them to the game select page
	}
	else
    { //If the username + password does not exits
        mysql_close(); //Close the connection
    	echo "nA"; //Spit out "Nah" message
	}
	//Redundant close for security
	mysql_close();
?>