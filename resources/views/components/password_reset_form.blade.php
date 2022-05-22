@props(
['title' => 'Some Title',
'heading',
'token',
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
@endif
      <form action="{{route($userType.'-password-update')}}" method="post">
          @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$email}}" readonly>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"  name="password">
</div>
 <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"  name="password_confirmation">
  </div>
<input type="hidden" class="form-control" id="exampleInputPassword1" value='{{$token}}' name="token">

  <button type="submit" class="btn btn-primary">Change Password</button>
</form>
</div>


</div>
</div> 

</x-applayout>