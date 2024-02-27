<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php
include_once '../Db.php';
session_start();

if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in']) ||
    $_SESSION['user_role'] !== "admin") {
    header('Location: login.php');
}

if (isset($_SESSION['users'])) {
    foreach ($_SESSION['users'] as $u) {
        if (isset($username)) {
            if ($u['username'] === $username) {
                $user = $u;
                break;
            }
        }
    }
}

$itemsPerPage = 5;
$currentPage = !isset($_GET['page']) ? 1 : $_GET['page'];
if (isset($users)) {
    $totalPages = ceil(count($users) / $itemsPerPage);
    $currentPageItems = array_slice($users, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
}
?>
<div class="container mt-3">
    <h1 class="text-center text-success">Welcome to the Admin Panel</h1>
    <h2 class="m-3">Users</h2>
    <table class='table table-striped table-bordered'>
        <tr><th>Username</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
        <?php if (isset($currentPageItems)):
            foreach ($currentPageItems as $u): ?>
                <tr>
                    <td><?= $u['username'] ?></td>
                    <td><?= $u['name'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td><?= $u['role'] ?></td>
                    <td>
                        <?php if ($u['username'] !== $_SESSION['user_id']): ?>
                            <a class="btn btn-primary" href='edit_user.php?username=<?= $u['username'] ?>'>
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                            </a>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
    </table>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mt-3">
            <li class="page-item">
                <?php if ($currentPage > 1): ?>
                    <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">Previous</a>
                <?php endif; ?>
            </li>
            <?php if (isset($totalPages)) {
                for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == $currentPage): ?>
                        <li class="page-item active">
                            <span class="page-link active"><?php echo $i; ?></span>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endif; ?>
                <?php endfor;
            } ?>
            <li class="page-item">
                <?php if (isset($totalPages)) {
                    if ($currentPage < $totalPages): ?>
                        <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Next</a>
                    <?php endif;
                } ?>
            </li>
        </ul>
    </nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</body>
</html>