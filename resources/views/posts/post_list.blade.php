@extends('layouts.app')
@section('content')

<div class="container-fluid mt-4">
    <div class="row border">
        <div class="container mr-auto">
            <p class="pt-3">Post List</p>
        </div>
    </div>
    <div class="container">
        <div class="row ml-auto mt-2 d-flex justify-content-between col-9">
            <label class="align-middle mt-2">Keyword : </label>
            <input type="text">
            <a class="btn btn-primary col-2" href="#" role="button">Search</a>
            <a class="btn btn-primary col-2" href="#" role="button">Create</a>
            <a class="btn btn-primary col-2" href="#" role="button">Upload</a>
            <a class="btn btn-primary col-2" href="#" role="button">Download</a>
        </div>
        <table class="table mt-3 col-12">
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

@endsection