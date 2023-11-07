@extends('admin.master.master')
<!-- Content Wrapper. Contains page content -->

@section('title', 'Create Page')

@section('head')
    <link rel="stylesheet" href="{{asset('admin/adminLTE/plugins/summernote/summernote-bs4.css')}}">

    <link rel="stylesheet" href="{{asset('admin/adminLTE/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <style>
        .note-editable.card-block{
            height:530px;
        }
        .select2-container .select2-selection--single{
            height: auto;
        }
    </style>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="text-center">Create New Page</h1>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" style="color: #6c757d"> <i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Page</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form role="form" action="{{route('insert.page')}}" method="post" enctype="multipart/form-data" style="width: 100%">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card card-outline card-info">

                                <!-- /.card-header -->
                                <div class="card-body pad">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Page Title</label>
                                        <input type="text" required class="form-control" name="title" placeholder="Enter Page Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sub Title</label>
                                        <input type="text" required class="form-control" name="short_title" placeholder="Enter Page Sub Title">
                                    </div>

                                    {{--<div class="form-group">--}}
                                    {{--<label for="exampleInputPassword1">Slug</label>--}}
                                    {{--<input type="text"  class="form-control" name="slug" placeholder="Enter Slug Name">--}}
                                    {{--</div>--}}

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Page Content </label>
                                        <textarea class="textarea" name="content"  placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>

                                    <div class="form-group add-more-content">
                                        <a style="cursor:pointer" id="add-more-content">Add more content</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Page Media</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    {{--                                    <div class="row">--}}
                                    {{--                                        <div class="col-sm-12">--}}
                                    {{--                                            <div class="form-group">--}}
                                    {{--                                                <label>Page Image</label>--}}
                                    {{--                                                <div class="input-group mb-3">--}}
                                    {{--                                                    <input type="text"  class="form-control" name="image" id="imgfield" placeholder="Click To Choose\Upload Image">--}}
                                    {{--                                                    <div class="input-group-append">--}}
                                    {{--                                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager0" href="javascript:;" data-toggle="modal">--}}
                                    {{--                                                            <i class="far fa-image"></i>--}}
                                    {{--                                                        </button>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Banner Image</label>
                                                <div class="input-group mb-3">
                                                    <input type="text"  class="form-control" name="image" id="imgfield" placeholder="Click To Choose\Upload Image">
                                                    <div class="input-group-append">
                                                        <button data-select2-open="single-append-text" type="button"
                                                                class="btn btn-default open-filemanager">
                                                            <i class="far fa-image"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Featured Image</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="featured_image"
                                                           id="imgfield1" placeholder="Click To Choose\Upload Image">
                                                    <div class="input-group-append">
                                                        <button data-select2-open="single-append-text" type="button"
                                                                class="btn btn-default open-filemanager">

                                                            <i class="far fa-image"></i>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Other Images</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="other_imagess[]"
                                                           id="imgfield2" placeholder="Click To Choose\Upload Image">
                                                    <div class="input-group-append">
                                                        <button data-select2-open="single-append-text" type="button"
                                                                class="btn btn-default open-filemanager">
                                                            <i class="far fa-image"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="other_imagess[]"
                                                           id="imgfield3" placeholder="Click To Choose\Upload Image">
                                                    <div class="input-group-append">
                                                        <button data-select2-open="single-append-text" type="button"
                                                                class="btn btn-default open-filemanager">
                                                            <i class="far fa-image"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Page Template</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Template</label>
                                                <select class="form-control select2" required name="template" style="width: 100%;">
                                                    <option value="" selected="selected">Select Template</option>
                                                    @foreach($templates as $key => $template)
                                                        <option value="{{$key}}">{{$template}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" required name="status" style="width: 100%;">
                                                    <option value="" selected="selected">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">In Active</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">SEO (Optional)</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <input type="text" name="mata_title" class="form-control" placeholder="Enter Meta Title">
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Keywords</label>
                                                <textarea name="mata_keywords" placeholder="Place Meta Keywords"
                                                          style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <textarea name="meta_description" placeholder="Place Meta Description"
                                                          style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mbtm30">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success" style="width: 250px;">Submit</button>
                        </div>
                    </div>
                </form>

                <!-- /.col-->

            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <div class="modal fade mymodal" id="fileManager0">

        <div class="modal-dialog" style="max-width: 65% !important;">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute;right: 20px;font-size: 35px;">&times;</button>

                    <h4 class="modal-title">File Manager</h4>

                </div>

                <div class="modal-body" style="padding:0px; margin:0px;">

                    <iframe width="100%" height="500" src="@filemanager_get_resource(dialog.php)?field_id=imgfield&type=2&relative_url=1&lang=en_EN&akey=@filemanager_get_key()" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('admin/adminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('admin/adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>

    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()

            //Initialize Select2 Elements
            $('.select2').select2()
        });
        $(document).on('click', '.open-filemanager', function (e) {
            var field = $(this).parents('.input-group:eq(0)').find('input').attr('id');
            $('#fileManager0').find('iframe').attr('src', '@filemanager_get_resource(dialog.php)?field_id=' + field + '&type=2&relative_url=1&lang=en_EN&akey=@filemanager_get_key()')
            $('#fileManager0').modal('show');
        })

    </script>
@endsection
