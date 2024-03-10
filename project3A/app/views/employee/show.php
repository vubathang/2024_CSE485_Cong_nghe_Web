<div class="container">
    <h3>Thông tin nhân viên</h3>
    <div class="d-flex">
        <h5>Full name: </h5>
        <p><?= $employee->getFullName()?></p>
    </div>
    <div class="d-flex">
        <h5>Address: </h5>
        <p><?= $employee->getAddress()?></p>
    </div>
    <div class="d-flex">
        <h5>Email: </h5>
        <p><?= $employee->getEmail()?></p>
    </div>
    <div class="d-flex">
        <h5>Phone: </h5>
        <p><?= $employee->getPhone()?></p>
    </div>
    <div class="d-flex">
        <h5>Position: </h5>
        <p><?= $employee->getPosition()?></p>
    </div>
    <div class="d-flex">
        <h5>Avatar: </h5>
        <p><?= $employee->getAvatar()?></p>
    </div>

    <!--    <a href="--><?php //= DOMAIN .'?controller=employee&action=update&id='.$employee->getEmployeeId()?><!--" class="btn btn-warning">Edit</a>-->
</div>

