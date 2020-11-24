@extends('layouts.app')
@section('content')

<!-- script -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/user.js') }}"></script>

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Profile Edit</h3>
        </div>
        <div class="row pt-5 pb-5">
            <div class="col-sm-10">
                <form action="{{route('edit_profile', Auth::user()->id)}}" method="POST" enctype="multipart/form-data" class="myform">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Name <span class="red">*</span></label>
                        <input type="text" name="name" id="name" class="form-control col-sm-7" value="{{Auth::user()->name}}">
                        @if ($errors->has('name'))
                        <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">E-mail Address <span class="red">*</span></label>
                        <input type="text" name="email" class="form-control col-sm-7" id="email" value="{{Auth::user()->email}}">
                        @if ($errors->has('email'))
                        <span class="form-text text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <input type="hidden" name="old_password" value="{{Auth::user()->password}}">
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Type <span class="red">*</span></label>
                        <select class="form-control col-sm-7" name="type">
                            <option value="0" <?php if (Auth::user()->type == '0') {
                                                    echo "selected";
                                                } ?>>Admin</option>
                            <option value="1" <?php if (Auth::user()->type == '1') {
                                                    echo "selected";
                                                } ?>>User</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control col-sm-7" value="{{Auth::user()->phone}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Date of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control col-sm-7" value="{{Auth::user()->dob}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Address</label>
                        <textarea class="form-control col-sm-7" id="address" name="address">{{Auth::user()->address}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Old Profile</label>
                        <img src="{{asset(Auth::user()->profile)}}" id="profile" class="col-sm-3 w-100 h-auto p-0" alt="">
                        <input type="hidden" name="old_profile" value="{{Auth::user()->profile}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">New Profile</label>
                        <input type="file" name="new_profile" class="form-control col-sm-7">
                    </div>
                    <input type="hidden" name="create_user" value="{{Auth::user()->create_user_id}}">
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-secondary" id="btn_clear">Clear</button>
                            <a href="{{route('edit_password')}}">Change Password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection