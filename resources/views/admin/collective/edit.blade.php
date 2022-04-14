@extends('admin.app')

@section('content')

@if ($errors->any())
<div class="row">
  <div class="col-3"></div>
  <div class="alert alert-danger col-8">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif
<div class="d-flex">
  <div class="col-3"></div>
  <div class="card card-primary cennter  m-3  col-8">
    <div class="card-header">
      <h3 class="card-title">Yangi rasim qoshish</h3>
    </div>
    <form action="{{route('collective.update', $collective->id)}}" method="POST" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name" value=" {{old('titles',$collective->name)}}">
          @if($errors->has('name'))
          {{$errors->first('name')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Titles</label>
          <input type="text" name="titles" class="form-control" placeholder="Titles" value=" {{old('titles',$collective->titles)}}">
          @if($errors->has('titles'))
          {{$errors->first('titles')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Rasim</label>
          <input type="file" name="imag" class="form-control">
          @if($errors->has('imag'))
          {{$errors->first('imag')}}
          @endif
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">About</label>
          <textarea class="form-control summernote" name="about" id="summernote" cols="30" rows="10">
                    {{ old('About',$collective->about)}}
                  </textarea>
          @if($errors->has('about'))
          {{$errors->first('about')}}
          @endif
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Saqlash</button>
      </div>
      </div>

    </form>
  </div>
</div>


@endsection