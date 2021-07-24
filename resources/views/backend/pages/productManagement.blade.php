@extends('backend.template.default')
@section('title', '| product')
@section('body')
    <div class="content">
        <div class="container-fluid">
            <h4>create product</h4>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addModal">add</button>
                    <div  class="modal  fade pt-5" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Creat product</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <ul class="pl-3 text-center list-unstyled" id="saveform_errList"></ul>
                                    <div class="text-center" id="success_message"></div>



                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-6 text-left ">
                                            <div class="form-group">
                                                <strong>Product name</strong>
                                                <input type="text" name="name"   id="name" class="name form-control " placeholder="supplier name" >

                                            </div>

                                        </div>

                                            <div class="col-xs-12 col-sm-12 col-md-6 text-left">
                                                <div class="form-group">
                                                    <strong>Category</strong>
                                                    @php
                                                    $categories = \App\Models\Category::all();
                                                    @endphp
                                                    <select name="categories_id" id="categories_id" class="categories_id selectpicker" data-title="Single Category" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                       @forelse($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @empty
                                                            <option value="id">no category</option>
                                                        @endforelse
                                                    </select>

                                                </div>
                                            </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 text-left">
                                            <div class="form-group">
                                                @php
                                                $units = \App\Models\Unit::all();
                                                @endphp
                                                <strong>Unit</strong>
                                                <select name="unit_id" id="units_id" class=" selectpicker" data-title="Single Unit" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                   @forelse($units as $unit)
                                                    <option value="{{{$unit->id}}}">{{$unit->name}}</option>
                                                    @empty
                                                        <option value="">no unit</option>

                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 text-left">
                                            <div class="form-group">
                                                @php
                                                $suppliers = \App\Models\Supplier::all();
                                                @endphp
                                                <strong>Supplier</strong>
                                                <select name="suppliers_id" id="suppliers_id" class="suppliers_id selectpicker" data-title="Single Select" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                    @forelse($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                    @empty
                                                        <option value="is">no supplier</option>

                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                            <button type="submit" class="add_product btn btn-primary">Save</button>
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
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><button type="button"   class="edit_post btn btn-primary" ><i class="fa fa-edit"></i></button></td>
                                        <td><button type="button"   class="delete_post btn btn-primary" ><i class="fa fa-trash"></i></button></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            fetchproduct();
            function  fetchproduct() {
                $.ajax({
                    type: "GET",
                    url:"/fetch-product/",
                    dataType:"json",
                    success: function (response) {
                        // console.log(response.posts);

                        $('tbody').html("");
                        $.each(response.products, function (key, item){
                            $('tbody').append('<tr>\
                                            <td>'+item.id+'</td>\
                                           <td>'+item.name+'</td>\
                                           <td>'+item.suppliers_id+'</td>\
                                           <td>'+item.units_id+'</td>\
                                           <td>'+item.categories_id+'</td>\
                                            <td><button type="button"  value="'+item.id+'" class="edit_post btn btn-primary" ><i class="fa fa-edit">edit</i></button></td>\
                                              <td><button type="button" value="'+item.id+'"  class="delete_post btn btn-danger" ><i class="fa fa-trash">delete</i></button></td>\
                                            </tr>');
                        });
                    }
                })
            }


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
                    url:"/post/"+post_id,
                    success: function (response){
                        // console.log(response);
                        $('#success_message').addClass("alert  alert_success");
                        $('#success_message').text("response.message");
                        $('#example2Modal').modal("hide");
                        $('.delete_post_btn').text("yes Delete");
                        fetchpost();
                    }

                });

            });

            $(document).on('click', '.edit_post', function (e){
                e.preventDefault();
                let post_id  = $(this).val();
                // console.log(post_id);
                $('#example3Modal').modal("show");
                $.ajax({
                    type: "GET",
                    url:"/edit-post/"+post_id,

                    success: function (response) {
                        console.log(response);
                        if (response.status == 404){
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);

                        }
                        else{
                            $("#edit_title").val(response.post.title);
                            $("#edit_slug").val(response.post.slug);
                            $("#edit_category_id").val(response.post.category_id);
                            $("#edit_name").val(response.post.name);
                            $("#edit_body").val(response.post.body);
                            $("#image").val(response.post.image);
                            $("#edit_post_id").val(post_id);
                        }

                    }
                });


            });

            $(document).on('click', '.update_post', function (e){
                e.preventDefault();

                let post_id  = $('#edit_post_id').val();
                var data = {
                    'title' : $('#edit_title').val(),
                    'slug' : $('#edit_slug').val(),
                    'tag' : $('#edit_tag').val(),
                    'image' : $('#image').val(),
                    'category_id' : $('#edit_category_id').val(),
                    'body' : $('#edit_body').val(),

                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url:"/update-post/"+post_id,
                    data:data,
                    dataType:"json",
                    datType: "image/jpeg",

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
                            $('#example3Modal').modal("hide");
                            fetchpost();
                        }

                    }
                });

            });


         // add product


            $(document).on('click', '.add_product', function (e){
                e.preventDefault();
                // console.log('click');
                var data = {
                    'name' : $('.name').val(),
                    'suppliers_id' : $('#suppliers_id').val(),
                    'units_id' : $('#units_id').val(),
                    'categories_id' : $('#categories_id').val(),
                }
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url:"/post-product/",
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
                            fetchproduct();
                        }

                    }
                })
            });


        });
    </script>
@endsection
