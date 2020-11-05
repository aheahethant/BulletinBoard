@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Change Password</h3>
        </div>
        <div class="row pt-5">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form">
                    <form action="">
                        <div class="form-group row">
                            <label class="col-sm-5 text-right">Current Password</label>
                            <input type="password" class="form-control col-sm-7">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 text-right">New Password</label>
                            <input type="password" class="form-control col-sm-7">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 text-right">New Confirm Password</label>
                            <input type="password" class="form-control col-sm-7">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5"></div>
                                <button type="submit" class="btn btn-primary col-sm-4">Update Password</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection