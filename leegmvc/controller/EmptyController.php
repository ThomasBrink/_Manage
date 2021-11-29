<?php
require(ROOT . "model/EmptyModel.php");


function index(){
	$connection = checkConnection();
    render('empty/index', ['connection' => $connection]);
}

function overzicht(){
	$userId = $_GET["userId"];
	$horses = GetHorses();
	$user = GetUser($userId);

	render('empty/overzicht', array("horses" => $horses, "user" => $user));
}

function info(){
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

	render('empty/info', array("horse" => $horse, "user" => $user, "text" => $text, "planText" => $planText, "check" => $check));
}

function edit(){
	render('empty/edit');
}

function deletePlan(){
	render('empty/deletePlan');
}

function beheer(){
	render('empty/beheer', array("rows" => $rows));
}

function addUser(){
	render('empty/addUser');
}

function beheerAccount(){
	render('empty/beheerAccount');
}

function deleteAccount(){
	render('empty/deleteAccount');
}

function addHorse(){
	render('empty/addHorse');
}

function index2(){
	$users = GetUsers();
	$ErrorText = " ";
  	if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST["v1"];
        $password = $_POST["v2"];

        $data = array(
        	"username" => $username,
        	"password" => $password
        );

        $inlogRow = GetInlog($data);

        $user = GetUser($inlogRow["id"]);

        if($inlogRow != NULL){
        	header("Location: overzicht?userId=".$user["id"]);
        }
        else{
        	render('empty/ErrorText');
        }
    }
	render('empty/index2', array("users" => $users));
}