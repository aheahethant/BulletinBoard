@extends('layouts.app')
@section('content')

<div class="container-fluid mt-4">
    <div class="container">
        <p class="font-weight-bold">Post List</p>
    </div>
    <div class="container">
        <div class="row ml-auto mt-2 d-flex justify-content-between col-10">
            <form class="col-10">
                <label>Keyword : </label>
                <input type="text" class="col-2">
                <button type="submit" class="btn btn-primary col-2">Search</button>
                <a class="btn btn-primary col-2" href="#" role="button">Create</a>
                <a class="btn btn-primary col-2" href="#" role="button">Upload</a>
                <a class="btn btn-primary col-2" href="#" role="button">Download</a>
            </form>
        </div>
        <div class="table-responsive">
            <table id="datatable" class="table mt-3 col-12">
                <thead>
                    <tr>
                        <th scope="col">Post Title</th>
                        <th scope="col">Post Description</th>
                        <th scope="col">Posted User</th>
                        <th scope="col">Posted Date</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Post1</th>
                        <td>Hello World!</td>
                        <td>admin</td>
                        <td>2020/11/04</td>
                        <td>
                            <button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Post2</th>
                        <td>Hello World!</td>
                        <td>admin</td>
                        <td>2020/11/04</td>
                        <td>
                            <button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Post3</th>
                        <td>Hello World!</td>
                        <td>admin</td>
                        <td>2020/11/04</td>
                        <td>
                            <button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Post4</th>
                        <td>Hello World!</td>
                        <td>admin</td>
                        <td>2020/11/04</td>
                        <td>
                            <button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection