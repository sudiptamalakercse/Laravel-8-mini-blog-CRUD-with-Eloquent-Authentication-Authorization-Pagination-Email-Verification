@props(
['title' => 'Some Title',
'heading',
'email',
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
@if ($errors->any())
    <div class="alert alert-danger" class="mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('message'))
   <div class="alert alert-info" class="mb-3">{{ Session::get('message') }}</div>

   @php 
   if(Session::get('message')!=='We Do Not Find This Email!'){
       $email=null;
   }
   @endphp 

@endif
      <form action="{{route($userType.'-password-email')}}" method="post">
          @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Your Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="@if(isset($email)){{$email}}@endif">
  </div>
  <button type="submit" class="btn btn-primary">Send</button>
</form>
</div>


</div>
</div> 

</x-applayout>