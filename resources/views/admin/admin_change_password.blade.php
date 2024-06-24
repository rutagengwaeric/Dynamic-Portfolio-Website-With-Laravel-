
@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password </h4> <br><br>

                            {{-- @if (count($errors))

                               @foreach ($errors->all() as $error )
                                    <div class="alert alert-danger alert-dismissible fade show">{{ $error }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                               @endforeach

                            @endif --}}
                            <form action="{{ route('update.password')}}" method="post" >
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Old Password :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="oldpassword" name="oldpassword"
                                            value="">
                                            @if($errors->has('oldpassword'))
                                            <span style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{$errors->first('oldpassword')}}</span>
                                            @endif
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">New Password :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="newpassword" name="newpassword"
                                            value="">
                                            @if($errors->has('newpassword'))
                                            <span style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{$errors->first('newpassword')}}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Confirm Password :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="confirm_password" name="confirm_password"
                                            value="">
                                            @if($errors->has('confirm_password'))
                                            <span style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{$errors->first('confirm_password')}}</span>
                                            @endif
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-info waves-effect waves-light" type="submit">Update
                                            Password</button>
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

