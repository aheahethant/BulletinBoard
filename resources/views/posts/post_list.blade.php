@extends('layouts.app')
@section('content')

<div class="container-fluid mt-4">
    <div class="container">
        <p class="font-weight-bold">Post List</p>
    </div>
    <div class="container">
        <div class="mt-3">
            <form class="float-right col-sm-10 ">
                <div class="form-row d-flex justify-content-between">
                    <label class="mt-2">Keyword : </label>
                    <input type="text" class="col-sm-2 mt-1">
                    <button type="submit" class="btn btn-primary col-sm-2 mt-1">Search</button>
                    @if (Auth::check())
                    <a class="btn btn-primary col-sm-2 mt-1" href="{{ route('create_post') }}" role="button">Create</a>
                    <a class="btn btn-primary col-sm-2 mt-1" href="{{ route('upload_post') }}" role="button">Upload</a>
                    @endif
                    <a class="btn btn-primary col-sm-2 mt-1" href="#" role="button">Download</a>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table id="datatable" class="table mt-3 col-12">
                <thead>
                    <tr>
                        <th scope="col">Post Title</th>
                        <th scope="col">Post Description</th>
                        <th scope="col">Posted User</th>
                        <th scope="col">Posted Date</th>
                        @if( Auth::check() )
                        <th scope="col">Operation</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $row)
                    <tr>
                        <td data-toggle="modal" data-target="#exampleModal" style="color:red;">{{$row->title}}</td>
                        <td>{{$row->description}}</td>
                        <td>{{$row->getUserName()}}</td>
                        <td>{{$row->created_at}}</td>
                        @if( Auth::check() )
                        <td>
                            <a href="{{route('update_post')}}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Delete</button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Post Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <label class="col-sm-5">Title</label>
                        <p class="col-sm-6">Admin</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Description</label>
                        <p class="col-sm-6">Post Description</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Status</label>
                        <p class="col-sm-6">Active</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Created Date</label>
                        <p class="col-sm-6">2020/11/05</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Created User</label>
                        <p class="col-sm-6">Admin</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Updated Date</label>
                        <p class="col-sm-6">2020/11/05</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Updated User</label>
                        <p class="col-sm-6">Admin</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Post Delete -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Are you sure to delete post?</h3>
                <div class="row pt-4">
                    <label class="col-sm-4">ID</label>
                    <span class="col-sm-7" style="color:red;"><i>2</i></span>
                </div>
                <div class="row pt-4">
                    <label class="col-sm-4">Title</label>
                    <span class="col-sm-7" style="color:red;"><i>Post 2</i></span>
                </div>
                <div class="row pt-4">
                    <label class="col-sm-4">Description</label>
                    <span class="col-sm-7" style="color:red;"><i>Post Description</i></span>
                </div>
                <div class="row pt-4">
                    <label class="col-sm-4">Status</label>
                    <span class="col-sm-7" style="color:red;"><i>Active</i></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection