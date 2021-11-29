<?php
	$userId = $_GET["userId"];
	$user = GetUser($userId);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Beheer account</h1>
	<h3>Gebruiker: <?php echo $user["username"]; ?></h3>
	<a href="deleteAccount?userId= <?php echo $user["id"] ?>">Verwijder uw account</a>
</body>
</html>