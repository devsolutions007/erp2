@inject('request', 'Illuminate\Http\Request')
<aside class="app-side is-open is-mini" id="app-side">
    <!-- BEGIN .side-content -->
    <div class="side-content ">
        <!-- BEGIN .user-actions -->
        <ul class="user-actions">
            <li>
                <a href="#">
                    <i class="icon-event_note"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-rate_review"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-drafts"></i>
                    <span class="count-label red"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-assignment_turned_in"></i>
                    <span class="count-label"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-photo_camera"></i>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Secured">
                    <i class="icon-verified_user"></i>
                </a>
            </li>
        </ul>
        <!-- END .user-actions -->
        <!-- BEGIN .side-nav -->
        <nav class="side-nav">
            <!-- BEGIN: side-nav-content -->
            <ul class="unifyMenu" id="unifyMenu">
                <li class="{{ Request::is('/') ? 'active selected' : ''}}">
                    <a href="/">
                        <span class="has-icon">
                            <i class="icon-laptop_windows"></i>
                        </span>
                        <span class="nav-title">@lang('global.app_dashboard')</span>
                    </a>
                </li>
                @can('users_manage')
                <!-- <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-flash-outline"></i>
                        </span>
                        <span class="nav-title">@lang('global.user-management.title')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse in">
                        <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.permissions.index') }}" class="current-page">@lang('global.permissions.title')</a>
                        </li>
                        <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                            <a href='{{ route('admin.roles.index') }}'>@lang('global.roles.title')</a>
                        </li>
                        <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                            <a href='{{ route('admin.users.index') }}'> @lang('global.users.title')</a>
                        </li>
                    </ul>
                </li> -->
                @endcan
                @if(isset($_GET['growMenu']))
                <li class="<?php if((Request::path() == 'grow/index') ||( Request::path() == 'grow/growArea') || (Request::path() == 'grow/mgt_gui')) echo 'selected active'; ?>">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-tabs-outline"></i>
                        </span>
                        <span class="nav-title">Grow</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="/grow/index?growMenu=visible" class="{{ (Request::path() == 'grow/index') ? 'current-page' : ''}}">Grow House</a>
                        </li>
                        <li>
                            <a href="/grow/growArea?growMenu=visible" class="{{ (Request::path() == 'grow/growArea') ? 'current-page' : ''}}">Grow Area</a>
                        </li>
                        <li>
                            <a href='/grow/index?growMenu=visible' class="{{ (Request::path() == 'grow/index') ? 'current-page' : ''}}">Plant Mgt</a>
                        </li>
                        <li>
                            <a href='/grow/mgt_gui?growMenu=visible' class="{{ (Request::path() == 'grow/mgt_gui') ? 'current-page' : ''}}">Plant Mgt(GUI)</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if((Request::path() == 'grow/settings/room') ||( Request::path() == 'grow/settings/global')) echo 'selected active'; ?>">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-layers"></i>
                        </span>
                        <span class="nav-title">Settings</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="/grow/settings/room?growMenu=visible" class="{{ (Request::path() == 'grow/settings/room') ? 'current-page' : ''}}">Room</a>
                        </li>
                        <li>
                            <a href="/grow/settings/global?growMenu=visible" class="{{ (Request::path() == 'grow/settings/global') ? 'current-page' : ''}}">Global</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if(Request::path() == 'grow/growing/index') echo 'selected active'; ?>">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-tabs-outline"></i>
                        </span>
                        <span class="nav-title">Growing</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="/grow/growing/index?growMenu=visible&growMode=new" class="{{ (Request::path() == 'grow/growing/index' && request()->growMode == 'new') ? 'current-page' : ''}}">New Grow</a>
                        </li>
                        <li>
                            <a href="/grow/growing/index?growMenu=visible&growMode=move" class="{{ (Request::path() == 'grow/growing/index' && request()->growMode == 'move') ? 'current-page' : ''}}">Move Grow</a>
                        </li>
                        <li>
                            <a href="/grow/growing/index?growMenu=visible&growMode=release" class="{{ (Request::path() == 'grow/growing/index' && request()->growMode == 'release') ? 'current-page' : ''}}">Release</a>
                        </li>
                    </ul>
                </li>
                 <li class="<?php if(Request::path() == 'grow/history/index' || Request::path() == 'grow/history/searchResult') echo 'selected active'; ?>">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                             <i class="icon-adjust2"></i>
                        </span>
                        <span class="nav-title">History</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="/grow/history/index?growMenu=visible" class="current-page">Move History</a>
                        </li>
                    </ul>
                </li>
                @else
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#">
                        <span class="has-icon">
                            <i class="icon-adjust2"></i>
                        </span>
                        <span class="nav-title">Third Parties</span>
                    </a>
                </li>
                <li class="{{ Request::is('customers/*') ? 'active selected' : ''}}">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-tabs-outline"></i>
                        </span>
                        <span class="nav-title">Customers</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="/customers/create" class="{{ Request::is('customers/create') ? 'active selected' : ''}}">Create</a>
                        </li>
                        <li>
                            <a href="/customers/viewAllCustomers" class="">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('product/*') ? 'active selected' : ''}}">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-tabs-outline"></i>
                        </span>
                        <span class="nav-title">Products</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <!-- <li>
                            <a href="/customers/create" class="{{ Request::is('customers/create') ? 'active selected' : ''}}">Create</a>
                        </li> -->
                        <li>
                            <a href="/product/viewAllProducts" class="">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#">
                        <span class="has-icon">
                            <i class="icon-layers"></i>
                        </span>
                        <span class="nav-title">Commercial</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#">
                        <span class="has-icon">
                            <i class="icon-chat_bubble_outline"></i>
                        </span>
                        <span class="nav-title">Financial</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#">
                        <span class="has-icon">
                            <i class="icon-chart-area-outline"></i>
                        </span>
                        <span class="nav-title">Bank/Cash</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#">
                        <span class="has-icon">
                            <i class="icon-center_focus_strong"></i>
                        </span>
                        <span class="nav-title">HRM</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#">
                        <span class="has-icon">
                           <i class="icon-beaker"></i>
                        </span>
                        <span class="nav-title">Tools</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#">
                        <span class="has-icon">
                            <i class="icon-border_outer"></i>
                        </span>
                        <span class="nav-title">CRM</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <!-- <a href="/cashdesk/affIndex"> -->
                    <a target="_blank" href="http://hotbox.today/cashdesk/index.php?user=star&idmenu=138&mainmenu=cashdesk&leftmenu=">
                        <span class="has-icon">
                            <i class="icon-border_all"></i>
                        </span>
                        <span class="nav-title">Point of sale</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="/grow/index?growMenu=visible">
                        <span class="has-icon">
                            <i class="icon-chat_bubble_outline"></i>
                        </span>
                        <span class="nav-title">Grow</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#">
                        <span class="has-icon">
                            <i class="icon-chat_bubble_outline"></i>
                        </span>
                        <span class="nav-title">Report</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#">
                        <span class="has-icon">
                            <i class="icon-chat_bubble_outline"></i>
                        </span>
                        <span class="nav-title">Order</span>
                    </a>
                </li>
                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                    <a href="{{ route('auth.change_password') }}">
                        <span class="has-icon">
                            <i class="icon-lock_outline"></i>
                        </span>
                        <span class="nav-title">Change password</span>
                    </a>
                </li>
                <li class="{{ Request::is('') ? 'active' : ''}}">
                    <a href="#logout" onclick="$('#logout').submit();">
                        <span class="has-icon">
                            <i class="icon-chat_bubble_outline"></i>
                        </span>
                        <span class="nav-title">@lang('global.app_logout')</span>
                    </a>
                </li>
                @endif
            </ul>
            <!-- END: side-nav-content -->
        </nav>
        <!-- END: .side-nav -->
    </div>
    <!-- END: .side-content -->
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}