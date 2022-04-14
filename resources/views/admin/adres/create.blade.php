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
      <h3 class="card-title">Yangi adres qoshish</h3>
    </div>
    <form action="{{route('adres.store')}}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Telefon</label>
          <input type="text" name="telefon" class="form-control" placeholder="Telefon" {{ old('telefon')}}>
          @if($errors->has('telefon'))
          {{$errors->first('telefon')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="text" name="email" class="form-control" placeholder="Email" {{ old('telefon')}}>
          @if($errors->has('email'))
          {{$errors->first('email')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Url:adres</label>
          <input type="text" name="url" class="form-control" placeholder="www.compani.com" {{ old('url')}}>
          @if($errors->has('url'))
          {{$errors->first('url')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Adres</label>
          <textarea class="form-control summernote" name="adres" id="summernote" cols="30" rows="10">
            {{ old('adres')}}
          </textarea>
          @if($errors->has('adres'))
          {{$errors->first('adres')}}
          @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Info</label>
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

@endsection