<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- dashboard -->
        <li class="nav-item">
            <a class="nav-link <?= uri_string() !== 'dashboard' && 'collapse' ?>" href="">
                <i class="bi bi-grid"></i>
                <span>Home</span>
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