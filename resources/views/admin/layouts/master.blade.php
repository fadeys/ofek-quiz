<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ניהול בחן את עצמך - אופק מתאם</title>

    {!! HTML::style('css/app.css') !!}
    <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/cdnjs/3.3.1/css/bootstrap-rtl.min.css">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    @section('js')
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
        {!! HTML::script('vendor/ckeditor/ckeditor.js') !!}
    @show

</head>
<body>
    @include('admin.partials.nav')
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
