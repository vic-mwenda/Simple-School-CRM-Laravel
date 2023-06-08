  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
            <i class="bi bi-house"></i>
            <span>Home</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed " href="{{ route('manageinquiry.index') }}">
          <i class="bi bi-menu-button-wide"></i><span>Manage Inquiries</span>
        </a>

      </li><!-- End Manage Inquiries Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('logger.index')}}">
          <i class="bi bi-journal-text"></i><span>User Logs</span>
        </a>

      </li><!-- End User Logs Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('usermanage.index') }}" >
          <i class="bi bi-people"></i><span>Manage Users</span>
        </a>
      </li><!-- End Manage users Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('customers.index') }}" >
                <i class="bi bi-people"></i><span>Customers</span>
            </a>
        </li><!-- End Manage customers Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('insights.index') }}" >
                <i class="bi bi-bar-chart"></i><span>Insights</span>
            </a>
        </li><!-- End Manage users Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('profile.edit')}}">
          <i class="bi bi-gear"></i><span>Profile Settings</span>
        </a>
      </li> <!-- End Profile Settings Nav -->

    </ul>

      <footer>
          <div class=" ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0" style="margin-top: 45vh;text-decoration-line: none" >
              <a style="text-decoration: none" href="mailto:itsupport@zetech.ac.ke"><i class="bi bi-patch-question-fill"></i> Contact Support</a>
          </div>
      </footer>

  </aside><!-- End Sidebar-->



