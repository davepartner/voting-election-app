@extends('layouts.logged-out')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/home') }}"><b>
        @if($isWithinVotingPeriod == 'yes')
             Voting 
        
        @elseif($isWithinNominationPeriod == 'yes')

             Nomination 

        @else 

             Nomination and Voting 

        @endif

        
        </b>Platform</a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
<p class="text-center"> 

@if($isWithinVotingPeriod == 'yes')

Login and vote

@elseif($isWithinNominationPeriod == 'yes')

Login to nominate a candidate

@else 

Nomination and Voting periods have not been set

@endif
  </p>     
  
   <div class="social-auth-links text-center">
            <a href="/login/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
            
            </div>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
