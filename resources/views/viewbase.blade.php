<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
{{--    <script src="{{ asset('js/jquery.js') }}" type="text/js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
<div class="container">
    @yield('main')
</div>
</body>
</html>
