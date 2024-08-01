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
                            <span class="user-level">Dosen</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="{{ route('dosen.dashboard')}}" class="collapsed">
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
                <li class="nav-item {{ Request::is('dosen/mahasiswa*') ? 'active' : '' }}">
                    <a href="{{route('dosen.mahasiswa')}}">
                        <i class="fas fa-users"></i>
                        <p>Students</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('absensi/view*') ? 'active' : '' }}">
                    <a href="{{route('absensi.view')}}">
                        <i class="fas fa-clock"></i>
                        <p>Attendance </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('dosen/absensi_mahasiswa*') ? 'active' : '' }}">
                    <a href="{{ route('dosen.absensi.mahasiswa') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Attendance Record</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('week/view*') ? 'active' : '' }}">
                    <a href="{{route('week.view')}}">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Week</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
