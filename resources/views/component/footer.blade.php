<footer class="bg-primary text-white text-center text-lg-start" style="margin-top:20%;">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase fw-bold text-white">About This Web App </h5>
        
<p class="text-start">
This is Blog App which is Web besed with Advanced Features.
<br>
The Features Are Bellow:
<br>
# Multiple Bloggers 
<br>
# Multiple Admins
<br>
# Admin & Blogger Dashboard 
<br>
# Admin can Approved or Disapprove Posts of Bloggers
<br>
# Admin can Get Tasks of Approving Blog Posts Equally
<br>
# Admin can Approve,  Disapprove, Delete Multiple Posts by Cheak Box
<br>
# Pagination System
<br>
# Blogger can Manage the Posts
<br>
# Generel Users can See The Posts of Bloggers Which are Approved by Admins
<br>
# Strong Sequrity with Laravel's Default Authentication & Authorization
<br>
# Real Time & User Friendly Experience
<br>
# Responsive in Any Device
</p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
       @if(Auth::guard('admin')->check())
      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white fw-bold">Links</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a class="text-white" href="{{route('dashboard-admin')}}">Admin Dashboard</a>
          </li>
          <li>
            <a class="text-white" href="{{route('setting-admin')}}">Admin Setting</a>
          </li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white fw-bold">Links</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="{{route('admin.posts.pending')}}" class="text-white">Pending Posts</a>
          </li>
          <li>
            <a href="{{route('admin.posts.update_pending')}}" class="text-white">Updated Pending Posts</a>
          </li>
          <li>
            <a href="{{route('admin.posts.approved')}}" class="text-white">Approved Posts</a>
          </li>
          <li>
            <a href="{{route('admin.posts.disapproved')}}" class="text-white">Disapproved Posts</a>
          </li>
        </ul>
      </div>
     
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white fw-bold mb-0">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="{{route('pending_blogger')}}" class="text-white">Pending Bloggers</a>
          </li>
          <li>
            <a href="{{route('update_pending_blogger')}}" class="text-white">Updated Pending Bloggers</a>
          </li>
          <li>
            <a href="{{route('approved_blogger')}}" class="text-white">Approved Bloggers</a>
          </li>
          <li>
            <a href="{{route('disapproved_blogger')}}" class="text-white">Disapproved Bloggers</a>
          </li>
        </ul>
      </div>
       @endif

              @if(Auth::guard('blogger')->check())
      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white fw-bold">Links</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a class="text-white" href="{{route('dashboard-blogger')}}">Blogger Dashboard</a>
          </li>
          <li>
            <a class="text-white" href="{{route('setting-blogger')}}">Blogger Setting</a>
          </li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white fw-bold">Links</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="{{route('blogger.posts.pending')}}" class="text-white">Pending Posts</a>
          </li>
          <li>
            <a href="{{route('blogger.posts.update_pending')}}" class="text-white">Updated Pending Posts</a>
          </li>
          <li>
            <a href="{{route('blogger.posts.approved')}}" class="text-white">Approved Posts</a>
          </li>
          <li>
            <a href="{{route('blogger.posts.disapproved')}}" class="text-white">Disapproved Posts</a>
          </li>
        </ul>
      </div>
     
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white fw-bold mb-0">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="{{route('pending_admin')}}" class="text-white">Pending Admins</a>
          </li>
          <li>
            <a href="{{route('update_pending_admin')}}" class="text-white">Updated Pending Admins</a>
          </li>
          <li>
            <a href="{{route('approved_admin')}}" class="text-white">Approved Admins</a>
          </li>
          <li>
            <a href="{{route('disapproved_admin')}}" class="text-white">Disapproved Admins</a>
          </li>
        </ul>
      </div>
       @endif

      @if(!Auth::guard('admin')->check() && !Auth::guard('blogger')->check())
      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white fw-bold">Links</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a class="text-white" href="{{route('home')}}">Home</a>
          </li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white fw-bold">Links</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="{{route('register-admin')}}" class="text-white">Admin Sign Up</a>
          </li>
          <li>
            <a href="{{route('register-blogger')}}" class="text-white">Blogger Sign Up</a>
          </li>
        </ul>
      </div>
     
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white fw-bold mb-0">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="{{route('login-admin')}}" class="text-white">Admin Log In</a>
          </li>
          <li>
            <a href="{{route('login-blogger')}}" class="text-white">Blogger Log In</a>
          </li>
        </ul>
      </div>
       @endif

      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="#">www.miniblog.com</a>
  </div>
  <!-- Copyright -->
</footer>