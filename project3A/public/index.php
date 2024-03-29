<?php
	require_once('../app/config/config.php');
	require_once('../app/config/features.php');
  	require_once(ROOT_PATH.'/app/helper/index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Digital Contact System</title>
  	<link rel="stylesheet" href="./assets/css/styles.css">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body style="background-color: #f5f5f5;">
  	<div id="root">
    	<?php require_once(ROOT_PATH.'/app/routes/index.php') ?>
  	</div>
  	<script src="./assets/js/main.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>