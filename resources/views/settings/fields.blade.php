<!-- Nomination Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomination_start_date', 'Nomination Start Date:') !!}
    {!! Form::date('nomination_start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomination End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomination_end_date', 'Nomination End Date:') !!}
    {!! Form::date('nomination_end_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Voting Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('voting_start_date', 'Voting Start Date:') !!}
    {!! Form::date('voting_start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Voting End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('voting_end_date', 'Voting End Date:') !!}
    {!! Form::date('voting_end_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('settings.index') !!}" class="btn btn-default">Cancel</a>
</div>
