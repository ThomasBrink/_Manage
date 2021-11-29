<?php
	$horseId = $_GET["horseId"];
	$horse = GetHorse($horseId);
	$userId = $_GET["userId"];
	$user = GetUser($userId);

	if($horse["owner"] == ""){
		$text = "Dit paard kan ingeplant worden";
		$planText = "Plan dit paard in";
		$check = "ja";
	}	
	else if($horse["owner"] == $user["username"]){
		$text = "Ingeplande tijd: $horse[tijd] <br> <br> U heeft dit paard ingeplant";
		$planText = "Beheer planning";
		$check = "al";
	}
	else{
		$text = "Ingeplant door: $horse[owner]";
		$check = "nee";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1><?php echo $horse["horse"] ?></h1>
	<h3>Gebruiker: <?php echo $user["username"]; ?></h3>
	<div class="block">
		<p><?php echo $text ?></p>
		<?php
			if($check == "ja" || $check == "al"){
		?>
			<a href="edit?horseId= <?php echo $horse["id"] ?>&userId= <?php echo $user["id"] ?>"><?php echo $planText ?></a>
		<?php
			}
		?>
	</div>	
</body>
</html>