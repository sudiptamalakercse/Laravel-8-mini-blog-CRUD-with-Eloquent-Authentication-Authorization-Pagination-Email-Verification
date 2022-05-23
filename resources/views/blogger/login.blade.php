<x-applayout>
  
    <x-slot name="title">
     Blogger LogIn
    </x-slot>
 
    <div class="container">
  <div class="row">        
    <div class="col-md-4 offset-md-4">
         <h3 class="mb-3 text-center text-primary">Log In As Blogger</h3>
@if (Session::has('message'))
     <div class="alert alert-info" class="mb-3">{{ Session::get('message') }}</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" class="mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <form action="" method="post">
          @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"  name="password">
  </div>
    <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="remember" name="remember">
    <label class="form-check-label" for="remember">Remember Me</label>
  </div>
  <button type="submit" class="btn-primary btn-sm rounded-pill">Log In</button>
</form>
<div class="mt-2">
<a href="{{route('blogger-password-request')}}">Forget Password</a>
</div>
    </div>
  </div>
</div>

</x-applayout>



