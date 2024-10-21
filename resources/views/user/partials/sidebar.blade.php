<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->profile_picture_url }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ ucwords(Auth::user()->name) }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Menu</li>
            <li class="{{ isActiveRoute('user.dashboard') }}">
                <a href="{{ route('user.dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ isActiveRoute('user.bookings.index') }}">
                <a href="{{ route('user.bookings.index') }}"><i class="fa fa-calendar"></i> <span>My Bookings</span></a>
            </li>
            <li class="{{ isActiveRoute('user.profile') }}">
                <a href="{{ route('user.profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a>
            </li>
            <li class="{{ isActiveRoute('user.support') }}">
                <a href="{{ route('user.contacts') }}"><i class="fa fa-life-ring"></i> <span>Support</span></a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
</aside>
