<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]>
<html class="no-js" lang=""> <!--<![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>HỆ THỐNG VĂN PHÒNG ĐIỆN TỬ</title>
<meta name="description" content="HỆ THỐNG VĂN PHÒNG ĐIỆN TỬ">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="{{ asset('css/custom.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('bootstrap/css/bootstrap.css') }}" media="all" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('bootstrap/js/bootstrap.js') !!}"></script>

<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/dashboard/plugins.js') }}"></script>
<script src="{{ asset('js/dashboard/main.js') }}"></script>

<link rel="stylesheet" href="{{ asset('css/dashboard/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/cs-skin-elastic.css') }}">
<link rel="stylesheet" href="{{ asset('scss/dashboard/style.css') }}">
<link href="{{ asset('css/dashboard/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
{{--<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css">--}}

<!-- JS Tree -->
<link rel="stylesheet" href="{{ asset('jstree/dist/themes/default/style.min.css') }}" />
<script src="{{ asset('jstree/dist/jstree.js') }}"></script>

<!-- JS Context -->
<link rel="stylesheet" href="{{ asset('contextjs/context.standalone.css') }}" />
<script src="{{ asset('contextjs/context.js') }}"></script>

<!-- TinyMCE -->
<script src="{{ asset('tinymce/tinymce.js') }}"></script>

<!-- CKeditor -->
<script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>

<script src="{{ asset('js/module/bi/folder-manage.js') }}"></script>
<script type="text/javascript" src="{!! asset('js/custom.js') !!}"></script>
<script>
    jQuery(document).ready(function () {
        context.init({
            fadeSpeed: 100,
            filter: function ($obj) {},
            above: 'auto',
            preventDoubleContext: true,
            compress: false,
        });
        var subMenus = [
            {
                text: "Click me",
                href: "/",
                target: "_blank"
            },
        ]
        // context.attach(".folder-sidebar",subMenus);
    });
</script>