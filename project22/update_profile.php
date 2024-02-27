<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and update user information
    $errors = [];
//    $user['name'] = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
    $user['name'] = $_POST['name'];
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $maxSize = 1048576; // 1MB
    $targetDir = "uploads/"; // Adjust directory path
    if (!empty($_FILES['avatar']['tmp_name'])) {
        $fileInfo = pathinfo($_FILES['avatar']['name']);
        if (!in_array($fileInfo['extension'], $allowedExtensions)) {
            header('Location: index.php?error=1');
            exit();
        } else if ($_FILES['avatar']['size'] > $maxSize) {
            header('Location: index.php?error=2');
            exit();
        } else {
            $fileName = 'avatar' . "." . $fileInfo['extension'];
            $targetFile = $targetDir . $fileName;
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile))
            {
                $user['avatar'] = $fileName; // Update avatar URL in array
            } else {
                $errors[] = "Failed to uploads file.";
            }
        }
    }
    // Handle errors or update profile
    if (empty($errors)) {
        // Update user profile in database or persistent storage (replace with your logic)
 echo "Profile updated successfully!";
 } else {
        header('Location: index.php');
    }
}
session_start();
$_SESSION['name'] = $user['name'];
$_SESSION['avatar'] = $user['avatar'];
header('Location: index.php');
?>
