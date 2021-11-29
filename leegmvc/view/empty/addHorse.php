<?php
	$userId = $_GET["userId"];
	$check = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$check = true;

		$v1 = $_POST["v1"];
		
		$data = array(
			"horse" => $v1
		);

		addHorseToDb($data);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Voeg een paard toe</h1>
	<?php
		if($check == false){
	?>
		<form method="POST">
			<label for= "v1">Paard naam:</label>
			<input type="text" name="v1" placeholder="Vul in." value="" required>
			<br>
			<br>
			<button>Voeg toe</button>
		</form>
	<?php
		}
		else{	
	?>	
		<p>Paard is toegevoed</p>
		<br>
		<a href="<?=URL?>empty/overzicht?userId= <?php echo $userId ?>">Terug naar overzicht</a>
	<?php
		}
	?>
</body>
</html>