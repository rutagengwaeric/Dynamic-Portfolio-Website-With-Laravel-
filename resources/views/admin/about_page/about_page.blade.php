@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">About Page</h4>

                            <form action=" {{ route('update.about')  }}" method="post"  enctype="multipart/form-data">
                                @csrf

                                <input  type="hidden" id="id" name="id" value="{{ $aboutData->id }}">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Title :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="title" name="title" :value="old('title')"
                                            value="{{ $aboutData->title  }}">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">

                                        <input class="form-control" type="text" placeholder=""
                                            name="short_title" :value="old('short_title')" required autofocus autocomplete="username"
                                            value="{{ $aboutData->short_title }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="video_url" class="col-sm-2 col-form-label">Short Description :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="short_description" name="short_description"
                                            value="{{  $aboutData->short_description }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="video_url" class="col-sm-2 col-form-label">Long Description :</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="long_description">

                                            {{  $aboutData->long_description }}

                                    </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profile" class="col-sm-2 col-form-label">About Image :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="about_image"
                                            value="{{ $aboutData->about_image }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src=" {{ $aboutData->about_image ? asset($aboutData->about_image) :  asset('upload/no_image.jpg')}} "
                                            alt="Card image cap">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-info waves-effect waves-light" type="submit">Update
                                            Slide</button>
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

