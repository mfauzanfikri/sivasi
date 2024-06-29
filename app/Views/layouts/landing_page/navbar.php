<?php

$uri = uri_string();

?>

<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="#hero" class="active">Beranda<br></a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#services">Layanan & Fasilitas</a></li>
        <li><a href="#contact">Kontak</a></li>
        <?php if (!session()->get('pelanggan')) : ?>
            <li class="d-flex">
                <a href="/login">
                    <button class="btn btn-primary">Login</button>
                </a>
                <a href="/register">
                    <button class="btn btn-outline-primary">Register</button>
                </a>
            </li>
        <?php else :  ?>
            <li><a href="/reservasi">Reservasi</a></li>
            <li class="dropdown"><a href="#"><span><?= session()->get('pelanggan')['username'] ?></span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </li>
        <?php endif ?>

    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>