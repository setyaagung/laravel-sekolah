@extends('layout/main')

@section('title', 'Data Siswa')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data Siswa</h3>
                            <div class="right">
                                <a href="/siswa/export" class="btn btn-success btn-sm">Export</a>
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
                                        <th>NAMA</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>RATA2 NILAI</th>
                                        <th>
                                            <button type="button" class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#TambahSiswa">
                                            <i class="lnr lnr-plus-circle"></i> Tambah Siswa
                                            </button>
                                        </th>
									</tr>
								</thead>
								<tbody>
                                @foreach($data_siswa as $siswa)
                                    <tr>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama}}</a></td>
                                        <td>{{$siswa->jenis_kelamin}}</td>
                                        <td>{{$siswa->agama}}</td>
                                        <td>{{$siswa->alamat}}</td>
                                        <td>{{$siswa->rataRataNilai()}}</td>
                                        <td>
                                            <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="TambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Tambah Data Siswa</h5>
            </div>
            <div class="modal-body">
                <form action="/siswa/create" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                        <label><b>Nama Lengkap</b></label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{old('nama')}}">
                        @if($errors->has('nama'))
                            <span class="help-block">{{$errors->first('nama')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label><b>Email</b></label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                        @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                        <label><b>Gender</b></label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="Laki-Laki" {{(old('jenis_kelamin') == 'Laki-Laki') ? 'selected' : ''}}>Laki - Laki</option>
                            <option value="Perempuan" {{(old('jenis_kelamin') == 'Perempuan') ? 'selected' : ''}}>Perempuan</option>
                        </select>
                        @if($errors->has('jenis_kelamin'))
                            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
                        <label><b>Agama</b></label>
                        <select class="form-control" name="agama">
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam" {{(old('agama') == 'Islam') ? 'selected' : ''}}>Islam</option>
                            <option value="Kristen" {{(old('agama') == 'Kristen') ? 'selected' : ''}}>Kristen</option>
                            <option value="Katholik" {{(old('agama') == 'Katholik') ? 'selected' : ''}}>Katholik</option>
                            <option value="Hindu" {{(old('agama') == 'Hindu') ? 'selected' : ''}}>Hindu</option>
                            <option value="Budha" {{(old('agama') == 'Budha') ? 'selected' : ''}}>Budha</option>
                            <option value="Konghucu" {{(old('agama') == 'Konghucu') ? 'selected' : ''}}>Konghucu</option>
                            <option value="Lainnya" {{(old('agama') == 'Lainnya') ? 'selected' : ''}}>Lainnya</option>
                        </select>
                        @if($errors->has('agama'))
                            <span class="help-block">{{$errors->first('agama')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><b>Alamat</b></label>
                        <textarea class="form-control" name="alamat" rows="3">{{old('alamat')}}</textarea>
                    </div>
                    <div class="form-group {{$errors->has('gambar') ? 'has-error' : ''}}">
                        <label><b>Gambar</b></label>
                        <input type="file" name="gambar" class="form-control">
                        @if($errors->has('gambar'))
                            <span class="help-block">{{$errors->first('gambar')}}</span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            </div>
        </div>
    </div>
@endsection
