@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Blog Category</h4> <br><br>

                            <form  id="myForm" action=" {{ route('store.blog.category')  }}" method="post" >
                                @csrf


                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Blog Category Name :</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" id="blog_category" name="blog_category" :value="old('blog_category')"
                                            >
                                            @if($errors->has('blog_category'))
                                            <span style="color: red; font-size:12px; margin-left:8px; margin-top:3px;">{{$errors->first('blog_category')}}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-info waves-effect waves-light" type="submit">Save
                                            Save Blog Category</button>
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
       $('#myForm').validate({
           rules: {
               blog_category: {
                   required: true,
               },
           },
           messages: {
               blog_category: {
                   required: 'Please Enter Blog Category Name',
               },
           },
           errorElement: 'span',
           errorPlacement: function(error, element) {
               error.addClass('invalid-feedback');
               element.closest('.form-group').append(error);
           },
           highlight: function(element, errorClass, validClass) {
               $(element).addClass('is-invalid');
           },
           unhighlight: function(element, errorClass, validClass) {
               $(element).removeClass('is-invalid');
           }
       })
    })



    </script>


@endsection

