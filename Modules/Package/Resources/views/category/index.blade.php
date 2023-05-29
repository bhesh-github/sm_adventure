@extends('setting::layouts.master')

@section('title', 'Create Category')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Sub Categories</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>
                                                @if ($value->subcategories->count() > 0)
                                                    <table>
                                                        <thead>
                                                            <th>SN</th>
                                                            <th>Name</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($value->subcategories as $sub)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $sub->name }}</td>
                                                                    <td class="text-center">
                                                                        @if ($sub->status == 'on')
                                                                            <a href="{{ route('category.status', $sub->id) }}"
                                                                                class="btn btn-success btn-sm">On</a>
                                                                        @else
                                                                            <a href="{{ route('category.status', $sub->id) }}"
                                                                                class="btn btn-danger btn-sm">Off</a>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button"
                                                                            class="btn btn-primary btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#subcategory{{ $loop->iteration }}">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade"
                                                                            id="subcategory{{ $loop->iteration }}"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="subcategoryLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="subcategoryLabel">Edit
                                                                                            Sub-Category
                                                                                        </h5>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form id="product-form"
                                                                                            action="{{ route('category.update', $sub->id) }}"
                                                                                            method="POST"
                                                                                            enctype="multipart/form-data">
                                                                                            @method('PUT')
                                                                                            @csrf
                                                                                            <div
                                                                                                class="card-body text-left">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label
                                                                                                                for="name">Name</label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                name="name"
                                                                                                                class="form-control"
                                                                                                                placeholder="Enter Name "
                                                                                                                value="{{ $sub->name }}"
                                                                                                                required>
                                                                                                            @error('name')
                                                                                                                <p
                                                                                                                    style="color: red">
                                                                                                                    {{ $message }}
                                                                                                                </p>
                                                                                                            @enderror
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-12">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label
                                                                                                                for="parent">Parent
                                                                                                                Category</label>
                                                                                                            <select
                                                                                                                type="text"
                                                                                                                name="parent"
                                                                                                                class="form-control"
                                                                                                                placeholder="Enter Description">
                                                                                                                <option
                                                                                                                    value="">
                                                                                                                    Select
                                                                                                                    Parent
                                                                                                                    Category
                                                                                                                </option>
                                                                                                                @foreach ($categories as $category)
                                                                                                                    <option
                                                                                                                        value="{{ $category->id }}"
                                                                                                                        {{ $category->id == $sub->parent_id ? 'selected' : '' }}>
                                                                                                                        {{ $category->name }}
                                                                                                                    </option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                            @error('parent')
                                                                                                                <p
                                                                                                                    style="color: red">
                                                                                                                    {{ $message }}
                                                                                                                </p>
                                                                                                            @enderror
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.card-body -->

                                                                                            <div
                                                                                                class="card-footer text-center">
                                                                                                <button type="submit"
                                                                                                    class="btn btn-primary">Update</button>
                                                                                            </div>
                                                                                        </form>
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
                                                                            <form id="destroy{{ $value->id }}"
                                                                                class="d-none"
                                                                                action="{{ route('category.destroy', $value->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('delete')
                                                                            </form>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4">Null</td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                @else
                                                    NULL
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($value->status == 'on')
                                                    <a href="{{ route('category.status', $value->id) }}"
                                                        class="btn btn-success">On</a>
                                                @else
                                                    <a href="{{ route('category.status', $value->id) }}"
                                                        class="btn btn-danger">Off</a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#category{{ $loop->iteration }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="category{{ $loop->iteration }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="categoryLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="categoryLabel">Edit Category
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="product-form"
                                                                    action="{{ route('category.update',$value->id) }}" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="card-body text-left">
                                                                        <div class="form-row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="name">Name</label>
                                                                                    <input type="text" name="name"
                                                                                        class="form-control"
                                                                                        placeholder="Enter Name "
                                                                                        value="{{ $value->name }}"
                                                                                        required>
                                                                                    @error('name')
                                                                                        <p style="color: red">
                                                                                            {{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="parent">Parent
                                                                                        Category</label>
                                                                                    <select type="text" name="parent"
                                                                                        class="form-control"
                                                                                        placeholder="Enter Description">
                                                                                        <option value="">Select
                                                                                            Parent
                                                                                            Category</option>
                                                                                        @foreach ($categories as $category)
                                                                                            <option
                                                                                                value="{{ $category->id }}"
                                                                                                {{ $category->id == $value->parent_id ? 'selected' : '' }}>
                                                                                                {{ $category->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('parent')
                                                                                        <p style="color: red">
                                                                                            {{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-body -->

                                                                    <div class="card-footer text-center">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
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
                                                        action="{{ route('category.destroy', $value->id) }}"
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
                                        <th class="text-center">Sub Categories</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-4">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Create Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="product-form" action="{{ route('category.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter Name " value="{{ old('name') }}" required>
                                                @error('name')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="parent">Parent Category</label>
                                                <select type="text" name="parent" class="form-control"
                                                    placeholder="Enter Description">
                                                    <option value="">Select Parent Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('parent')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
