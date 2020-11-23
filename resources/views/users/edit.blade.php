@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Edit User</h3>
        </div>
        <div class="row pt-5 pb-5">
            <div class="col-sm-10">
                <form action="{{route('update_user', $user->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Name <span style="color:red;">*</span></label>
                        <input type="text" name="name" class="form-control col-sm-7" value="{{$user->name}}">
                        @if ($errors->has('name'))
                        <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">E-mail Address <span style="color:red;">*</span></label>
                        <input type="text" name="email" class="form-control col-sm-7" value="{{$user->email}}">
                        @if ($errors->has('email'))
                        <span class="form-text text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <input type="hidden" name="old_password" value="{{$user->password}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Type <span style="color:red;">*</span></label>
                        <select class="form-control col-sm-7" name="type">
                            <option value="0" <?php if($user->type == '0') echo "selected"; ?>>Admin</option>
                            <option value="1" <?php if($user->type == '1') echo "selected"; ?>>User</option>
                        </select>
                        @if ($errors->has('type'))
                        <span class="form-text text-danger">{{ $errors->first('type') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Phone</label>
                        <input type="text" name="phone" class="form-control col-sm-7" value="{{$user->phone}}">
                        @if ($errors->has('phone'))
                        <span class="form-text text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Date of Birth</label>
                        <input type="date" name="dob" class="form-control col-sm-7" value="{{$user->dob}}">
                        @if ($errors->has('dob'))
                        <span class="form-text text-danger">{{ $errors->first('dob') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Address</label>
                        <textarea class="form-control col-sm-7" name="address">{{$user->address}}</textarea>
                        @if ($errors->has('address'))
                        <span class="form-text text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Old Profile</label>
                        <img src="{{asset($user->profile)}}" class="col-sm-3 w-100 h-auto p-0" alt="">
                        <input type="hidden" name="old_profile" value="{{$user->profile}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">New Profile</label>
                        <input type="file" name="new_profile" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
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