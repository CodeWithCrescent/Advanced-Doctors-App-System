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
                    <form class="needs-validation row" novalidate="">
                        <div class="col-md-6">
                            <!-- .form-row -->
                            <div class="form-row">
                                <!-- grid column -->
                                <div class="col-md-4 mb-3">
                                <label for="Initial">{{ __('Initial') }}</label> <select class="custom-select d-block w-100"  value="{{ old('initial') }}" name="initial" id="Initial" required="">
                                    <option hidden> {{ __('Choose Initial') }}</option>
                                    <option> {{__('Dr')}} </option>
                                    <option>{{ __('Mr') }}</option>
                                    <option>{{ __('Ms') }}</option>
                                </select>
                                <div class="invalid-feedback"> Please provide a valid Initial. </div>
                                </div><!-- /grid column -->
                                <!-- grid column -->
                                <div class="col-md-8 mb-3">
                                <label for="name">{{ __('Full Name') }}</label> <input type="text" value="{{ old('name') }}" class="form-control" id="name" placeholder="Full name" required="">
                                <div class="invalid-feedback"> Valid Name is required. </div>
                                </div><!-- /grid column -->
                            </div><!-- /.form-row -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label for="email">{{ __('Email') }} </label> <input type="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Email address">
                                <div class="invalid-feedback"> Please enter a valid email address of a doctor. </div>
                            </div><!-- /.form-group -->
                            <div class="form-row">
                                <!-- .form-group -->
                                <div class="form-group col-md-8 mb-3">
                                    <label for="phone">Phone</label> <input type="tel" value="{{ old('phone') }}" class="form-control" id="phone" placeholder="Phone number">
                                    <div class="invalid-feedback"> Please enter valid phone number. </div>
                                </div><!-- /.form-group -->
                                <!-- grid column -->
                                <div class="col-md-4 mb-3">
                                <label for="Gender">Gender</label> <select value="{{ old('gender') }}" class="custom-select d-block w-100" name="gender" id="gender" required="">
                                    <option hidden> {{__('Choose Gender')}} </option>
                                    <option> {{__('Male')}} </option>
                                    <option> {{__('Female')}} </option>
                                </select>
                                <div class="invalid-feedback"> Please provide a valid Gender. </div>
                                </div><!-- /grid column -->
                            </div><!-- /.form-row -->
                        </div>
                        <div class="col-md-6">
                            <!-- .form-group -->
                            <div class="form-group">
                                <label for="employee-number">Doctor's Employee Number </label> <input type="text" name="emp-no" value="{{ old('emp-no') }}" class="form-control" id="employee-number" placeholder="Enter Employee Number">
                            </div><!-- /.form-group -->
                            <!-- .form-row -->
                            <div class="form-row">
                                <!-- grid column -->
                                <div class="col-md-8 mb-3">
                                <label for="Initial">{{ __('Department') }}</label> <select class="custom-select d-block w-100"  value="{{ old('department') }}" name="department" id="department" required="">
                                    <option hidden> {{ __('Select Department') }}</option>
                                    <option> {{__('Dr')}} </option>
                                </select>
                                <div class="invalid-feedback"> Please provide a valid Department. </div>
                                </div><!-- /grid column -->
                                <!-- grid column -->
                                <div class="col-md-4 mb-3">
                                <label for="office">{{ __('Office') }}</label> <select class="custom-select d-block w-100"  value="{{ old('office') }}" name="office" id="office" required="">
                                    <option hidden> {{ __('Select Office') }}</option>
                                    <option> {{__('Dr')}} </option>
                                </select>
                                <div class="invalid-feedback"> Please provide a valid Office. </div>
                                </div><!-- /grid column -->
                            </div><!-- /.form-row -->
                            <!-- form-row -->
                            <div class="form-group">
                                <label for="Speciality">{{ __('Speciality') }}</label> <select class="custom-select d-block w-100"  value="{{ old('Speciality') }}" name="Speciality" id="Speciality" required="">
                                    <option hidden> {{ __('Select Speciality') }}</option>
                                    <option> {{__('Dr')}} </option>
                                </select>
                                <div class="invalid-feedback"> Please provide a valid Speciality. </div>
                            </div><!-- /form-row -->
                            <button class="btn btn-primary float-right" type="submit">Click to Add</button>
                            <button class="btn btn-secondary" type="reset">Clear Form</button>
                        </div>
                    </form><!-- /form .needs-validation -->
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.page-section -->
              </div><!-- /.page -->
            <!-- .app-footer -->
            @include('includes.footer')
@endsection