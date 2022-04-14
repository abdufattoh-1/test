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
                      <h3 class="card-title"><a href="{{route('tags.create')}}" class="btn btn-sm btn-primary">Add tag</a></h3>
      
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
                                <th>Slag</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>
                                        {{$tag->id }}
                                    </td>
                                    <td>
                                        {{$tag->name }}
                                    </td>
                                    <td>
                                        {{$tag->slug }}
                                    </td>
                                    <td>
                                        @if($tag->status ==1)
                                            <span class="badge badge_sm badge-success">Faol</span>
                                        @else
                                            <span class="badge badge_sm badge-danger">Nofaol</span>
                                        @endif
                                    </td>
                                    <td class="row">
                                        <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-sm btn-primary">Tahrirlash</a>
                                        <form action="{{route('tags.destroy', $tag->id)}}" method="post">
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
