<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- dashboard -->
        <li class="nav-item">
            <a class="nav-link <?= uri_string() !== 'dashboard' ? 'collapsed' : '' ?>" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <!-- data pelanggan -->
        <li class="nav-item">
            <a class="nav-link <?= uri_string() !== 'dashboard/data-pelanggan' ? 'collapsed' : '' ?>" href="/dashboard/data-pelanggan">
                <i class="bi bi-people"></i>
                <span>Data Pelanggan</span>
            </a>
        </li>

        <!-- logout -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->