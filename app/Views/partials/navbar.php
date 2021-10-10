<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">LETSHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline w-75 me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-secondary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <ul class="navbar-nav ms-auto">

      <?php if (empty(session()->get('logged_in'))) : ?>
        <!-- Login -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/login"><i class="bi bi-box-arrow-right"></i> Login</i></a>
        </li>
      <?php else : ?>
        <!-- my account -->
        <li class="nav-item ms-4">
          <div class="btn-group">
            <button type="button" class="p-0" data-bs-toggle="dropdown" aria-expanded="false" style="border: none;background: none;">
              <img src="assets/images/fashion.jpg" alt="" style="width: 40px;height: 40px;" class="mx-auto d-block rounded-circle img-thumbnail">
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
            <ul class="dropdown-menu dropdown-menu-end" style="width:  400px; overflow-x: hidden;">
              <h6 class="text-secondary text-center">My Carts</h6>

              <?php if ($productCarts) : ?>
                <?php foreach ($productCarts as $product) : ?>
                  <li class="dropdown-item mb-2" style="max-width: 400px; overflow-x: hidden;">
                    <a href=" #" class="text-decoration-none text-secondary">
                      <div class="row">
                        <div class="col-md-2">
                          <img class="img-thumbnail" src="assets/images/fashion.jpg" alt="" style="max-width: 50px;">
                        </div>
                        <div class="col-md-7 text-wrap">
                          <?= strlen($product['product_name']) > 26  ? substr($product['product_name'], 0, 26) . '...' : $product['product_name']; ?>
                        </div>
                        <div class="col-md-3 text-dark fw-5 fs-6 text-end">
                          $<?= number_format($product['price'], 0, ',', '.') ?>
                        </div>
                      </div>
                    </a>
                  </li>
                <?php endforeach ?>


                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a href="/carts" class="dropdown-item text-center">
                    <h6><i class="bi bi-bag-fill"></i> View All</h6>
                  </a></li>
              <?php else : ?>
                <p class="text-secondary text-center">Your cart is empty</p>
              <?php endif ?>
            </ul>
          </div>
        </li>
      <?php endif ?>



    </ul>
  </div>
</nav>