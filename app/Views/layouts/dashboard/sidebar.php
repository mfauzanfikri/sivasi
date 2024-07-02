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

        <!-- data reservasi -->
        <li class="nav-item">
            <a class="nav-link <?= !str_contains(uri_string(), 'dashboard/data-reservasi') ? 'collapsed' : '' ?>" href="/dashboard/data-reservasi">
                <i class="bi bi-file-earmark-text"></i>
                <span>Data Reservasi</span>
            </a>
        </li>

        <!-- data promosi -->
        <li class="nav-item">
            <a class="nav-link <?= !str_contains(uri_string(), 'dashboard/data-promosi') ? 'collapsed' : '' ?>" href="/dashboard/data-promosi">
                <i class="bi bi-percent"></i>
                <span>Data Promosi</span>
            </a>
        </li>

        <!-- laporan -->
        <li class="nav-item">
            <a class="nav-link <?= uri_string() !== 'dashboard/laporan' ? 'collapsed' : '' ?>" href="/dashboard/laporan">
                <i class="bi bi-list-columns"></i>
                <span>Laporan</span>
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