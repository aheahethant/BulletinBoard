@extends('layouts.app')
@section('content')

<div class="container-fluid mt-4">
    <div class="container">
        <p class="font-weight-bold">Post List</p>
    </div>
    <div class="container">
        <div class="row mt-3 float-right">
            <form>
                <div class="form-row d-flex justify-content-between">
                    <label class="mt-2">Keyword : </label>
                    <input type="text" class="col-sm-2">
                    <button type="submit" class="btn btn-primary col-sm-2 mt-1">Search</button>
                    <a class="btn btn-primary col-sm-2 mt-1" href="{{ route('create_post') }}" role="button">Create</a>
                    <a class="btn btn-primary col-sm-2 mt-1" href="#" role="button">Upload</a>
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
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-toggle="modal" data-target="#exampleModal" style="color:red;">Post3</td>
                        <td>Hello World!</td>
                        <td>admin</td>
                        <td>2020/11/04</td>
                        <td>
                            <a href="{{route('update_post')}}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td data-toggle="modal" data-target="#exampleModal" style="color:red;">Post3</td>
                        <td>Hello World!</td>
                        <td>admin</td>
                        <td>2020/11/04</td>
                        <td>
                            <a href="{{route('update_post')}}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td data-toggle="modal" data-target="#exampleModal" style="color:red;">Post3</td>
                        <td>Hello World!</td>
                        <td>admin</td>
                        <td>2020/11/04</td>
                        <td>
                            <a href="{{route('update_post')}}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td data-toggle="modal" data-target="#exampleModal" style="color:red;">Post3</td>
                        <td>Hello World!</td>
                        <td>admin</td>
                        <td>2020/11/04</td>
                        <td>
                            <a href="{{route('update_post')}}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
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
@endsection