<?php
require(ROOT . "model/EmptyModel.php");


function index(){
	$connection = checkConnection();
    render('empty/index', ['connection' => $connection]);
}

function overzicht(){
	render('empty/overzicht');
}

function info(){
	render('empty/info');
}

function edit(){
	render('empty/edit');
}

function deletePlan(){
	render('empty/deletePlan');
}

function beheer(){
	render('empty/beheer');
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
	render('empty/index2');
}