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
        Cards Table
        <small>Users Events History</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Card table</li>
      </ol>
    </section>
    
    <section class="content">
        <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                  
                    <div class="box-body table-responsive ">   
                      <table class="table table-hover table-bordered" id="card_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>RSVP Id</th>
                                        <th>Event Name</th>
                                        <th>User Email</th>
                                        <th>User First Name</th>
                                        <th>Point</th>                                        
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
                                $('#card_table').DataTable({
                                    "processing":true,
                                    "serverside":true,
                                    "ajax":"{{route('card.getdata')}}",
                                    "columns":
                                [
                                    {"data":"id"},
                                    {"data":"rsvp_id"},
                                    {"data":"name"},
                                    {"data":"email"},
                                    {"data":"first_name"},
                                    {"data":"points"}
                                                                       
                                ]
                                }); 
                                 });
        </script>
                            
@endsection
	

</body>
</html>