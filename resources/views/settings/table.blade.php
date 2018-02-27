<table class="table table-responsive" id="settings-table">
    <thead>
        <tr>
            <th>Nomination Start Date</th>
        <th>Nomination End Date</th>
        <th>Voting Start Date</th>
        <th>Voting End Date</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($settings as $setting)
        <tr>
            <td>{!! $setting->nomination_start_date->format('D, d M Y - H:i') !!}</td>
            <td>{!! $setting->nomination_end_date->format('D, d M Y - H:i')  !!}</td>
            <td>{!! $setting->voting_start_date->format('D, d M Y - H:i')  !!}</td>
            <td>{!! $setting->voting_end_date->format('D, d M Y - H:i')  !!}</td>
            <td>
                {!! Form::open(['route' => ['settings.destroy', $setting->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                     <a href="{!! route('settings.edit', [$setting->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>