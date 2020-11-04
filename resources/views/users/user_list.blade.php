@extends('layouts.app')
@section('content')

<div class="container-fluid mt-4">
    <div class="container">
        <p class="font-weight-bold">User List</p>
    </div>
    <div class="container">
        <div class="row mt-3 float-right">
            <form>
                <div class="form-row d-flex justify-content-between">
                    <label for="name" class="pt-2">Name : </label>
                    <input type="text" id="name" name="" class="col-sm-2">
                    <label for="email" class="pt-2">Email : </label>
                    <input type="email" name="" id="email" class="col-sm-2">
                    <label for="from_date" class="pt-2">From : </label>
                    <input type="date" name="" id="from_date" class="col-sm-2">
                    <label for="to_date" class="pt-2">To : </label>
                    <input type="date" name="" id="to_date" class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table id="datatable" class="table mt-3 col-12">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created User</th>
                        <th scope="col">Type</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Address</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Updated Date</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Su Su</td>
                        <td>scm.test@gmail.com</td>
                        <td>admin</td>
                        <td>admin</td>
                        <td>098654231</td>
                        <td>1998/12/27</td>
                        <td>Mandalay</td>
                        <td>2020/11/04</td>
                        <td>2020/11/04</td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Su Su</td>
                        <td>scm.test@gmail.com</td>
                        <td>admin</td>
                        <td>admin</td>
                        <td>098654231</td>
                        <td>1998/12/27</td>
                        <td>Mandalay</td>
                        <td>2020/11/04</td>
                        <td>2020/11/04</td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Su Su</td>
                        <td>scm.test@gmail.com</td>
                        <td>admin</td>
                        <td>admin</td>
                        <td>098654231</td>
                        <td>1998/12/27</td>
                        <td>Mandalay</td>
                        <td>2020/11/04</td>
                        <td>2020/11/04</td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Su Su</td>
                        <td>scm.test@gmail.com</td>
                        <td>admin</td>
                        <td>admin</td>
                        <td>098654231</td>
                        <td>1998/12/27</td>
                        <td>Mandalay</td>
                        <td>2020/11/04</td>
                        <td>2020/11/04</td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Su Su</td>
                        <td>scm.test@gmail.com</td>
                        <td>admin</td>
                        <td>admin</td>
                        <td>098654231</td>
                        <td>1998/12/27</td>
                        <td>Mandalay</td>
                        <td>2020/11/04</td>
                        <td>2020/11/04</td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection