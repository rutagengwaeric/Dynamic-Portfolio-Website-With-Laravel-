@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Portifolio Page</h4>

                            <form action=" {{ route('store.portfolio')  }}" method="post"  enctype="multipart/form-data">
                                @csrf

                                {{-- <input  type="hidden" id="id" name="id" value="{{ $aboutData->id }}"> --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Portfolio Name :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="portfolio_name" name="portfolio_name" :value="old('portfolio_name')"
                                            value=" ">
                                            @if($errors->has('portfolio_name'))
                                            <span style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{$errors->first('portfolio_name')}}</span>
                                            @endif
                                    </div>
                                </div>

                                 <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Portfolio Title :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="portfolio_title" name="portfolio_title" :value="old('portfolio_title')"
                                            value=" ">
                                            @if($errors->has('portfolio_title'))
                                            <span style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{$errors->first('portfolio_title')}}</span>
                                            @endif
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="video_url" class="col-sm-2 col-form-label">Portfolio Description :</label>
                                    <div class="col-sm-10">

                                        <textarea id="elm1" name="portfolio_description"> </textarea>
                                        @if($errors->has('portfolio_description'))
                                        <span style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{$errors->first('portfolio_description')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profile" class="col-sm-2 col-form-label">Portfolio Image :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="portfolio_image"
                                            value="">
                                            @if($errors->has('portfolio_image'))
                                            <span style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{$errors->first('portfolio_image')}}</span>
                                            @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ asset('upload/no_image.jpg')}} "
                                            alt="Card image cap">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-info waves-effect waves-light" type="submit">Save
                                            Portifolio Data</button>
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

