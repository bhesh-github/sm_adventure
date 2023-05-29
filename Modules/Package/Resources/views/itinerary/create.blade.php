@extends('setting::layouts.master')

@section('title', 'Create Itinerary')

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
                        <h1>Itinerary</h1>
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
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Create Itinerary</h3>
                                <a href="{{ route('itinerary.index',$package->id) }}" class="btn btn-danger float-right">Back</a>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="product-form" action="{{ route('itinerary.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="package" value="{{ $package->id }}">
                                <div class="card-body">
                                    <div class="input_fields_wrap">
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 mt-2">
                                                    <label for="day">Day</label>
                                                    <input type="number" class="form-control" name="day[]" placeholder="Enter Day" required>
                                                </div>
                                                <div class="col-md-8 mt-2">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" name="title[]" placeholder="Enter Title" required>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description[]" rows="5" placeholder="Enter Description" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="add_field_button btn btn-sm btn-success">Add More Fields</button>
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

    <script>
        $(document).ready(function() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="form-group"><hr><div class="row"><div class="col-md-4 mt-2"><label for="day">Day</label><input type="number" name="day[]" class="form-control" placeholder="Enter Day" required/></div> <div class="col-md-8 mt-2"><label for="title">Title</label><input type="text" name="title[]" class="form-control" placeholder="Enter Title" required/></div><div class="col-md-12 mt-2"><label for="description">Description</label><textarea name="description[]" class="form-control" rows="5" class="form-control" placeholder="Enter Description" required></textarea></div></div><a href="#" class="remove_field btn btn-sm btn-danger mt-4">Remove</a> </div>'
                        ); // add input boxes.
                }
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
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
@endsection
