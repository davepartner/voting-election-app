@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Settings</h1>
        <h1 class="pull-right">

        @if(isset($settings) && count($settings) > 0)
                <a href="{!! route('settings.edit', 1) !!}" 
                    class="btn btn-primary pull-right"
                    style="margin-top: -10px;margin-bottom: 5px" >
                    <i class="glyphicon glyphicon-edit"></i> Update Settings
                    </a>
        @else

           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('settings.create') !!}">Add New</a>
       @endif
       
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('settings.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

