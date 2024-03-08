<?php
  require_once('../app/config/config.php');
  require_once(ROOT_PATH.'/app/helper/index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Contract System</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div id="root">
    <?php require_once(ROOT_PATH.'/app/routes/index.php') ?>
  </div>
  <script src="./assets/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>