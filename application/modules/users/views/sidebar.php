<aside class="main-sidebar sidebar-white-primary elevation-4">
    <a href="<?= base_url('dashboard'); ?>" class="brand-link">
        <img src="<?= base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NIR | NDVI</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('users/home'); ?>" class="nav-link <?= $this->uri->segment(2) == null ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('users/upload_ndvi/'); ?>" class="nav-link <?= $this->uri->segment(2) == 'scan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-qrcode"></i>
                        <p>Upload NDVI</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('users/ndvi_result/'); ?>" class="nav-link <?= $this->uri->segment(2) == 'scan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-file-image"></i>
                        <p>NDVI Result</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?= base_url('admin/logout/'); ?>" class="nav-link">
                       <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>