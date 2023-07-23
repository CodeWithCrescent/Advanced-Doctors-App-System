@extends('layouts.pre-app')

@section('content')
<main id="main" class="mt-5 pt-5">

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form id="ClientForm" class="form-horizontal php-email-form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                
            </div>
            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5 form-group">
                <h4>Already Registered? Sign in <a href="{{ route('login') }}">here</a> to continue..  </h4>
             <div class="row">
                <div class="col-md-4 col-sm-4 form-group">
                    <select name="initial" value="{{ old('initial') }}" id="initial" class="form-control @error('initial') is-invalid @enderror">
                        <option value="" hidden value="">Choose Initial</option>
                        <option>{{ __('Mr') }}</option>
                        <option>{{ __('Ms') }}</option>
                    </select>
                    @error('initial') <span class="invalid-feedback"><small>{{ $message }}</small></span>@enderror
                </div>
                <div class="col-md-8 col-sm-8 form-group">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Your Full Name">
                    @error('name') <span class="invalid-feedback"><small>{{ $message }}</small></span>@enderror                    
                </div>
             </div>
             <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Your Email">
                    @error('email') <span class="invalid-feedback"><small>{{ $message }}</small></span>@enderror
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}" name="birthdate" id="birthdate" placeholder="Your Birthdate">
                    @error('birthdate') <span class="invalid-feedback"><small>{{ $message }}</small></span>@enderror
                </div>
             </div>
             <div class="row">
                <div class="col-md-12 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" id="address" placeholder="Your Home address">
                    @error('address') <span class="invalid-feedback"><small>{{ $message }}</small></span>@enderror
                </div>
             </div>
             <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Your Password">
                    @error('password') <span class="invalid-feedback"><small>{{ $message }}</small></span>@enderror
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Repeat Your Password">
                    <div class="invalid-feedback"></div>
                </div>
             </div>
             <div class="row">
                <!-- <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                    <div class="validate"></div>
                </div> -->
                <!-- <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
                </div> -->
             </div>
            </div>
            <div class="text-center"><button id="signup" type="submit">Click to Signup <span class="spinner-border spinner-border-sm visually-hidden"></span></button></div>
          </div>
        </form>
      </div>
    </section><!-- End Appointment Section -->

  </main><!-- End #main -->
@endsection
