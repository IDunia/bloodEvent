<html>
<head>
	</head>
	<body class="product-page">

	@extends('layouts.navbar_user')


@section('content')
<div class="page-header header-filter" data-parallax="true"  style="background-image: url(../banner/Banner4.jpg)">
       
    </div>
   <div class="section section-gray">
        <div class="container">
            <div class="main main-raised main-product">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-page1">
                                <img src="/images/{{$event->photo}}">
                            </div>
                            
                          
                        </div>
                       
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h2 class="title">{{$event->name}} </h2>
                        @if ($event->type == 'seminar')
		                            <h3 class="main-price text-info">{{$event->type}}</h3>
		                            @else
		                            <h3 class="main-price text-danger">{{$event->type}}</h3>
		                            @endif
                        
                        <div id="accordion" role="tablist">
                            <div class="card card-collapse">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                           Event Host
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{$event->host}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-collapse">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Event Location and Time
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                       {{$event->date_time}} {{$event->place}}
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                       <br>
                        <div class="row pull-left">
                        	@if(isset(Auth::user()->email) && Auth::user()->role=='User')
							<button class="btn btn-rose btn-round"><i class="material-icons">assignment</i> Register This Event</button>
							@else
							<button class="btn btn-rose btn-round disabled" ><i class="material-icons">assignment</i> Register This Event</button>
							<h5 class="text-danger">*You must login first if wanna register this event !</h5>
						    @endif
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
@endsection
</body>
</html>