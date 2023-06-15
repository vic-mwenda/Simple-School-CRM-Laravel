
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link nav-tabs-bordered" href="{{route('dashboard')}}">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="nav-item">
            <button type="button" class="nav-link flex items-center w-full p-2 transition duration-75 rounded-lg group" aria-controls="inquiry-dropdown" data-collapse-toggle="inquiry-dropdown">
                <span class="flex-1 ml-2 text-left whitespace-nowrap" sidebar-toggle-item>
                    <i class="bi bi-journal-text"></i>Inquiries</span>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="inquiry-dropdown" class="hidden py-2 space-y-2">
                <li>
                    <a href="{{ route('manageinquiry.index') }}" class="flex nav-link items-center w-full p-2">List Inquiries</a>
                </li>
                <li>
                    <a href="{{ route('manageinquiry.create') }}" class="flex nav-link items-center w-full p-2">Create Inquiry</a>
                </li>

            </ul>
        </li>
       <!-- End Manage Inquiries Nav -->
        <li class="nav-item">
            <a class="nav-link nav-tabs-bordered collapsed" href="{{ route('customers.index') }}">
                <i class="bi bi-people"></i><span>Customers</span>
            </a>
        </li>
        <!-- End Manage customers Nav -->

        <li class="nav-item">
            <button type="button" class="nav-link flex items-center w-full p-2 transition duration-75 rounded-lg group" aria-controls="dropdown-example" data-collapse-toggle="course-dropdown">
                <span class="flex-1 ml-2 text-left whitespace-nowrap" sidebar-toggle-item>
                    <i class="bi bi-book"></i> Courses</span>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="course-dropdown" class="hidden py-2 space-y-2">
                <li>
                    <a href="{{ route('course.index') }}" class="flex nav-link items-center w-full p-2">List Courses</a>
                </li>
                <li>
                    <a href="{{ route('course.create') }}" class="flex nav-link items-center w-full p-2">Create Course</a>
                </li>

            </ul>
        </li>
        <!-- End Manage course Nav -->

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
