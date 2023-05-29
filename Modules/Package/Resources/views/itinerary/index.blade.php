@extends('setting::layouts.master')

@section('title', 'Package Itinerary')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Package Itinerary</li>
    </ol>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $package->name }}'s Itinerary</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Package Itinerary</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title float-right"><a class="btn btn-info text-white"
                                        href="{{ route('itinerary.create', $package->id) }}"><i class="fa fa-plus"></i>
                                        Create Itinerary</a> </h3>
                                <h3 class="card-title float-right mr-2"><a class="btn btn-danger text-white"
                                        href="{{ route('packages.index') }}">Back</a> </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Title</th>
                                            <th>Descriptions</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($itinerary as $value)
                                            <tr>
                                                <td>{{ $value->day }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->description }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal{{ $value->id }}"><i
                                                            class="fa fa-edit"></i></a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $value->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Itinerary</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <form
                                                                        action="{{ route('itinerary.update', $value->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="day">Day</label>
                                                                            <input type="number" name="day"
                                                                                class="form-control"
                                                                                value="{{ $value->day }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="title">Title</label>
                                                                            <input type="text" name="title"
                                                                                class="form-control"
                                                                                value="{{ $value->title }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="description">Description</label>
                                                                            <textarea name="description" class="form-control" rows="5" required>{{ $value->description }}</textarea>
                                                                        </div>
                                                                        <div class="text-right">
                                                                            <button type="submit"
                                                                                class="btn btn-success">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <a href="{{ route('packages.show',$value->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}
                                                    <a href="{{ route('itinerary.destroy', $value->id) }}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return(confirm('Are you sure want to remove?'))">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Day</th>
                                            <th>Title</th>
                                            <th>Descriptions</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
