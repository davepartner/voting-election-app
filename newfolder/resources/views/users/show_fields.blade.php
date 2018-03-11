<div class="col-md-4">

<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{$user->name}}</h3>
              <h5 class="widget-user-desc">{{$user->email}}</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{$user->avatar}}" alt="{{$user->name}}">
            </div>
            <div class="box-footer">



            <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Gender</h5>
                    <span class="description-text">{{$user->gender}}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Role </h5>
                    <span class="description-text">{!! $user->role['name'] !!}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>



            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="{!! $user->facebook_profile !!}">Facebook  <span class="pull-right badge bg-blue">Profile</span></a></li>
                <li><a href="{!! $user->facebook_profile !!}">Joined <span class="pull-right">{!! $user->created_at->format('D, M, Y') !!}</span></a></li>
 
              </ul>
            </div>



              <!-- /.row -->
            </div>
          </div>

          </div>


