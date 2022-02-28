<x-applayout>
  
    <x-slot name="title">
     Admin Dashboard
    </x-slot>
 
 <div class="container">
   @include('component.nav')
  <div class="row">        
    <div class="col">
         
      @if (Session::has('message'))
   <div class="alert alert-info" class="mb-3">{{ Session::get('message') }}</div>
     @endif
     @if (Auth::guard('admin')->check())
     <h3 class="mb-3 text-center">Welcome {{Auth::guard('admin')->user()->name}} (Admin) to Admin Dashboard!!</h3>
     @endif
    </div>
  </div>
</div>

</x-applayout>



