@extends('backend.template.default')
@section('title', '| category')
@section('body')
    <div class="content">
        <div class="container-fluid">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="#">category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">({{\App\Models\Category::count()}})</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addModal">add</button>
                    <div  class="modal  fade pt-5" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Creat category</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <ul class="pl-3 text-center list-unstyled" id="saveform_errList"></ul>
                                    <div class="text-center" id="success_message"></div>



                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-6 text-left">
                                            <div class="form-group">
                                                <strong>Category name</strong>
                                                <input type="text" name="name"  id="name" class="name form-control" placeholder="supplier name" >

                                            </div>

                                        </div>



                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                            <button type="submit" class="add_category btn btn-primary">Save</button>
                                        </div>
                                    </div>




                                </div>

                            </div>




                        </div>

                    </div>

                </div>
                <div class="col-md-12">
                    <div class="card data-tables">
                        <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S/n</th>
                                        <th>Name</th>

                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button"   class="edit_post btn btn-primary" ><i class="fa fa-edit"></i></button>
                                            <button type="button"   class="delete_post btn btn-primary" ><i class="fa fa-trash"></i></button>
                                        </td>


                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--edit modal --}}
        <div  class="modal  fade pt-5" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">

            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <ul class="pl-3 text-center list-unstyled" id="saveform_errList"></ul>
                        <div class="text-center" id="success_message"></div>



                        <div class="row">
                            <input type="hidden" id="edit_post_id">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                <div class="form-group">
                                    <strong>category name</strong>
                                    <input type="text" name="name"  id="edit_name" class="name form-control" placeholder="supplier name" >

                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                <button type="submit" class="update_category btn btn-primary">Update</button>
                            </div>
                        </div>




                    </div>

                </div>




            </div>
        </div>
        {{--delete modal--}}
        <div  class="modal  fade pt-5" id="example2Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-small">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Post</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <input type="hidden" id="delete_post_id">

                        <h4>are you sure want to delete this data</h4>
                    </div>

                    <div class="modal-footer tex">
                        <button type="submit" class="add_post btn btn-outline-secondary" data-dismiss="modal">close</button>
                        <button type="submit" class="delete_post_btn btn btn-primary delete_post_btn">yes delete</button>

                    </div>



                </div>




            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            fetchCategory();
            function  fetchCategory() {
                $.ajax({
                    type: "GET",
                    url:"/fetch-category/",
                    dataType:"json",
                    success: function (response) {
                        // console.log(response.posts);

                        $('tbody').html("");
                        $.each(response.category, function (key, item){
                            $('tbody').append('<tr>\
                                            <td>'+item.id+'</td>\
                                           <td>'+item.name+'</td>\
                                            <td><button type="button"  value="'+item.id+'" class="edit_category btn btn-primary" ><i class="fa fa-edit">edit</i></button></td>\
                                              <td><button type="button" value="'+item.id+'"  class="delete_post btn btn-danger" ><i class="fa fa-trash">delete</i></button></td>\
                                            </tr>');
                        });
                    }
                })
            }

            {{--delete--}}
            $(document).on('click', '.delete_post', function (e){
                e.preventDefault();

                var post_id  = $(this).val();
                // alert(post_id);

                $('#delete_post_id').val(post_id);

                $('#example2Modal').modal("show");

            });
            $(document).on('click', '.delete_post_btn', function (e){
                e.preventDefault();


                var post_id  = $('#delete_post_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url:"/delete-category/"+post_id,
                    success: function (response){
                        // console.log(response);
                        $('#success_message').addClass("alert  alert_success");
                        $('#success_message').text("response.message");
                        $('#example2Modal').modal("hide");
                        $('.delete_post_btn').text("yes Delete");
                        fetchCategory();
                    }

                });

            });

            {{--edit--}}
            $(document).on('click', '.edit_category', function (e){
                e.preventDefault();
                let post_id  = $(this).val();
                // console.log(post_id);
                $('#editModal').modal("show");
                $.ajax({
                    type: "GET",
                    url:"/edit-category/"+post_id,

                    success: function (response) {
                        console.log(response);
                        if (response.status == 404){
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);

                        }
                        else{
                            $("#edit_name").val(response.category.name);
                            $("#edit_post_id").val(post_id);
                        }

                    }
                });


            });
            {{--update--}}
            $(document).on('click', '.update_category', function (e){
                e.preventDefault();

                let post_id  = $('#edit_post_id').val();
                var data = {
                    'name' : $('#edit_name').val(),

                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url:"/update-category/"+post_id,
                    data:data,
                    dataType:"json",


                    success: function (response){
                        // console.log(response);
                        if (response.status == 400)
                        {
                            $('#updateform_errList').html("");
                            $('#updateform_errList').addClass("alert  alert-danger");
                            $.each(response.errors, function (key, err_value) {
                                $('#updateform_errList').append('<li>'+err_value+'</li>');
                            })
                        }
                        else{
                            $('#updateform_errList').html("");
                            $('#success_message').addClass("alert  alert-success");
                            $('#success_message').text("response.message");
                            $('#editModal').modal("hide");
                            fetchCategory();
                        }

                    }
                });

            });


            {{--add post--}}


            $(document).on('click', '.add_category', function (e){
                e.preventDefault();
                // console.log('click');
                var data = {
                    'name' : $('.name').val(),

                }
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url:"/post-category/",
                    data:data,
                    dataType:"json",

                    success: function (response){
                        // console.log(response);
                        if (response.status == 400)
                        {
                            $('#saveform_errList').html("");
                            $('#saveform_errList').addClass("alert  alert-danger");
                            $.each(response.errors, function (key, err_value) {
                                $('#saveform_errList').append('<li>'+err_value+'</li>');
                            })
                        }
                        else{
                            $('#saveform_errList').html("");
                            $('#success_message').addClass("alert  alert-success");
                            $('#success_message').text(response.message);
                            $('#addModal').modal("hide");
                            $('#addModal').find("input").val("");
                            fetchCategory();
                        }

                    }
                })
            });


        });
    </script>
@endsection
