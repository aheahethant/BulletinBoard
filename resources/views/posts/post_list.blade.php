@extends('layouts.app')
@section('content')

<!-- link -->
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

<!-- script -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/post.js') }}"></script>

<div class="container-fluid mt-4">
    <div class="container">
        <p class="font-weight-bold">Post List</p>
    </div>
    <div class="container">
        <div class="mt-3 float-right col-sm-10">
            <div class="form-row d-flex justify-content-between">
                <label class="mt-2">Keyword : </label>
                <input type="text" class="col-sm-2 mt-1" id="post_search">
                <button class="btn btn-primary col-sm-2 mt-1" id="btnSearch">Search</button>
                @if (Auth::check())
                <a class="btn btn-primary col-sm-2 mt-1" href="{{ route('create_post') }}" role="button">Create</a>
                <a class="btn btn-primary col-sm-2 mt-1" href="{{ route('upload_post') }}" role="button">Upload</a>
                @endif
                <a class="btn btn-primary col-sm-2 mt-1" href="#" role="button">Download</a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="post_list" class="table mt-3 col-12">
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
                        <td data-toggle="modal" data-id="{{$row->id}}" data-title="{{$row->title}}"
                            data-description="{{$row->description}}" data-status="{{$row->status}}"
                            data-created_at="{{$row->created_at}}" data-create_user_id="{{$row->create_user_id}}" data-updated_at="{{$row->updated_at}}"
                            data-updated_user_id="{{$row->updated_user_id}}" data-target="#post_details" style="color:red;">
                            {{$row->title}}</td>
                        <td>{{$row->description}}</td>
                        <td>{{$row->user->name}}</td>
                        <td>{{$row->created_at}}</td>
                        @if( Auth::check() )
                        <td>
                            <a href="{{route('edit_post', $row->id)}}" class="btn btn-primary">Edit</a>
                            <button type="button" data-id="{{$row->id}}" data-title="{{$row->title}}"
                                data-description="{{$row->description}}" data-status="{{$row->status}}"
                                class="btn btn-danger" data-toggle="modal" data-target="#postInfo">Delete</button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal for post detail-->
<div class="modal fade" id="post_details">
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
                    <input type="hidden" id="post_id" name=id>
                    <div class="row">
                        <label class="col-sm-5">Title</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_title">
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Description</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_description">
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Status</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_status">
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Created Date</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_created_date">
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Created User</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_created_user">
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Updated Date</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_updated_date">
                    </div>
                    <div class="row">
                        <label class="col-sm-5">Updated User</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_updated_user">
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
<div class="modal fade" id="postInfo" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h3>Are you sure to delete post?</h3>
            <form action="{{route('delete_post')}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="container">
                    <div class="row">
                        <label class="col-sm-4">ID</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_id" name=id>
                    </div>
                    <div class="row">
                        <label class="col-sm-4">Title</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_title" name=title>
                    </div>
                    <div class="row">
                        <label class="col-sm-4">Description</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_description"
                            name=description>
                    </div>
                    <div class="row">
                        <label class="col-sm-4">Status</label>
                        <input type="text" style="color:red; border:none; outline:none;" class="col-sm-7" id="post_status"
                            name=status>
                    </div>
                </div>
                <div class="modal-body" id="postDetails">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection