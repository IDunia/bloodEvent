<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	
     	
</head>
<body>
@extends('layouts.navbar_admin')


@section('content')
<div class="content-wrapper">
           

    <section class="content-header">
      <h1>
        User Table
        <small>List Of Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Users table</li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                         <button type="button" name="add" id="add_data" class="btn  btn-primary"><i class="fa fa-plus-circle fa-fw"></i> New Admin</button>
                    </div>

                    <div class="box-body table-responsive">   
                      <table class="table table-hover table-bordered" id="users_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Email</th>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                               
                        </table>
                    </div>

                </div>
            </div>
        </div>                
   </section>
</div>

 <div id="usersModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="post" id="users_form">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3 class="modal-title">Insert New Admin</h3>                                   
                                    </div>

                                    <div class="modal-body">
                                    {{csrf_field()}}
                                    <span id="form_output"></span>
                                        <div class="form-group">
                                        
                                        <label>Enter Email</label>
                                        <input type="email" name="email" id="email" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                         
                                        <label>Enter Password</label>
                                        <input type="password" name="password" id="password" class="form-control"/>
                                        </div>
                                          <div class="form-group">
                                        
                                        <label>Enter Firstname</label>
                                         <input type="text" name="first_name" id="first_name" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                         
                                        <label>Enter Surname</label>
                                         <input type="text" name="surname" id="surname" class="form-control"/>
                                        </div>
                                       
                                        <input type="hidden" name="role" id="role" value="admin"/>
                                       
                                    </div>

                                     

                                    <div class="modal-footer">
                                        <input type="hidden" name="users_id" id="users_id" value="" />
                                        <input type="hidden" name="button_action" id="button_action" value="insert"/>
                                        <input type="submit" name="submit" id="action" value="Add" class="btn btn-primary"/>
                                        <button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                                </div>
                            </div>
</div>

        <!-- /#page-wrapper -->
         <script type="text/javascript">                           
                             $(document).ready(function(){
                                $('#users_table').DataTable({
                                    "processing":true,
                                    "serverside":true,
                                    "ajax":"{{route('users.getdata')}}",
                                    "columns":
                                [
                                    {"data":"id"},
                                    {"data":"email"},
                                    {"data":"first_name"},
                                    {"data":"surname"},
                                    {"data":"role"}
                                   
                                ]
                                });

                                $('#add_data').click(function(){
                                $('#usersModal').modal('show');
                                $('#users_form')[0].reset();
                                $('#form_output').html('');
                                $('#button_action').val('insert');
                                $('#action').val('Add');
                            });

                            $('#users_form').on('submit', function(event){
                                event.preventDefault();
                                var form_data = $(this).serialize();
                                $.ajax({
                                    url:"{{ route('insert_users.postdata') }}",
                                    method:"POST",
                                    data:form_data,
                                    dataType:"json",
                                    success:function(data)
                                    {
                                        if(data.error.length > 0)
                                        {
                                            var error_html = '';
                                            for(var count = 0; count < data.error.length; count++)
                                            {
                                                error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                                            }
                                            $('#form_output').html(error_html);
                                        }
                                        else
                                        {
                                            $('#form_output').html(data.success);
                                            $('#users_form')[0].reset();
                                            $('#action').val('Add');
                                            $('.modal-title').text('Add Admin');
                                            $('#button_action').val('insert');
                                            $('#users_table').DataTable().ajax.reload();
                                        }
                                    }
                                        })
                                });

                            
  $('#email').blur(function(){
        var error_email = '';
        var email = $('#email').val();
        var _token = $('input[name="_token"]').val();
       
        if($.trim(email).length > 0)
        {
            
                $.ajax({
                    url:"{{ route('checkEmail') }}",
                    method:"POST",
                    data:{email:email, _token:_token},
                    success:function(result)
                    {
                        if(result == 'available')
                        {
                           
                            $('#form_output').html('<div class="alert alert-success">Email available </div>');
                           
                            $('#action').attr('disabled', false);
                        }
                        else
                        {
                            $('#form_output').html('<div class="alert alert-danger">Email Already Exist </div>');
                            
                            $('#action').attr('disabled', 'disabled');
                        }
                    }
                })
            }
        
      
    });
         });</script>
                            
@endsection
	

</body>
</html>