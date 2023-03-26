<div class="vertical-menu">

    <div data-simplebar class="h-100">

        @php
            $user = Auth::user();
        @endphp

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('backend/assets/images/users/logo-admin.jpg') }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ $user->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.blog.kegiatan') }}">Kegiatan Sekolah</a></li>
                        <li><a href="{{ route('admin.blog.prestasi') }}">Prestasi</a></li>
                        <li><a href="{{ route('admin.blog.ekstra') }}">Ekstrakurikuler</a></li>
                        <li><a href="{{ route('admin.blog.add') }}">Add Data</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Informasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.informasi.index') }}">Informasi</a></li>
                        <li><a href="{{ route('admin.informasi.add') }}">Add Informasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Asset</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.asset.index') }}">Asset</a></li>
                        <li><a href="{{ route('admin.asset.add') }}">Add Asset</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.pengajar.index') }}" class="waves-effect">
                        <i class="ri-group-line"></i>
                        <span>Pengajar</span>
                    </a>
                </li>

                <li class="menu-title">Admin</li>

                <li>
                    <a href="{{ route('admin.user.index') }}" class="waves-effect">
                        <i class="ri-group-line"></i>
                        <span>User</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
