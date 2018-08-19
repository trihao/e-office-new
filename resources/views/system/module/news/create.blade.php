@extends('page.master')
@section('body_content')
    @parent
    <div class="card">
        <div class="card-header">
            <div class="left-table-header">
                <a class="saveBtn-right-toolbar" href="#" id="submitCreateNews">Lưu</a>
                <a class="cancelBtn-right-toolbar" href="#" onclick="history.back();">Quay lại</a>
            </div>
        </div>
        <div class="card-body">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <form id="createNews" method="POST" action="/news/create/save" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Tiêu đề</label>
                                <input type="text" name="title" class="input-md form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea type="text" name="description" class="input-md form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" name="status_id">
                                <label for="">Phát hành</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" name="is_hotnews">
                                <label for="">Tin nóng</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Nội dung</label>
                                <textarea type="text" id="news_content" name="content" class="input-md form-control"
                                          cols="10" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tên tác giả</label>
                                <input type="text" name="author" class="input-md form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Từ khóa</label>
                                <input type="text" name="keyword" class="input-md form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Hình đại diện</label>
                                <input type="file" name="image" class="input-md form-control">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="CreateUserID" value="<?php echo $CreateUserID?>">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: '#news_content',
            });
            $("#submitCreateNews").click(function () {
                $("#createNews").submit();
            });
        })
        // ClassicEditor
        //     .create( document.querySelector( '#documentContent' ) )
        //     .then( editor => {
        //         console.log( editor );
        //     } )
        //     .catch( error => {
        //         console.error( error );
        //     } );

    </script>
@stop