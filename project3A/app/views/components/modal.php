<?php
// $modal = [
//     'id' => 'exampleModal',
//     'title' => 'Cảnh báo',
//     'content' => 'Bạn có chắc muốn xóa không ?',
//     'btnTitle' => 'Lưu',
//     'btnType' => 'success'
// ];
?>

<!-- Modal -->
<div class="modal fade" id="<?=$modal['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$modal['title']?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?=$modal['content']?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-<?=$modal['btnType']?>"><?=$modal['btnTitle']?></button>
            </div>
        </div>
    </div>
</div>