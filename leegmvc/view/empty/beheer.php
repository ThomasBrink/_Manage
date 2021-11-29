<?php
	$userId = $_GET["userId"];

	$rows = GetHorsesOfUser($userId);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Beheer</h1>
	<div class="container">
		<?php
			for($i=0; $i<count($rows); $i++){
				$data = array(
					"begintijd" => $rows[$i]["tijd"],
					"eindtijd" => $rows[$i]["eindtijd"]
				);

				$cost = setCost($data);
		?>
		<div class="block">
			<p>Paard: <?php echo $rows[$i]["horse"] ?></p>
			<p>Begintijd: <?php echo $rows[$i]["tijd"] ?></p>
			<p>Eindtijd: <?php echo $rows[$i]["eindtijd"] ?></p>
			<p>Kost: <?php echo $cost ?>,-</p>
			<a href="edit?horseId= <?php echo $rows[$i]["id"] ?>&userId= <?php echo $userId ?>">Beheer planning</a>
			<br>
		</div>
		<?php
			}
			if(count($rows) == 0){
		?>
			<div class="block">
				<p>U heeft geen paarden ingeplant</p>
				<a href="overzicht?userId= <?php echo $userId ?>">Terug naar overzicht</a>
			</div>	
		<?php
			}
		?>
	</div>	
</body>
</html>
<?php

	function setCost($data){
		$string = $data["begintijd"];
		$beginTijd = (int) $string;

		$string = $data["eindtijd"];
		$eindTijd = (int) $string;

		$result = $eindTijd - $beginTijd;

		$cost = $result * 55;
		return $cost;
	}
?>