<style>
/* Profile Image */
img.profile-img {
    display: block;
    width: 100px;
    height: 100px;
    margin: 15px auto;
    border-radius: 50%;
    border: 3px solid #fff;
    object-fit: cover;
}

/* Navigation links */
.sb-sidenav-menu .nav {
    margin-top: 10px;
    line-height: 1.8;
}

.nav-link {
    color: #cfd8dc;
    font-size: 0.95rem;
    font-weight: 500;
    padding: 10px 15px;
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
}

.nav-link i {
    width: 20px;
    text-align: center;
}

.nav-link:hover,
.nav-link.active {
    color: #fff;
    background-color: #495057;
}

/* Divider lines */
.sb-sidenav-menu hr {
    border-color: rgba(255, 255, 255, 0.2);
    margin: 12px 0;
}

/* Collapse arrow animation */
.sb-sidenav-collapse-arrow {
    transition: transform 0.3s ease;
}

.nav-link[aria-expanded="true"] .sb-sidenav-collapse-arrow {
    transform: rotate(180deg);
}

/* Footer */
.sb-sidenav-footer {
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    padding: 12px;
}

.btn-logout {
    width: 80%;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 600;
}
</style>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav text-center">
                <!-- Profile -->
                <img class="profile-img"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/Seal_of_Capiz.png/640px-Seal_of_Capiz.png"
                    alt="User Profile">
                <p class="text-white fw-bold mb-1">Eman</p>
                <hr>

                <!-- Dashboard -->
                <a class="nav-link {{ request()->routeIs('admins.dashboard') ? 'active' : '' }}"
                    href="{{ route('admins.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>

                <hr>

                <!-- Serviceable(s) -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseService"
                    aria-expanded="false" aria-controls="collapseService">
                    <i class="fas fa-boxes"></i> Serviceable(s)
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseService" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('serv.rpcppe') ? 'active' : '' }}"
                            href="{{ route('serv.rpcppe') }}"><i class="fa-solid fa-list"></i> RPCPPE</a>
                        <a class="nav-link {{ request()->routeIs('serv.ics') ? 'active' : '' }}"
                            href="{{ route('serv.ics') }}"><i class="fa-solid fa-list"></i> ICS</a>
                    </nav>
                </div>

                <hr>

                <!-- Settings -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings"
                    aria-expanded="false" aria-controls="collapseSettings">
                    <i class="fa-solid fa-gear"></i> Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSettings" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('estab') ? 'active' : '' }}"
                            href="{{ route('estab') }}"><i class="fa-solid fa-building"></i> Offices</a>
                        <a class="nav-link {{ request()->routeIs('ppe.acct') ? 'active' : '' }}"
                            href="{{ route('ppe.acct') }}"><i class="fa-solid fa-gears"></i> PPE Account</a>
                        <a class="nav-link {{ request()->routeIs('users.manage') ? 'active' : '' }}"
                            href="{{ route('users.manage') }}"><i class="fa-solid fa-users"></i> User Management</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="sb-sidenav-footer bg-dark text-white text-center">
            <a href="{{ route('admins.logout') }}" class="btn btn-danger btn-sm btn-logout">Logout</a>
        </div>
    </nav>
</div>