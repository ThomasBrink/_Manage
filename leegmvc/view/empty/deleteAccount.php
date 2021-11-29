<?php
	$userId = $_GET["userId"];

	deleteUser($userId);

	$rows = GetHorsesOfUser($userId);
	
	for($i = 0; $i < count($rows); $i++){
		deletePlanning($rows[$i]["id"]);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Uw account is verwijderd</h1>

	<a href="index2">Naar index</a>
</body>
</html>