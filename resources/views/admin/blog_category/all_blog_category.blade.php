


@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All blog Category</h4>
                              <br>

                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 141.333px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">Sl</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 218.333px;"
                                                        aria-label="Position: activate to sort column ascending"> Blog Category
                                                    </th>


                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 218.333px;"
                                                        aria-label="Position: activate to sort column ascending"> Action
                                                    </th>

                                                </tr>
                                            </thead>


                                            <tbody>

                                                @foreach ($blogCategory as $key => $item)
                                                <tr role="row" class="even">
                                                    <td class="sorting_1 dtr-control"> {{ $key+1 }} </td>

                                                    <td class="sorting_1 dtr-control"> {{ $item->blog_category }} </td>

                                                    <td>


                                                        <a href=" {{ route('edit.blog.category', $item->id) }} " class="btn btn-info sm" title="Edit Data" id="edit"><i class="fas fa-edit"> </i></a>
                                                        &nbsp;
                                                        &nbsp;
                                                        &nbsp;

                                                        <a href=" {{ route('delete.blog.category' ,$item->id)}}   " class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
