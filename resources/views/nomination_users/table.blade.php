<table class="table table-responsive" id="nominationUsers-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Nomination Id</th>
        <th>Category Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($nominationUsers as $nominationUser)
        <tr>
            <td>{!! $nominationUser->user_id !!}</td>
            <td>{!! $nominationUser->nomination_id !!}</td>
            <td>{!! $nominationUser->category_id !!}</td>
            <td>
                {!! Form::open(['route' => ['nominationUsers.destroy', $nominationUser->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('nominationUsers.show', [$nominationUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('nominationUsers.edit', [$nominationUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>