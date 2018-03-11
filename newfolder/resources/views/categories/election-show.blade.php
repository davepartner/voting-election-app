@extends('layouts.election-template')

@section('content')


@if( $isWithinNominationPeriod == 'yes')

<!--if user has nominated before -->
                    @if(isset($hasNominatedBefore) && $hasNominatedBefore != 0)

                    <div class="banner-bottom">
                            <div class="container col-md-offset-3">
                            <div class="row" style="margin-top: 50px;  margin-bottom: 50px; ">
                                        <h1 > 
                                        <span class="glyphicon glyphicon-play" style="color: grey; font-size: 30px;" aria-hidden="true"></span>
                                         You nominated <b> {{ $nomination->name }} </b> <br/> 
                                        <small> 
                                        &nbsp; &nbsp; 
                                        <span class="glyphicon glyphicon-hand-right" style="color: grey; font-size: 15px;" aria-hidden="true"></span>
                                       
                                        Under the category <b> {{ $category->name }} </b>  </small> </h1>
                                        </div>
                                        <article> 
                                            <div class="banner-wrap">
                                                <div class="about-grids">

                                                    <div class="col-md-4 about-grid">
                                                <br/>
                                                        <div class="about-grid1">
                                                            <figure class="thumb">
                                                                <img style="max-height: 250px; min-height: 250px;" src="{{ asset('storage/upload/images/'.$nomination->id.'/'.$nomination->image) }}"
                                                                alt=" " class="img-responsive"  />
                                                                <figcaption class="caption">
                                                                    <h3><a href="#">{{  $nomination->name }}</a></h3>
                                                                    <span>{{  $nomination->business_name }}</span>
                                                                    <p> 
                                                                    {{  $nomination->reason_for_nomination }}</p>
                                                                    
                                                                
                                                                    
                                                                </figcaption>
                                                            </figure>
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </article>
                                        
                            </div>
                        </div>




                    @elseif(!isset($hasNominatedBefore) || $hasNominatedBefore == 0)
                        <!--if user has NOT nominated before -->
                        <!-- contact -->
                        <div class="contact">

                        <div class="row text-center" style="margin-top: 50px;  margin-bottom: 50px; ">
                        <h1 > 
                        
                        <span class="glyphicon glyphicon-play" style="color: grey; font-size: 30px;" aria-hidden="true"></span>
                                        
                        Nominate a candidate in <b> {{ $category->name }} </b><br/> 
                        <small>
                        <span class="glyphicon glyphicon-hand-right" style="color: grey; font-size: 15px;" aria-hidden="true"></span>
                                       
                        Enter candidate's details </small> </h1>
                        </div>


                        <div class="container col-md-offset-3">
                       

                        @include('adminlte-templates::common.errors')
                            <div class="contact-grid">
                            
                                <div class="col-md-7 contact-right">
                                    <form method="post" action="{{ route('nominations.store') }}" enctype="multipart/form-data" >

                                
                                        <input type="text" placeholder="Full name, surname first" name="name" required=" ">
                                    
                                    
                                        <input type="text" name="linkedin_url" placeholder="(Optional) Linkedin Url" >
                                        <input type="text" name="bio" placeholder="(Optional) short bio" maxlength="100" >
                                        <input type="text" name="business_name" placeholder="business name or Job title" maxlength="100" required=" " >
                                        <input type="text" name="reason_for_nomination" maxlength="150"
                                        placeholder="Reason for nomination" required=" " >
                                        
                                    
                                        <div class="form-group col-sm-6">
                                            <label for="sel1" style="font-weight: normal;">Gender:</label>
                                            <select class="form-control" id="gender" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="sel1" style="font-weight: normal;">Upload image of candidate</label>
                                            <input type="file" class="form-control" name="image" required="" />
                                        </div>

                                        
                                        <input type="hidden" name="category_id" value="{{$category->id  }} ">
                                        
                                        <div class="clearfix"> </div>
                                        {{ csrf_field() }}

                                        <input type="submit"  value="Submit">
                                    </form>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        </div>
                        @endif

@elseif($isWithinVotingPeriod == 'yes')

<!-- check if admin has selected any candidates for voting --> 
@if(isset($nominationSelecteds))


            <div class="row" style="margin-top: 100px;  ">
            <h1 class="text-center"> 
            <span class="glyphicon glyphicon-thumbs-up" style="color: grey; font-size: 30px;" aria-hidden="true"></span>
                                        
            Vote a candidate
            
            @if(isset($checkVote))
            <br/>
            <small>
            <span class="glyphicon glyphicon-hand-right" style="color: grey; font-size: 15px;" aria-hidden="true"></span>
                                       
             You have voted in this category  </small>
            @endif
            </h1>
            </div>


            <!-- banner-bottom -->
            <div class="banner-bottom">
                    <div class="container">
                                <article> 
                                    <div class="banner-wrap">
                                        <div class="about-grids">

                                            @foreach($nominationSelecteds as $nomination)
                                            <div class="col-md-4 about-grid">
                                        <br/>
                                                <div class="about-grid1">
                                                    <figure class="thumb">
                                                        <img style="max-height: 250px; min-height: 250px;" src="{{ asset('storage/upload/images/'.$nomination->id.'/'.$nomination->image) }}"
                                                        alt=" " class="img-responsive"  />
                                                        <figcaption class="caption">
                                                            <h3><a href="#">{{  $nomination->name }}</a></h3>
                                                            <span>{{  $nomination->business_name }}</span>
                                                            <p> 
                                                            {{  $nomination->reason_for_nomination }}</p>
                                                            
                                                            @if(!isset($checkVote))
                                                                <a  style="margin-top: 20%; " 
                                                                href="{{ route('nominations.vote', ['nomination_id'=> $nomination->id, 
                                    'category_id'=>$nomination->category_id ])}}" 
                                                                class="btn  btn-danger btn-block btn-flat">

                                                                Vote
                                                                </a>
                                                                @elseif($checkVote['nomination_id'] == $nomination->id) 

                                                                <button  class="btn btn-success btn-block"> Voted! </button>

                                                                    @endif   
                                                            
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                            @endforeach

                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>
                                </article>
                                
                    </div>
                </div>


            @endif
 @endif

<div class="text-center">
@if(isset($previousCategory) )
  <a href="/categories/{{ $previousCategory->id }}" class=" col-xm-5 ">  <span class="btn btn-default" >
  {{ $previousCategory->name }} </span> << Previous </a>
@endif 
&nbsp; &nbsp; &nbsp; 


@if(isset($nextCategory) )


| 

&nbsp; &nbsp; &nbsp; 

  
  <a href="/categories/{{ $nextCategory->id }}" class=" col-xm-5 "> Next category >> <span class="btn btn-primary" >{{ $nextCategory->name }} </span> </a>
  @endif
</div>

@endsection
