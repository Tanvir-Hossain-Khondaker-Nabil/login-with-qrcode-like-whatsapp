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

        {{-- @if (Auth::user()->role == \App\Models\User::ADMIN)  --}}
        <li class="menu-title" key="t-apps">Apps</li>              
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-list-ul"></i>
                <span key="t-ecommerce">Receiver</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('receiver.create') }}" key="t-products">Create</a></li>
                <li><a href="{{ route('receiver.index') }}" key="t-product-detail">Table</a></li>
            </ul>
        </li>
        {{-- @endif --}}

    </ul>
</div>