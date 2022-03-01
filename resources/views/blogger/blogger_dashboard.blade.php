
<x-applayout>
  
    <x-slot name="title">
    Blogger Dashboard
    </x-slot>
 
 <div class="container">
  <div class="row">        
    <div class="col">
         
      @if (Session::has('message'))
   <div class="alert alert-info" class="mb-3">{{ Session::get('message') }}</div>
     @endif
     @if (Auth::guard('blogger')->check())
     <h3 class="mb-3 text-center">Welcome {{Auth::guard('blogger')->user()->name}} (Blogger) to Blogger Dashboard!!</h3>
     @endif
    </div>
  </div>
</div>

</x-applayout>








