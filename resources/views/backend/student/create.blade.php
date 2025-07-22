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
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="studentName" class="form-control w-50 @error('studentName') is-invalid @enderror" id="name" placeholder="Eg: Kyaw Kyaw">
                  @error('studentName')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="age" class="col-sm-2 col-form-label">Age</label>
                <div class="col-sm-10">
                  <input type="number" name="studentAge" class="form-control w-50 @error('studentAge') is-invalid @enderror" id="age">
                  @error('studentAge')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="studentGender" id="male" value="Male" checked>
                    <label class="form-check-label" for="male">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="studentGender" id="female" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                  </div>
                  {{-- <input type="radio" name="studentGender" class="form-control w-50 @error('studentGender') is-invalid @enderror" id="gender">
                  @error('studentGender')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror --}}
                </div>
              </div>
              <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <textarea name="studentAddress" class="form-control w-50 @error('studentAddress') is-invalid @enderror" id="address"></textarea>
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