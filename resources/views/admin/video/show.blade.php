@extends('admin.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-8">
                <div class="card p-2">
                    <div class="card-body text-right">
                        <h5 class="card-title ">Barcha maqolalar</h5>
                        <a href="/admin/article/create" class="btn btn-sm btn-primary ">Maqola qoshish</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    {{-- <tr>
                                        <th>ID</th>
                                        <th>Title_uz</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Haraktlar</th>
                                    </tr> --}}
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                ID
                                            </td>
                                            <td>
                                                {{$image->id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Name
                                            </td>
                                            <td>
                                                {{$image->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Info
                                            </td>
                                            <td>
                                                {{$image->info }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Status
                                            </td>
                                            <td>
                                                {{$image->status > 0 ? "Active" : "no active";}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tag_id
                                            </td>
                                            <td>
                                                {{$image->tag_id}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Image
                                            </td>
                                            <td>
                                                <img src="{{asset($image->image)}}" style="width: 200px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Video
                                            </td>
                                            <td>
                                                <video src="{{asset($image->video)}}" controls style="width: 200px;">lwekomiflwwkme;fmwep</video>
                                            </td>
                                        </tr>
                                    
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