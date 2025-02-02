<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="menu-icon mdi mdi-view-dashboard-edit-outline"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('directory.index')}}">
                <i class="menu-icon mdi mdi-list-box-outline"></i>
                <span class="menu-title">My Directory</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-file-document-plus-outline"></i>
                <span class="menu-title">Create</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('File.index') }}">Document</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>