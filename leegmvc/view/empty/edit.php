<?php
	$horseId = $_GET["horseId"];
	$horse = GetHorse($horseId);
	$userId = $_GET["userId"];
	$user = GetUser($userId);

	$check = false;
	$check2 = false;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$check = true;
		$check2 = true;
		
		$owner = $user["username"];
		$ownerId = $user["id"];
		$tijd = $_POST["v3"];
		$eindtijd = $_POST["v4"];

		$data = array(
			"id" => $horseId,
			"owner" => $owner,
			"tijd" => $tijd,
			"eindtijd" => $eindtijd,
			"ownerId" => $ownerId 
		); 

		planHorse($data);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Plan <?php echo $horse["horse"]; ?> in</h1>
	<h3>Gebruiker: <?php echo $user["username"]; ?></h3>
	<div class="block">
		<?php 
			if($check == false){
		?>
			<form method="POST">
				<p>Gebruiker: <?php echo $user["username"]; ?></p>
				<p>Paard: <?php echo $horse["horse"]; ?></p>
				<label for= "v3">Begintijd:</label>
				<input type="time" name="v3" placeholder="Vul in." value="" required>
				<br>
				<br>
				<label for= "v4">Eindtijd:</label>
				<input type="time" name="v4" placeholder="Vul in." value="" required>
				<br>
				<br>
				<button>Plan in</button>
			</form>
			
			<br>

			<?php
				}
				else{
			?>	
				<p>Paard is ingeplant</p>
				<a href="overzicht?userId= <?php echo $userId ?>">Terug naar overzicht</a>
			<?php
				}
				if($horse["tijd"] != "" && $check2 == false){
			?>

				<a href="deletePlan?horseId= <?php echo $horse["id"] ?>&userId= <?php echo $user["id"] ?>">Verwijder planning</a>	
			<?php
				}
			?>
	</div>			
</body>
</html>