<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/select.css">
        <title>Game Select</title>
    </head>
    <body>
        <div class="nav_Space">
            <img class="page_Title" src="/img/Mettlewhite.png">
        </div>
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
        <?php
		$hostname="";
		$username="";
		$password="";
		$dbname="";

        session_start();

		mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
		mysql_select_db("$dbname");

        $strSQL = "SELECT * FROM games";
        $rs = mysql_query($strSQL);

        while($row = mysql_fetch_array($rs))
        {

            /*$print = false;

            //Check to see if we should print that module
        	while($check1 = mysql_fetch_array($rs))
        	{
            	if ($_SESSION['USERNAME'] == $check1['userName'])
                {
                    $print = true;
                }
                while($check2 = mysql_fetch_array($rs2))
                {
                    if($_SESSION['USERNAME'] == $check2['j_userName'])
                    {
                        $print = true;
                    }
                }
        	}

            if ($print = true)
            {*/
            echo "	<a href = '" . $row['gameName'] . ".php'> <div class='form_Area'>
            		<p class='gameTitle'>" . $row['gameName'] . "</p>
                    <p class='gameID'> GameID: " . $row['gameNumber'] . "</p>
                    <p class='gameUsers'>" . $row['userName'] . " as " . $row['userType'] . " (Owner)</p>";

            $strSQL2 = "SELECT * FROM gamePlayers WHERE '".$row['gameNumber']."' = j_gameNumber";
        	$rs2 = mysql_query($strSQL2);
            $i = 0;
            while($row2 = mysql_fetch_array($rs2) )
            {
                echo "<p class='gameUsers'>-" . $row2['j_userName'] . " as " . $row2['j_userType'] . "</p>";
                $i++;

                if ($i > 6)
                {
                    echo "<p class='gameUsers'>+Plus More Users </p>";
                    break;
                }
            }
            echo " </div> </a>
                 ";
            $doc = fopen($row['gameName'] . ".php", "x+");
            if ($doc)
            {
                $doc1 = fopen("template.php", "r");
                while(!feof($doc1))
                {
                	fwrite($doc, fgets($doc1));
                }
                fclose($doc1);
            }
            fclose($doc);
            }
        /*}*/
        mysql_close();
		?>

    </body>
</html>