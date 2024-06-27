@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home Slide Page</h4>

                            <form action="{{ route('update.slider')}}" method="post"  enctype="multipart/form-data">
                                @csrf

                                <input  type="hidden" id="id" name="id" value="{{ $homeslide->id }}">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Title :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="title" name="title" :value="old('title')"
                                            value="{{ $homeslide->title }}">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">

                                        <input class="form-control" type="text" placeholder=""
                                            name="short_title" :value="old('short_title')" required autofocus autocomplete="username"
                                            value="{{  $homeslide->short_title }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="video_url" class="col-sm-2 col-form-label">Video Url :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="video_url" name="video_url"
                                            value="{{ $homeslide->video_url}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profile" class="col-sm-2 col-form-label">Home Slide Image :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="home_slide"
                                            value="{{ $homeslide->home_slide }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src=" {{ $homeslide->home_slide ? asset($homeslide->home_slide) :  asset('upload/no_image.jpg')}} "
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

