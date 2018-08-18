@extends('system.module.bi')
@section("folderView")
    @parent
    <form id="#renameFolderForm" action="/bi/folder/rename/execute" method="post">
        <div class="form-group">
            <label for="usr">Tên thư mục hiện tại</label>
            <input type="text" name="OldName" class="form-control" disabled value="<?php echo $oldFolderName?>">
        </div>
        <div class="form-group">
            <label for="usr">Tên mới thư mục</label>
            <input type="text" name="NewFolderName" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn-primary btn">Đổi tên</button>
        </div>
        <input type="hidden" name="FolderID" value="<?php echo $currentFolderId?>">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
@stop