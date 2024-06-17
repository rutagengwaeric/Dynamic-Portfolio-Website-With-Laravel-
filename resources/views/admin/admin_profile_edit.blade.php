@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile</h4>

                        <form action="#" method="">
                     @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"  id="name" name="name" value="{{ $adminData->name}}">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">

                                    <input class="form-control" type="email" placeholder="email@example.com" name="email" :value="old('email')" required autofocus autocomplete="username" value="{{ $adminData->email}}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="name" name="username" value="{{ $adminData->username}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="profile" class="col-sm-2 col-form-label">Profile Image :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="profile" name="profile_image" value="{{ $adminData->username}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src=" {{ asset('backend/assets/images/small/img-5.jpg') }} " alt="Card image cap">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                  <button class="btn btn-info waves-effect waves-light" type="submit">Update Profile</button>
                                </div>
                            </div>


                        </form>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
