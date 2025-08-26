<style>
img {
    display: block;
    max-width: 150px;
    width: auto;
    height: auto;
    margin-left: auto;
    margin-right: auto;
    border-radius: 50px;
}

.nav-link:hover {
    color: #fff;
    background-color: #495057;
}

.sb-sidenav-menu .nav {
    margin-top: 10px;
    line-height: 1.8;
}
</style>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav text-center">
                <img class="rounded-circle py-1"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/Seal_of_Capiz.png/640px-Seal_of_Capiz.png"
                    alt="User Profile">
                <hr>
                <p class="text-white">Eman</p>
                <hr>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <hr>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseService"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Serviceable(s)
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseService" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('serv.rpcppe') }}"><i
                                class="fa-solid fa-list"></i>&nbsp;RPCPPE</a>
                        <a class="nav-link" href="{{ route('serv.ics') }}"><i class="fa-solid fa-list"></i>&nbsp;ICS</a>
                    </nav>
                </div>
                <hr>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSettings" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('estab') }}"><i
                                class="fa-solid fa-building"></i>&nbsp;Offices</a>
                        <a class="nav-link" href="{{ route('ppe_acct') }}"><i class="fa-solid fa-gears"></i>&nbsp;PPE
                            Account</a>
                        <a class="nav-link" href="#"><i class="fa-solid fa-users"></i>&nbsp;User
                            Management</a>
                        <a class="nav-link" href="#"><i class="fa-solid fa-bars"></i>&nbsp;Class
                            Reports</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer bg-dark text-white text-center" style="border-top: 2px solid white">
            <a href="{{ route('admin.logout') }}" class="btn btn-danger mt-2">Logout</a>
        </div>
    </nav>
</div>