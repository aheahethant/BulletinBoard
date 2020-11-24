@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Profile</h3>
        </div>
        <div class="row pt-5 pb-5">
            <div class="float-left col-sm-3">
                <img src="{{ asset(Auth::user()->profile) }}" class="w-100 h-auto" alt="">
            </div>
            <div class="col-sm-8 float-right">
                <form>
                    <div class="row form-group">
                        <label class="col-sm-4">Name</label>
                        <i class="col-sm-7 red">{{ Auth::user()->name }}</i>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Type</label>
                        @if(Auth::user()->type == 0)
                        <i class="col-sm-7 red">Admin</i>
                        @else
                        <i class="col-sm-7 red">User</i>
                        @endif
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Email</label>
                        <i class="col-sm-7 red">{{ Auth::user()->email }}</i>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Phone</label>
                        <i class="col-sm-7 red">{{ Auth::user()->phone }}</i>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Date of Birth</label>
                        <i class="col-sm-7 red">{{ Auth::user()->dob }}</i>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4">Address</label>
                        <i class="col-sm-7 red">{{ Auth::user()->address }}</i>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4"></div>
                        <a href="{{ route('profile_edit') }}" class="col-sm-3 btn btn-primary">Edit Profile</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection