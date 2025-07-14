@extends('backend.layout')

@section('content')
    <div class="container-fluid">
    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Student Create</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create New Student</h6>
                <a href="{{route('students.index')}}" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('students.store')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Id</label>
                        <div class="col-sm-10">
                            <input type="number" name='studentId' class="form-control w-50 @error('studentName') is-invalid @enderror" id="id"
                            placeholder="">
                            @error('studentId')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror     
                        </div>
                    </div>

                
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name='studentName' class="form-control w-50 @error('studentName') is-invalid @enderror" id="name"
                            placeholder="Eg: Mg Mg">
                            @error('studentName')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror     
                        </div>
                    </div>
               
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                            <input type="number" name='studentAge' class="form-control w-50 @error('studentName') is-invalid @enderror" id="name"
                            placeholder="">
                            @error('studentAge')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror     
                        </div>
                    </div>
               
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            
                            @error('studentGender')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>    
                        </div>
                    </div>
                
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name='studentAddress' class="form-control w-50 @error('studentName') is-invalid @enderror" id="addrress"
                            placeholder="">
                            @error('studentAddress')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror     
                        </div>
                    </div>
                
                
                    <div class="row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>    
                </form>       
  
            </div>
        </div>
    </div>
@endsection       



