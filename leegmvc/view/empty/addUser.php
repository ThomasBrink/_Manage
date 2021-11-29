<?php
	$check = false;
	$ErrorMsg = " ";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$v1 = $_POST["v1"];
		$v2 = $_POST["v2"];
		
		$data = array(
			"username" => $v1,
			"password" => $v2
		);

		$username = GetUsername($data);
		if($username == NULL){
			$check = true;
			addUserToDb($data);
		}
		else{
			$ErrorMsg = "Gebruikersnaam is al in gebruik";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Wordt een gebruiker</h1>
	<?php
		if($check == false){
	?>
		<form method="POST">
			<label for= "v1">Username:</label>
			<input type="text" name="v1" placeholder="Vul in." value="" required>
			<br>
			<br>
			<label for= "v2">Password:</label>
			<input type="password" name="v2" placeholder="Vul in." value="" required>
			<p><?php echo $ErrorMsg ?></p>
			<button>Voeg toe</button>
		</form>
	<?php
		}
		else{	
	?>	
		<p>Gebruiker is toegevoed</p>
		<br>
		<a href="index2">Naar index</a>
	<?php
		}
	?>
</body>
</html>