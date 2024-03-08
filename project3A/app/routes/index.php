<?php
  $controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? 'home'));
  $actionName = strtolower($_REQUEST['action'] ?? 'index');
  
  $controllerObj = accessController($controllerName);
  $controllerObj->$actionName();