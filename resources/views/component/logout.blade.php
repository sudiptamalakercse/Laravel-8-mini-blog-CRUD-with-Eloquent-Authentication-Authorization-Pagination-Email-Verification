@if(Auth::guard('admin')->user() || Auth::guard('blogger')->user())
<form action="{{route('logout')}}" method="post" id='log_out_form'>
@csrf
</form>
@endif