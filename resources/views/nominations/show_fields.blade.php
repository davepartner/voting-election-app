

<div class="col-md-6">

<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{$nomination->name}}</h3>
              <h5 class="widget-user-desc">{{$nomination->business_name}}</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{$nomination->avatar}}" alt="{{$nomination->name}}">
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
                {!! $nomination->is_won !!}</span></a>
                    </li>
                 <li> 



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


