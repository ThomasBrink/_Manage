<?php
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