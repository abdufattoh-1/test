@extends('admin.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-18">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><a href="{{route('images.create')}}" class="btn btn-sm btn-primary">Add image</a></h3>
      
                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
      
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($images as $imag)
                            <tr>
                              <td>
                                {{$imag->id }}
                              </td>
                              <td>
                                {{$imag->name }}
                              </td>
                              <td>
                                <img src="{{asset($imag->image)}}" style="width: 100px;">
                              </td>
                              <td>
                                {{$imag->tags }}
                              </td>
                              <td class="row">
                                  <a href="{{route('images.edit', $imag->id)}}" class="btn btn-sm btn-primary">Tahrirlash</a>
                                  <a href="{{route('images.show', $imag->id)}}" class="btn btn-sm btn-success">Ko'rish</a>
                                  {{-- <form action="{{route('images.show', $imag->id)}}" method="post">
                                      @csrf
                                      <input class="btn btn-sm btn-success" value="Ko'rish" type="submit" name="submit">
                                  </form> --}}
                                  <form action="{{route('images.destroy', $imag->id)}}" method="post">
                                      @method('delete')
                                      @csrf
                                      <input type="submit" class="btn btn-sm btn-danger" value="O'chirish" name="submit">
                                  </form>
                              </td>
                            </tr>
                            
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            {{-- <div class="col-lg-6">
            
            </div>
            <div class="col-lg-6">
              
            </div> --}}
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @endsection