@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row col pt-5">
            <h3>Upload CSV File</h3>
        </div>
        <div class="row pt-5">
            <div class="col-sm-10">
                <form action="">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 text-right">CSV File</label>
                        <input type="file" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <button type="reset" class="btn btn-secondary">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection