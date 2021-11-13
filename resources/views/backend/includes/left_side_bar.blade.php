<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            
        </div>
         <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm fab-right fab-top btn-primary shadow1 " style="background:#ff7b00;">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="{{asset('img/dummy/u1.png')}}" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">{{Auth::user()->name}}</h6>
                        <a href="#" style="color:#ffb700;"><i class="icon-circle text-success blink" ></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="{{route('admin-change-password')}}" class="list-group-item list-group-item-action"><i class="mr-2 icon-security text-purple"></i>Change Details</a>
                        <a href="{{route('logout')}}" class="list-group-item list-group-item-action"><i class="mr-2 icon-security text-purple"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu" style="margin-top:10px;">
        @if(Auth::user()->role == 1)
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('dashboard')}}">
                    <i class="icon icon-analytics-1 blue-text s-18" style="color:#ffb700 !important;"></i> <span>Dashboard</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('links')}}">
                    <i class="icon icon-link2 blue-text s-18" style="color:#ffb700 !important;"></i> <span >Links</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('course-index')}}">
                    <i class="icon icon-clipboard-edit blue-text s-18" style="color:#ffb700 !important;"></i> <span>Courses</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('session-index')}}">
                    <i class="icon icon-clock-o blue-text s-18" style="color:#ffb700 !important;"></i> <span>Create Modules</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('student-index')}}">
                    <i class="icon icon-user blue-text s-18" style="color:#ffb700 !important;"></i> <span>Students</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('writing-tests-index')}}">
                    <i class="icon icon-user blue-text s-18" style="color:#ffb700 !important;"></i> <span>Writing Tests</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('admin-speaking-test-bookings-index')}}">
                    <i class="icon icon-user blue-text s-18" style="color:#ffb700 !important;"></i> <span>Speaking Test Bookings</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('channel-index')}}">
                    <i class="icon icon-inr blue-text s-18" style="color:#ffb700 !important;"></i> <span>Schedule Meetings</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('users',['type' => 1])}}">
                    <i class="icon icon-user" style="color:#ffb700 !important;"></i> <span>Users</span> </i>
                </a>
            </li>
           
            @endif
            @if(Auth::user()->role == 3)
           
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('links')}}">
                    <i class="icon icon-link2 blue-text s-18" style="color:#ffb700 !important;"></i> <span >Links</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('tutor-writing-tests')}}">
                    <i class="icon icon-analytics-1 blue-text s-18" style="color:#ffb700 !important;"></i> <span>Writing Test</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('tutor-speaking-tests')}}">
                    <i class="icon icon-link2 blue-text s-18" style="color:#ffb700 !important;"></i> <span >Speaking Tests Bookings</span> </i>
                </a>
            </li>
            @endif
            @if(Auth::user()->role == 4)
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('business-lead-dashboard')}}">
                    <i class="icon icon-analytics-1 blue-text s-18" style="color:#ffb700 !important;"></i> <span>Dashboard</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('links')}}">
                    <i class="icon icon-link2 blue-text s-18" style="color:#ffb700 !important;"></i> <span >Links</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('business-admins-index')}}">
                    <i class="icon icon-user" style="color:#ffb700 !important;"></i><span>Business Admins </span>
                </a>
            </li>
            
          
            @endif
            @if(Auth::user()->role == 5)
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('team-lead-dashboard')}}">
                    <i class="icon icon-analytics-1 blue-text s-18" style="color:#ffb700 !important;"></i> <span>Dashboard</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('links')}}">
                    <i class="icon icon-link2 blue-text s-18" style="color:#ffb700 !important;"></i> <span >Links</span> </i>
                </a>
            </li>
            <li class="treeview" style="border-top:1px solid #f8f8f8;">
                <a href="{{route('users',['type' => 6])}}">
                    <i class="icon icon-user" style="color:#ffb700 !important;"></i><span>Business Administrators </span>
                </a>
            </li>
            
          
            @endif
           
        </ul>
    </section>
</aside>