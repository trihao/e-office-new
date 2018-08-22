@extends('page.master')
@section('body_content')
@parent
<div class="card slider slide-in">
    <div class="col-sm-12" id="message-error" style="display: none;">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span><span id="content-message"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    </div>
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
                    <div class="row mgb5">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tiêu đề</label>
                                <input type="text" name="title" class="input-md form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mgb5">
                        <div class="col-md-4">
                            <input type="file" name="image" class="form-control" style="height: 100px">
                        </div>
                        <div class="col-md-8">
                            <textarea type="text" id="remark" name="remark" class="form-control" style="height: 100px"></textarea>
                        </div>
                    </div>

                    <div class="row mgb5" style="margin-top: 10px">
                        <div class="col-md-2">
                            <label class="lbl-normal pdr0 ">Chuyên mục</label>
                        </div>
                        <div class="col-md-6">
                            <select name="channelID" id="channelID" class="form-control">
                                <option value="">--</option>
                                @foreach($channelIDList as  $channelIDItem)
                                <option value="{{$channelIDItem->CodeID}}">{{$channelIDItem->CodeName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="lbl-normal pdr0 ">Tác giả</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="author" name="author" class="input-md form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="row mgb5" style="margin-top: 10px">
                        <div class="col-md-2 ">
                            <div class="checkbox">
                                <label><input type="checkbox" id="status_id" name="status_id">Phát hành
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Ngày phát hành</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" id="releaseDate" name="releaseDate">
                                <option value="">--</option>
                                {{--@foreach($docTyeList as $docTyeListitem)--}}
                                {{--<option value="{{$docTyeListitem['ID']}}" {{$cbDocTypeW76F2121 == $docTyeListitem['ID'] ? 'selected':''}}>--}}
                                {{--{{$docTyeListitem['Name']}}--}}
                                {{--</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </div>
                        <div class="col-md-4">
                            hgghghh
                        </div>
                    </div>

                    <div class="row mgb5" style="margin-top: 10px">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><input type="checkbox" id="is_hotnews" name="is_hotnews">Tin nổi bật</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label><input type="checkbox" id="is_ShowBestNews" name="is_ShowBestNews">Đăng tại bản tin mới nhất</label>
                        </div>
                        <div class="col-md-2">
                            <label class=" pdr0 liketext  lbl-normal">Thứ tự hiển thị</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="orderNo" class="form-control" id="orderNo" placeholder="">
                        </div>
                    </div>

                    <div class="row mgb5" style="margin-top: 5px">
                        <div class="col-md-2">
                            <label>Từ khóa</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="keyword" class="form-control" id="keyword" placeholder="">
                        </div>
                    </div>

                    <div class="row mgb5" style="margin-top: 10px">
                        <div class="col-md-12">
                            <textarea type="text" id="news_content" name="content" class="input-md form-control" cols="10" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="row mgb5" style="margin-top: 10px">
                        <div class="col-md-2">
                            <label>Bài viết liên quan</label>
                        </div>
                        <div class="col-md-2">
                            <a class="saveBtn-right-toolbar" href="#" id="submitCreateNews">Thêm</a>
                        </div>
                    </div>

                    <input type="hidden" name="CreateUserID" value="<?php echo $CreateUserID?>">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" id="smForm" style="display: none"/>
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
                $("#smForm").click();
            });

            $('#createNews').on('submit', function (e) {
//                e.preventDefault();
//                if (true) {
//                    $('#message-error').css('display', 'block');
//                    $('#message-error').find('#content-message').html('Lỗi rồi');
//                }
            })
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