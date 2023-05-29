@extends('setting::layouts.master')

@section('title', 'Contacts')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Contacts</li>
    </ol>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            {{-- <th>Message</th> --}}
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                {{-- <td>
                                                    <textarea cols="30" rows="5">{{ $value->message }}</textarea>
                                                </td> --}}
                                                <td class="text-center">
                                                    @if ($value->status == 'seen')
                                                        <a class="btn btn-success">Seen</a>
                                                    @else
                                                        <a class="btn btn-danger">Unseen</a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#exampleModalLong">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalLong" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLongTitle{{ $value->id }}"
                                                        aria-hidden="true">
                                                        @php
                                                            $data = \Modules\Contact\Entities\Contact::findorfail($value->id);
                                                            $data->status = 'seen';
                                                            $data->update();
                                                        @endphp
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle{{ $value->id }}">Date: {{ $value->created_at->format('F d, Y') }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-justify">
                                                                    <strong>Name:</strong> {{ $value->name }}
                                                                    <br>
                                                                    <strong>Email:</strong> {{ $value->email }}
                                                                    <br>
                                                                    <strong>Phone:</strong> {{ $value->phone }}
                                                                    <br>
                                                                    <strong>Message:</strong> 
                                                                    <br>
                                                                    <textarea class="form-control" rows="10">{{ $value->message }}</textarea>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="mailto:{{ $value->email }}" class="btn btn-primary">Reply</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button id="delete" class="btn btn-danger btn-sm"
                                                        onclick="
                                    event.preventDefault();
                                    if (confirm('Are you sure? It will delete the data permanently!')) {
                                        document.getElementById('destroy{{ $value->id }}').submit()
                                    }
                                    ">
                                                        <i class="fa fa-trash"></i>
                                                        <form id="destroy{{ $value->id }}" class="d-none"
                                                            action="{{ route('contacts.destroy', $value->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            {{-- <th>Message</th> --}}
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
