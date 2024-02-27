<?php function getForm($user) { ?>
<?php session_start();?>
<form class="card profile p-5" action="update_profile.php" method="post" enctype="multipart/form-data">
    <h2 class="text-center fw-bold">Profile Information</h2>
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?=isset($_SESSION['name']) ? $_SESSION['name'] : $user['name'] ;?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?=$user['email'];?>" disabled>
    <br>
    <img class="rounded-circle avatar mx-auto" src="uploads/<?=isset($_SESSION['avatar']) ? $_SESSION['avatar'] : $user['avatar'] ;?>">
    <br>
    <input type="file" name="avatar" accept="image/*">
    <br>
    <button type="submit">Update Profile</button>
</form>
<?php } ?>
