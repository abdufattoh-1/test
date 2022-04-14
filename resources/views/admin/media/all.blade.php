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
                <h3 class="card-title"><a href="{{route('adres.create')}}" class="btn btn-sm btn-primary">Add adres</a>
                </h3>
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
                  @foreach($medies as $media)
                  <tr>
                    <td>
                      ID
                    </td>
                    <td>
                      {{$ads->id }}
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Icon
                    </td>
                    <td>
                      {{$media->icon }}
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Adres
                    </td>
                    <td>
                      {{$media->adres }}
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                    <td>
                      Edit
                    </td>
                    <td>
                      <h3 class="card-title"></h3><a href="{{route('adres.edit', $ads->id)}}"
                        class="btn btn-sm btn-primary">Tahrirlash</a></h3>
                    </td>
                  </tr>
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