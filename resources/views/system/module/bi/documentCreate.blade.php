@extends('system.module.bi')
@section("folderView")
    @parent
    <div class="card">
        @section("rightToolbar")
            @include("system.module.bi.documentRightToolbar" , ["FolderParentId" => $FolderParentID])
        @show
        <div class="card-body">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="processDocument" action="/bi/document/create/execute" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="well-block">
                                            <!-- Form start -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="DocumentName">Tên tài liệu</label>
                                                        <input  class="form-control input-md" type="text" id="DocumentName" name="DocumentName" placeholder="Tên tài liệu">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="StatusID">Phát hành</label>
                                                        <input type="checkbox" id="StatusID" name="StatusID"  class="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="DocumentContent">Nội dung</label>
                                                        <textarea id="documentContent" name="DocumentContent"  class="form-control input-md" rows="10" cols="10" style="resize: none; min-height: 300px"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group attachedFiles">
                                                        <label class="control-label" for="DocumentContent">Chọn file đính kèm</label>
                                                        <a id="bi-addFile" class="toolbar-btn action-on-header" href="">
                                                            <i class="fa fa-plus-circle"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="DocumentContent">Tài liệu liên quan</label>
                                                        <button class="form-control input-md" data-toggle="modal" data-target="#relatedDocumentModal"  type="button" id="documentRelated" name="DocumentRelated"  class="btn btn-info form-control input-md" style="width: 100px;">Thêm</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- form end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="FolderID" value="<?php echo $FolderParentID?>">
                            <input type="hidden" name="CreateUserID" value="<?php echo $CreateUserID?>">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @include("system.module.bi.relatedDocumentPopup", ["AllDocuments" => $AllDocuments])
    @include("system.module.bi.script.documentCreateScript")
    </div>
@stop