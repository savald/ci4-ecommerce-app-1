<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
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
        <li class="nav-item ms-4">
          <div class="btn-group">
            <button type="button" class="p-0" data-bs-toggle="dropdown" aria-expanded="false" style="border: none;background: none;">
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
              <li><a class="dropdown-item text-secondary" href="/logout"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
            </ul>
          </div>
        </li>

        <!-- Cart -->
        <li class="nav-item ms-4">
          <div class="dropdown ">
            <button class="position-relative p-0" style="border: none;background: none;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <h4><i class="bi bi-cart"></i></h4>
              <span class="position-absolute translate-middle badge rounded-pill bg-danger" style="font-size: 8px;top: 25%; left: 100%;">
                99+
              </span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="width:  310px; overflow-x: hidden;">
              <h6 class="text-secondary text-center">My Carts</h6>
              <div id="my-carts">
                <!-- Ajax -->
              </div>
            </ul>
          </div>
        </li>
      <?php endif ?>



    </ul>
  </div>
</nav>