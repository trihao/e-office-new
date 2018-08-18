@extends('page.master')
@section('body_content')
    @parent
    <div class="module-bi">
        <div class="row">
            <div class="folder-sidebar col-sm-3">
                @section("folderTree")
                    @include("system.module.bi.folderTree", ["folderTree" => $folderTree])
                @show
            </div>
            <div class="folder-content col-sm-9">
                @section("folderView")
                @show
            </div>
        </div>
    </div>
@section("deletePopup")
    @include("system.module.bi.deletePopup")
@show
@stop