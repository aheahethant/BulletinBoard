@extends('layouts.app')
@section('content')

<!-- script -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/post.js') }}"></script>

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Confirm Post</h3>
        </div>
        <div class="row pt-5">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form">
                <form action="{{route('save_post')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Title</label>
                        <input type="text" name="confirm_title" id="confirm_title" class="form-control col-sm-7" value="<?php echo $_GET['title']; ?>">
                        @if ($errors->has('confirm_title'))
                        <span class="form-text text-danger">{{ $errors->first('confirm_title') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Description</label>
                        <textarea name="confirm_description" id="confirm_description" class="col-sm-7"><?php echo $_GET['description']; ?></textarea>
                        @if ($errors->has('confirm_description'))
                        <span class="form-text text-danger">{{ $errors->first('confirm_description') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <a onClick="history.go(-1); return false;" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection