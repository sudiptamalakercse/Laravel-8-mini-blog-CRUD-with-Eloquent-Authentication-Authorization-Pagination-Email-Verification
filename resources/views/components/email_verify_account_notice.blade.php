
@props(
['title' => 'Some Title',
'heading',
'userType'
 ]
 )

<x-applayout>
    <x-slot name="title">
      {{ $title }}
    </x-slot>
   
<div class="container">
<h3 class="mb-3 text-center mt-3 text-primary">{{$heading}}</h3>
<div class="row mt-3">


<div class="col-md-4 offset-md-4  mb-3">

  @if (Session::has('message_password_reset'))
   <div class="alert alert-info" class="mb-3">{{ Session::get('message_password_reset') }}</div>
    @php
    Session::forget('message_password_reset');
    @endphp
   @endif

    @if (Session::has('message'))
     <div class="alert alert-info" class="mb-3">{{ Session::get('message') }}</div>
    @endif
    
    <h3 class="text-center mt-5">{{auth($userType)->user()->name}} ({{ucwords($userType)}})</h3>
    <h3 class="text-center">Please Verify Your Account with New Email Verification Link!</h3>
  
   <form action="{{route($userType.'-verify-email-resend')}}" method="post">
    @csrf
    <div class="text-center mt-5">
    <button type="submit" class="btn btn-info">Resend Verification Email</button>
    </div>
</form>


</div>


</div>
</div> 

</x-applayout>