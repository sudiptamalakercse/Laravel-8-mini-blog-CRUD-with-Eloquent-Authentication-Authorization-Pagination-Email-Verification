@if(Auth::guard('admin')->user() || Auth::guard('blogger')->user())
<form action="{{route('logout')}}" method="post">
@csrf
<p class="container ">
    <button type="submit" class="btn-sm btn-danger rounded-pill" style="float: right;">Log Out</button>
</p>
</form>
@endif