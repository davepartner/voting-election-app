<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
</div>

<!-- Linkedin Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin_url', 'Linkedin Url:') !!}
    {!! Form::text('linkedin_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Bio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::text('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Business Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_name', 'Business Name:') !!}
    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Reason For Nomination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reason_for_nomination', 'Reason For Nomination:') !!}
    {!! Form::text('reason_for_nomination', null, ['class' => 'form-control']) !!}
</div>

<!-- No Of Nominations Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_of_nominations', 'No Of Nominations:') !!}
    {!! Form::number('no_of_nominations', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Admin Selected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_admin_selected', 'Is Admin Selected:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_admin_selected', false) !!}
        {!! Form::checkbox('is_admin_selected', '1', null) !!} 1
    </label>
</div>

<!-- Is Won Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_won', 'Is Won:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_won', false) !!}
        {!! Form::checkbox('is_won', '1', null) !!} 1
    </label>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::number('category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nominations.index') !!}" class="btn btn-default">Cancel</a>
</div>
