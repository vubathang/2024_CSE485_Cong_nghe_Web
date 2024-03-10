<div class="card w-50 mx-auto p-3">
    <h5 class="card-title"><?=isset($user) ? $user->getUsername() : 'Username'?></h5>
    <p class="card-content"><?=isset($user) ? $user->getPassword() : 'Password'?></p>
    <p class="card-content"><?=isset($user) ? $user->getRole() : 'Role'?></p>
    <p class="card-content"><?=isset($user) ? $user->getEmployeeId() : 'EmployeeId'?></p>
    <a href="<?=DOMAIN.'?controller=home'?>">HOME</a>
</div>
