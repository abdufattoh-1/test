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
<div class="d-flex" style="height: 520px">
  <div class="col-3"></div>
  <div class="card card-primary cennter  m-2  col-8">
    <div class="card-header">
      <h3 class="card-title">Yangi rasim qoshish</h3>
    </div>
    <form action="{{route('tags.store')}}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name">
          @if($errors->has('name'))
          {{$errors->first('name')}}
          @endif
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Saqlash</button>
      </div>
    </form>
  </div>
</div>


@endsection