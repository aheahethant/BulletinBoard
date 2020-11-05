@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Create Post</h3>
        </div>
        <div class="row pt-5">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form">
                    <form action="">
                        <div class="form-group row">
                            <label class="col-sm-4 text-right">Title</label>
                            <input type="text" class="form-control col-sm-7">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 text-right">Description</label>
                            <textarea name="description" id="" class="col-sm-7"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection