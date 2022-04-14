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
    <form action="{{route('videos.update', $video->id)}}" method="POST" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name',$video->name)}}">
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
          <textarea class="form-control summernote" name="info" id="summernote" cols="30" rows="10"
            value="{{ old('info', $video->info)}}">
                        {{ old('info' ,$video->info)}}
                      </textarea>
          @if($errors->has('info'))
          {{$errors->first('info')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <select class="form-control" name="status" id="">
            <option value="1">Faol</option>
            <option value="0" {{$video->status==0?"selected":""}}>Nofaol</option>
          </select>
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Saqlash</button>
      </div>
    </form>
  </div>
</div>


@endsection