



<div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
              <div class="col-sm-6 pull-right"><div id="example_filter" class="dataTables_filter">
              <label>Search:<input type="search" class="form-control input-sm" placeholder=""
               aria-controls="example"></label></div></div></div><div class="row">
               <div class="col-sm-12">

               <table id="example" class="table table-bordered table-striped dataTable" 
               role="grid" aria-describedby="example_info">
                <thead>
                <tr role="row">
               
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" 
                aria-sort="ascending" aria-label="sort column descending" 
                style="width: 177px;">Name</th>


                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" 
                aria-label="sort column ascending" style="width: 225px;">Email</th>
                
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                 aria-label="sort column ascending" style="width: 206px;">
                 Gender</th>
                 
                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" 
                 aria-label="sort column ascending" style="width: 153px;">
                 Role</th>
                 
                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                  aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">
                  Action</th>
                  
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr role="row" class="odd">
                            <td class="sorting_1"> <a href="{!! route('users.show', [$user->id]) !!}" style="font-weight: bold;">
                                {!! $user->name !!}
                                </a></td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->gender !!}</td>
                                    <td>{!! $user->role['name'] !!}</td>
                                    <td>
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                    </tr>

                @endforeach
                
                </tbody>
            
              </table></div></div>
              
              {{ $users->links() }}
            
            </div>
            </div>
            <!-- /.box-body -->
          </div>