@extends('admin.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="d-flex">
  <div class="col-3"></div>
  <div class="card card-primary cennter  m-3  col-8">
    <div class="card-header">
      <h3 class="card-title">Yangi rasim qoshish</h3>
    </div>
    <form action="{{route('videos.store')}}" method="POST" enctype="multipart/form-data">
      {{-- @method('put') --}}
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name" {{ old('name')}}>
          @if($errors->has('name'))
          {{$errors->first('name')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Rasim</label>
          <input type="file" name="image" class="form-control">
          @if($errors->has('image'))
          {{$errors->first('image')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Video</label>
          <input type="file" name="video" class="form-control">
          @if($errors->has('video'))
          {{$errors->first('video')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tags</label>
          <select name="tag_id" class="form-control" id="">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
          </select>
          @if($errors->has('teg_id'))
          {{$errors->first('teg_id')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Info image</label>
          <textarea class="form-control summernote" name="info" id="summernote" cols="30" rows="10">
                    {{ old('info')}}
                  </textarea>
          @if($errors->has('info'))
          {{$errors->first('info')}}
          @endif
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Saqlash</button>
      </div>
    </form>
  </div>
</div>

{{-- <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
}); --}}
{{-- 
</script> --}}
@endsection