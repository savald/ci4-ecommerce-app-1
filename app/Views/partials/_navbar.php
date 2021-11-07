<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <form class=" form-inline  me-0 me-md-3 my-2 my-md-0">
        <div class="input-group input-group-sm">
          <input class="form-control" name="searchProduct" type="text" placeholder="Start search" aria-label="Start search" aria-describedby="btnNavbarSearch" />
          <button class="btn btn-secondary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </form>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <div class="btn-group dropend">
            <button type="button" class="nav-link btn-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-bars"></i> Categories
            </button>
            <!-- Dropdown menu links -->
            <ul class="dropdown-menu position-absolute fs-medium fw-light" aria-labelledby="navbarDropdown">
              <?php
              $categories = categories();
              foreach ($categories as $category) : ?>
                <li>
                  <a class="dropdown-item " href="/category/<?= $category->slug; ?>">
                    <?= $category->category_name; ?>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        </li>
      </ul>

      <?php if (empty(session()->get('logged_in'))) : ?>
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item">
            <button class="nav-link btn-none btn-log" type="button"><i class="bi bi-box-arrow-in-right"></i> Login</button>
          </li>
          <li class="nav-item">
            <button class="nav-link btn-none btn-res" type="button"><i class="bi bi-person-plus"></i> Register</i></button>
          </li>
        </ul>
      <?php else : ?>

        <!-- Cart -->
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item  me-4">
            <div class="dropdown ">
              <button class="position-relative pt-1 btn-none count-cart" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <h4><i class="bi bi-cart3"></i></i></h4>
                <span class="position-absolute translate-middle badge rounded-pill bg-danger" id="count-cart" style="font-size: 8px;top: 25%; left: 100%;">
                  <!-- Ajax -->
                </span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" style="width:  310px; overflow-x: hidden;">
                <h6 class="text-gray text-center">My Carts</h6>
                <div id="my-navbar-cart">
                  <!-- Ajax -->
                </div>
              </ul>
            </div>
          </li>

          <!-- my account -->
          <li class="nav-item">
            <div class="btn-group">
              <button type="button" class="btn-none" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= base_url('assets/images/fashion.jpg'); ?>" alt="" style="width: 40px;height: 40px;" class="mx-auto d-block rounded-circle img-thumbnail">
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <h6 class="text-gray text-center">My Account</h6>
                <li><a class="dropdown-item text-secondary fs-medium" href="/favorites"><i class="bi bi-heart"></i> &nbsp;My Favorites</a></li>
                <li>
                <li><a class="dropdown-item text-secondary fs-medium" href="/orders"><i class="bi bi-truck"></i></i> &nbsp;My Order</a></li>
                <li>
                <li><a class="dropdown-item text-secondary fs-medium" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> &nbsp;Dashboard</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><button type="button" class="dropdown-item text-secondary fs-medium" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-left"></i> &nbsp;Logout</button></li>
              </ul>
            </div>
          </li>
        </ul>

        <ul class="navbar-nav  mb-2 mb-lg-0">
        </ul>
      <?php endif ?>

    </div>
  </div>
</nav>

<!-- Login & Register Modal -->
<div class="view-modal">
  <!-- get by ajax -->
</div>

<!-- Logout modal -->
<div class="modal logout-modal fade" id="logoutModal" tabindex="-1" aria-labelledby="LogoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logout</h5>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a href="/logout" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>