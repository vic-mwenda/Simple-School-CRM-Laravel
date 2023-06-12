
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link nav-tabs-bordered" href="{{route('dashboard')}}">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-tabs-bordered collapsed" href="{{ route('manageinquiry.index') }}">
                <i class="bi bi-menu-button-wide"></i><span>Inquiries</span>
            </a>
        </li><!-- End Manage Inquiries Nav -->
        <li class="nav-item">
            <a class="nav-link nav-tabs-bordered collapsed" href="{{ route('customers.index') }}">
                <i class="bi bi-people"></i><span>Customers</span>
            </a>
        </li><!-- End Manage customers Nav -->
        <li class="nav-item dropdown">
            <a class="nav-link nav-tabs-bordered dropdown-toggle" href="#" id="courseDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
                <i class="bi bi-book"></i> Courses
            </a>
            <ul class="dropdown-menu" aria-labelledby="courseDropdown">
                <li><a class="dropdown-item" href="{{ route('course.index') }}"><i class="bi bi-list"></i> List
                        Courses</a></li>
                <li><a class="dropdown-item" href="{{ route('course.create') }}"><i
                            class="bi bi-plus-circle"></i> Create Course</a></li>
            </ul>
        </li><!-- End Manage courses Nav -->
        <li class="nav-item">
            <a class="nav-link nav-tabs-bordered collapsed" href="{{ route('insights.index') }}">
                <i class="bi bi-bar-chart"></i><span>Insights</span>
            </a>
        </li><!-- End Manage users Nav -->
        <li class="nav-item">
            <a class="nav-link nav-tabs-bordered collapsed" href="{{ route('usermanage.index') }}">
                <i class="bi bi-person-check"></i><span>Users</span>
            </a>
        </li><!-- End Manage users Nav -->
        <li class="nav-item">
            <a class="nav-link nav-tabs-bordered collapsed" href="{{ route('logger.index') }}">
                <i class="bi bi-journal-text"></i><span>Logs</span>
            </a>
        </li><!-- End User Logs Nav -->
        <li class="nav-item">
            <a class="nav-link nav-tabs-bordered collapsed" href="{{ route('profile.edit') }}">
                <i class="bi bi-gear"></i><span>Settings</span>
            </a>
        </li><!-- End Profile Settings Nav -->
    </ul>
    <footer>
        <div class="pt-64 ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
            <a style="text-decoration: none" href="mailto:itsupport@zetech.ac.ke"><i
                    class="bi bi-patch-question-fill"></i> Contact Support</a>
        </div>
    </footer>
</aside><!-- End Sidebar-->
