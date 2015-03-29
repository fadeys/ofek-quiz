<!DOCTYPE html>
<html lang="he">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>שאלון אופק מתא״ם</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	@section('css')
		{!! HTML::style('css/app.css') !!}
		{!! HTML::style('css/jquery.steps.css') !!}
        <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/cdnjs/3.3.1/css/bootstrap-rtl.min.css">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
	@show
    @section('js')
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        {!! HTML::script('js/bootstrap.min.js') !!}
        {!! HTML::script('js/jquery.steps.min.js') !!}
    @show()


</head>

<body>
	<div class="container">
        <h1>שאלון אופק מתא״ם</h1>
        <div class="well">
            @yield('content')
        </div>
    </div>

</body>


</html>