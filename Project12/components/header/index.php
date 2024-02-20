<ul class="nav nav-pills bg-header py-3 px-5">
    <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fa-solid fa-house" style="color: #f7f7f7;"></i></a>
    </li>
    <?php
    include "db.php";
    foreach ($navItems as $navItemParent):
        $itemChild = [];
        foreach ($navItems as $navItemChild):
            if ($navItemChild['parent'] == $navItemParent['id']):
                $itemChild[] = $navItemChild;
            endif;
        endforeach;
        if ($navItemParent['parent'] == 'NULL' || $navItemParent['parent'] == ''):
            if (count($itemChild) == 0):
                ?>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="#"><?= $navItemParent['title'] ?></a>
                </li>
            <?php
            else:
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-bold" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= $navItemParent['title'] ?></a>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($itemChild as $item):
                        ?>
                            <li><a class="dropdown-item text-dark" href="#"><?= $item['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php
            endif;
        endif;
    endforeach;
    ?>
</ul>

