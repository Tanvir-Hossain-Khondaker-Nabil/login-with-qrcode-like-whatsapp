<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <h2 class="text-danger pt-3" style="font-size: 28px">
                    <span>R</span><span class="text-white">Creation</span>
                </h2>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>



        </div>

        <div class="d-flex align-items-center">
            <form  method="post" action="{{ route('logout') }}" >                        
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                    <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> 
                    <span key="t-logout">Logout</span>
                </button>
                </form> 
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header>