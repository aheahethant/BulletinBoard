@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Edit User</h3>
        </div>
        <div class="row pt-5 pb-5">
            <div class="col-sm-10">
                <form action="">
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Name <span style="color:red;">*</span></label>
                        <input type="text" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">E-mail Address <span style="color:red;">*</span></label>
                        <input type="text" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Type <span style="color:red;">*</span></label>
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
                        <textarea name="" id="" class="form-control col-sm-7"></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 text-right">Old Profile</label>
                        <img src="{{asset('storage_image/car.jpg')}}" class="form-control col-sm-3 w-100 h-auto p-0" alt="">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">New Profile</label>
                        <input type="file" class="form-control col-sm-7">
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="reset" class="btn btn-secondary">Clear</button>
                            <a href="{{route('change_password')}}">Change Password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection