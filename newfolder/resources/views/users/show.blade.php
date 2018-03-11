@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <!-- User -->
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
            @if(Auth::user()->role_id < 3)
            <a href="{!! route('users.edit', [$user->id]) !!}" 
                class='btn btn-primary btn-md pull-right'><i class="glyphicon glyphicon-edit"></i> Edit profile</a>
               @endif 
                <div class="row" style="padding-left: 20px">
                    @include('users.show_fields')
                </div>
                   
            </div>
        </div>
    </div>
@endsection
