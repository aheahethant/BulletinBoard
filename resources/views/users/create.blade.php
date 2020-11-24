@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Register</h3>
        </div>
        <div class="row pt-5 pb-5">
            <div class="col-sm-10">
                <form action="{{ route('confirm_register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Name</label>
                        <input type="text" name="name" class="form-control col-sm-7" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                        <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">E-mail Address</label>
                        <input type="email" name="email" class="form-control col-sm-7" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="form-text text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Password</label>
                        <input type="password" name="password" class="form-control col-sm-7" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                        <span class="form-text text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control col-sm-7" value="{{ old('confirm_password') }}">
                        @if ($errors->has('confirm_password'))
                        <span class="form-text text-danger">{{ $errors->first('confirm_password') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Type</label>
                        <select class="form-control col-sm-7" name="type" value="{{ old('type') }}">
                            <option>Choose Type</option>
                            <option>Admin</option>
                            <option>User</option>
                        </select>
                        @if ($errors->has('type'))
                        <span class="form-text text-danger">{{ $errors->first('type') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Phone</label>
                        <input type="text" name="phone" class="form-control col-sm-7" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                        <span class="form-text text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Date of Birth</label>
                        <input type="date" name="dob" class="form-control col-sm-7" value="{{ old('dob') }}">
                        @if ($errors->has('dob'))
                        <span class="form-text text-danger">{{ $errors->first('dob') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Address</label>
                        <textarea class="form-control col-sm-7" name="address">{{ old('address') }}</textarea>
                        @if ($errors->has('address'))
                        <span class="form-text text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Profile</label>
                        <input type="file" name="profile" class="form-control col-sm-7">
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-primary">Register</button>
                            <button type="reset" class="btn btn-secondary">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection