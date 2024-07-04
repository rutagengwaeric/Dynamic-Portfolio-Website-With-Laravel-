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

                            <h4 class="card-title">Edit Footer Page</h4> <br><br>

                            <form action="{{ route('update.footer') }}" method="post" >
                                @csrf

                                <input  type="hidden" id="id" name="id" value="{{ $footerData->id }}">


                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="number" class="col-sm-2 col-form-label">Number  :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="number" name="number"
                                            :value="old('number')" value=" {{ $footerData->number }} ">
                                        @if ($errors->has('number'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('number') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Blog Description" class="col-sm-2 col-form-label">Short Description :</label>
                                    <div class="col-sm-10">

                                        <textarea id="textarea" name="short_description" class="form-control" maxlength="225" rows="3" > {{ $footerData->short_description }} </textarea>
                                        @if ($errors->has('short_description'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('short_description') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="Address" class="col-sm-2 col-form-label">Address   :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="address" name="address"
                                            :value="old('address')" value=" {{ $footerData->address }} ">
                                        @if ($errors->has('address'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="Email" class="col-sm-2 col-form-label">Email   :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" id="email" name="email"
                                            :value="old('email')" value=" {{ $footerData->email }} ">
                                        @if ($errors->has('email'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="Facebook" class="col-sm-2 col-form-label">Facebook   :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="facebook" name="facebook"
                                            :value="old('facebook')" value=" {{ $footerData->facebook }} ">
                                        @if ($errors->has('facebook'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="Facebook" class="col-sm-2 col-form-label">Twitter   :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="twitter" name="twitter"
                                            :value="old('twitter')" value=" {{ $footerData->twitter }} ">
                                        @if ($errors->has('twitter'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('twitter') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="Facebook" class="col-sm-2 col-form-label">Copyright   :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="copyright" name="copyright"
                                            :value="old('copyright')" value=" {{ $footerData->copyright }} ">
                                        @if ($errors->has('copyright'))
                                            <span
                                                style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{ $errors->first('copyright') }}</span>
                                        @endif
                                    </div>
                                </div>





                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-info waves-effect waves-light" type="submit"> Update
                                            Footer Data</button>
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
