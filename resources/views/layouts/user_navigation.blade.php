<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('dashboard')}}">
                <i class="bi bi-view-list"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed " href="{{ route('manageinquiry.create') }}">
                <i class="bi bi-patch-plus-fill"></i><span>Create Inquiry</span>
            </a>

        </li><!-- End Manage Inquiries Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('customers.index') }}">
                <i class="bi bi-people"></i><span>My Customers</span>
            </a>
        </li><!-- End Manage customers Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manageinquiry.index') }}">
                <i class="bi bi-journal-text"></i><span>My Inquiries</span>
            </a>

        </li><!-- End User Logs Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('profile.edit')}}">
                <i class="bi bi-gear"></i><span>Profile Settings</span>
            </a>
        </li> <!-- End Profile Settings Nav -->

    </ul>

</aside><!-- End Sidebar-->



