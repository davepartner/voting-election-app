@extends('layouts.election-template')

@section('content')

<div class="row" style="margin-top: 100px;  margin-bottom: 50px; ">
 <h1 class="text-center"> 
 
 <span class="glyphicon glyphicon-play" style="color: grey; font-size: 30px;" aria-hidden="true"></span> 
 
 Choose a category </h1>
</div>

    <!-- banner-bottom1 -->
	<div class="banner-bottom1">
		<div class="banner-bottom1-grids">

@foreach($categories as $category)
<a href="{!! route('categories.show', [$category->id]) !!}" >
			<div class="col-md-4 banner-bottom1-left banner-bottom1-left1">
				<div class="banner-bottom1-lft">

				@if(isset($category->icon))
					<span class="glyphicon {!! $category->icon !!}" aria-hidden="true"></span>
					@else  
					<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
					@endif
					<h3>{!! $category->name !!}</h3>
					<!-- <p>Lorem Ipsum is therefore always free.</p> -->
				</div>
			</div>
</a>
            @endforeach
			<div class="clearfix"> </div>
		</div>
	</div>
             



@endsection

