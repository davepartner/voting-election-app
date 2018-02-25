@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nomination User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nominationUser, ['route' => ['nominationUsers.update', $nominationUser->id], 'method' => 'patch']) !!}

                        @include('nomination_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection