@extends('backend.layout')

@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Students List</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Students</h6>
                <a href="{{route('students.create')}}" class="btn btn-primary">Add Student</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>gender</th>
                                <th>Address</th>
                                <th>Actions</th>
                               
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($students as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->age}}</td>
                                    <td>{{$item->gender}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>
                                        <a href="{{route('students.edit', $item->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{route('students.destroy', $item->id)}}" method="POST" class="d-inline-block">
                                            @method('DELETE')
                                        
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>   
                                
                                
                            @endforeach
                     
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection