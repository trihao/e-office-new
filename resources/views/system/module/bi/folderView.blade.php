
@extends('system.module.bi')
@section("folderView")
    @parent
    <div class="card">
        @section("rightToolbar")
            @include("system.module.bi.rightToolbar")
        @show
        <div class="card-body">

            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="bootstrap-data-table"
                               class="table table-striped table-bordered dataTable no-footer table-hover" role="grid"
                               aria-describedby="bootstrap-data-table_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                    style="width: 20%">Tên
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Mô tả
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Người tạo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Ngày tạo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Người sửa cuối
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Ngày sửa cuối
                                </th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            /** List all folders */
                            if (count($childFolders) > 0) :
                            ?>
                            <?php
                            foreach ($childFolders as $folder) :
                            ?>
                            <?php
                            ?>
                            <tr role="row" class="odd bi-table-item type-folder" folder_id="<?php  echo $folder->ID?>">
                                <td><span class="folder-icon"><img src="{{ asset("/media/default_folder_icon.png") }}"
                                                                   alt=""></span><?php echo isset($folder->FolderName) ? $folder->FolderName : ""?>
                                </td>
                                <td><?php echo isset($folder->FolderDescription) ? $folder->FolderDescription : ""?></td>
                                <td><?php echo $folder->CreateUserID ? $folder->CreateUserID : ""?></td>
                                <td><?php echo $folder->CreateDate?></td>
                                <td><?php echo isset($folder->LastModifyUserID) ? $folder->LastModifyUserID : ""?></td>
                                <td><?php echo $folder->LastModifyDate?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            <?php endif;?>

                            <?php
                            /** List all documents */
                            if (count($childDocuments) > 0) :
                            ?>
                            <?php
                            foreach ($childDocuments as $document) :
                            ?>
                            <?php
                            ?>
                            <tr role="row" class="odd bi-table-item type-document" document_id="<?php  echo $document->ID?>">
                                <td><span class="folder-icon"><img src="{{ asset("/media/default_document_icon.png") }}"
                                                                   alt=""></span><?php echo isset($document->ID) ? $document->Name : ""?>
                                </td>
                                <td><?php ?></td>
                                <td><?php echo $document->CreateUserID ? $document->CreateUserID : ""?></td>
                                <td><?php echo $document->CreateDate?></td>
                                <td><?php echo isset($document->LastModifyUserID) ? $document->LastModifyUserID : ""?></td>
                                <td><?php echo $document->LastModifyDate?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            <?php endif;?>


                            </tbody>
                        </table>
                        <?php if ((count($childFolders) == 0) && (count($childDocuments) == 0)) :?>
                        <div class="col-sm-12">
                            <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill badge-warning">Lưu ý</span> Thư mục này trống
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
