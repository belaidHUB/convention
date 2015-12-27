<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Convention de stage</title>
        <link rel="shortcut icon" href="{{ url('images/club16.png')}}"  />


        {{--style CSS--}}
        <link href="{{ url('css/style.css')}}" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="homepage">
    <div class="container-fluid">
        <div style="padding-top: 20px">
            <img src="{{ url('images/uca.png')}}" class="center-block img-responsive" style="height: 100px" alt=""/>
            <h1 class="text-center text-resp" style="color: #A25118">Faculté des Sciences et Techniques Marrakech</h1>
        </div>

        @yield('content')

        <footer class="text-center " style="padding-top: 20px">
            <img src="{{ url('images/club.png')}}" class="center-block img-responsive"/>
            Copyright © 2015<a href="http://irisiclub.com/"> Irisi Club</a>
        <footer>
    </div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>