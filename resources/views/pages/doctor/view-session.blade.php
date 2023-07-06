@extends('layouts.app')

@section('content')
            <!-- .page -->
            <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <!-- floating action -->
                <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> <!-- /floating action -->
                <!-- title and toolbar -->
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> All Sessions </h1><!-- .btn-toolbar -->
                  <div id="dt-buttons" class="btn-toolbar"></div><!-- /.btn-toolbar -->
                </div><!-- /title and toolbar -->
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid">
                  <!-- .card-body -->
                  <div class="card-body">
                    <table id="doctors-table" class="table table-stripped table-responsive-sm nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Day</th>
                                <th>Date</th>
                                <th>Doctor Name</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Max. Bookings</th>
                                <th>Rem. Bookings</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>2011-04-25</td>
                                <td>$320,800</td>
                                <td>$320,800</td>
                                <td>$320,800</td>
                                <td>$320,800</td>
                                <td>$320,800</td>
                            </tr><tr>
                                <td>2.</td>
                                <td>System</td>
                                <td>Edinburgh</td>
                                <td>Edinburgh</td>
                                <td>Edinburgh</td>
                                <td>Edinburgh</td>
                                <td>Edinburgh</td>
                                <td>2011-04-25</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.page-section -->
              </div><!-- /.inner-page -->
              </div><!-- /.page -->
<!-- .app-footer -->
@include('includes.footer')
@endsection