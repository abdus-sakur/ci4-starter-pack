<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Dashboard</li>

        <li class="sidebar-item <?= activeMenu('dashboard'); ?>">
            <a href="<?= base_url("dashboard"); ?>" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-title">Setting</li>
        <li class="sidebar-item">
            <a href="<?= base_url("user-setting"); ?>" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>User</span>
            </a>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Components</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item ">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-circle-fill"></i>
                        <span>Alert</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>