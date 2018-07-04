<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	
     <link rel="shortcut icon" href="{{{ asset('banner/icon.png') }}}">	
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

                              
         });</script>
                            
@endsection
	

</body>
</html>