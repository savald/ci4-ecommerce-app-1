<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <div class="sb-sidenav-menu-heading">Account</div>
        <a class="nav-link" href="/profile">
          <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
          Profile
        </a>
        <div class="sb-sidenav-menu-heading">Seller</div>
        <a class="nav-link" href="/products">
          <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
          Products
        </a>
      </div>
    </div>
    <div class="sb-sidenav-footer">
      <?= session()->get('name'); ?>
    </div>
  </nav>
</div>