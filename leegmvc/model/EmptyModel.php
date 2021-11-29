<?php
	function checkConnection(){
	    try{ 
    		$conn = openDatabaseConnection(); 
	       	$stmt = $conn->prepare("SHOW TABLES");
       		$stmt->execute();
       		$stmt->fetchAll();
       		
	    }catch(Exception $e){
			return false;
	    }

	    return true;
	}

	function openDatabase(){
		try{
			$conn = new PDO('mysql:host=localhost;dbname=_manage_db', 'root', 'mysql');
			return $conn;
		}

		catch(PDOExeption $e){
			print "Error!" . $e->getMessage() . "<br/>";
			die();
		}
	}

	function GetUsers(){
		$conn = openDatabase();
		$query = "SELECT * FROM `users`";
		$result = $conn->prepare($query);
	    $result->execute();
	    $rows = $result->fetchAll();
	    return $rows;
	}

	function GetHorses(){
		$conn = openDatabase();
		$query = "SELECT * FROM `horses`";
		$result = $conn->prepare($query);
	    $result->execute();
	    $rows = $result->fetchAll();
	    return $rows;
	}

	function GetUser($userId){
		$conn = openDatabase();
		$query = "SELECT * FROM `users` WHERE `id` = $userId";
		$result = $conn->prepare($query);
	    $result->execute();
	    $rows = $result->fetch();
	    return $rows;
	}

	function GetHorse($horseId){
		$conn = openDatabase();
		$query = "SELECT * FROM `horses` WHERE `id` = $horseId";
		$result = $conn->prepare($query);
	    $result->execute();
	    $rows = $result->fetch();
	    return $rows;
	}

	function planHorse($data){
		$conn = openDatabase();
		$query = $conn->prepare("UPDATE `horses` SET `owner` = '$data[owner]', `tijd` = '$data[tijd]', `eindtijd` = '$data[eindtijd]', `ownerId` = '$data[ownerId]' WHERE `horses`.`id` = $data[id];");
		$query->execute();
	}

	function deletePlanning($horseId){
		$conn = openDatabase();
		$query = $conn->prepare("UPDATE `horses` SET `owner` = '', `tijd` = '', `eindtijd` = '', `ownerId` = '' WHERE `horses`.`id` = $horseId;");
		$query->execute();
	}    

	function GetHorsesOfUser($userId){
		$conn = openDatabase();
		$query = "SELECT * FROM `horses` WHERE `ownerId` = $userId";
		$result = $conn->prepare($query);
	    $result->execute();
	    $rows = $result->fetchAll();
	    return $rows;
	}

	function addUserToDb($data){
		$conn = openDatabase();
		$query = $conn->prepare("INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, '$data[username]', '$data[password]');");
		$query->execute();
	}

	function deleteUser($userId){
		$conn = openDatabase();
		$query = $conn->prepare("DELETE FROM `users` WHERE `users`.`id` = $userId;");
		$query->execute();
	}

	function addHorseToDb($data){
		$conn = openDatabase();
		$query = $conn->prepare("INSERT INTO `horses` (`id`, `horse`, `owner`, `tijd`, `eindtijd`, `ownerId`) VALUES (NULL, '$data[horse]', '', '', '', '');");
		$query->execute();
	}

	function GetInlog($data){
		$conn = openDatabase();
		$query = "SELECT * FROM `users` WHERE `username` = '$data[username]' AND `password` = '$data[password]'";
		$result = $conn->prepare($query);
	    $result->execute();
	    $rows = $result->fetch();
	    return $rows;
	}

	function GetUsername($data){
		$conn = openDatabase();
		$query = "SELECT * FROM `users` WHERE `username` = '$data[username]'";
		$result = $conn->prepare($query);
	    $result->execute();
	    $rows = $result->fetchAll();
	    return $rows;
	}
?>	