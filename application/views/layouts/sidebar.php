<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url() ?>">Malang City Tour</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item <?= ($menu_active == "dashboard") ? "active" : ""; ?>">
        <a href="<?= base_url() ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Menu</li>
      <li class="nav-item <?= ($menu_active == "bus_macito") ? "active" : ""; ?>">
        <a href="<?= base_url('bus_macito') ?>"><i class="fas fa-bus"></i> <span>Bus Macito</span></a>
      </li>
      <li class="nav-item <?= ($menu_active == "sptpd") ? "active" : ""; ?>">
        <a href="<?= base_url('esptpd') ?>"><i class="fas fa-columns"></i> <span>Tiket</span></a>
      </li>
      <?php if ($this->session->userdata('user_logged')['privilege'] == 1) : ?>
        <li class="nav-item <?= ($menu_active == "user-management") ? "active" : ""; ?>">
          <a href="<?= base_url('user-management') ?>" class="nav-link"><i class="fas fa-users"></i> <span>User Management</span></a>
        </li>
      <?php endif; ?>
  </aside>
</div>