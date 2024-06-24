@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
                    <center>
                        <img class="rounded-circle avatar-xl" src="  {{ $adminData->profile_image ? asset('upload/admin_images/'.$adminData->profile_image) :  asset('upload/no_image.jpg')}} " alt="Card image cap">
                    </center>

                    <div class="card-body">
                        <h4 class="card-title">Name :  {{ $adminData->name}} </h4>
                        <hr>
                        <h4 class="card-title">Email :  {{ $adminData->email }} </h4>
                        <hr>
                        <h4 class="card-title">Username :  {{ $adminData->username }} </h4>
                        <hr>
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>

                        <a href="{{ route('edit.profile')}}" > <button class="btn btn-info waves-effect waves-light">Edit Profile</button></a>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>




@endsection
