@extends('layouts.app')

@section('content')
            <!-- .page-->
            <div class="page">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <h1 class="page-title"> Add Session </h1>
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
                                <div class="col-md-6 mb-3">
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" for="flatpickr-wrap">{{ __('Date') }}</label>
                                        <div class="input-group input-group-alt flatpickr" id="flatpickr9" data-toggle="flatpickr" data-wrap="true" data-alt-input="true" data-alt-format="F j, Y" data-alt-input-class="form-control" data-date-format="Y-m-d" placeholder="DD/MM/YYYY">
                                            <input id="flatpickr-wrap" name="date" type="text" class="form-control"  value="{{ old('date') }}" data-input="" placeholder="Tap to enter date" required>
                                            <div class="input-group-append">
                                            <button type="button" class="btn btn-secondary" data-toggle=""><i class="far fa-calendar"></i></button> <button type="button" class="btn btn-secondary" data-clear=""><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /grid column -->
                                <!-- grid column -->
                                <div class="col-md-6 mb-3">
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label for="tf2">{{__('Max. Bookings') }}</label>
                                        <div class="custom-number">
                                            <input type="number" name="max_bookings" class="form-control" id="tf2" min="0" max="1000" step="1" value="{{ old('max_bookings') }}" placeholder="Maximum Bookings" required>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.form-row -->
                            </div><!-- /grid column -->
                            <!-- .form-group -->
                            <div class="form-row">
                                <!-- .form-group -->
                                <div class="form-group col-md-6 mb-3">
                                    <label for="start_time">{{ __('Start At') }}</label> <input name="start_time" id="flatpickr08" type="text" value="{{ old('start_time') }}" data-toggle="flatpickr" data-enable-time="true" data-no-calendar="true" data-date-format="H:i"  placeholder="Tap to enter starting time" class="form-control" required>
                                    <div class="invalid-feedback"></div>
                                </div><!-- /.form-group -->
                                <div class="form-group col-md-6 mb-3">
                                    <label for="end_time">{{ __('End At') }}</label> <input name="end_time" id="flatpickr08" type="text" value="{{ old('end_time') }}" data-toggle="flatpickr" data-enable-time="true" data-no-calendar="true" data-date-format="H:i"  placeholder="Tap to enter ending time" class="form-control" required>
                                    <div class="invalid-feedback"></div>
                                </div><!-- /.form-group -->
                            </div><!-- /.form-row -->
                        </div>
                        <div class="col-md-6">
                            <!-- .form-group -->
                            <div class="form-group mb-3">
                                <label for="doctor">{{ __('Doctor') }}</label> 
                                <select class="custom-select d-block w-100"  value="{{ old('doctor') }}" name="doctor" id="doctor" required="">
                                    <option value="" hidden> {{ __('Select Doctor') }}</option>
                                    <option> {{__('Dr')}} </option>
                                    <option>{{ __('Mr') }}</option>
                                    <option>{{ __('Ms') }}</option>
                                </select>
                                <div class="invalid-feedback"> Please select a doctor. </div>
                            </div><!-- /.form-group -->
                            <div class="form-group mb-3">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea class="form-control" name="description" id="description" cols="30" placeholder="Optional"></textarea>
                                <!-- <div class="invalid-feedback"> Please provide a valid Description. </div> -->
                            </div><!-- /.form-row -->
                            <!-- form-row -->
                            <button class="btn btn-primary float-right" type="submit">Click to Add</button>
                            <button class="btn btn-secondary" type="reset">Clear Form</button>
                        </div>
                    </form><!-- /form .needs-validation -->
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.page-section -->
              </div><!-- /.page-->
<!-- .app-footer -->
@include('includes.footer')
@endsection