<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/my-games.css">
		<title>GameTitle</title>
    </head>
    <body>
        <?php session_start();?>
        <div class="navBar">
            <a class="rightMost" href="/index.php">Logout</a>
            <a href="/my-games/select.php">Dashboard</a>
			<?php echo "<p>".$_SESSION["USERNAME"]."</p>"?>
        </div>
    </body>
</html>