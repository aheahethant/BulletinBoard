@extends('layouts/app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Post Edit</h3>
        </div>
        <div class="row pt-5">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form">
                <form action="{{route('update_post', $post->id)}}" method="post">
				@csrf
				@method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Title</label>
                        <input type="text" class="form-control col-sm-7" name="title" value="{{$post->title}}">
                        @if ($errors->has('title'))
                        <span class="form-text text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Description</label>
                        <textarea name="description" class="col-sm-7">{{$post->description}}</textarea>
                        @if ($errors->has('description'))
                        <span class="form-text text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right">Status</label>
                        <input type="checkbox" name="status" checked="checked">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="reset" class="btn btn-secondary">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection