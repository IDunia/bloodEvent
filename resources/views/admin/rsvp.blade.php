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
        RSVP Table
        <small>List Of RSVP Info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">RSVP table</li>
      </ol>
    </section>
    
    <section class="content">
        <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                  
                    <div class="box-body table-responsive ">   
                      <table class="table table-hover table-bordered" id="rsvps_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Event Name</th>
                                        <th>User Email</th>
                                        <th>User First Name</th>
                                        <th>User Surname</th>
                                        <th>Status</th>  
                                        <th>Action</th>                                      
                                    </tr>
                                </thead>
                               
                        </table>
                    </div>

                </div>
            </div>
        </div>                
   </section>
</div>
 <div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Warning !</h4>
              </div>
              <div class="modal-body">
                <p>This user has attended the event !</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

     <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success !</h4>
              </div>
              <div class="modal-body">
                <p>This user success attend this event !</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /#page-wrapper -->
         <script type="text/javascript">                           
                             $(document).ready(function(){
                                $('#rsvps_table').DataTable({
                                    "processing":true,
                                    "serverside":true,
                                    "ajax":"{{route('rsvp.getdata')}}",
                                    "columns":
                                [
                                    {"data":"id"},
                                    {"data":"name"},
                                    {"data":"email"},
                                    {"data":"first_name"},
                                    {"data":"surname"},
                                    {"data":"status"},
                                    {"data":"action",orderable:false,searchable:false}
                                   
                                   
                                ]
                                }); 
                                 $(document).on('click','.attend',function(){

                                    var id= $(this).attr('id');
                                   
                                    {
                                        $.ajax({
                                            url:"{{route('rsvp.attendance')}}",
                                            method:"get",
                                            data:{id:id},
                                            success:function(result)
                                            {
                                                if(result=="already"){
                                                    $('#modal-danger').modal('show');
                                                }else{
                                                 $('#modal-success').modal('show');   
                                                $('#rsvps_table').DataTable().ajax.reload();
                                            }
                                        }
                                        })
                                    }
                                });     
                            
                                 });
        </script>
                            
@endsection
	

</body>
</html>