@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #b70000;
            font-weight: 700px;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Blog Page</h4> <br><br>

                            <form action=" {{ route('store.blog') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                {{-- <input  type="hidden" id="id" name="id" value="{{ $aboutData->id }}"> --}}
                                <div class="row mb-3">
                                    <label for="Blog Category" class="col-sm-2 col-form-label">Blog Category :</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example"
                                            name="blog_category_id">
                                            <option selected="">Select Blog Category</option>
                                            @foreach ($categories as $item)
                                            <option value=" {{ $item->id }}">{{ $item->blog_category }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('blog_category_id'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('blog_category_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Blog Title :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="blog_title" name="blog_title"
                                            :value="old('blog_title')" value=" ">
                                        @if ($errors->has('blog_title'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('blog_title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Blog Tags :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="blog_tags" name="blog_tags"
                                            data-role="tagsinput"
                                            :value="old('blog_tags')" value="">
                                        @if ($errors->has('blog_tag'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('blog_tags') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="Blog Description" class="col-sm-2 col-form-label">Blog Description :</label>
                                    <div class="col-sm-10">

                                        <textarea id="elm1" name="blog_description"> </textarea>
                                        @if ($errors->has('blog_description'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('blog_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profile" class="col-sm-2 col-form-label">Blog Image :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="blog_image"
                                            value="">
                                        @if ($errors->has('blog_image'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('blog_image') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ asset('upload/no_image.jpg') }} " alt="Card image cap">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-info waves-effect waves-light" type="submit">Save
                                            Blog Data</button>
                                    </div>
                                </div>


                            </form>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
