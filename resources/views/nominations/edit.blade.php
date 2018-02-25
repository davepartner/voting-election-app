@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nomination
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nomination, ['route' => ['nominations.update', $nomination->id], 'method' => 'patch']) !!}

                        @include('nominations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection