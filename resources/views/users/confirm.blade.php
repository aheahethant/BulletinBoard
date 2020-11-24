@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Register Confirm</h3>
        </div>
        <div class="row pt-5 pb-5">
            <div class="col-sm-10">
                <form action="{{ route('save_user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Name</label>
                        <input type="text" name="c_name" class="form-control col-sm-7" value="{{ $name }}">
                        @if ($errors->has('c_name'))
                        <span class="form-text text-danger">{{ $errors->first('c_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">E-mail Address</label>
                        <input type="email" name="email" class="form-control col-sm-7" value="{{ $email }}">
                        @if ($errors->has('email'))
                        <span class="form-text text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Password</label>
                        <input type="password" name="c_password" class="form-control col-sm-7" value="{{ $password }}">
                        @if ($errors->has('c_password'))
                        <span class="form-text text-danger">{{ $errors->first('c_password') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control col-sm-7" value="{{ $confirm_password }}">
                        @if ($errors->has('confirm_password'))
                        <span class="form-text text-danger">{{ $errors->first('confirm_password') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Type</label>
                        <select class="form-control col-sm-7" name="c_type" >
                            @if($type == 0)
                            <option value="0">Admin</option>
                            @else
                            <option value="1">User</option>
                            @endif
                        </select>
                        @if ($errors->has('c_type'))
                        <span class="form-text text-danger">{{ $errors->first('c_type') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Phone</label>
                        <input type="text" name="c_phone" class="form-control col-sm-7" value="{{ $phone }}">
                        @if ($errors->has('c_phone'))
                        <span class="form-text text-danger">{{ $errors->first('c_phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Date of Birth</label>
                        <input type="date" name="c_dob" class="form-control col-sm-7" value="{{ $dob }}">
                        @if ($errors->has('c_dob'))
                        <span class="form-text text-danger">{{ $errors->first('c_dob') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Address</label>
                        <textarea class="form-control col-sm-7" name="c_address">{{$address}}</textarea>
                        @if ($errors->has('c_address'))
                        <span class="form-text text-danger">{{ $errors->first('c_address') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Profile</label>
                        <input type="hidden" name="profile" value="{{ $image }}">
                        <img  src="{{asset($image)}}" class="w-100 col-sm-3 h-auto p-0" alt=" ">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <a href="{{ route('register') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection