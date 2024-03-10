<div class="container">
    <h3 class="text-center text-primary text-uppercase my-3">Employee Management</h3>
    <a href="<?= DOMAIN .'?controller=employee&action=add'?>" class="btn btn-success">Create</a>
    <form class="d-flex col-3" role="search" action="<?php DOMAIN.'/?controller=employee&action=index'?>" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Position</th>
            <th scope="col">Avatar</th>
            <th scope="col" colspan="3" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($employees as $employee){

            ?>
            <tr>
                <th scope="row"><?= $employee->getEmployeeId()?></th>
                <td><?= $employee->getFullName()?></td>
                <td><?= $employee->getAddress()?></td>
                <td><?= $employee->getEmail()?></td>
                <td><?= $employee->getPhone()?></td>
                <td><?= $employee->getPosition()?></td>
                <td><?= $employee->getAvatar()?></td>
                <th scope="col">
                    <a href="<?= DOMAIN .'?controller=employee&action=show&id='.$employee->getEmployeeId()?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                </th>
                <th scope="col">
                    <a href="<?= DOMAIN .'?controller=employee&action=update&id='.$employee->getEmployeeId()?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                </th>
                <th scope="col">
                    <a href="<?= DOMAIN .'?controller=employee&action=delete&id='.$employee->getEmployeeId()?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </th>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
