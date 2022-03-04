
<ul class="nav mt-1">

   @if(Auth::guard('admin')->check())
   <li class="nav-item">
    <a class="nav-link" href="{{route('home')}}">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('dashboard-admin')}}">Admin Dashboard</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Posts</a>
    <div class="dropdown-menu">
       <a class="dropdown-item" href="{{route('admin.posts.pending')}}">Pending</a>
       <a class="dropdown-item" href="{{route('admin.posts.update_pending')}}">Updated Pending</a>
       <a class="dropdown-item" href="{{route('admin.posts.approved')}}">Approved</a>
       <a class="dropdown-item" href="{{route('admin.posts.disapproved')}}">Disapproved</a>
    </div>
  </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bloggers</a>
    <div class="dropdown-menu">
       <a class="dropdown-item" href="{{route('pending_blogger')}}">Pending</a>
       <a class="dropdown-item" href="{{route('update_pending_blogger')}}">Updated Pending</a>
       <a class="dropdown-item" href="{{route('approved_blogger')}}">Approved</a>
       <a class="dropdown-item" href="{{route('disapproved_blogger')}}">Disapproved</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('setting-admin')}}">Admin Setting</a>
  </li>
  @endif

  @if(Auth::guard('blogger')->check())
<li class="nav-item">
    <a class="nav-link" href="{{route('home')}}">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('dashboard-blogger')}}">Blogger Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('posts.create')}}">Create Post</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Posts</a>
    <div class="dropdown-menu">
       <a class="dropdown-item" href="{{route('blogger.posts.pending')}}">Pending</a>
       <a class="dropdown-item" href="{{route('blogger.posts.update_pending')}}">Updated Pending</a>
       <a class="dropdown-item" href="{{route('blogger.posts.approved')}}">Approved</a>
       <a class="dropdown-item" href="{{route('blogger.posts.disapproved')}}">Disapproved</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admins</a>
    <div class="dropdown-menu">
       <a class="dropdown-item" href="{{route('pending_admin')}}">Pending</a>
       <a class="dropdown-item" href="{{route('update_pending_admin')}}">Updated Pending</a>
       <a class="dropdown-item" href="{{route('approved_admin')}}">Approved</a>
       <a class="dropdown-item" href="{{route('disapproved_admin')}}">Disapproved</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('setting-blogger')}}">Blogger Setting</a>
  </li>
  @endif

  @if(!Auth::guard('admin')->check() && !Auth::guard('blogger')->check())
  <li class="nav-item">
    <a class="nav-link" href="{{route('home')}}">Home</a>
  </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sign Up</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{route('register-admin')}}">Admin</a>
      <a class="dropdown-item" href="{{route('register-blogger')}}">Blogger</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Log In</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{route('login-admin')}}">Admin</a>
      <a class="dropdown-item" href="{{route('login-blogger')}}">Blogger</a>
    </div>
  </li>
  @endif

</ul>