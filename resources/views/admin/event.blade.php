<!DOCTYPE html>
<html lang="en">
<head>
	<meta   charset="UTF-8">
	<title>Event</title>
</head>
<body>
@extends('layouts.navbar_admin')


@section('content')
<div class="content-wrapper">
           

    <section class="content-header">
      <h1>
        Event Table
        <small>List Of Events</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Event table</li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                         <button type="button" name="add" id="add_data" class="btn  btn-primary"><i class="fa fa-plus-circle fa-fw"></i> New Event</button>
                    </div>

                   <div class="box-body table-responsive ">  
                      <table class="table table-hover table-bordered" id="event_table">
                               <thead >
                                    <tr>
                                    
                                        <th>Id</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Datetime</th>
                                        <th>Host</th>
                                        <th>Place</th>
                                        <th>Photo</th>
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

<div id="eventModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="post" id="event_form" enctype="multipart/form-data">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3 class="modal-title">Insert New Event</h3>                                   
                                    </div>

                                    <div class="modal-body">
                                    {{csrf_field()}}
                                    <span id="form_output"></span>
                                        <div class="form-group">
                                        <label>Choose Type</label>
                                        <select class="form-control" name="type" required="required">
								        <option selected disabled="disabled">Choose...</option>
								        <option name="seminar" id="seminar">Seminar</option>
								        <option name="donation" id="donation">Donation</option>
								      	</select>
                                        </div>
                                       
                                        <div class="form-group">
                                        <label>Enter Name</label>
                                        <input type="text" name="name" id="name" class="form-control"/>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Enter Datetime</label>
                                         <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="date_time">
                                         <input class="form-control"  type="text" value="" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                         <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                        </div>
                                        <input type="hidden" id="date_time" value=""  name="date_time"/>
					                  </div>
                                  
                                        
                                        <div class="form-group"> 
                                        <label>Enter Host</label>
                                         <input type="text" name="host" id="host" class="form-control"/>
                                        </div>

                                        <div class="form-group"> 
                                        <label>Enter Place</label>
                                         <input type="text" name="place" id="place" class="form-control"/>
                                        </div>   
                                        
                                        <div class="form-group">
                                        <label>Select Image</label>
                                       <input type="file" name="photo" id="photo" class="form-control" />                                     
                                    </div>
                                </div>

                                   
                                     

                                    <div class="modal-footer">
                                        <input type="hidden" name="event_id" id="event_id" value="" />
                                        <input type="hidden" name="button_action" id="button_action" value="insert"/>
                                        <input type="submit" name="submit" id="action" value="Add" class="btn btn-primary"/>
                                        <button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                                </div>
                            </div>
</div>

                    
   

 <script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
  
</script>
  <script type="text/javascript">    
                      $(document).ready(function(){
                                $('#event_table').DataTable({
                                    "processing":true,
                                    "serverside":true,
                                    "ajax":"{{route('event.getdata')}}",
                                    "columns":
                                [
                                    {"data":"id"},
                                    {"data":"type"},
                                    {"data":"name"},
                                    {"data":"date_time"},
                                    {"data":"host"},
                                    {"data":"place"},
                                    {"data":"photo",orderable:false, searchable: false, 
                                    "render":function(data,type,row){
                                        return '<img src="/images/'+data+'" width="50" height="50"/>';
                                    }},

                                    { "data": "action", orderable:false, searchable: false}

                                   
                                ]
                                });

                                $('#add_data').click(function(){

                                $('#eventModal').modal('show');
                                $('#event_form')[0].reset();
                                $('#form_output').html('');
                                $('#button_action').val('insert');
                                $('#action').val('Add');
                            });

                            $('#event_form').on('submit', function(event){
                                event.preventDefault();
                                var form_data = new FormData(this);
                                $.ajax({

                                    url:"{{ route('insert_event.postdata') }}",
                                    method:"POST",
                                    data:form_data,
                                    dataType:"json",
                                    processData: false,
                                    contentType:false,
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
                                            $('#event_form')[0].reset();
                                            $('#action').val('Add');
                                            $('.modal-title').text('Add Event');
                                            $('#button_action').val('insert');
                                            $('#event_table').DataTable().ajax.reload();
                                        }
                                    }
                                        })
                                });
                                $(document).on('click', '.edit', function(){
                                var id = $(this).attr("id");
                                if(confirm("Are you sure wanna edit this data ? , You need to input date and photo again !"))
                                {
                                    $('#form_output').html('');
                                    $.ajax({
                                        url:"{{route('eventdata.fetchdata')}}",
                                        method:'get',
                                        data:{id:id},
                                        dataType:'json',
                                        success:function(data)
                                        {
                                            $('#type').val(data.type);
                                            $('#name').val(data.name);
                                            $('#date_time').val(data.date_time);
                                            $('#host').val(data.host);
                                            $('#place').val(data.place);
                                            $('#photo').val(data.photo);
                                            $('#event_id').val(id);
                                            $('#eventModal').modal('show');
                                            $('#action').val('Edit');
                                            $('.modal-title').text('Edit Data');
                                            $('#button_action').val('update');
                                        }
                                    })
                                }
                            });


                            
                                $(document).on('click','.delete',function(){

                                    var id= $(this).attr('id');
                                    if(confirm("Are you sure wanna delete this data ?"))
                                    {
                                        $.ajax({
                                            url:"{{route('eventdata.removedata')}}",
                                            method:"get",
                                            data:{id:id},
                                            success:function(data)
                                            {
                                                alert(data);
                                                $('#event_table').DataTable().ajax.reload();
                                            }
                                        })
                                    }
                                });     
                            
         });</script>
         
         
@endsection
</body>
</html>