@extends('system.module.bi')
@section("folderView")
    @parent
    <form id="#createFolderForm" action="/bi/folder/create/execute" method="post">
        <div class="form-group">
            <label for="usr">Tên thư mục</label>
            <input required type="text" name="FolderName" class="form-control" id="folderName">
        </div>
        <div class="form-group">
            <label for="usr">Mô tả thư mục</label>
            <textarea required type="text" name="FolderDescription" class="form-control "
                      id="folderDescription"></textarea>
        </div>
        <div class="form-group">
            <button class="btn-primary btn">Tạo thư mục</button>
        </div>
        <input type="hidden" name="FolderParentID" value="<?php echo $FolderParentID ?>">
        <input type="hidden" name="CreateUserID" value="<?php echo $CreateUserID ?>">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
@stop