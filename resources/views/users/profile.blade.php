<html>
@if(isset(Auth::user()->email) && Auth::user()->role == 'User')
<head>
   
	</head>
	<body class="profile-page">

	@extends('layouts.navbar_user')


@section('content')
<div class="page-header header-filter" data-parallax="true"  style="background-image: url(../banner/Banner4.jpg)">       
</div>
 <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="/images/{{Auth::user()->photo}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            
                            </div>

                            <div class="name">
                                <h3 class="title">{{Auth::user()->first_name}} {{Auth::user()->surname}}</h3>
                                <h6>{{Auth::user()->email}} </h6>
                                <button class="btn btn-fab btn-primary btn-round" rel="tooltip" title="Change Email" id="change_email" name="add">
                                <i class="material-icons">alternate_email</i>
                            </button>
                            </div>
                        </div>
                        <div class="follow">
                          
                            <button class="btn btn-fab btn-primary btn-round" rel="tooltip" title="Change Profile Picture" id="change_picture">
                                <i class="material-icons">camera</i>
                            </button>
                            
                    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-rose nav-pills-icons justify-content-center" role="tablist">
                                <!--
                      color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                  -->
                                <li class="nav-item">
                                    <a class="nav-link active" href="#work" role="tab" data-toggle="tab">
                                        <i class="material-icons">people</i>Information
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#connections" role="tab" data-toggle="tab">
                                        <i class="material-icons">settings</i> Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-space">
                    <div class="tab-pane active work" id="work">
                 
                
                    <form method="post" id="updateForm" >
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    
                      <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" class="form-control" id="first_name"  name="first_name" value="{{Auth::user()->first_name}}">
                      </div>
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="{{Auth::user()->surname}}" >
                      </div>
                      <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender" data-style="select-with-transition">
                        
                         <option name="m/f" id="m/f" value="m/f" disabled="disabled" @if(Auth::user()->gender=="m/f") selected @endif> Unassigned</option>
                        <option name="f" id="f" value="f"@if(Auth::user()->gender=="f") selected @endif >Female</option>
                        <option name="m" id="m" value="m" @if(Auth::user()->gender=="m") selected @endif> Male</option>
                        
                        </select>
                      </div>
                      <!-- input with datetimepicker -->
                        <div class="form-group">
                            <label class="label-control">Birthday</label>
                            <input type="text"  data-date-format="YYYY-MM-D" class="form-control datepicker" value="{{Auth::user()->birthday}}" placeholder="Not Assigned" id="birthday" name="birthday"/>
                        </div>
                      <div class="form-group">
                        <label>Occupation</label>
                        <input type="text" class="form-control" id="occupation"  name="occupation" value="{{Auth::user()->occupation}}"  >
                      </div>
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}" placeholder="Not Assigned" maxlength="12">
                      </div>
                    
                        <input type="hidden" name="users_id_info" id="users_id_info" value="{{Auth::user()->id}}" />
                         <input type="hidden" name="button_action_info" id="button_action_info" value="update"/>
                       <input type="submit" name="submit" id="action_info" value="Save Changes" class="btn btn-rose"/>
                    </form>
            
                </div>
                    
                  <div class="tab-pane connections" id="connections">
                    <h3 class="title">Change Password</h3>
                    <form  method="post" id="passwordForm">
                            {{csrf_field()}}
                              <span id="form_output_password"> </span>
                            <div class="form-group">
                           
                            <label >Old Password</label>
                              <input type="password" class="form-control" id="old_password" name="old_password" required="required">
                            </div>

                            <div class="form-group">
                            <label>New Password</label>
                             
                              <input type="password" class="form-control" id="new_password" name="new_password" required="required" >
                            
                            </div>

                            <div class="form-group">
                            <label >Confirm New Password</label>
                             
                              <input type="password" class="form-control" id="confirm_password" name="confirm_password" required="required">
                            
                            </div>
                            
                            <div class="form-group">
                            
                            <input type="hidden" name="users_id_password" id="users_id_password" value="{{Auth::user()->id}}" />
                             <input type="hidden" name="button_action_password" id="button_action_password" value="Change"/>
                              <input type="submit" class="btn btn-rose" id="change_password" name="change_password" value="Change">
                           
                            </div>
                        </form>
                  </div>  
                </div>
            </div>
        </div>
    </div>
<div id="uploadModal" class="modal fade"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="uploadForm" enctype="multipart/form-data">
                <div class="modal-header">
                      <h3 class="modal-title">Change Profile Picture</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>                                   
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output_picture"></span>
                    <div class="form-group form-file-upload form-file-multiple">
                        <input type="file" multiple="" class="inputFileHidden" name="photo" id="photo">
                        <div class="input-group">
                            <input type="text" class="form-control inputFileVisible" placeholder="Select Image">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                    <i class="material-icons">camera</i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="users_id_upload" id="users_id_upload" value="{{Auth::user()->id}}" />
                    <input type="hidden" name="button_action_upload" id="button_action_upload" value="insert"/>
                    <input type="submit" name="submit" id="action_upload" value="Add" class="btn btn-rose"/>
                    <button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="emailModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="emailForm" enctype="multipart/form-data">
                <div class="modal-header">
                      <h3 class="modal-title">Change Email</h3>  
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>                                    
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
                    <input type="submit" name="submit" id="action_email" value="Update" class="btn btn-rose"/>
                    <button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

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
                            
                            
                                $('#first_name').val(data.first_name);
                                $('#surname').val(data.surname);
                                $('#gender').val(data.gender);
                                $('#birthday').val(data.birthday);
                                $('#occupation').val(data.occupation);
                                $('#phone').val(data.phone);
                                $('#form_output').html(data.success);
                                window.location.reload();
                            
                        }
                            })
                    });

      $('#change_picture').click(function()
{
                $('#uploadModal').modal('show');
                $('#uploadForm')[0].reset();
                $('#form_output_picture').html('');
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
                            $('#form_output_picture').html(error_html);
                        }
                        else
                        {
                            $('#form_output_picture').html(data.success);
                            $('#uploadForm')[0].reset();
                            $('#action_upload').val('Change');
                            $('.modal-title').text('Change Profile Picture');
                            $('#button_action_upload').val('insert');
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
    $("#form_output_password").html("");
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
@endsection
</body>
</html>
@else
<script type="text/javascript">window.location.href="{{url('/error')}}";</script>
@endif