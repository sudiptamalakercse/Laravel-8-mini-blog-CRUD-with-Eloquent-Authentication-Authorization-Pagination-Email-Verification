
@props(
['title' => 'Some Title',
'heading',
'units'
 ]
 )

<x-applayout>
    <x-slot name="title">
      {{ $title }}
    </x-slot>
   
<div class="container">
<h3 class="mb-3 text-center mt-3 text-primary">{{$heading}}</h3>
  
    @if (Session::has('message'))
     <div class="alert alert-info" class="mb-3">{{ Session::get('message') }}</div>
    @endif

    @if (Session::has('message_password_reset'))
      <div class="alert alert-info" class="mb-3">{{ Session::get('message_password_reset') }}</div>
      @php
      Session::forget('message_password_reset');
      @endphp
   @endif

<div class="row mt-3">

@foreach ($units as $unit)
<div class="col-md-3 col-sm-6  mb-3">
  <a href="{{$unit['link']}}" class="text-decoration-none">
   <div class="border rounded border-primary  p-4 d-flex flex-column align-items-center justify-content-center" style="margin-left:1.2%;height:90%;border-width:3px !important;">
      <h4 class="text-primary text-center">{{$unit['title']}}</h4>
      <h4 class="text-primary text-center">{{$unit['count']}}</h4>
    </div>
  </a>
</div>
@endforeach

</div>
</div> 

</x-applayout>

