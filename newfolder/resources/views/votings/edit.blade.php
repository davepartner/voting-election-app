@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Voting
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($voting, ['route' => ['votings.update', $voting->id], 'method' => 'patch']) !!}

                        @include('votings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection