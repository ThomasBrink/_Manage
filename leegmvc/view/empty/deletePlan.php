<?php
	$userId = $_GET["userId"];
	$horseId = $_GET["horseId"];
	deletePlanning($horseId);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Planning is verwijderd</h1>
	<a href="overzicht?userId= <?php echo $userId ?>">Terug naar overzicht</a>
</body>
</html>