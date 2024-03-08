<?php

function loadModel($modelName) {
  require(ROOT_PATH.MODEL_FOLDER_NAME.$modelName.'.php');
}

function displayView($viewName) {
  require(ROOT_PATH.VIEW_FOLDER_NAME.$viewName.'.php');
}

function callService($serviceName) {
  require(ROOT_PATH.SERVICE_FOLDER_NAME.$serviceName.'Service.php');
  $serviceObj = $serviceName.'Service';
  return new $serviceObj;
}

function accessController($controllerName) {
  require(ROOT_PATH.CONTROLLER_FOLDER_NAME.$controllerName.'Controller.php');
  $controllerObj = $controllerName.'Controller';
  return new $controllerObj;
}

function getConn() {
  try {
    return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
  } catch (PDOException $e) {
    echo $e;
    return null;
  }
}

function runQuery($conn, $query) {
  try {
    if($conn) {
      return $conn->query($query);
    }
  } catch (PDOException $e) {
    echo $e;
    return null;
  }
}