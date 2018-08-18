<?php
/**
 * TODO: Viết giao diện sửa tài liệu ở đây
 * Có thể sử dụng lại template documentCreate để làm mẫu
 * Vui lòng đọc vê laravel layout trước khi làm
 */

?>
@extends('system.module.bi')
@section("folderView")
    @parent
    <div class="card">
        @section("rightToolbar")
            @include("system.module.bi.documentRightToolbar" , ["FolderParentID" => $currentDocument->FolderID])
        @show
        <div class="card-body">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <div class="row">
                    <div class="col-sm-12">
                        Open me at <strong>resources/views/system/module/bi/documentEdit.blade.php</strong>
                        <form id="processDocument" action="/bi/document/edit/execute" method="post"
                              enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="well-block">
                                            <!-- Form start -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="DocumentName">Tên tài
                                                            liệu</label>
                                                        <input class="form-control input-md" type="text"
                                                               id="DocumentName" name="DocumentName"
                                                               placeholder="Tên tài liệu"
                                                               value="<?php echo $currentDocument->Name?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="StatusID">Phát hành</label>
                                                        <input <?php echo $currentDocument->StatusID ?  "checked" :  ""?> type="checkbox" id="StatusID" name="StatusID" class="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="DocumentContent">Nội
                                                            dung</label>
                                                        <textarea id="documentContent" name="DocumentContent"
                                                                  class="form-control input-md" rows="10" cols="10"
                                                                  style="resize: none; min-height: 300px">
                                                            <?php echo $currentDocument->Content?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- form end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @include("system.module.bi.script.documentCreateScript")
    </div>
@stop

