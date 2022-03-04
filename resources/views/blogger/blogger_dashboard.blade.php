
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
      {{$count_pending_post}}
     {{$count_update_pending_post}}
     {{$count_approved_post}}
     {{$count_disapproved_post}}
     {{$count_pending_admin}}
     {{$count_update_pending_admin}}
     {{$count_approved_admin}}
     {{$count_disapproved_admin}}
     @endif
    </div>
  </div>
</div>

</x-applayout>








