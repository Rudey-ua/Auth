<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header">Admin Panel</li>
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
                <p>
                    Users
                    <span class="badge badge-info right">{{ count(\App\Models\User::all()) }}</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
