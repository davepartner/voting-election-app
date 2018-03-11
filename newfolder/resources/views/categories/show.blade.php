@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
          Category  <small> > {!! $category->name !!} </small>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                   <!-- Display form only user hasn't nominated before -->
                  
                       @include('categories.show_fields')

                </div>
            </div>
        </div>
    </div>
@endsection
