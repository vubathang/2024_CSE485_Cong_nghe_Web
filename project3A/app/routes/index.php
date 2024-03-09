<?php
    $controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? 'home'));
    $actionName = strtolower($_REQUEST['action'] ?? 'index');
    
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