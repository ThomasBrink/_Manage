<?php
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>index</title>
</head>
<body>
    <h1>Log in</h1>

    <form method="POST">
    	<label for= "v1">Username:</label>
        <input type="text" name="v1" placeholder="Vul in." value="" required>
        <br>
        <br>
        <label for= "v2">Password:</label>
        <input type="password" name="v2" placeholder="Vul in." value="" required>
        <p><?php echo $ErrorText ?></p>
        <button>Log in</button>
 	</form>

    <h4><a href="<?=URL?>empty/addUser">Wordt een gebruiker</a></h4>
                              
</body>
</html>  