<!DOCTYPE html>
<html lang="en">
<head>
	<meta   charset="UTF-8">
	<title>Admin Profile</title>
	</head>
<body>

@extends('layouts.navbar_admin')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active">Admin profile</li>
      </ol>
    </section>

    <section class="content">
		<div class="row">
        	<div class="col-md-3">
        		<div class="box box-primary">
        			<div class="box-body box-profile">
			              <img class="profile-user-img img-responsive img-circle" src="/images/{{Auth::user()->photo}}" alt="User profile picture">

			              <h3 class="profile-username text-center">{{Auth::user()->first_name}} {{Auth::user()->surname}}</h3>

			              <p class="text-muted text-center">{{Auth::user()->role}}</p>

			              <ul class="list-group list-group-unbordered">
			                <li class="list-group-item">
			                  <b>Email</b> <a class="pull-right">{{Auth::user()->email}}</a>
			                </li>

			                <center>
			                <li class="list-group-item">
			                  <button type="button"  id="change_email" name="add" class="btn  btn-block btn-primary"><i class="fa fa-envelope margin-r-5"></i>Change Email</button>
			                </li>
			                <li class="list-group-item">
			               <button type="button" name="add" id="change_picture" class="btn  btn-block btn-primary"><i class="fa fa-camera margin-r-5"></i>Change Profile Picture</button>     
			                </li>
			                </center>
			              </ul>
			          </div>
        		</div>
			</div>
			<div class="col-md-9">
         		 <div class="nav-tabs-custom">
		            <ul class="nav nav-tabs">
		              <li class="active"><a href="#activity" data-toggle="tab">Admin Information</a></li>
                       <li><a href="#password" data-toggle="tab">Change Password</a></li>
		            </ul>	
				<div class="tab-content">
					<div class="active tab-pane" id="activity">
						 <div class="post">
		                 <ul class="list-group list-group-unbordered">
			                <li class="list-group-item">
			                  <strong><i class="fa fa-user-secret margin-r-5"></i>Name</strong>
						              <p class="text-muted">
						              {{Auth::user()->first_name}} {{Auth::user()->surname}}
						              </p>
			                </li>
			                 <li class="list-group-item">
			                  <strong><i class="fa fa-venus-double margin-r-5"></i>Gender</strong>
						              <p class="text-muted">
						             @if(Auth::user()->gender == 'm')Male @else Female @endif
						              </p>
			                </li>
			                 <li class="list-group-item">
			                  <strong><i class="fa fa-birthday-cake margin-r-5"></i>Birthday</strong>
						              <p class="text-muted">
						              {{Auth::user()->birthday}}
						              </p>
			                </li>
			                 <li class="list-group-item">
			                  <strong><i class="fa fa-briefcase margin-r-5"></i>Occupation</strong>
						              <p class="text-muted">
						              {{Auth::user()->occupation}}
						              </p>
			                </li>
			                 <li class="list-group-item">
			                  <strong><i class="fa fa-mobile-phone margin-r-5"></i>Phone</strong>
						              <p class="text-muted">
						              {{Auth::user()->phone}}
						              </p>
			                </li>

			              </ul>  
                           <button type="button" name="change_info" id="change_info" class="btn  btn-success"><i class="fa fa-edit margin-r-5"></i>Update Information</button>         
		                  </div>
					</div>

                    <div class="tab-pane" id="password">
                        
                         <form class="form-horizontal" method="post" id="passwordForm">
                            {{csrf_field()}}
                              <span id="form_output_password"> </span>
                            <div class="form-group">
                           
                            <label class="col-sm-2 control-label">Old Password</label>
                             <div class="col-sm-10">
                              <input type="password" class="form-control" id="old_password" name="old_password" >
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-2 control-label">New Password</label>
                             <div class="col-sm-10">
                              <input type="password" class="form-control" id="new_password" name="new_password" >
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-2 control-label">Confirm New Password</label>
                             <div class="col-sm-10">
                              <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
                            </div>
                            </div>
                            
                            <div class="form-group">
                             <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="users_id_password" id="users_id_password" value="{{Auth::user()->id}}" />
                             <input type="hidden" name="button_action_password" id="button_action_password" value="Change"/>
                              <input type="submit" class="btn btn-success" id="change_password" name="change_password" value="Change">
                            </div>
                            </div>
                        </form>
                    </div>

				</div>
			</div>

             
   			 </div>
		</div>
    </section>
</div>
<div id="uploadModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="uploadForm" enctype="multipart/form-data">
				<div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3 class="modal-title">Change Profile Picture</h3>                                   
				</div>
				<div class="modal-body">
					{{csrf_field()}}
					<span id="form_output"></span>
					<div class="form-group">
                     	<label>Select Image</label>
                        <input type="file" name="photo" id="photo" class="form-control"/>                                    
                    </div>
				</div>

				<div class="modal-footer">
        			<input type="hidden" name="users_id_upload" id="users_id_upload" value="{{Auth::user()->id}}" />
                    <input type="hidden" name="button_action_upload" id="button_action_upload" value="insert"/>
                    <input type="submit" name="submit" id="action_upload" value="Add" class="btn btn-primary"/>
                 	<button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
                </div>
			</form>
		</div>
	</div>
</div>
<div id="emailModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="emailForm" enctype="multipart/form-data">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3 class="modal-title">Change Email</h3>                                   
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output_email"></span>
                    <div class="form-group">
                    <label>Current Email</label>
                    <input type="email" name="current_email" id="current_email" class="form-control" disabled="disabled" value="{{Auth::user()->email}}" />                                  
                    </div>
                    <div class="form-group">
                    <label>Enter new Email</label>
                    <input type="email" name="email" id="email" class="form-control"/>                                  
                    </div>
                    <div class="form-group">
                    <label>Enter current Password</label>
                    <input type="password" name="password" id="password" class="form-control"/>                                  
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="users_id_email" id="users_id_email" value="{{Auth::user()->id}}" />
                    <input type="hidden" name="button_action_email" id="button_action_email" value="update"/>
                    <input type="submit" name="submit" id="action_email" value="Update" class="btn btn-primary"/>
                    <button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="infoModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="updateForm" enctype="multipart/form-data">
				<div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3 class="modal-title">Update Information</h3>                                   
				</div>
				<div class="modal-body">
					{{csrf_field()}}
					<span id="form_output2"></span>
					<div class="form-group">
                     	<label>First name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{Auth::user()->first_name}}"/>          
                    </div>
                    <div class="form-group">
                     	<label>Surname</label>
                        <input type="text" name="surname" id="surname" class="form-control" value="{{Auth::user()->surname}}"/>          
                    </div>
                
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
				        
				         <option name="m/f" id="m/f" value="m/f" @if(Auth::user()->gender=="m/f") selected @endif> Unassigned</option>
				        <option name="f" id="f" value="f"@if(Auth::user()->gender=="f") selected @endif >Female</option>
				        <option name="m" id="m" value="m" @if(Auth::user()->gender=="m") selected @endif> Male</option>
				        
				      	</select>
                    </div>
                    <div class="form-group">
		                <label>Birthday</label>
		                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="" readonly>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="dtp_input2" value="{{Auth::user()->birthday}}"  name="birthday"/><br/>
		            </div>
              		 <div class="form-group">
                     <label>Occupation</label>
                     <input type="text" name="occupation" id="occupation" class="form-control" value="{{Auth::user()->occupation}}"/>
                    </div>
                     <div class="form-group">
                     <label>Phone</label>
                     <input type="number" name="phone" id="phone" class="form-control" value="{{Auth::user()->phone}}"/>
                    </div>

				<div class="modal-footer">
        			<input type="hidden" name="users_id_info" id="users_id_info" value="{{Auth::user()->id}}" />
                    <input type="hidden" name="button_action_info" id="button_action_info" value="update"/>
                    <input type="submit" name="submit" id="action_info" value="Update" class="btn btn-primary"/>
                 	<button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
                </div>
			</form>
		</div>
	</div>
</div>


 <script type="text/javascript">   
 	 $(document).ready(function(){

$('#change_picture').click(function()
{
                $('#uploadModal').modal('show');
                $('#uploadForm')[0].reset();
                $('#form_output').html('');
                $('#button_action_upload').val('insert');
                $('#action_upload').val('Change');
});
$('#uploadForm').on('submit', function(event){
                event.preventDefault();
                var form_data = new FormData(this);
                $.ajax({

                    url:"{{ route('admin.upload') }}",
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
                            $('#uploadForm')[0].reset();
                            $('#action_upload').val('Change');
                            $('.modal-title').text('Change Profile Picture');
                            $('#button_action_upload').val('insert');
                            window.location.reload();
                        }
                    }
                        })
                });

$('#change_info').click(function()
	{						 $('#infoModal').modal('show');
                    $('#updateForm')[0].reset();
                    $('#form_output2').html('');
                    $('#button_action_info').val('update');
                    $('#action_info').val('Change');
});
$('#updateForm').on('submit', function(event){
						event.preventDefault();
                    var form_data = new FormData(this);
                    $.ajax({

                        url:"{{ route('admin.update') }}",
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
                                $('#form_output2').html(error_html);
                            }
                            else
                            {
                                $('#first_name').val(data.first_name);
                                $('#surname').val(data.surname);
                                $('#gender').val(data.gender);
                                $('#birthday').val(data.birthday);
                                $('#occupation').val(data.occupation);
                                $('#phone').val(data.phone);
                                $('#action_info').val('Change');
                                $('.modal-title').text('Update Information');
                                $('#button_action_info').val('update');
                                $('#form_output2').html(data.success);
                                window.location.reload();
                            }
                        }
                            })
                    });

$('#change_email').click(function()
{             
     $('#emailModal').modal('show');
                        $('#emailForm')[0].reset();
                        $('#form_output_email').html('');
                        $('#button_action_email').val('update');
                        $('#action_email').val('Update');
});
$('#emailForm').on('submit', function(event){
                        event.preventDefault();
                        var form_data = new FormData(this);
                        $.ajax({

                            url:"{{ route('admin.email') }}",
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
                                    $('#form_output_email').html(error_html);
                                }
                                else
                                {
                                    $('#form_output_email').html(data.success);
                                    if(data.success == '<div class="alert alert-danger">Wrong Password !</div>'){
                                    $('#emailForm')[0].reset();
                                    $('#action_email').val('Update');
                                    $('.modal-title').text('Change Email');
                                    $('#button_action_email').val('update');
                                    }else{
                                        window.location.reload();
                                        }

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
                           
                            $('#form_output_email').html('<div class="alert alert-success">Email available </div>');
                           
                            $('#action').attr('disabled', false);
                            $('#action_email').attr('disabled',false);
                        }
                        else
                        {
                            $('#form_output_email').html('<div class="alert alert-danger">Email Already Exist </div>');
                            
                            $('#action').attr('disabled', 'disabled');
                            $('#action_email').attr('disabled','disabled');
                        }
                    }
                })
            }
        
      
    });

var $errorMsg =  $('<font color="red">Passwords do not match.</font>');
function checkMatchingPasswords(){
    
        if( $('#new_password').val() != $('#confirm_password').val() ){
             $('#change_password').attr("disabled", "disabled");
            $errorMsg.insertAfter($('#confirm_password'));
        }
}

function resetPasswordError(){
    $("#change_password").removeAttr("disabled");
    var $errorCont = $errorMsg;
    if($errorCont.length > 0){
        $errorCont.remove();
    }  
}

$("#new_password, #confirm_password")
     .on("keydown", function(e){
        /* only check when the tab or enter keys are pressed
         * to prevent the method from being called needlessly  */
        if(e.keyCode == 13 || e.keyCode == 9) {
            checkMatchingPasswords();
        }
     })
     .on("blur", function(){                    
        // also check when the element looses focus (clicks somewhere else)
        checkMatchingPasswords();
    })
    .on("focus", function(){
        // reset the error message when they go to make a change
        resetPasswordError();
    })

   $('#passwordForm').on('submit', function(event){
                        
    event.preventDefault();
    var form_data = new FormData(this);
    $.ajax({

        url:"{{ route('admin.password') }}",
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
                $('#form_output_password').html(error_html);
            }
            else
            {
                $('#form_output_password').html(data.success);
                if(data.success == '<div class="alert alert-danger">Wrong Old Password !</div>'){
                $('#passwordForm')[0].reset();
                $('#change_password').val('Change');
                $('#button_action_password').val('Change');
                }else{
                    window.location.replace("/login/logout");
                    }

             }
               
            
        }
            })
    });

     });
 </script>
<script>
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
</script>

@endsection
</body>
</html>