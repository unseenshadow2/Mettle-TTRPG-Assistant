<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="select.css">
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
            <div class="form_Submit button2" onclick="document.forms['createGame'].submit();">Join</div>
            </form>
        </div>
        <?php
		$hostname="";
		$username="";
		$password="";
		$dbname="";
		$usertable="";

		mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
		mysql_select_db("$dbname");

        $strSQL = "SELECT * FROM games";
        $rs = mysql_query($strSQL);

        while($row = mysql_fetch_array($rs))
        {
            echo "<div class='form_Area'>
            		<p>" . $row['gameName'] . "</p>
                    <p> GameID: " . $row['gameNumber'] . "</p>
                    <p>" . $row['userName'] . "</p>
                  </div>";
        }
		?>
    </body>
</html>