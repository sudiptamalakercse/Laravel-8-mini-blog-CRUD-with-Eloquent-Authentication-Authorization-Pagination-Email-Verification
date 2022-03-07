<nav
				class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light mb-3 text-center"
				id="ftco-navbar"
			>
				<div class="container">
					<a class="navbar-brand" href="{{route('home')}}">Mini Blog</a>
					<button
						class="navbar-toggler p-2"
						type="button"
						data-toggle="collapse"
						data-target="#ftco-nav"
						aria-controls="ftco-nav"
						aria-expanded="false"
						aria-label="Toggle navigation"
					>
						<span class="fa fa-bars"></span> Menu
					</button>

					<div class="collapse navbar-collapse" id="ftco-nav">
						<ul class="navbar-nav ml-auto">
              @if(Auth::guard('admin')->check())

              <li class="nav-item">
								<a class="nav-link activeDashboard"  href="{{route('dashboard-admin')}}">Admin Dashboard</a>
							</li>
							<li class="nav-item dropdown">
								<a
									class="nav-link dropdown-toggle activePost"
									href="#"
									id="dropdown04"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									>Posts</a
								>
								<div class="dropdown-menu text-center" aria-labelledby="dropdown04">
									 <a class="dropdown-item" href="{{route('admin.posts.pending')}}">Pending</a>
                   <a class="dropdown-item" href="{{route('admin.posts.update_pending')}}">Updated Pending</a>
                   <a class="dropdown-item" href="{{route('admin.posts.approved')}}">Approved</a>
                   <a class="dropdown-item" href="{{route('admin.posts.disapproved')}}">Disapproved</a>
								</div>
							</li>
              <li class="nav-item dropdown">
								<a
								    id="activeBloggers"
									class="nav-link dropdown-toggle"
									href="#"
									id="dropdown05"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									>Bloggers</a
								>
								<div class="dropdown-menu text-center" aria-labelledby="dropdown05">
                 <a class="dropdown-item" href="{{route('pending_blogger')}}">Pending</a>
                 <a class="dropdown-item" href="{{route('update_pending_blogger')}}">Updated Pending</a>
                 <a class="dropdown-item" href="{{route('approved_blogger')}}">Approved</a>
                 <a class="dropdown-item" href="{{route('disapproved_blogger')}}">Disapproved</a>
								</div>
							</li>
              <li class="nav-item">
								<a class="nav-link activeSetting" href="{{route('setting-admin')}}">Admin Setting</a>
			  </li>
               
			  @php $user_=Auth::guard('admin')->user();@endphp
			  <li class="nav-item dropdown">
								<a
									class="nav-link dropdown-toggle border-start border-end border-1 border-white"
									href="#"
									id="dropdown044"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									>{{$user_->name.'-'.$user_->id}}</a>
								<div class="dropdown-menu text-center" aria-labelledby="dropdown044">
									 <a class="dropdown-item" href="" id="log_out">Log Out</a>
								</div>
							</li>
            @endif

            @if(Auth::guard('blogger')->check())

              <li class="nav-item">
								<a class="nav-link activeDashboard" href="{{route('dashboard-blogger')}}">Blogger Dashboard</a>
			 </li>
            	<li class="nav-item">
								<a class="nav-link" id="activeCreatePost" href="{{route('posts.create')}}">Create Post</a>
							</li>
							<li class="nav-item dropdown">
								<a
									class="nav-link dropdown-toggle activePost"
									href="#"
									id="dropdown06"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									>Posts</a
								>
								<div class="dropdown-menu text-center" aria-labelledby="dropdown06">
                 <a class="dropdown-item" href="{{route('blogger.posts.pending')}}">Pending</a>
                 <a class="dropdown-item" href="{{route('blogger.posts.update_pending')}}">Updated Pending</a>
                 <a class="dropdown-item" href="{{route('blogger.posts.approved')}}">Approved</a>
                 <a class="dropdown-item" href="{{route('blogger.posts.disapproved')}}">Disapproved</a>
								</div>
							</li>
              <li class="nav-item dropdown">
								<a
								    id="activeAdmins"
									class="nav-link dropdown-toggle"
									href="#"
									id="dropdown07"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									>Admins</a
								>
								<div class="dropdown-menu text-center" aria-labelledby="dropdown07">
                 <a class="dropdown-item" href="{{route('pending_admin')}}">Pending</a>
                 <a class="dropdown-item" href="{{route('update_pending_admin')}}">Updated Pending</a>
                 <a class="dropdown-item" href="{{route('approved_admin')}}">Approved</a>
                 <a class="dropdown-item" href="{{route('disapproved_admin')}}">Disapproved</a>
								</div>
							</li>
              <li class="nav-item">
								<a class="nav-link activeSetting" href="{{route('setting-blogger')}}">Blogger Setting</a>
			  </li>

			  @php $user_=Auth::guard('blogger')->user();@endphp
			  <li class="nav-item dropdown">
								<a
									class="nav-link dropdown-toggle border-start border-end border-1 border-white"
									href="#"
									id="dropdown0444"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									>{{$user_->name.'-'.$user_->id}}</a>
								<div class="dropdown-menu text-center" aria-labelledby="dropdown0444">
									 <a class="dropdown-item" href="" id="log_out">Log Out</a>
								</div>
			</li>			  
            @endif
            
            @if(!Auth::guard('admin')->check() && !Auth::guard('blogger')->check())
              <li class="nav-item">
								<a class="nav-link" id='activeHome' href="{{route('home')}}">Home</a>
			 </li>
              <li class="nav-item dropdown">
								<a
								    id="activeSignUp"
									class="nav-link dropdown-toggle"
									href="#"
									id="dropdown08"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									>Sign Up</a
								>
								<div class="dropdown-menu text-center" aria-labelledby="dropdown08">
                 <a class="dropdown-item" href="{{route('register-admin')}}">Admin</a>
                 <a class="dropdown-item" href="{{route('register-blogger')}}">Blogger</a>
								</div>
							</li>

              <li class="nav-item dropdown">
								<a
								    id="activeLogin"
									class="nav-link dropdown-toggle"
									href="#"
									id="dropdown09"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									>Log In</a
								>
								<div class="dropdown-menu text-center" aria-labelledby="dropdown09">
                 <a class="dropdown-item" href="{{route('login-admin')}}">Admin</a>
                 <a class="dropdown-item" href="{{route('login-blogger')}}">Blogger</a>
								</div>
							</li>
            
            @endif
						</ul>
					</div>
				</div>
			</nav>