<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/my-games.css">
		<title>GameTitle</title>
		<script src="../scripts/journal.js"></script>
    </head>
    <body>
        <?php session_start();?>
        <div class="navBar">
            <a class="rightMost" href="/index.php">Logout</a>
            <a href="/my-games/select.php">Dashboard</a>
			<?php echo "<p>".$_SESSION["USERNAME"]."</p>"?>
        </div>
		<div id="outerDiv">
			<div id="journalDiv">
				<!-- Load the HTML templates into this object -->
			</div>
			<button script="updateInnerHTML('journalDiv')/*This spits out the string that is the journalDiv's html contents with updated values. We need to work on getting this to interact with the database*/">Save</button>
		</div>
    </body>
</html>