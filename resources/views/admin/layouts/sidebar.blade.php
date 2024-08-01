<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('Atlantis-Lite/assets/img/zzz.webp')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->nama }}
                            <span class="user-level">Admin</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="{{ route('admin.dashboard')}}" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Feature</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-users"></i>
                        <p>Users</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('mahasiswa.view')}}">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>Mahasiswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dosen.view')}}">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <span>Dosen</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('kelas/view*') ? 'active' : '' }}">
                    <a href="{{route('kelas.view')}}">
                        <i class="fas fa-school"></i>
                        <p>Class</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('jurusan/view*') ? 'active' : '' }}">
                    <a href="{{route('jurusan.view')}}">
                        <i class="fas fa-feather"></i>
                        <p>Major</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('semester/view*') ? 'active' : '' }}">
                    <a href="{{route('semester.view')}}">
                        <i class="fas fa-chart-bar"></i>
                        <p>Semester</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('matakuliah/view*') ? 'active' : '' }}">
                    <a href="{{route('matakuliah.view')}}">
                        <i class="fas fa-book"></i>
                        <p>Courses</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
