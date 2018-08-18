<div class="card-header">
    <div class="left-table-header">
        <div class="col-md-12 text-center">
            <?php if (isset($FolderParentID)) :?>
            <a class="saveBtn-right-toolbar" href="#" id="submitCreateDocumentForm">Lưu</a>
            <?php else:?>
            <a class="saveBtn-right-toolbar" href="/bi/document/edit?documentID=<?php echo $documentID?>" id="editDocument">Sửa</a>
            <?php endif;?>
            <a class="cancelBtn-right-toolbar" href="#" onclick="history.back();">Quay lại</a>
        </div>
    </div>
</div>