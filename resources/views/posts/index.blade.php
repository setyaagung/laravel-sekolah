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
						    <h3 class="panel-title">Posts</h3>
                            <div class="right">
                                <a href="/post/addnew" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Post</a>
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
                                        <th>ID</th>
                                        <th>TITLE</th>
                                        <th>USER</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>
                                            <a href="{{route('site.single.post', $post->slug)}}" class="btn btn-info btn-sm" target="_blank">View</a>
                                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete">Delete</a>
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

@endsection

@section('footer')
    <script>
        $('.delete').click(function() {
           var siswa_id = $(this).attr('id');
           swal({
              title: "Yakin ?",
              text: "Ingin meenghapus data siswa ini dengan id "+siswa_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/siswa/"+siswa_id+"/delete";
                }
            });
        });
    </script>
@endsection
