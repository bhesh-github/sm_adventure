@extends('setting::layouts.master')

@section('title', 'Pages')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Pages</li>
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
                            <div class="card-header">
                                <h3 class="card-title float-right"><a class="btn btn-info text-white"
                                        href="{{ route('page.create') }}"><i class="fa fa-plus"></i> Create</a> </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                          <th>SN</th>
                                          <th>Title</th>
                                          <th>Image</th>
                                          <!--<th>URL</th>-->
                                          <th>Status</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($pages as $page)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $page->title }}</td>
                                          <td class="text-center">
                                              @if ($page->image != null)
                                                <img src="{{ asset('upload/images/page/'.$page->image) }}" alt="Image" width="130px">
                                              @else
                                                <img src="{{ asset('no-image.jpg') }}" alt="Image" width="100px">
                                              @endif
                                            </td>
                                            <!--<td>{{ url('/'.$page->slug) }}</td>-->
                                            <td class="text-center">
                                              @if ($page->status == 'on')
                                                  <a href="{{ route('page.status', $page->id) }}"
                                                      class="btn btn-success">On</a>
                                              @else
                                                  <a href="{{ route('page.status', $page->id) }}"
                                                      class="btn btn-danger">Off</a>
                                              @endif
                                          </td>
                                          <td class="text-center">
                                            <a href="{{ route('page.edit', $page->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            {{-- <a href="{{ route('faqs.show',$page->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}
                                            <button id="delete" class="btn btn-danger btn-sm"
                                                onclick="
                            event.preventDefault();
                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                document.getElementById('destroy{{ $page->id }}').submit()
                            }
                            ">
                                                <i class="fa fa-trash"></i>
                                                <form id="destroy{{ $page->id }}" class="d-none"
                                                    action="{{ route('page.destroy', $page->id) }}"
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
                                          <th>SN</th>
                                          <th>Title</th>
                                          <th>Image</th>
                                          <!--<th>URL</th>-->
                                          <th>Status</th>
                                          <th>Action</th>
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