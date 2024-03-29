<header >
    <nav class="navbar navbar-expand-lg" style="background-color: #f5f5f5;">
    <div class="container-fluid" >
        <a class="navbar-brand fw-bold text-success fs-4" href="<?=DOMAIN?>">DiCoSy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a  class="nav-link fw-bold <?= $_SESSION['current_page'] == 'Home' ? 'active' : ''?>" href="<?=DOMAIN?>">Trang chủ</a></li>
            <li class="nav-item"><a class="nav-link fw-bold <?= $_SESSION['current_page'] == 'Department' ? 'active' : ''?>" href="<?=DOMAIN.'?controller=department'?>">Phòng ban</a></li>
            <li class="nav-item"><a class="nav-link fw-bold <?= $_SESSION['current_page'] == 'Employee' ? 'active' : ''?>" href="<?=DOMAIN.'?controller=employee'?>">Nhân viên</a></li>
        </ul>
        <div class="d-flex">
            <form class="d-flex" action="#" method="post">
                <select name="field-search" class="form-select me-3 fw-bold" style="width: 180px;">
                    <?php global $colSearch; foreach ($colSearch as $c):?>    
                        <option class="fw-bold" value="<?=$c['id']?>"><?=$c['displayName']?></option>
                    <?php endforeach?>    
                    
                </select>
                <input class="form-control me-2" name="search-value" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success me-2" type="submit">Search</button>
            </form>
            <div class="dropdown">
                <button class="btn btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    <?php 
                        if (file_exists(ROOT_PATH.'/public/assets/uploads/avatar-'.$_SESSION['uid'].'.jpg')) {
                            $avatar = './assets/uploads/avatar-'.$_SESSION['uid'].'.jpg';
                        } 
                        else if(file_exists(ROOT_PATH.'/public/assets/uploads/avatar-'.$_SESSION['uid'].'.png')) {
                            $avatar = './assets/uploads/avatar-'.$_SESSION['uid'].'.png';
                        }                        
                        else {
                            $avatar = './assets/uploads/default.png';
                        }
                    ?>
                    <img src="<?=$avatar?>" style="height: 40px; width: 40px; border-radius: 50%;" alt="">
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start mt-2" style="left: -100px">
                    <li><a class="dropdown-item" href="<?=DOMAIN.'?controller=user&action=edit'?>">Chỉnh sửa thông tin</a></li>
                    <li><a class="dropdown-item" href="<?=DOMAIN.'?controller=auth&action=logout'?>">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
    </nav>
</header>