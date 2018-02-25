<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $setting->id !!}</p>
</div>

<!-- Nomination Start Date Field -->
<div class="form-group">
    {!! Form::label('nomination_start_date', 'Nomination Start Date:') !!}
    <p>{!! $setting->nomination_start_date !!}</p>
</div>

<!-- Nomination End Date Field -->
<div class="form-group">
    {!! Form::label('nomination_end_date', 'Nomination End Date:') !!}
    <p>{!! $setting->nomination_end_date !!}</p>
</div>

<!-- Voting Start Date Field -->
<div class="form-group">
    {!! Form::label('voting_start_date', 'Voting Start Date:') !!}
    <p>{!! $setting->voting_start_date !!}</p>
</div>

<!-- Voting End Date Field -->
<div class="form-group">
    {!! Form::label('voting_end_date', 'Voting End Date:') !!}
    <p>{!! $setting->voting_end_date !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $setting->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $setting->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $setting->updated_at !!}</p>
</div>

