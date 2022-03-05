
<x-applayout>
  
    <x-slot name="title">
     Blogger Register
    </x-slot>
 
   <div class="container">
  <div class="row">
    <div class="col-md-4 offset-md-4">
            <h3 class="mb-3 text-center text-primary">Register As Blogger</h3>
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
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" value="{{ old('name') }}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"  name="password">
  </div>
  <button type="submit" class="btn-primary btn-sm rounded-pill">Register</button>
</form>
    </div>
  </div>
</div> 

</x-applayout>







