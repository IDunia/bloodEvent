<html>
<head>
	</head>
	<body>

	@extends('layouts.navbar_user')


@section('content')
<div class="page-header header-filter clear-filter " data-parallax="true" style="background-image: url('../banner/banner4.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h2 class="title">Blood Donation will cost you nothing but it will save a life!</h1>
          </div>
        </div>
      </div>
       
    </div>
  </div>
   <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
	<div class="alert alert-danger">
		<div class="alert-icon">
            <i class="material-icons">event</i>
          </div>       
			<b>List Of Events !</b>
        </div>
			<div class="section section-blog">
				<div class="container">
					<div class="row">
						@for ($i = 0; $i < 5; $i++)
						<div class="col-md-4">
                    		<div class="card card-blog">
		                        <div class="card-header card-header-image">
		                            <a href="#pablo">
		                                <img src="../banner/logo.png" alt="" >
		                            </a>
		                        </div>
		                        <div class="card-body">
		                            <h6 class="card-category text-rose">Trends</h6>
		                            <h4 class="card-title">
		                                <a href="#pablo">Event Title</a>
		                            </h4>
		                            <p class="card-description">
		                                Event Description
		                            </p>
		                        </div>
                    		</div>
               			 </div>
               			 @endfor
					</div>
				</div>
			</div>
		
       
      </div>
    </div>
  </div>
@endsection
</body>
</html>