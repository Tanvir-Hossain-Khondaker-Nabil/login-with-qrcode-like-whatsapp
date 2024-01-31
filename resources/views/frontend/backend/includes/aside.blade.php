<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>

        <li>
            <a href="{{ route('admin') }}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-chat">Dashboards</span>
            </a>
        </li>
        <li class="menu-title" key="t-apps">Apps</li>              
        <li>
            <a href="{{ url('dashboard/scanner') }}">
                <span key="t-ecommerce">Scanner</span>
            </a>
        </li>

    </ul>
</div>