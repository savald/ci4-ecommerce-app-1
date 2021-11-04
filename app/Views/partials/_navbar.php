<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <form class=" form-inline  me-0 me-md-3 my-2 my-md-0">
        <div class="input-group input-group-sm">
          <input class="form-control" type="text" placeholder="Start search" aria-label="Start search" aria-describedby="btnNavbarSearch" />
          <button class="btn btn-secondary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
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
              <?php foreach ($categories as $category) : ?>
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

      <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item">
          <button class="nav-link btn-none btn-log" type="button"><i class="bi bi-box-arrow-in-right"></i> Login</button>
        </li>
        <li class="nav-item">
          <button class="nav-link btn-none btn-res" type="button"><i class="bi bi-person-plus"></i> Register</i></button>
        </li>
      </ul>
    </div>
  </div>
</nav>