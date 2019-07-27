@extends('layout/main')

@section('title', 'Edit Data Siswa')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Data Siswa</h3>
						</div>
						<div class="panel-body">
                            <form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label><b>Nama Lengkap</b></label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{$siswa->nama}}">
                                </div>
                                <div class="form-group">
                                    <label><b>Gender</b></label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="">-- Jenis Kelamin --</option>
                                        <option value="Laki-Laki" @if($siswa->jenis_kelamin == "Laki-Laki")selected @endif>Laki - Laki</option>
                                        <option value="Perempuan" @if($siswa->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><b>Agama</b></label>
                                    <select class="form-control" name="agama">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="Islam" @if($siswa->agama == "Islam") selected @endif>Islam</option>
                                        <option value="Kristen" @if($siswa->agama == "Kristen") selected @endif>Kristen</option>
                                        <option value="Katholik" @if($siswa->agama == "Katholik") selected @endif>Katholik</option>
                                        <option value="Hindu" @if($siswa->agama == "Hindu") selected @endif>Hindu</option>
                                        <option value="Budha" @if($siswa->agama == "Budha") selected @endif>Budha</option>
                                        <option value="Konghucu" @if($siswa->agama == "Konghucu") selected @endif>Konghucu</option>
                                        <option value="Lainnya" @if($siswa->agama == "Lainnya") selected @endif>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><b>Alamat</b></label>
                                    <textarea type="text" class="form-control" rows="4" name="alamat">{{$siswa->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label><b>Gambar</b></label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                                <div style="float: right;">
                                    <button type="button" class="btn btn-secondary" onclick="javascript:history.back()">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>	
						</div>
					</div>
					<!-- END INPUTS -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection