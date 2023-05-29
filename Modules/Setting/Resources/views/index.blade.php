@extends('setting::layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                @php
                                    $user_count = \App\Models\User::count();
                                @endphp
                                <h3>{{ $user_count }}</h3>

                                <p>Users Registration</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                @php
                                $package_count = \Modules\Package\Entities\Package::count();
                            @endphp
                                <h3>{{ $package_count }}</h3>

                                <p>Packages</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-folder"></i>
                            </div>
                            <a href="{{ route('packages.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                @php
                                    $news_count = \Modules\Blog\Entities\Blog::count();
                                @endphp
                                <h3>{{ $news_count }}</h3>

                                <p>Blogs / News</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-newspaper"></i>
                            </div>
                            <a href="{{ route('blogs.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                @php
                                    $company_count = \Modules\Company\Entities\Company::count();
                                @endphp
                                <h3>{{ $company_count }}</h3>

                                <p>Company</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-building"></i>
                            </div>
                            <a href="{{ route('companies.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">

                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    Contact's Messages
                                </h3>
                                @php
                                    $contacts = \Modules\Contact\Entities\Contact::latest()->paginate(5);
                                @endphp
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item">{{ $contacts->links('pagination::bootstrap-4') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                    @foreach ($contacts as $contact)
                                    <li>
                                      <!-- drag handle -->
                                      {{-- <span class="handle">
                                          <i class="fas fa-ellipsis-v"></i>
                                          <i class="fas fa-ellipsis-v"></i>
                                      </span> --}}
                                      <!-- checkbox -->
                                      <div class="icheck-primary d-inline ml-2 float-left">
                                          <input type="checkbox" value="" name="todo1" id="todoCheck1" {{ ($contact->status=='seen')?'checked':'' }} onclick="return false;">
                                          <label for="todoCheck1"></label>
                                      </div>
                                      <!-- todo text -->
                                      <span class="text float-left">{{ $contact->name }}</span>
                                      <span class="text float-right">{{ $contact->phone }}</span>
                                      <br>
                                      <span class="text">{{ $contact->email }}</span>
                                      <br>
                                      <div class="text-justify pl-2">{{ $contact->message }}</div>
                                      <br>
                                      <!-- Emphasis label -->
                                      <small class="badge badge-danger"><i class="far fa-clock"></i> {{ $contact->created_at->format('d M, Y') }}</small>
                                      <!-- General tools such as edit or delete-->
                                      @if ($contact->status!='seen')
                                      <div class="tools">
                                        <a href="mailto:{{ $contact->email }}" style="color: inherit; text-decoration: none;">
                                          <i class="fas fa-paper-plane"></i> Reply
                                        </a>
                                    </div>
                                      @endif
                                      
                                  </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">
                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">

                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                            data-toggle="dropdown" data-offset="-52">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a href="#" class="dropdown-item">Add new event</a>
                                            <a href="#" class="dropdown-item">Clear events</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">View calendar</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- Map card -->
                        <div class="card bg-gradient-primary" style="display: none;">
                            <!-- /.card-body-->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        {{-- <div class="text-white">Visitors</div> --}}
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        {{-- <div class="text-white">Online</div> --}}
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        {{-- <div class="text-white">Sales</div> --}}
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.card -->


                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
