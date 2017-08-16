<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/select.css">
        <title>Game Select</title>
    </head>
    <body>
        <!-- Load the background -->
        <div class="nav_Space">
            <img class="page_Title" src="/img/Mettlewhite.png">
        </div>
        <!-- Create Game form -->
        <div class="form_Area form_Area_InputText">
            <form name="createGame" method="post" action="/form/instanceCampaign.php">
            	<p>
                	Campaign Name
                </p>
                <input type="text" name="campaign_name" >
            	<p>
                	Your Role
                </p>
                <input type="text" name="user_role" >
        	<div class="form_Submit button1" onclick="document.forms['createGame'].submit();">Create</div>
            </form>
        </div>
        <!-- Join Game form -->
		<div class="form_Area form_Area_InputText">
            <form name="joinGame" method="post" action="/form/joinGame.php">
            	<p>
                	Campaign Number
                </p>
                <input type="text" name="campaign_num" >
            	<p>
                	Your Role
                </p>
                <input type="text" name="j_role" >
        	<div class="form_Submit button1" onclick="document.forms['joinGame'].submit();">Join</div>
            </form>
        </div>
        <!-- Begin campaign loading -->
        <?php
        	//Database Information
			$hostname="";
			$username="";
			$password="";
			$dbname="";

        	//Begin user session
        	session_start();

        	//Connect to Database
			mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
			mysql_select_db("$dbname");

        	//Perform SQL command
        	$strSQL = "SELECT * FROM games";
        	$rs = mysql_query($strSQL);

        	while($row = mysql_fetch_array($rs))
        	{ //While there are rows in the array
            	$print = false; //Print defaults to FALSE

            	if ($_SESSION['USERNAME'] == $row['userName'])
                {//Check to see if the user owns any campaigns
                    $print = true; //If so, print = TRUE
                }

                //Now check to see if the user is a member of any campaigns
				$strSQL3 = "SELECT * FROM gamePlayers WHERE '".$row['gameNumber']."' = j_gameNumber";
        		$rs3 = mysql_query($strSQL3);

                while($check2 = mysql_fetch_array($rs3))
                {//Check to see if they are a member of any campaign
                    if($_SESSION['USERNAME'] == $check2['j_userName'])
                    {//If they are, set print to TRUE
                        $print = true;
                    }
        		}

                //If either test above is TRUE, we can begin the printing process
            	if ($print == true)
            	{ //Print the row of information of the campaign they own or are a part of
            		echo "	<a href = '" . $row['gameName'] . ".php'> <div class='form_Area'>
            				<p class='gameTitle'>" . $row['gameName'] . "</p>
                    		<p class='gameID'> GameID: " . $row['gameNumber'] . "</p>
                    		<p class='gameUsers'>" . $row['userName'] . " as " . $row['userType'] . " (Owner)</p>";

                    //Now print all of the people that are a part of the campaign
            		$strSQL2 = "SELECT * FROM gamePlayers WHERE '".$row['gameNumber']."' = j_gameNumber";
        			$rs2 = mysql_query($strSQL2);
            		$i = 0; //i is used to make sure the list of names printed isn't too long

                    //Now cycle through all of the campaign rows for members
            		while($row2 = mysql_fetch_array($rs2) )
            		{
                        //Print the name of the player
                		echo "<p class='gameUsers'>-" . $row2['j_userName'] . " as " . $row2['j_userType'] . "</p>";
                		$i++; //Add one to the "number of names" counter

                		if ($i > 6)
                		{ //Once enough names for the space is printed, stop printing names
                    		echo "<p class='gameUsers'>+Plus More Users </p>";
                    		break; //and exit out of this print loop
                		}
            		}

                    //Close off all the HTML tags
            		echo " </div> </a>
                 			";

                    //Using the name of the game, create a php page for that game
            		$doc = fopen($row['gameName'] . ".php", "x+");

                    //If fopen is TRUE (meaning it does not already exist)
            		if ($doc)
            		{
                        //Load up the template page that will be cloned
                		$doc1 = fopen("template.php", "r");

                        //Write the contents to the new file
                		while(!feof($doc1))
                		{
                			fwrite($doc, fgets($doc1));
                		}

                        //And then close the template document
                		fclose($doc1);
            		}

                    //And close the new file, as well
            		fclose($doc);
            	}
        	}
        	//Once all of this is done, close the connection to the database
        	mysql_close();
		?>
    </body>
</html>