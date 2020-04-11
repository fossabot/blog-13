<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('blog.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ set_active('admin.dashboard') }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang('dashboard.dashboard')</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ set_active(['admin.posts.index', 'admin.posts.create', 'admin.posts.edit', 'admin.comments.index', 'admin.comments.edit', 'admin.users.index', 'admin.users.edit', 'admin.pages.index', 'admin.pages.create', 'admin.pages.edit']) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span> @lang('dashboard.contents')</span>
        </a>
        <div id="collapseTwo" class="collapse {{ set_active(['admin.posts.index', 'admin.posts.create', 'admin.posts.edit', 'admin.comments.index', 'admin.comments.edit', 'admin.users.index', 'admin.users.edit', 'admin.pages.index', 'admin.pages.create', 'admin.pages.edit'], 'show') }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> @lang('dashboard.posts')</h6>
                <a class="collapse-item {{ set_active(['admin.posts.index', 'admin.posts.create', 'admin.posts.edit']) }}" href="{{ route('admin.posts.index') }}">
                    @lang('dashboard.posts')
                </a>
                <a class="collapse-item {{ set_active(['admin.categories.index', 'admin.categories.create', 'admin.categories.edit']) }}" href="{{ route('admin.categories.index') }}">
                    @lang('dashboard.categories')
                </a>
                <a class="collapse-item {{ set_active(['admin.tags.index', 'admin.tags.create', 'admin.tags.edit']) }}" href="{{ route('admin.tags.index') }}">
                    @lang('dashboard.tags')
                </a>
                <a class="collapse-item {{ set_active(['admin.comments.index', 'admin.comments.edit']) }}" href="{{ route('admin.comments.index') }}">
                    @lang('dashboard.comments')
                </a>
                <a class="collapse-item {{ set_active(['admin.users.index', 'admin.users.edit']) }}" href="{{ route('admin.users.index') }}">
                    @lang('dashboard.users')
                </a>

            </div>

            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pages</h6>
                <a class="collapse-item {{ set_active(['admin.pages.index', 'admin.pages.create', 'admin.pages.edit']) }}" href="{{ route('admin.pages.index') }}">
                    @lang('dashboard.pages')
                </a>
            </div>
        </div>

    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
