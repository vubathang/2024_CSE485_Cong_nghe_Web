<?php

function loadModel($modelName) {
	$path = ROOT_PATH.MODEL_FOLDER_NAME.$modelName.'.php';
	if(!file_exists($path)){
		die('File model not found!');
		exit(1);
	}
	require($path);
}

function displayView($viewName, array $data = []) {
	// If access admin, change $role = 'admin/'
	$role = '';
	if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
		$role = 'admin/';
	}
	$path = ROOT_PATH.VIEW_FOLDER_NAME.$role.$viewName.'.php';
	if(!file_exists($path)){
		die('File service not found!');
		exit(1);
	}
	foreach($data as $key => $value) {
        $$key = $value;
    }
	require($path);
}

function callService($serviceName) {
	$path = ROOT_PATH.SERVICE_FOLDER_NAME.$serviceName.'Service.php';
	if(!file_exists($path)){
		die('File service not found!');
		exit(1);
	}
	require($path);
	$serviceObj = $serviceName.'Service';
	return new $serviceObj;
}

function getConn() {
	try {
		return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
	} catch (PDOException $e) {
		echo $e;
		return null;
	}
}