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
                          <h3 class="panel-title">Add New Post</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="{{route('posts.create')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                        <label><b>Title</b></label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{old('title')}}">
                                        @if($errors->has('title'))
                                        <span class="help-block">{{$errors->first('title')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><b>Content</b></label>
                                        <textarea class="form-control" id="content" name="content">{{old('content')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                    
                                    <div class="input-group">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('footer')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#content' ) )
    .catch( error => {
        console.error( error );
    } );
    $(document).ready(function(){
        $('#lfm').filemanager('image');
    });
    
</script>
@endsection
