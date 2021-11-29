<?php
	$userId = $_GET["userId"];
	$horses = GetHorses();
	$user = GetUser($userId);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Paarden overzicht</h1>
	<h3>Gebruiker: <?php echo $user["username"]; ?></h3>
	<a class="a" href="beheerAccount?userId= <?php echo $user["id"] ?>">Beheer uw account</a>
	<a class="a" href="beheer?userId= <?php echo $user["id"] ?>">Beheer al uw planningen</a>
	<div class="container">
		<h4><a href="addHorse?userId= <?php echo $user["id"] ?>">Voeg een paard toe</a></h4>
		<?php
			for($i=0; $i<count($horses); $i++){
		?>
		<div class="block">
			<p><?php echo $horses[$i]["horse"] ?></p>

			<a href="info?horseId= <?php echo $horses[$i]["id"] ?>&userId= <?php echo $user["id"] ?>">info</a>
		</div>	
		<?php
			}
		?>
		<h4><a href="index2">Log uit</a></h4> 
	</div>
</body>
</html>