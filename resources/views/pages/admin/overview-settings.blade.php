@extends('layouts.app')

@section('content')
        <!-- .page -->
          <div class="page has-sidebar has-sidebar-expand-xl">
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <!-- .d-flex -->
                <div class="d-flex justify-content-right align-items-center">
                  <button type="button" class="btn btn-light btn-icon d-xl-none ml-auto" data-toggle="sidebar"><i class="fa fa-angle-double-left"></i></button>
                </div><!-- /.d-flex -->
                <!-- grid row -->
                <div class="row text-center text-sm-left">
                  <!-- grid column -->
                  <div class="col-sm-auto col-12 mb-2">
                    <!-- .has-badge -->
                    <div class="has-badge has-badge-bottom">
                      <a href="#" class="user-avatar user-avatar-xl"><img src="assets/images/avatars/team4.jpg" alt=""></a> <span class="tile tile-circle tile-xs" data-toggle="tooltip" title="Public"><i class="fas fa-globe"></i></span>
                    </div><!-- /.has-badge -->
                  </div><!-- /grid column -->
                  <!-- grid column -->
                  <div class="col">
                    <h1 class="page-title"> Overview Settings </h1>
                    <p class="text-muted"> We make stunning and cool responsive web and app design which suitable for any project purpose for your business. </p>
                  </div><!-- /grid column -->
                </div><!-- /grid row -->
                <!-- .nav-scroller -->
                <div class="nav-scroller border-bottom">
                  <!-- .nav -->
                  <div class="nav nav-tabs">
                    <a class="nav-link active show" data-toggle="tab" href="#overview">Overview</a> <a class="nav-link" data-toggle="tab" href="#departments">Departments</a> <a class="nav-link" data-toggle="tab" href="#specialities">Specialities</a> <a class="nav-link" data-toggle="tab" href="#offices">Offices</a> <a class="nav-link" data-toggle="tab" href="#settings">Settings</a>
                  </div><!-- /.nav -->
                </div><!-- /.nav-scroller -->
              </header><!-- /.page-title-bar -->
              <!-- tab-toggle  -->
              <div id="myTabCard" class="tab-content">
              <!-- .page-section -->
              <div class="page-section tab-pane fade active show" id="overview">
                <!-- .section-block -->
                <div class="section-block">
                  <!-- .metric-row -->
                  <div class="metric-row metric-flush">
                    <!-- metric column -->
                    <div class="col">
                      <!-- .metric -->
                      <a href="#departments" class="metric metric-bordered align-items-center">
                        <h2 class="metric-label"> Departments </h2>
                        <p class="metric-value h3">
                          <sub><i class="oi oi-people"></i></sub> <span class="value">{{$departments->count()}}</span>
                        </p>
                      </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                    <!-- metric column -->
                    <div class="col">
                      <!-- .metric -->
                      <a href="#specialities" class="metric metric-bordered align-items-center">
                        <h2 class="metric-label"> Specialities </h2>
                        <p class="metric-value h3">
                          <sub><i class="oi oi-fork"></i></sub> <span class="value">{{$specialities->count()}}</span>
                        </p>
                      </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                    <!-- metric column -->
                    <div class="col">
                      <!-- .metric -->
                      <a href="#offices" class="metric metric-bordered align-items-center">
                        <h2 class="metric-label"> Offices </h2>
                        <p class="metric-value h3">
                          <sub><i class="oi oi-timer fa-lg"></i></sub> <span class="value">{{$offices->count()}}</span>
                        </p>
                      </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                  </div><!-- /.metric-row -->
                </div><!-- /.section-block -->
                <!-- .section-block -->
                <div class="section-block d-flex justify-content-between align-items-center my-3">
                  <h1 class="section-title mb-0"> Achievement </h1><!-- .dropdown -->
                  <div class="dropdown">
                    <button class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>This Month</span> <i class="fa fa-fw fa-caret-down"></i></button> <!-- .dropdown-menu -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-md stop-propagation">
                      <div class="dropdown-arrow"></div><!-- .custom-control -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="dpToday" name="dpFilter" value="0"> <label class="custom-control-label d-flex justify-content-between" for="dpToday"><span>Today</span> <span class="text-muted">Mar 27</span></label>
                      </div><!-- /.custom-control -->
                      <!-- .custom-control -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="dpYesterday" name="dpFilter" value="1"> <label class="custom-control-label d-flex justify-content-between" for="dpYesterday"><span>Yesterday</span> <span class="text-muted">Mar 26</span></label>
                      </div><!-- /.custom-control -->
                      <!-- .custom-control -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="dpWeek" name="dpFilter" value="2"> <label class="custom-control-label d-flex justify-content-between" for="dpWeek"><span>This Week</span> <span class="text-muted">Mar 21-27</span></label>
                      </div><!-- /.custom-control -->
                      <!-- .custom-control -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="dpMonth" name="dpFilter" value="3" checked> <label class="custom-control-label d-flex justify-content-between" for="dpMonth"><span>This Month</span> <span class="text-muted">Mar 1-31</span></label>
                      </div><!-- /.custom-control -->
                      <!-- .custom-control -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="dpYear" name="dpFilter" value="4"> <label class="custom-control-label d-flex justify-content-between" for="dpYear"><span>This Year</span> <span class="text-muted">2019</span></label>
                      </div><!-- /.custom-control -->
                      <!-- .custom-control -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="dpCustom" name="dpFilter" value="5"> <label class="custom-control-label" for="dpCustom">Custom</label>
                        <div class="custom-control-hint my-1">
                          <!-- datepicker:range -->
                          <input type="text" class="form-control" data-toggle="flatpickr" data-mode="range" data-date-format="Y-m-d"> <!-- /datepicker:range -->
                        </div>
                      </div><!-- /.custom-control -->
                    </div><!-- /.dropdown-menu -->
                  </div><!-- /.dropdown -->
                </div><!-- /.section-block -->
              </div><!-- /.page-section -->
              <!-- .page-section -->
              <div class="page-section tab-pane fade" id="departments">
                <!-- .Add Department form -->
                <form method="post" action="{{ route('Dashboard | Add Department') }}" class="section-block d-flex justify-content-between align-items-center my-3">
                    <!-- .col -->
                    <div class="col">
                      <!-- .has-clearable -->
                      <div class="has-clearable">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                          @csrf
                            <input type="text" id="department" name="department" value="{{ old('department') }}" class="form-control" placeholder="Enter department name" required>
                      </div><!-- /.has-clearable -->
                    </div><!-- /.col -->
                    <!-- .col-auto -->
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Add Department</button>
                    </div><!-- /.col-auto -->
                </form><!-- /.Add department form -->
                <!-- .section-block -->
                <div class="section-block">
                  <!-- .card -->
                  <div class="card card-fluid">
                    <div class="card-header">All Departments</div>
                    <!-- .card-body -->
                    <div class="card-body table-responsive">
                      <table id="departments-table" class="table table-stripped table-responsive-sm nowrap">
                          <thead>
                              <tr>
                                  <th style="width: 5%">SN</th>
                                  <th style="width: 60%">Name</th>
                                  <th class="text-center" style="width: 35%">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($departments as $key => $department)
                              <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $department->department_name }}</td>
                                <td class="align-middle text-right">
                                  <a href="#" class="btn btn-sm btn-icon btn-outline-secondary" title="Edit"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> 
                                  <a href="#" class="btn btn-sm btn-icon btn-outline-danger" title="Delete"><i class="far fa-trash-alt"></i> <span class="sr-only">Delete</span></a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div><!-- /.card-body -->
                  </div><!-- /.card -->
                </div>
              </div><!-- /.page-section -->
              <!-- .page-section -->
              <div class="page-section tab-pane fade" id="specialities">
                <!-- .Add speciality form -->
                <form method="post" action="{{ route('Dashboard | Add Speciality') }}" class="section-block d-flex justify-content-between align-items-center my-3">
                    @csrf
                    <!-- .col -->
                    <div class="col-4">
                      <!-- .has-clearable -->
                      <div class="has-clearable">
                          <select id="department" name="department" class="form-control @error('department') is-invalid @enderror custom-select" required>
                            <option hidden>Select Department</option>
                            @if (!empty($departments) && $departments->count())
                            @foreach($departments as $department)
                            <option value="{{ $department->department_id }}" {{ old('department') == $department->id ? 'selected' : '' }}>{{ $department->department_name}} </option>
                            @endforeach
                            @else
                            <option disabled>No departments</option>
                            @endif
                          </select>
                      </div><!-- /.has-clearable -->
                    </div><!-- /.col-4 -->
                    <!-- .col -->
                    <div class="col-5">
                      <!-- .has-clearable -->
                      <div class="has-clearable">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                            <input type="text" id="speciality_name" name="speciality_name" value="{{ old('speciality_name') }}" class="form-control" placeholder="Enter speciality name" required>
                      </div><!-- /.has-clearable -->
                    </div><!-- /.col-5 -->
                    <!-- .col-auto -->
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Add Speciality</button>
                    </div><!-- /.col-auto -->
                </form><!-- /.Add speciality form -->
                <!-- .section-block -->
                <div class="section-block">
                  <!-- .card -->
                  <div class="card card-fluid">
                    <div class="card-header">All Specialities</div>
                    <!-- .card-body -->
                    <div class="card-body table-responsive">
                      <table id="speciality-table" class="table table-stripped table-responsive-sm nowrap">
                          <thead>
                              <tr>
                                  <th style="width: 5%">SN</th>
                                  <th style="width: 35%">Name</th>
                                  <th style="width: 30%">Department</th>
                                  <th class="text-center" style="width: 30%">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($specialities as $key => $speciality)
                              <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $speciality->speciality_name }}</td>
                                <td>{{ $speciality->department_name }}</td>
                                <td class="align-middle text-right">
                                  <a href="#" class="btn btn-sm btn-icon btn-outline-secondary" title="Edit"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> 
                                  <a href="#" class="btn btn-sm btn-icon btn-outline-danger" title="Delete"><i class="far fa-trash-alt"></i> <span class="sr-only">Delete</span></a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div><!-- /.card-body -->
                  </div><!-- /.card -->
                </div><!-- /.section-block -->
              </div><!-- /.page-section -->
              <!-- .page-section -->
              <div class="page-section tab-pane fade" id="offices">
                <!-- .Add office form -->
                <form method="post" action="{{ route('Dashboard | Add Office') }}" class="section-block d-flex justify-content-between align-items-center my-3">
                    @csrf
                    <!-- .col -->
                    <div class="col-4">
                      <!-- .has-clearable -->
                      <div class="has-clearable">
                          <select id="department" name="department" class="form-control @error('department') is-invalid @enderror custom-select" required>
                            <option hidden>Select Department</option>
                            @if (!empty($departments) && $departments->count())
                            @foreach($departments as $department)
                            <option value="{{ $department->department_id }}" {{ old('department') == $department->id ? 'selected' : '' }}>{{ $department->department_name}} </option>
                            @endforeach
                            @else
                            <option disabled>No departments</option>
                            @endif
                          </select>
                      </div><!-- /.has-clearable -->
                    </div><!-- /.col -->
                    <!-- .col -->
                    <div class="col-5">
                      <!-- .has-clearable -->
                      <div class="has-clearable">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                          @csrf
                            <input type="text" id="office_name" name="office_name" value="{{ old('office_name') }}" class="form-control" placeholder="Enter office name" required>
                      </div><!-- /.has-clearable -->
                    </div><!-- /.col -->
                    <!-- .col-auto -->
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Add Office</button>
                    </div><!-- /.col-auto -->
                </form><!-- /.Add office form -->
                <!-- .section-block -->
                <div class="section-block">
                  <!-- .card -->
                  <div class="card card-fluid">
                    <div class="card-header">All Offices</div>
                    <!-- .card-body -->
                    <div class="card-body table-responsive">
                      <table id="offices-table" class="table table-stripped table-responsive-sm nowrap">
                          <thead>
                              <tr>
                                  <th style="width: 5%">SN</th>
                                  <th style="width: 30%">Name</th>
                                  <th style="width: 30%">Department</th>
                                  <th class="text-center" style="width: 35%">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($offices as $key => $office)
                              <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $office->office_name }}</td>
                                <td>{{ $office->department_name }}</td>
                                <td class="align-middle text-right">
                                  <a href="#" class="btn btn-sm btn-icon btn-outline-secondary" title="Edit"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> 
                                  <a href="#" class="btn btn-sm btn-icon btn-outline-danger" title="Delete"><i class="far fa-trash-alt"></i> <span class="sr-only">Delete</span></a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div><!-- /.card-body -->
                  </div><!-- /.card -->
                </div><!-- /.section-block -->
              </div><!-- /.page-section -->
              <!-- .page-section -->
              <div class="page-section tab-pane fade" id="settings">
                <!-- .section-block -->
                <div class="section-block d-flex justify-content-between align-items-center my-3">
                  Sorry! This section is Underconstruction.
                </div><!-- /.section-block -->
              </div><!-- /.page-section -->
              </div><!-- /.tab-toggle -->
            </div><!-- /.page-inner -->
            <!-- .page-sidebar -->
            <div class="page-sidebar">
              <!-- .sidebar-header -->
              <header class="sidebar-header d-sm-none">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      <a href="#" onclick="Looper.toggleSidebar()"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                    </li>
                  </ol>
                </nav>
              </header><!-- /.sidebar-header -->
              <!-- .sidebar-section-fill -->
              <div class="sidebar-section-fill">
                <!-- .card -->
                <div class="card card-reflow">
                  <!-- .card-body -->
                  <div class="card-body">
                    <button type="button" class="close mt-n1 d-none d-xl-none d-sm-block" onclick="Looper.toggleSidebar()" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="card-title"> Summary </h4><!-- grid row -->
                    <div class="row">
                      <!-- grid column -->
                      <div class="col-6">
                        <!-- .metric -->
                        <div class="metric">
                          <h6 class="metric-value"> $83,743 </h6>
                          <p class="metric-label mt-1"> Incomes </p>
                        </div><!-- /.metric -->
                      </div><!-- /grid column -->
                      <!-- grid column -->
                      <div class="col-6">
                        <!-- .metric -->
                        <div class="metric">
                          <h6 class="metric-value"> $18,821 </h6>
                          <p class="metric-label mt-1"> Expenses </p>
                        </div><!-- /.metric -->
                      </div><!-- /grid column -->
                      <!-- grid column -->
                      <div class="col-6">
                        <!-- .metric -->
                        <div class="metric">
                          <h6 class="metric-value"> 2,630 </h6>
                          <p class="metric-label mt-1"> Leads </p>
                        </div><!-- /.metric -->
                      </div><!-- /grid column -->
                      <!-- grid column -->
                      <div class="col-6">
                        <!-- .metric -->
                        <div class="metric">
                          <h6 class="metric-value"> 40 </h6>
                          <p class="metric-label mt-1"> Clients </p>
                        </div><!-- /.metric -->
                      </div><!-- /grid column -->
                    </div><!-- /grid row -->
                  </div><!-- /.card-body -->
                  <!-- .card-body -->
                  <div class="card-body border-top pb-1">
                    <h4 class="card-title"> Leads source </h4><!-- .progress -->
                    <div class="progress mb-2">
                      <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="33.84" aria-valuemin="0" aria-valuemax="100" style="width: 33.84%">
                        <span class="sr-only">33.84% Complete</span>
                      </div>
                      <div class="progress-bar bg-indigo" role="progressbar" aria-valuenow="24.71" aria-valuemin="0" aria-valuemax="100" style="width: 24.71%">
                        <span class="sr-only">24.71% Complete</span>
                      </div>
                      <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="26.29" aria-valuemin="0" aria-valuemax="100" style="width: 26.29%">
                        <span class="sr-only">26.29% Complete</span>
                      </div>
                      <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="15.15" aria-valuemin="0" aria-valuemax="100" style="width: 15.15%">
                        <span class="sr-only">15.15% Complete</span>
                      </div>
                    </div><!-- /.progress -->
                  </div><!-- /.card -->
                  <!-- .list-group -->
                  <div class="list-group list-group-bordered list-group-reflow">
                    <!-- .list-group-item -->
                    <div class="list-group-item justify-content-between align-items-center">
                      <span><i class="fas fa-square text-teal mr-2"></i> Mailchimp</span> <span class="text-muted">890 result</span>
                    </div><!-- /.list-group-item -->
                    <!-- .list-group-item -->
                    <div class="list-group-item justify-content-between align-items-center">
                      <span><i class="fas fa-square text-indigo mr-2"></i> Facebook</span> <span class="text-muted">650 result</span>
                    </div><!-- /.list-group-item -->
                    <!-- .list-group-item -->
                    <div class="list-group-item justify-content-between align-items-center">
                      <span><i class="fas fa-square text-pink mr-2"></i> Google</span> <span class="text-muted">692 result</span>
                    </div><!-- /.list-group-item -->
                    <!-- .list-group-item -->
                    <div class="list-group-item justify-content-between align-items-center">
                      <span><i class="fas fa-square text-purple mr-2"></i> Linkedin</span> <span class="text-muted">398 result</span>
                    </div><!-- /.list-group-item -->
                  </div><!-- /.list-group -->
                  <!-- .card-body -->
                  <div class="card-body border-top">
                    <div class="d-flex justify-content-between my-3">
                      <h4 class="card-title"> Recent activity </h4><a href="#">View all</a>
                    </div><!-- .timeline -->
                    <ul class="timeline timeline-fluid">
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="far fa-calendar-alt fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Jeffrey Wells</a> created a <a href="#">schedule</a>
                              </p><span class="timeline-date">About a minute ago</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="oi oi-chat fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Anna Vargas</a> logged a <a href="#">chat</a> with team </p><span class="timeline-date">3 hours ago</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="fa fa-tasks fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Arthur Carroll</a> created a <a href="#">task</a>
                              </p><span class="timeline-date">8:14pm</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="fas fa-user-plus fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Sara Carr</a> invited to <a href="#">Stilearn Admin</a> project </p><span class="timeline-date">7:21pm</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="fa fa-folder fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Angela Peterson</a> added <a href="#">Looper Admin</a> to collection </p><span class="timeline-date">5:21pm</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="oi oi-person fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <div class="avatar-group mb-2">
                                <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces4.jpg" alt=""></a> <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces5.jpg" alt=""></a> <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces6.jpg" alt=""></a> <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces7.jpg" alt=""></a>
                              </div>
                              <p class="mb-0">
                                <a href="#">Willie Dixon</a> and 3 others followed you </p><span class="timeline-date">4:32pm</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                    </ul><!-- /.timeline -->
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.sidebar-section-fill -->
            </div><!-- /.page-sidebar -->
          </div><!-- /.page -->
<!-- .app-footer -->
@include('includes.footer')
@endsection