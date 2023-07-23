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
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($datas as $key => $data)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ date('D', strtotime($data->scheduled_date)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($data->scheduled_date)) }}</td>
                                <td>{{ $data->initial}}{{'. '}}{{$data->lastname .', '}}{{strtoupper($data->firstname)}}</td>
                                <td>{{ date('h:i A', strtotime($data->start_time)) }}</td>
                                <td>{{ date('h:i A', strtotime($data->end_time)) }}</td>
                                <td>{{ $data->maximum_bookings }}</td>
                                <td>{{ $data->maximum_bookings }}</td>
                                <td>{{ $data->description }}</td>
                                <td class="align-middle text-center">
                                  <a href="#" class="btn btn-sm btn-icon btn-outline-secondary" title="Edit"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> 
                                  <a href="#" class="btn btn-sm btn-icon btn-outline-danger" title="Delete"><i class="far fa-trash-alt"></i> <span class="sr-only">Delete</span></a>
                                </td>
                            </tr>
                          @endforeach
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