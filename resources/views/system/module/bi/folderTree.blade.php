<div class="card">
    <div class="card-header">
        <i class="custom-jtree-icon"></i>
        <strong class="card-title">Quản lý thư mục</strong>
        <div class="tree-tool-bar">
            <a id="bi-createFolder" class="toolbar-btn action-on-header" href="">
                <i class="fa fa-plus-circle"></i> Thêm mới</a>
            <a id="bi-renameFolder" class="toolbar-btn action-on-header" href="">
                <i class="fa fa-pencil-square-o"></i> Đổi tên</a>
            <a id="deleteFolder" class="toolbar-btn action-on-header" href=""  data-toggle="modal" data-target="#deleteModal">
                <i class="fa fa-times-circle"></i> Xóa</a>
        </div>
    </div>
    <div class="card-body">
        <h5 class="">Tài liệu ưa thích</h5>
        <div id="folderTree">
            {!!html_entity_decode($folderTree)!!}
        </div>
    </div>
</div>