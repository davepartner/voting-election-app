


        <div class="col-md-2">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              
              <h3 class="profile-username text-center">{!! $category->name !!}</h3>

              <p class="text-muted text-center">Last Updated: {!! $category->updated_at->format('D, M, Y') !!}</p>

              <!-- <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

            @if(Auth::user()->role_id == 4 )
              <li class="active"><a href="#nomination" data-toggle="tab" aria-expanded="true">My Nomination</a></li>
              <li class="active"><a href="#vote" data-toggle="tab" aria-expanded="true">My Vote</a></li>
            @endif
             
             
              <li class=""><a href="#nominees" data-toggle="tab" aria-expanded="true">Nominees</a></li>
             
            </ul>

           
            <div class="tab-content">

            
              <div class="tab-pane active" id="nomination">
               
              @if(!isset($hasNominatedBefore) || $hasNominatedBefore == 0)


               <p> <h3> Nominate a candidate </h3> </p>
              <div class="row">
                    {!! Form::open(['route' => 'nominations.store']) !!}

                        @include('nominations.fields')

                    {!! Form::close() !!}
                </div>



                @else



                      <div class="col-md-6">

                   <h4> You have already nominated </h4>

                      <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-aqua-active">
                      <h3 class="widget-user-username">{{$nomination->name}}</h3>
                      <h5 class="widget-user-desc">{{$nomination->linked_url}}</h5>
                      </div>

                      <div class="box-footer">



                      <div class="row">
                      <div class="col-sm-6 border-right">
                      <div class="description-block">
                      <h5 class="description-header">Gender</h5>
                      <span class="description-text">{{$nomination->gender}}</span>
                      </div>
                      <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-6 border-right">
                      <div class="description-block">
                      <h5 class="description-header">Nominations </h5>
                      <span class="description-text">{!! $nomination->no_of_nominations !!}</span>
                      </div>
                      <!-- /.description-block -->
                      </div>
                      </div>



                      <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                      @if(isset($nomination->linkedin_url))
                      <li><a href="{!! $nomination->linkedin_url !!}">Linkedin  <span class="pull-right badge bg-blue">Profile</span></a></li>
                      @endif
                      <li><b>Nominated on </b> <span class="pull-right">{!! $nomination->created_at->format('D, M, Y') !!}</span></li>
                      <li><b> Reason for nomination: </b> <br/>
                          {{ $nomination->reason_for_nomination }}
                        </li>   
                        
                        <li><b> Business name: </b> <br/>
                          {{ $nomination->business_name }}
                        </li>   
                        
                        <li><b> Bio: </b> <br/>
                          {{ $nomination->bio }}
                        </li>

                        <li><b> Selected by admin? </b> <br/>
                        @if($nomination->is_admin_selected == 1)
                            yes
                          @else
                                not yet
                          @endif

                        </li>

                      </ul>
                      </div>



                      <!-- /.row -->
                      </div>
                      </div>

                      </div>

                      @endif
              </div>
             
















              <div class="tab-pane " id="nominees">
                
  <!-- Selected Nominees -->
  <h3> Selected nominees </h3>

  @if(isset($nominationSelecteds))
  <div class="box box-primary">
            <div class="box-body">
                     @include('nominations.selected-nominees') 
            </div>
        </div>
        @else 

        <p>Nominees to be voted have not been selected</p>
@endif


  @if(Auth::user()->role_id < 3)

  <!-- All nominees -->
  <h3> All nominees </h3>
  <p>Only admin can see the below </p>
  <div class="box box-primary">
            <div class="box-body">
                     @include('nominations.table')
            </div>
        </div>

  @endif


              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->






