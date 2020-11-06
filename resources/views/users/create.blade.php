@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Register</h3>
        </div>
        <div class="row pt-5 pb-5">
            <div class="col-sm-10">
                <form action="">
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Name</label>
                        <input type="text" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">E-mail Address</label>
                        <input type="email" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Password</label>
                        <input type="password" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Confirm Password</label>
                        <input type="password" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Type</label>
                        <select class="form-control col-sm-7">
                            <option>Admin</option>
                            <option>User</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Phone</label>
                        <input type="text" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Date of Birth</label>
                        <input type="date" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Address</label>
                        <textarea class="form-control col-sm-7"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Profile</label>
                        <input type="file" class="form-control col-sm-7">
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-7">
                            <a href="{{route('confirm_register')}}" class="btn btn-primary">Register</a>
                            <button type="reset" class="btn btn-secondary">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection