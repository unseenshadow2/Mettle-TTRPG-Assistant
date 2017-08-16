<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/my-games.css">
		<title>GameTitle</title>
		<script src="../scripts/journal.js"></script>
    </head>
    <body>
        <!-- Start the session for the user -->
        <?php session_start();?>
        <div class="navBar">
            <a class="rightMost" href="/index.php">Logout</a>
            <a href="/my-games/select.php">Dashboard</a>
			<?php echo "<p>".$_SESSION["USERNAME"]."</p>"?>
        </div>
		<div id="outerDiv">
			<div id="journalDiv">
				<!-- Load the HTML templates into this object -->
                <?php
					//Database Information
    				$hostname="";
					$username="";
					$password="";
					$dbname="";

            		//Connect to Database
        			$conn = mysql_connect("$hostname","$username", "$password");
					mysql_select_db($dbname);

            		//Perform SQL command
                	$strSQL = "SELECT * FROM items WHERE item_id = 3 ";
        			$rs = mysql_query($strSQL);

            		//Print the HTML from the data in the Character Creation table
             		while($row = mysql_fetch_array($rs))
                    {
        				echo $row["data"];
    				}
                ?>
			</div>
            <!-- Update the HTML -->
			<button onclick="updateInnerHTML('journalDiv')">Save</button>
		</div>
    </body>
</html>