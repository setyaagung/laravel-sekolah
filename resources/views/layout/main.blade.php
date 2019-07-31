
<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('template/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('template/assets/vendor/toastr/toastr.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('template/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('template/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('template/assets/img/favicon.png')}}">
	<style type="text/css">
		.ck-editor__editable_inline {
		    min-height: 300px;
		}
	</style>

	@yield('header')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layout/includes/navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('layout/includes/sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		@yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('template/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('template/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('template/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('template/assets/scripts/klorofil-common.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="{{asset('frontend/js/ckeditor.js')}}"></script>
	<script>
		@if (Session::has('tambah'))
			toastr.success("{{Session::get('tambah')}}", "Sukses");
		@endif

		@if (Session::has('edit'))
			toastr.info("{{Session::get('edit')}}", "Perbarui");
		@endif

		@if (Session::has('hapus'))
			toastr.error("{{Session::get('hapus')}}", "Terhapus");
		@endif

		@if (Session::has('error'))
			toastr.error("{{Session::get('error')}}", "Sudah Ada");
		@endif
	</script>
	@yield('footer')
</body>

</html>
