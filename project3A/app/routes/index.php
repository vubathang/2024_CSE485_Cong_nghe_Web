<?php
    session_start();
    $controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? 'home'));
    $actionName = strtolower($_REQUEST['action'] ?? 'index');
    
    if(!isset($_SESSION['uid'])) {
        $controllerName = 'auth';
    }

    $_SESSION['current_page'] = $controllerName;
    $controllerName .= 'Controller';

    $path = ROOT_PATH.CONTROLLER_FOLDER_NAME.$controllerName.'.php';
	if(!file_exists($path)){
		die('File controller not found!');
		exit(1);
	}
	require($path);

	$controllerObj = new $controllerName;

    if(!method_exists($controllerName, $actionName)){
        die('Method does not exist');
        exit(1);
    }
    $controllerObj->$actionName();