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

                            <form action=" {{ route('store.blog.category')  }}" method="post">
                                @csrf

                                {{-- <input  type="hidden" id="id" name="id" value="{{ $aboutData->id }}"> --}}
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Blog Category Name :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="blog_category" name="blog_category" :value="old('blog_category')""
                                            value=" ">
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

