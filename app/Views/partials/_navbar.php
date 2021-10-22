<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="/">LETSHOP</a>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline w-50 me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-secondary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>

    <ul class="navbar-nav ms-auto">
      <?php if (empty(session()->get('logged_in'))) : ?>
        <!-- Login -->
        <li class="nav-item fs-medium d-flex">
          <button class="nav-link btn-log" type="button">Login</i></button>
          <button class="nav-link btn-res" type="button">Register</i></button>
        </li>
      <?php else : ?>
        <!-- my account -->
        <li class="nav-item">
          <div class="btn-group">
            <button type="button" class="btn-none" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?= base_url('assets/images/fashion.jpg'); ?>" alt="" style="width: 40px;height: 40px;" class="mx-auto d-block rounded-circle img-thumbnail">
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <h6 class="text-secondary text-center">My Account</h6>
              <li><a class="dropdown-item text-secondary" href="/favorites"><i class="bi bi-heart"></i> My Favorites</a></li>
              <li>
              <li><a class="dropdown-item text-secondary" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><button type="button" class="dropdown-item text-secondary" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-left"></i> Logout</button></li>
            </ul>
          </div>
        </li>

        <!-- Cart -->
        <li class="nav-item ms-4">
          <div class="dropdown ">
            <button class="position-relative pt-1 btn-none count-cart" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <h4><i class="bi bi-cart"></i></h4>
              <!-- <div id="count-cart"> -->
              <!-- Ajax -->
              <!-- </div> -->
              <span class="position-absolute translate-middle badge rounded-pill bg-danger" id="count-cart" style="font-size: 8px;top: 25%; left: 100%;">
                <!-- Ajax -->
              </span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="width:  310px; overflow-x: hidden;">
              <h6 class="text-secondary text-center">My Carts</h6>
              <div id="my-navbar-cart">
                <!-- Ajax -->
              </div>
            </ul>
          </div>
        </li>
      <?php endif ?>
    </ul>
  </div>
</nav>