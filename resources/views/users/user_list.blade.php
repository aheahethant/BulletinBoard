@extends('layouts.app')
@section('content')

<!-- link -->
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

<!-- script -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
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

        <!-- Modal for User Detail-->
        <div class="modal fade" id="user_details" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <img id="user_image" alt="" width="100%" height="35%">
                            </div>
                            <div class="float-right col-sm-8">
                                <div class="row">
                                    <label class="col-sm-5">Name</label>
                                    <input type="text" class="col-sm-7 text" id="user_name" readonly>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Type</label>
                                    <input type="text" class="col-sm-7 text" id="user_type" readonly>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Email</label>
                                    <input type="text" class="col-sm-7 text" id="user_email" readonly>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Phone</label>
                                    <input type="text" class="col-sm-7 text" id="user_phone" readonly>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Date of Birth</label>
                                    <input type="text" class="col-sm-7 text" id="user_dob" readonly>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Address</label>
                                    <input type="text" class="col-sm-7 text" id="user_address" readonly>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Created Date</label>
                                    <input type="text" class="col-sm-7 text" id="user_created_date" readonly>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Created User</label>
                                    <input type="text" class="col-sm-7 text" id="created_user" readonly>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Updated Date</label>
                                    <input type="text" class="col-sm-7 text" id="user_updated_date" readonly>
                                </div>
                                <div class="row">
                                    <label class="col-sm-5">Updated User</label>
                                    <input type="text" class="col-sm-7 text" id="updated_user" readonly>
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
                        @if(Auth::user()->type == 0)
                        <th scope="col">Operation</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td data-toggle="modal" data-id="{{ $row->id }}" data-name="{{ $row->name }}"
                            data-email="{{ $row->email }}" data-type="{{ $row->type }}"
                            data-profile="{{ asset($row->profile) }}" data-phone="{{ $row->phone }}"
                            data-dob="{{ $row->dob }}" data-address="{{ $row->address }}"
                            data-created_at="{{ ($row->created_at)->format('yy-m-d') }}" data-create_user_id="{{ $row->user->name }}"
                            data-updated_at="{{ ($row->updated_at)->format('yy-m-d') }}" data-updated_user_id="{{ $row->user->name }}"
                            data-target="#user_details" class="red cursor">
                            {{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->user->name }}</td>
                        @if($row->type == 0)
                        <td>Admin</td>
                        @else
                        <td>User</td>
                        @endif
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->dob }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ ($row->created_at)->format('yy-m-d') }}</td>
                        <td>{{ ($row->updated_at)->format('yy-m-d') }}</td>
                        @if(Auth::user()->type == 0)
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('edit_user', $row->id) }}" class="btn btn-primary margin">Edit</a>
                                <button type="button" data-id="{{ $row->id }}" data-name="{{ $row->name }}"
                                    data-email="{{ $row->email }}" data-type="{{ $row->type }}" data-phone="{{ $row->phone }}"
                                    data-dob="{{ $row->dob }}" data-address="{{ $row->address }}"
                                    class="btn btn-danger userInfo" data-toggle="modal"
                                    data-target="#userInfo">Delete</button>
                            </div>
                        </td>
                        @endif
                    </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal for User Delete -->
<div class="modal fade" id="userInfo" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h3 class="red">Are you sure to delete user?</h3>
            <form action="{{ route('delete_user') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="container">
                    <div class="row">
                        <label class="col-sm-4">ID</label>
                        <input type="text" class="col-sm-7 text" id="user_id" name=id readonly>
                    </div>
                    <div class="row">
                        <label class="col-sm-4">Name</label>
                        <input type="text" class="col-sm-7 text" id="user_name" name=name readonly>
                    </div>
                    <div class="row">
                        <label class="col-sm-4">Type</label>
                        <input type="text" class="col-sm-7 text" id="user_type" name=type readonly>
                    </div>
                    <div class="row">
                        <label class="col-sm-4">Email</label>
                        <input type="text" class="col-sm-7 text" id="user_email" name=email readonly>
                    </div>
                    <div class="row">
                        <label class="col-sm-4">Phone</label>
                        <input type="text" class="col-sm-7 text" id="user_phone" name=phone readonly>
                    </div>
                    <div class="row">
                        <label class="col-sm-4">Date of Birth</label>
                        <input type="text" class="col-sm-7 text" id="user_dob" name=dob readonly>
                    </div>
                    <div class="row">
                        <label class="col-sm-4">Address</label>
                        <input type="text" class="col-sm-7 text" id="user_address" name=address readonly>
                    </div>
                </div>
                <div class="modal-body" id="userDetails">
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