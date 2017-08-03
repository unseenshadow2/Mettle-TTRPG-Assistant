<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/index.css">
        <title>Mettle</title>
    </head>
    <body>
        <div class="img_Space">
            <img class="page_Title" src="/img/Mettlewhite.png">
            <img class="page_Title" src="/img/RPGwhite.png">
        </div>
        <div class="form_Area">
            <form name="login" method="post" action="/form/login.php">
            	<p>
                	USERNAME
                </p>
                <input type="text" name="user_name" >
            	<p>
                	PASSWORD
                </p>
                <input type="text" name="pass_word" >
        	</form>
        	<div class="form_Submit button1" onclick="document.forms['login'].submit();">Login</div>
        </div>
        <div class="form_Area">
            <form name="create" method="post" action="/form/create.php">
            	<p>
                	USERNAME
            	</p>
                <input type="text" name="user_name" >
            	<p>
                	PASSWORD
            	</p>
                <input type="text" name="pass_word" >
            	<p>
                	REENTER
            	</p>
                <input type="text" name="pass_word2" >
        	</form>
            <div class="form_Submit button2" onclick="document.forms['create'].submit();">Create</div>
        </div>
    </body>
</html>