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
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('css/home/style.css')}}" type="text/css" media="all" /><!-- Style-CSS -->
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/sidebar/style.css') }}" rel="stylesheet">
	<script src="sidebar.js"></script>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }} ">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
	<!-- JQVMap -->
	<link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
</head>

<body>
	@include('sweetalert::alert')
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

		<div class="container">
			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					<li class="">
						<a style="padding-right:850px" class="" data-toggle="" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
							<h5>Selamat Datang {{ Auth::user()->name }} </h5>
						</a>

					<li>
						<a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
							Logout
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>

					</li>
	</nav>
	</ul>
	</div>


	<!-- Start Sidebar -->

	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">

			<li class="nav-item dropdown d-sm-block d-md-none">
				<a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Menu
				</a>
				<!-- <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
					<a class="dropdown-item" href="#">Download Surat Tugas</a>
					<a class="dropdown-item" href="#">Download Berkas</a>
				</div> -->
			</li>

		</ul>
	</div>
	</nav>


	<div class="row" id="body-row">
		<div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
			<ul class="list-group">
				<li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
					<h1>MENU</h1>
				</li>
				<a href="/upbjj/surattugas" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<span class="fa fa-fw fa-envelope mr-3"></span>
						<span style="font-size : 15px;" class="menu-collapsed">Download Surat Tugas</span>
						<span class="submenu-icon ml-auto"></span>
					</div>
				</a>

				<a href="/upbjj/panduanuas" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<span class="fa fa-fw fa-envelope mr-3"></span>
						<span style="font-size : 15px;" class="menu-collapsed">Download Panduan Uas</span>
						<span class="submenu-icon ml-auto"></span>
					</div>
				</a>

				<a href="" data-toggle="modal" data-target="#download" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<span class="nav-icon fas fa-download mr-3"></span>
						<span style="font-size : 15px;" class="menu-collapsed">Download Berkas</span>
						<span class="submenu-icon ml-auto"></span>
					</div>
				</a>

				<a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<span class="fa fa-fw fa-copy mr-3"></span>
						<span style="font-size : 15px;" class="menu-collapsed">Laporan</span>
						<span class="submenu-icon ml-auto"></span>
					</div>
				</a>
				<div id='submenu1' class="collapse sidebar-submenu">
					<a href="{{route('upbjj.laporanuser')}}" class="list-group-item list-group-item-action bg-dark text-white">
						<span style="font-size : 13px;" class="menu-collapsed">Laporan Pemantauan per UPBJJ</span>
					</a>

					<a href="{{route('upbjj.laporanfeedback')}}" class="list-group-item list-group-item-action bg-dark text-white">
						<span style="font-size : 13px;" class="menu-collapsed">Laporan Feedback per UPBJJ</span>
					</a>

					<!-- <a href="/upbjj/chartpemantau" class="list-group-item list-group-item-action bg-dark text-white">
						<span style="font-size : 13px;" class="menu-collapsed">Halaman Chart Pemantauan</span>
					</a>

					<a href="/upbjj/chartfeedback" class="list-group-item list-group-item-action bg-dark text-white">
						<span style="font-size : 13px;" class="menu-collapsed">Halaman Chart Feedback</span>
					</a> -->
				</div>

				<!-- Modal1 -->
				<!-- <div class="modal fade" id="download1" tabindex="-1" role="dialog1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document1">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Download Surat Tugas PDF</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								@foreach($lampiran as $lampiran)
								<a href="/download/surattugas/{{ $lampiran->id }}" class="list-group-item list-group-item-action bg-dark text-white" style='float:left	;'>
									<span class="menu-collapsed">Surat Tugas {{$lampiran->lampiran}}</span>
								</a>
								@endforeach
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div> -->
				<!-- End Modals1 -->

				<!-- Modal2 -->
				<div class="modal fade" id="download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Download Panduan PDF</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								@foreach($panduan as $panduan)
								<h5>Download Panduan Pemantauan</h5>
								<a href="/download/panduan/{{ $panduan->id }}" class="btn btn-success">Download</a>
								@endforeach

								@foreach($manual as $manual)
								<h5>Download Panduan Manual Penggunaan Aplikasi</h5>
								<a href="/download/manual/{{ $manual->id }}" class="btn btn-success">Download</a>
								@endforeach
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>


			</ul>
		</div> <!-- End Sidebar -->


		<!-- MAIN -->
		<div class="col">

			<section class="agile-voltsub">
				<!-- <div class="agile-voltheader">
				<h1>Photography Application form</h1>
			</div> -->

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
				<input type="hidden" value="{{$upbjj->id_upbjj}}" />
				<!-- <a href="{{route('upbjjperwil.excel')}}" class="btn btn-success  mr-5"> Download Rekap Laporan </a> -->
			</section>

		</div>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- jQuery -->
	<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- overlayScrollbars -->
	<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
</body>

</html>