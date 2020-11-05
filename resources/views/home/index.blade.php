<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title> Form Instrumen UAS</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="keywords" content=" Photography Application form Widget a Flat Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href= "{{ URL::asset('css/home/style.css')}}" type="text/css" media="all" /><!-- Style-CSS -->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	@include('sweetalert::alert')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">		
	<div class="collapse navbar-collapse" id="app-navbar-collapse">
		<ul class="nav navbar-nav navbar-right">
	<!-- Authentication Links -->
		<li class="dropdown">
			<a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
				{{ Auth::user()->name }} <span class="caret"></span>
			</a>

			<ul class="dropdown-menu">
				<li>
					<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
						Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</li>
	</nav>
</ul>
</div>

	<section class="agile-voltsub">
		<!-- <div class="agile-voltheader">
			<h1>Photography Application form</h1>
		</div> -->

		<button class="button button1" onclick="window.location.href='pemantauan'" />
			Instrumen Observasi Pemantauan Ujian Di  Tempat / Lokasi Ujian
			<p>(Di isi oleh pemantau)</p>
		</button>
		<br>
		<br>
		<button class="button button2" onclick="window.location.href='PJTUPJLU'" />
			Laporan Petugas PJTU / PJLU / Pendamping Dari Universitas Terbuka Pusat
			<p>(Di isi oleh petugas PJTU / PJLU / pendamping)</p>
		</button>
		<br>
		<br>
		<button class="button button3" onclick="window.location.href='feedback'" />
			Feedback Pemantauan UAS Program Non Pendas dan PPS
			<p>(Di isi oleh Pemantau / PJTU / PJLU / Pendamping)</p>
		</button>
		<br>
		<br>
		<button class="button button4" onclick="window.location.href='mra'" />
			Instrumen Persiapan Pelaksanaan Ujian Di UPBJJ-UT
			<p>(Di isi oleh Manager Registrasi dan Asesment (MRA) di UPBJJ-UT)</p>
		</button>
		<br>
		<br>
		<button class="button button5" onclick="window.location.href='evaluasi'" />
			Lembar Evaluasi Pemantau / PJTU / Pendamping PJTU / PJLU Pelaksanaan UAS
			<p>(Di isi oleh kepala UPBJJ / Manager Registrasi dan Asesmen (MRA))</p>
		</button>
	</section>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
