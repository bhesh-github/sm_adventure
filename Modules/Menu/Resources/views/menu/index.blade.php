@extends('setting::layouts.master')

@section('title', 'Menus')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Menus</li>
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
                                        href="{{ route('menu.create') }}"><i class="fa fa-plus"></i> Create</a> </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                          <th>SN</th>
                                          <th>Name</th>
                                          <th>Submenu</th>
                                          <th>Page</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($menus as $menu)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $menu->name }}</td>
                                              <td>
                                                  @if ($menu->subMenus)
                                                      <table class="table table-bordered table-hovered">
                                                          <thead>
                                                              <th>SN</th>
                                                              <th>Name</th>
                                                              <th>Page</th>
                                                              <th>Status</th>
                                                              <th>Action</th>
                                                          </thead>
                                                          <tbody>
                                                              @foreach ($menu->subMenus as $sub)
                                                                  <tr>
                                                                      <td>{{ $loop->iteration }}</td>
                                                                      <td>{{ $sub->name }}</td>
                                                                      <td>{{ $sub->page->title }}</td>
                                                                      <td class="text-center">
                                                                        @if ($sub->status == 'on')
                                                                            <a href="{{ route('menu.status', $sub->id) }}"
                                                                                class="btn btn-success">On</a>
                                                                        @else
                                                                            <a href="{{ route('menu.status', $sub->id) }}"
                                                                                class="btn btn-danger">Off</a>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center">
                                                                      <a href="{{ route('menu.edit', $sub->id) }}"
                                                                          class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                                      {{-- <a href="{{ route('faqs.show',$sub->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}
                                                                      <button id="delete" class="btn btn-danger btn-sm"
                                                                          onclick="
                                                      event.preventDefault();
                                                      if (confirm('Are you sure? It will delete the data permanently!')) {
                                                          document.getElementById('destroy{{ $sub->id }}').submit()
                                                      }
                                                      ">
                                                                          <i class="fa fa-trash"></i>
                                                                          <form id="destroy{{ $sub->id }}" class="d-none"
                                                                              action="{{ route('menu.destroy', $sub->id) }}"
                                                                              method="POST">
                                                                              @csrf
                                                                              @method('delete')
                                                                          </form>
                                                                      </button>
                                                                  </td>
                                                                  </tr>
                                                              @endforeach
                                                          </tbody>
                                                      </table>
                                                  @else
                                                      Null
                                                  @endif
                                              </td>
                                              <td>
                                                  @if ($menu->page_id)
                                                      {{ $menu->page->title }}
                                                  @else
                                                      Null
                                                  @endif
                                              </td>
                                              <td class="text-center">
                                                @if ($menu->status == 'on')
                                                    <a href="{{ route('menu.status', $menu->id) }}"
                                                        class="btn btn-success">On</a>
                                                @else
                                                    <a href="{{ route('menu.status', $menu->id) }}"
                                                        class="btn btn-danger">Off</a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                              <a href="{{ route('menu.edit', $menu->id) }}"
                                                  class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                              {{-- <a href="{{ route('faqs.show',$menu->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}
                                              <button id="delete" class="btn btn-danger btn-sm"
                                                  onclick="
                              event.preventDefault();
                              if (confirm('Are you sure? It will delete the data permanently!')) {
                                  document.getElementById('destroy{{ $menu->id }}').submit()
                              }
                              ">
                                                  <i class="fa fa-trash"></i>
                                                  <form id="destroy{{ $menu->id }}" class="d-none"
                                                      action="{{ route('menu.destroy', $menu->id) }}"
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
                                          <th>Name</th>
                                          <th>Submenu</th>
                                          <th>Page</th>
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
