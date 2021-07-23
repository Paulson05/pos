@extends('backend.template.default')
@section('title', '| unit')
@section('body')
    <div class="content">
        <div class="container-fluid">
            <h4>create customer</h4>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addModal">add</button>
                    <div  class="modal  fade pt-5" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Creat customer</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <ul id="saveform_errList"></ul>
                                    <div id="success_message"></div>



                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                            <div class="form-group">
                                                <strong>Title</strong>
                                                <input type="text" name="title" class="title form-control" placeholder="email" value="{{old('title')}}">

                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                            <div class="form-group">
                                                <strong>Title</strong>
                                                <input type="text" name="title" class="title form-control" placeholder="email" value="{{old('title')}}">

                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                            <div class="form-group">
                                                <strong>Title</strong>
                                                <input type="text" name="title" class="title form-control" placeholder="email" value="{{old('title')}}">

                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                            <div class="form-group">
                                                <strong>Title</strong>
                                                <input type="text" name="title" class="title form-control" placeholder="email" value="{{old('title')}}">

                                            </div>

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
                                        <td>Timothy Mooney</td>
                                        <td>Office Manager</td>
                                        <td>London</td>
                                        <td>37</td>
                                        <td>2008/12/11</td>
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
            fetchpost();
            function fetchpost() {
                $.ajax({
                    type: "GET",
                    url:"",
                    dataType:"json",
                    success: function (response) {
                        // console.log(response.posts);

                        $('tbody').html("");
                        $.each(response.posts, function (key, item){
                            $('tbody').append('<tr>\
                                            <td>'+item.id+'</td>\
                                           <td>'+item.title+'</td>\
                                           <td>'+item.slug+'</td>\
                                           <td>'+item.image+'</td>\
                                           <td>'+item.category_id+'</td>\
                                            <td><button type="button"  value="'+item.id+'" class="edit_post btn btn-primary" ><i class="fa fa-edit"></i></button></td>\
                                              <td><button type="button" value="'+item.id+'"  class="delete_post btn btn-danger" ><i class="fa fa-trash"></i></button></td>\
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

            {{--edit--}}
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
            {{--update--}}
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


            {{--add post--}}


            $(document).on('click', '.add_product', function (e){
                e.preventDefault();
                // console.log('click');
                var data = {
                    'title' : $('.title').val(),
                    'body' : $('textarea#mytextarea').val(),
                    'name' : $('.name').val(),
                    'slug' : $('.slug').val(),
                    'image' : $('.image').attr("src", data),
                    'category_id' : $('.category_id:checked').val(),
                }
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url:"/post/",
                    data:data,
                    dataType:"json",
                    datType: "image/jpeg",
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
                            $('#success_message').text("response.message");
                            $('#addModal').modal("hide");
                            $('#addModal').find("input").val("");
                            fetchpost();
                        }

                    }
                })
            });


        });
    </script>
@endsection
