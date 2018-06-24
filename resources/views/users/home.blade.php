<html>
<head>
	</head>
	<body class="profile-page sidebar-collapse">

	@extends('layouts.navbar_user')


@section('content')
<div class="page-header header-filter clear-filter " data-parallax="true" style="background-image: url('../banner/banner4.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1 class="title">Blood Donation will cost you nothing but it will save a life!</h1>
          </div>
        </div>
      </div>
       
    </div>
  </div>
   <div class="main main-raised" style="background-color: #eaeff7">
    <div class="section section-basic">
      <div class="container">
			<div class="alert alert-danger">
				<div class="alert-icon">
		            <i class="material-icons">event</i>
		          </div>       
					<b>List Of Events !</b>
		        </div>
			
				<div class="container">
					<div class="row">
						@foreach($event as $event)
						<div class="col-md-4">
                    		<div class="card card-blog">
		                        <div class="card-header card-header-image">
		                            
		                                <img  class="img img-raised" src="/images/{{$event->photo}}"  >
		                            
		                        </div>
		                        <div class="card-body">
		                        	@if ($event->type == 'seminar')
		                            <h6 class="card-category text-info">{{$event->type}}</h6>
		                            @else
		                            <h6 class="card-category text-danger">{{$event->type}}</h6>
		                            @endif
		                            <h4 class="card-title">
		                                <a href="#pablo">{{$event->name}}</a>
		                            </h4>
		                            <p class="card-description">
		                                 {{$event->date_time}}
		                            </p>
		                            <p class="card-description">
									{{$event->place}}
		                            </p>
		                            <p class="card-description"> <a href ="{{action('EventController@show', $event['id'])}}" class="btn btn-rose  ">Read More..</a></p>
		                        </div>
                    		</div>
               			 </div>
               			 @endforeach
					</div>
				</div>
			
		
        
      </div>
    </div>
  </div>
@endsection
</body>
</html>