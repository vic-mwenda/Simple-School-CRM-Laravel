<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed " href="{{ route('manageinquiry.index') }}">
                <i class="bi bi-menu-button-wide"></i><span>View Inquiries</span>
            </a>

        </li><!-- End Manage Inquiries Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>User Logs</span>
            </a>

        </li><!-- End User Logs Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('profile.edit')}}">
                <i class="bi bi-gear"></i><span>Profile Settings</span>
            </a>
        </li> <!-- End Profile Settings Nav -->

    </ul>

</aside><!-- End Sidebar-->



