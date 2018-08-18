@extends('system.module.bi')
@section("folderView")
    @parent
    <div class="card">
        @section("rightToolbar")
            @include("system.module.bi.documentRightToolbar", ["documentID" => $documentID])
        @show
        <div class="card-body">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <div class="row">
                    <div class="col-sm-12">
                        <h1><?php echo $document->Name?></h1>
                        <div>
                            <strong>Ngày tạo: </strong><span><?php echo $document->CreateDate?></span>
                            <strong>Ngày sửa cuối: </strong><span><?php echo $document->LastModifyDate?></span>
                        </div>
                        <div>
                            <strong>Người tạo: </strong><span><?php echo $document->CreateUserID?></span><strong>Người sửa cuối: </strong><span><?php echo $document->LastModifyUserID?></span>
                        </div>
                        <p>
                            <?php
                            echo $document->Content;
                            ?>
                        </p>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="DocumentContent">Những file đã đính kèm</label>
                                <ul>
                                <?php
                                    $attachedFiles = json_decode($document->AttachedFiles);
                                    foreach ($attachedFiles as $attachedFile) :
                                ?>
                                    <li>
                                        <a href="/storage/<?php echo $attachedFile?>"><?php echo $attachedFile?></a>
                                    </li>
                                <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop