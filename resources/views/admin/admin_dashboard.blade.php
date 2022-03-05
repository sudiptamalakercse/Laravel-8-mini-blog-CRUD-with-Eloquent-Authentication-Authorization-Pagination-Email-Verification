<x-applayout>
  
    <x-slot name="title">
     Admin Dashboard
    </x-slot>
 
 <div class="container">
  <div class="row">        
    <div class="col">
         
      @if (Session::has('message'))
   <div class="alert alert-info" class="mb-3">{{ Session::get('message') }}</div>
     @endif
     @if (Auth::guard('admin')->check())
     <h3 class="mb-3 text-center text-primary">Welcome {{Auth::guard('admin')->user()->name}} (Admin) to Admin Dashboard!!</h3>
     {{$count_pending_post}}
     {{$count_update_pending_post}}
     {{$count_approved_post}}
     {{$count_disapproved_post}}
     {{$count_pending_blogger}}
     {{$count_update_pending_blogger}}
     {{$count_approved_blogger}}
     {{$count_disapproved_blogger}}
     @endif
    </div>
  </div>
</div>

</x-applayout>



