@extends('setting::layouts.master')

@section('title', 'Create Package')

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css">
    <script src="https://unpkg.com/@yaireo/tagify"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Package</h1>
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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Package</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="product-form" action="{{ route('packages.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter Name " value="{{ old('name') }}" required>
                                                @error('name')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="" disabled selected>Select Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ ($category->id==old('category'))?'selected':'' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Thumbnail">Thumbnail </label>

                                                <input type="file" id="file-ip-1" accept="image/*"
                                                    class="form-control-file border" value="{{ old('thumbnail') }}"
                                                    onchange="showPreview1(event);" name="thumbnail" required>
                                                @error('thumbnail')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                                <div class="preview mt-2">
                                                    <img src="" id="file-ip-1-preview" width="200px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="images">Upload Images</label><br>
                                                <input id="fileupload" type="file" name="images[]" multiple="multiple"/>
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
                                            <div class="form-group">
                                                <label for="video">Video</label>
                                                <input type="text" name="video" class="form-control"
                                                    placeholder="Enter Embbed Video Link" value="{{ old('video') }}">
                                                @error('video')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="map">Map</label>
                                                <input type="text" name="map" class="form-control"
                                                    placeholder="Enter Embbed Map" value="{{ old('map') }}">
                                                @error('map')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="duration">Duration</label>
                                                <input type="text" name="duration" class="form-control"
                                                    placeholder="Enter Duration" value="{{ old('duration') }}">
                                                @error('duration')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="adult_price">Adult Price</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rs</span>
                                                    </div>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter Adult Price" name="adult_price"
                                                        value="{{ old('adult_price') }}">
                                                </div>
                                                @error('adult_price')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="children_price">Children Price</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rs</span>
                                                    </div>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter Children Price" name="children_price"
                                                        value="{{ old('children_price') }}">
                                                </div>
                                                @error('children_price')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="infant_price">Infant Price</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rs</span>
                                                    </div>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter Infant Price" name="infant_price"
                                                        value="{{ old('infant_price') }}">
                                                </div>
                                                @error('infant_price')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" name="description" class="summernote" placeholder="Enter Description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="included_excluded">Included/Excluded</label>
                                                <textarea type="text" name="included_excluded" class="summernote" placeholder="Enter Included Excluded">{{ old('included_excluded') }}</textarea>
                                                @error('included_excluded')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- general form elements -->
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h3 class="card-title">SEO - Social Engine Optimization</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="meta_title">Meta Title</label>
                                                                <input type="text" name="meta_title" class="form-control"
                                                                    placeholder="Enter Meta Title " value="{{ old('meta_title') }}"">
                                                                @error('meta_title')
                                                                    <p style="color: red">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="meta_description">Meta Description</label>
                                                                <textarea name="meta_description" class="form-control" placeholder="Enter Meta Description " value="">{{ old('meta_description') }}</textarea>
                                                                @error('meta_description')
                                                                    <p style="color: red">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="meta_keywords">Meta Keywords</label>
                                                                <textarea name='meta_keywords' placeholder='Meta Keywords' class="form-control">{{ old('meta_keywords') }}</textarea>
                                                                @error('meta_keywords')
                                                                    <p style="color: red">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                
                                            <!-- /.card -->
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
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
@section('script')

    <!-- image preview -->
    <script type="text/javascript">
        function showPreview1(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
    <script>
        $('textarea.summernote').summernote({
            placeholder: 'Enter Description',
            tabsize: 2,
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });
    </script>

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
    <script>
        var input1 = document.querySelector('input[name=tags]'),
            input2 = document.querySelector('textarea[name=meta_keywords]'),
            // init Tagify script on the above inputs
            tagify2 = new Tagify(input2, {
                enforeWhitelist: true,
                // whitelist: ["hello"
                // ]
            });

        // toggle Tagify on/off
        document.querySelector('input[type=checkbox]').addEventListener('change', function() {
            document.body.classList[this.checked ? 'add' : 'remove']('disabled');
        })
    </script>
@endsection
