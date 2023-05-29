@extends('setting::layouts.master')

@section('title', 'Gallery')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Gallery</li>
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
                                <h2 class="card-title float-left">{{ $gallery->name }}</h2>
                                <h3 class="card-title float-right"><a class="btn btn-danger text-white"
                                        href="{{ route('gallery.index') }}">Back</a> </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('gallery.images.store', $gallery->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="images">Upload Image</label><br>
                                                    <input id="fileupload" type="file" name="images[]"
                                                        multiple="multiple" required/>
                                                    @error('images')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                    <hr />
                                                    <b>Live Preview</b>
                                                    <br />
                                                    <br />
                                                    <div id="dvPreview">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Bootstrap Switch -->
                                                <div class="card card-secondary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Publish</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <input type="checkbox" name="status" checked data-bootstrap-switch
                                                            data-off-color="danger" data-on-color="success">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($galleries as $value)
                        <div class="col-md-3 col-sm-12 mt-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('upload/images/gallery/' . $value['image']) }}"
                                    alt="Card image cap" height="200px" width="auto">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <button id="delete" class="btn btn-danger btn-sm"
                                                        onclick="
                                    event.preventDefault();
                                    if (confirm('Are you sure? It will delete the data permanently!')) {
                                        document.getElementById('destroy{{ $value->id }}').submit()
                                    }
                                    ">
                                                        <i class="fa fa-trash"></i>
                                                        <form id="destroy{{ $value->id }}" class="d-none"
                                                            action="{{ route('gallery.images.destroy', [$value->gallery_id, $value->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </button>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            @if ($value->status == 'on')
                                                <a href="{{ route('gallery.images.status', $value->id) }}"
                                                    class="btn btn-success"
                                                    onclick="return confirm('Are you sure want to continue?')">On</a>
                                            @else
                                                <a href="{{ route('gallery.images.status', $value->id) }}"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure want to continue?')">Off</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script language="javascript" type="text/javascript">
        window.onload = function() {
            var fileUpload = document.getElementById("fileupload");
            fileUpload.onchange = function() {
                if (typeof(FileReader) != "undefined") {
                    var dvPreview = document.getElementById("dvPreview");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp|.webp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var img = document.createElement("IMG");
                                img.height = "100";
                                img.width = "100";
                                img.src = e.target.result;
                                dvPreview.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            }
        };
    </script>
@endsection
