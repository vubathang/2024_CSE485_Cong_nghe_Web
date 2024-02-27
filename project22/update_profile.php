<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and update user information
    $errors = [];
    $user['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $user['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $maxSize = 1024 * 1024 * 5;
    $targetDir = "assets/uploads/";

    if (!empty($_FILES['avatar']['tmp_name'])) {
        $fileInfo = pathinfo($_FILES['avatar']['name']);
        if (!in_array($fileInfo['extension'], $allowedExtensions)) {
            $errors[] = "Only JPG, JPEG, and PNG files are allowed.";
        } else if ($_FILES['avatar']['size'] > $maxSize) {
            $errors[] = "File size must be less than 5MB.";
        } else {
            $fileName = uniqid() . "." . $fileInfo['extension'];
            $targetFile = $targetDir . $fileName;

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile))
            {
                $user['avatar'] = $targetFile;
            } else {
                $errors[] = "Failed to upload file.";
            }
        }
    }

    // Handle errors or update profile
    if (empty($errors)) {
        file_put_contents('Db.php', '<?php $user = ' . var_export($user, true) . ';');
        header("Location: profile.php");
    } else {
        header("Location: profile.php");
        echo "Errors:";
        foreach ($errors as $error) {
            echo "<br> - $error";
        }
    }
}