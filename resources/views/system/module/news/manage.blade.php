@extends('page.master')
@section('body_content')
    @parent
    <?php
    $lastNewsModified = "";
        if (session("lastNewsModified")) {
            $lastNewsModified = session("lastNewsModified");
            session()->remove("lastNewsModified");
        }

    ?>
    <div class="module-news card">
        <div class="card-header">
            <div class="left-table-header">
                <a id="news-createNews" class="toolbar-btn action-on-header" href="/news/create">
                    <i class="fa fa-plus-circle"></i> Thêm bài viết</a>
            </div>
            <div class="container filterBox">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="searchRelativeTitle">Tiêu đề</label>
                        <input type="search"
                               id="searchRelativeTitle"
                               class="form-control form-control-sm search-form search-toolbar search-auto-complete"
                               placeholder="Nhập tiêu đề bài viết để tìm kiếm"
                               aria-controls="bootstrap-data-table">
                        <div class="search-toolbar search-suggestion-list">
                            <ul>
                            </ul>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#searchRelativeTitle').keyup(function() {
                                var searchTitle = $(this).val();
                                var suggestionList = $(".search-suggestion-list ul");
                                suggestionList.find("li").remove();
                                if (!searchTitle == "") {
                                    var url = '/news/search/title?searchTitle=' + searchTitle;
                                    setTimeout(function () {
                                        $.ajax({
                                            url: url,
                                            type: "get",
                                            dataType: "text",
                                            success: function (result) {
                                                suggestionList.find("li").remove();
                                                var resultData = $.parseJSON(result);
                                                for (var i = 0; i < resultData.length ; i++) {
                                                    suggestionList.append("<li><a href='/news/manage/filter?searchTitle=" + resultData[i].Title + "'>" + resultData[i].Title + " - Người tạo:" + resultData[i].CreateUserID + " - Tác giả: " + resultData[i].Author + "</a></li>");
                                                }
                                            }
                                        });
                                    }, 300);
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="bootstrap-data-table"
                               class="table table-striped table-bordered dataTable no-footer table-hover news-table" role="grid"
                               aria-describedby="bootstrap-data-table_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                    style="width: 5%">Hình ảnh
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 20%;">Tiêu đề
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Mô tả
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Tin mới
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Phát hành
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Ngày đăng
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Tác giả
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Người tạo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Ngày tạo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Người sửa cuối
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Ngày sửa cuối
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 5%;">Thao tác
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($newsCollection as $news): ?>
                            <tr role="row" class="odd type-news <?php echo $news->NewsID == $lastNewsModified ? "lastNewsModified": ""?>" news_id="<?php  echo $news->NewsID?>">
                                <td><img src="<?php echo "/storage/users-upload/news/".$news->ImageTitle?>" alt=""></td>
                                <td><?php echo $news->Title?></td>
                                <td><?php echo $news->Describe?></td>
                                <td><?php echo $news->IsHotNews ? "Tin nóng" : "Tin thường"?></td>
                                <td><?php echo $news->StatusID ? "Đã phát hành" : "Chưa phát hành"?></td>
                                <td><?php echo $news->ReleaseDate?></td>
                                <td><?php echo $news->Author?></td>
                                <td><?php echo $news->CreateUserID ? $news->CreateUserID : ""?></td>
                                <td><?php echo $news->CreateDate?></td>
                                <td><?php echo isset($news->LastModifyUserID) ? $news->LastModifyUserID : ""?></td>
                                <td><?php echo $news->LastModifyDate?></td>
                                <td>
                                    <a id="news-edit" class="toolbar-btn action-on-header" href="#">
                                        <i class="fa fa-pencil-square-o"></i> Sửa</a>
                                    <a id="news-delete" class="toolbar-btn action-on-header" href="#">
                                        <i class="fa fa-times-circle"></i> Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop