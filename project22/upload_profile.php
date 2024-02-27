<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and update user information
    $errors = [];
    $user['name'] = $_POST['name'];
    // Handle avatar upload (similar to previous exercise)
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $maxSize = 1048576; // 1MB
    $targetDir = "uploads/"; // Adjust directory path
    if (!empty($_FILES['avatar']['tmp_name'])) {
        $fileInfo = pathinfo($_FILES['avatar']['name']);
        if (!in_array($fileInfo['extension'], $allowedExtensions)) {
            $errors[] = "Only JPG, JPEG, and PNG files are allowed.";
        } else if ($_FILES['avatar']['size'] > $maxSize) {
            $errors[] = "File size must be less than 1MB.";
        } else {
            session_start();
            $fileName = uniqid() . "." . $fileInfo['extension'];
            $targetFile = $targetDir . $fileName;
            $_SESSION['avatar'] = $targetFile;
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile))
            {
                $user['avatar'] = $targetFile; // Update avatar URL in array
            } else {
                $errors[] = "Failed to upload file.";
            }
        }
    }
    // Handle errors or update profile
    if (empty($errors)) {
        // Update user profile in database or persistent storage (replace with your logic)
 echo "Profile updated successfully!";
 } else {
        echo "Errors:";
        foreach ($errors as $error) {
            echo "<br> - $error";
        }
    }
}
?>