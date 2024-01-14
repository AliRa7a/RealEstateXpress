@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>Type Name</th>
                                    <th>Type Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($propertyTypes as $key => $propertyType)
                                <tr>
                                    <td> {{$key+1}}</td>
                                    <td>{{$propertyType->type_name}}</td>
                                    <td>{{$propertyType->type_icon}}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary">Edit</a>
                                        <a href="#" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection