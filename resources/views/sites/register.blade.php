@extends('layout/frontend')

@section('content')
<section class="banner-area relative about-banner" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Pendaftaran		
				</h1>	
				<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Pendaftaran</a></p>
			</div>	
		</div>
	</div>
</section>
<section class="search-course-area relative" style="background: unset;">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-5 col-md-6 search-course-left">
				<h1 class="text-black">
					Pendaftaran Online <br>
					bergabung bersama kami
				</h1>
				<p>
					Dengan kurikulum yang update dengan kebutuhan pasar, kami menjamin lulusan akan mudah terserap di dunia kerja.
				</p>
			</div>
			<div class="col-lg-5 col-md-6 search-course-right section-gap">
				{{ Form::open(['url' => '/postregister', 'class' => 'form-wrap']) }}
					<h4 class="text-black pb-20 text-center mb-30">Formulir Pendaftaran</h4>
					{{ Form::text('nama','',['class' => 'form-control', 'placeholder' => 'Nama Lengkap'])}}
					<div class="form-select" id="service-select">
						{{ Form::select('jenis_kelamin', ['' => '-- Pilih Jenis Kelamin --','Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'])}}	
					</div>
					{{ Form::email('email','',['class' => 'form-control', 'placeholder' => 'example@gmail.com'])}}
					{{ Form::password('password',['class' => 'form-control', 'placeholder' => '********'])}}
					<div class="form-select" id="service-select">
						{{ Form::select('agama', ['' => '-- Pilih Agama --','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Katholik' => 'Katholik', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu', 'Lainnya' => 'Lainnya'])}}	
					</div>		
					{{ Form::textarea('alamat','',['class' => 'form-control','rows' => 4, 'placeholder' => 'Alamat'])}}						
					<input type="submit" class="primary-btn text-uppercase" value="Kirim" style="text-align: center;">
				{{ Form::close() }}
			</div>
		</div>
	</div>	
</section>
@endsection