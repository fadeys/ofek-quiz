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
		{!! HTML::style('css/gsdk-base.css') !!}
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
	@show

</head>

<body>
<div class="image-container set-full-height" style="background-image: url('{{ URL::asset('images/wizard-boat.jpg') }}')">
	<a href="#">
		<div class="logo-container">
			<div class="logo">
				<img src="{{ URL::asset('images/new_logo.png') }}">
			</div>
			<div class="brand">אופק מתא״ם - שאלון</div>
		</div>
	</a>

    @yield('content')
</div>

</body>

@section('js')
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    {!! HTML::script('js/bootstrap.min.js') !!}
    {!! HTML::script('js/jquery.bootstrap.wizard.js') !!}
    {!! HTML::script('js/wizard.js') !!}
@show()

</html>