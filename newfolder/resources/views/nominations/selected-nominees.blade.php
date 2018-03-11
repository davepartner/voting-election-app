
    @foreach($nominationSelecteds as $nomination)
     



    <div class="col-md-4">

<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{$nomination->name}} <br/> 
              <small style="color: white; "> ( {{$nomination->no_of_votes}} votes ) </small></h3>
              <h5 class="widget-user-desc">{{$nomination->business_name}}</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{ asset('storage/upload/images/'.$nomination->id.'/'.$nomination->image) }}" alt="{{$nomination->name}}">
            </div>
            <div class="box-footer">



          



            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
              <li> 

                <a href="#"> <b>Gender </b> <span class="pull-right">
                {!! $nomination->gender !!}</span></a>


                </li>

                <li><a href="{!! $nomination->linkedin_url !!}"><b>LinkedIn </b> 
                <span class="pull-right badge bg-blue">View</span></a></li>


                <li>

                <a href="#"><b>Bio </b><span class="pull-right">
                {!! $nomination->bio !!}</span></a>


                 </li>
                 
                
                    <li> 
                    <a href="#"> <b>Category </b> <span class="pull-right">
                {!! $nomination->category['name'] !!}</span></a>
                    </li>
                 <li> 
                 
                
                 <li> 
                    <a href="#"> <b>Won? </b> <span class="pull-right">
          
                
                 @if($nomination->is_won == 1)
                        yes
                @else
                        not yet
                @endif
                </span></a>

               


                    </li>
               

                 
        @if(!isset($checkVote))
                <li>
                        <a href="{{ route('nominations.vote', ['nomination_id'=> $nomination->id, 
                        'category_id'=>$nomination->category_id ])}}" class="btn btn-primary"
                        style="color: white; font-weight: bold;" > Vote </a>

                <li> 

                @elseif($checkVote['nomination_id'] == $nomination->id) 
                <li>
                        <button  class="btn btn-success btn-block"
                        style="color: white; font-weight: bold;" > Voted! </button>

                <li> 


        @endif


@if(Auth::user()->role_id < 3)

                <li> 
                    <a href="#"> <b>Reason for nomination </b> <span class="pull-right">
                {!! $nomination->reason_for_nomination !!}</span></a>
                    </li>
                 <li>  
                 

<li><a href="#"><b>Nominated on </b><span class="pull-right">
                {!! $nomination->created_at->format('D, M, Y') !!}</span></a></li>
                <li> 


                 
                 <li> 
                    <a href="#"> <b>Number of nominations </b> <span class="pull-right">
                {!! $nomination->no_of_nominations !!}</span></a>
                    </li>
                 <li> 

                 <li> 

                    <a href="users/{!! $nomination->user['id'] !!}"> <b>Nominated by </b> <span class="pull-right">
                    {!! $nomination->user['name'] !!}</span></a>
                    </li>

                 
                 <li> 
                    <a href="#"> <b>Selected by Admin? </b> <span class="pull-right">
             

                @if($nomination->is_admin_selected == 1)
                        yes
                @else
                        no
                @endif
                
                </span></a>
                    </li>
                 <li> 
                 
                


                 @endif
              </ul>
            </div>



              <!-- /.row -->
            </div>
          </div>

          </div>








    @endforeach