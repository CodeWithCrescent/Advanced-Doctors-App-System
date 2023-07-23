@extends('layouts.app')

@section('content')
            <!-- .page -->
            <div class="page">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <h1 class="page-title"> Add Doctor </h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <!-- .section-block -->
                <div class="section-block">
                  <p class="text-muted"> Register new doctor by providing the required information accurately. </p>
                </div><!-- /.section-block -->
                <!-- .card -->
                <div class="card">
                  <!-- .card-body -->
                  <div class="card-body"><!-- form .needs-validation -->
                    <form action="{{ route('Dashboard | Add Doctor Action') }}" method="POST" class="needs-validation row" novalidate="">
                        @csrf
                        <div class="col-md-6">
                            <!-- .form-row -->
                            <div class="form-row">
                                <!-- grid column -->
                                <div class="col-md-4 mb-3">
                                <label for="Initial">{{ __('Initial') }}</label> <select class="custom-select d-block w-100"  value="{{ old('initial') }}" name="initial" id="Initial" required="">
                                    <option value="" hidden> {{ __('Choose Initial') }}</option>
                                    <option> {{__('Dr')}} </option>
                                    <option>{{ __('Mr') }}</option>
                                    <option>{{ __('Ms') }}</option>
                                </select>
                                <div class="invalid-feedback"> Please select Initial. </div>
                                </div><!-- /grid column -->
                                <!-- grid column -->
                                <div class="col-md-8 mb-3">
                                <label for="name">{{ __('Full Name') }}</label> <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Full name" required>
                                @error('name')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback"> Please enter two or three names. </div>
                                </div><!-- /grid column -->
                            </div><!-- /.form-row -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label for="email">{{ __('Email') }} </label> <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email address" required>
                                <div class="invalid-feedback"> Please enter a valid email address of a doctor. </div>
                            </div><!-- /.form-group -->
                            <div class="form-row">
                                <!-- .form-group -->
                                <div class="form-group col-md-8 mb-3">
                                    <label for="phone">Phone</label> <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone number">
                                    <div class="invalid-feedback"> Please enter valid phone number. </div>
                                </div><!-- /.form-group -->
                                <!-- grid column -->
                                <div class="col-md-4 mb-3">
                                <label for="Gender">Gender</label> <select value="{{ old('gender') }}" class="custom-select d-block w-100 @error('gender') is-invalid @enderror" name="gender" id="gender" required>
                                    <option value="" hidden> {{__('Choose Gender')}} </option>
                                    <option> {{__('Male')}} </option>
                                    <option> {{__('Female')}} </option>
                                </select>
                                <div class="invalid-feedback"> Please select Gender. </div>
                                </div><!-- /grid column -->
                            </div><!-- /.form-row -->
                        </div>
                        <div class="col-md-6">
                            <!-- .form-group -->
                            <div class="form-group">
                                <label for="employee-number">Doctor's Employee Number </label> <input type="text" name="employee_number" value="{{ old('employee_number') }}" class="form-control @error('employee_number') is-invalid @enderror" id="employee-number" placeholder="Enter Employee Number">
                            </div><!-- /.form-group -->
                            <!-- .form-row -->
                            <div class="form-row">
                                <!-- grid column -->
                                <div class="col-md-8 mb-3">
                                    <label for="department" class="control-label">{{ __('Department') }}</label>
                                    <select id="department" name="department" class="form-control @error('department') is-invalid @enderror custom-select" required>
                                        <option selected disabled hidden value="">Select Department</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->department_id }}" {{ old('department') == $department->department_id ? 'selected' : '' }}>{{ $department->department_name}} </option>
                                        @endforeach
                                    </select>
                                <div class="invalid-feedback"> Please select Department. </div>
                                </div><!-- /grid column -->
                                <!-- grid column -->
                                <div class="col-md-4 mb-3">
                                    <label for="office_name" class="control-label">{{ __('Office') }}</label>
                                    <select id="office_name" name="office_name" class="form-control @error('office_name') is-invalid @enderror custom-select" required>
                                        <option hidden value="">{{ __('Select Office') }}</option>
                                        <option disabled value="">{{ __('Select Department First') }}</option>
                                    </select>
                                    <script>
                                        //Add Event Listener to the Department Input
                                        document.getElementById('department').addEventListener('change', function() {
                                            var departmentId = this.value;
                                            var url = 'get-offices/' + departmentId;
                                            fetch(url)
                                                .then(response => response.json())
                                                .then(data => {
                                                    //Update the Office options
                                                    var options = '<option hidden value="">Select Office</option>';
                                                    for (var i = 0; i < data.length; i++) {
                                                        options += '<option value="' + data[i].office_id + '">' + data[i].office_name + '</option>';
                                                    }
                                                    document.getElementById('office_name').innerHTML = options;
                                                });
                                        });
                                    </script>
                                <div class="invalid-feedback"> Please select Office. </div>
                                </div><!-- /grid column -->
                            </div><!-- /.form-row -->
                            <!-- form-row -->
                            <div class="form-group">
                                <label for="speciality_name" class="control-label">{{ __('Speciality') }}</label>
                                <select id="speciality_name" name="speciality_name" value="{{ old('speciality_name') }}" class="form-control @error('speciality_name') is-invalid @enderror" required>
                                    <option hidden value="">{{ __('Select Speciality') }}</option>
                                    <option disabled value="">{{ __('Select Department First') }}</option>
                                </select>
                                    <script>
                                        //Add Event Listener to the Department Input
                                        document.getElementById('department').addEventListener('change', function() {
                                            var departmentId = this.value;
                                            var url = 'get-speciality/' + departmentId;
                                            fetch(url)
                                                .then(response => response.json())
                                                .then(data => {
                                                    //Update the Office options
                                                    var options = '<option hidden value="">Select Speciality</option>';
                                                    for (var i = 0; i < data.length; i++) {
                                                        options += '<option value="' + data[i].speciality_id + '">' + data[i].speciality_name + '</option>';
                                                    }
                                                    document.getElementById('speciality_name').innerHTML = options;
                                                });
                                        });
                                    </script>
                                <div class="invalid-feedback"> Please select Speciality. </div>
                            </div><!-- /form-row -->
                            <button class="btn btn-primary float-right" type="submit">Click to Add</button>
                            <button class="btn btn-secondary" type="reset">Clear Form</button>
                        </div>
                        <!-- <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Click to Add</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div> -->
                    </form><!-- /form .needs-validation -->
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.page-section -->
              </div><!-- /.page -->
            <!-- .app-footer -->
            @include('includes.footer')
@endsection