@extends('layouts.app')
@section('content')

<!-- link -->
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

<!-- script -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/user.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>

<div class="container-fluid mt-4">
    <div class="container">
        <p class="font-weight-bold">User List</p>
    </div>
    <div class="container">
        <div class="row mt-3 float-right">
            <div class="form-row d-flex justify-content-between">
                <label for="name" class="pt-2">Name : </label>
                <input type="text" id="name" class="col-sm-2">
                <label for="email" class="pt-2">Email : </label>
                <input type="email" id="email" class="col-sm-2">
                <label for="from_date" class="pt-2">From : </label>
                <input type="date" id="from_date" class="col-sm-2">
                <label for="to_date" class="pt-2">To : </label>
                <input type="date" id="to_date" class="col-sm-2">
                <button class="btn btn-primary" id="btnSearch">Search</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container row clearfix">
                            <div class="float-left col-sm-4">
                                <img src="{{asset('storage_image/car.jpg')}}" alt="" width="100%">
                            </div>
                            <div class="float-right col-sm-8">
                                <div class="row">
                                    <label class="col-sm-5">Name</label>
                                    <p class="col-sm-6">Admin</p>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Type</label>
                                    <p class="col-sm-6">Admin</p>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Email</label>
                                    <p class="col-sm-6">admin@gmail.com</p>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Phone</label>
                                    <p class="col-sm-6">09844554555</p>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Date of Birth</label>
                                    <p class="col-sm-6">1998/12/27</p>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Address</label>
                                    <p class="col-sm-6">Mandalay</p>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="user_list" class="table mt-3 col-12">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created User</th>
                        <th scope="col">Type</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Address</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Updated Date</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td data-toggle="modal" data-target="#exampleModal" style="color:red;">{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->user->name}}</td>
                        <td>{{$row->type}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->dob}}</td>
                        <td>{{$row->address}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{$row->updated_at}}</td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for User Delete -->
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
                <h3 style="color:red;">Are you sure to delete user?</h3>
                <div class="row pt-4">
                    <label class="col-sm-4">ID</label>
                    <span class="col-sm-7" style="color:red;"><i>2</i></span>
                </div>
                <div class="row pt-4">
                    <label class="col-sm-4">Name</label>
                    <span class="col-sm-7" style="color:red;"><i>Test User</i></span>
                </div>
                <div class="row pt-4">
                    <label class="col-sm-4">Type</label>
                    <span class="col-sm-7" style="color:red;"><i>User</i></span>
                </div>
                <div class="row pt-4">
                    <label class="col-sm-4">Email</label>
                    <span class="col-sm-7" style="color:red;"><i>user1@gmail.com</i></span>
                </div>
                <div class="row pt-4">
                    <label class="col-sm-4">Phone</label>
                    <span class="col-sm-7" style="color:red;"><i>0999999</i></span>
                </div>
                <div class="row pt-4">
                    <label class="col-sm-4"></label>
                    <span class="col-sm-7" style="color:red;"><i>2020-09-13</i></span>
                </div>
                <div class="row pt-4">
                    <label class="col-sm-4">Address</label>
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