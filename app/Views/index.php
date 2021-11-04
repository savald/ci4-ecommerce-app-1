<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="purple banner banner-height w-100 position-absolute"></div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-5">
      <p class="fs-2 text-light">Over <span class="fw-2">1,500</span> curated Design resources, Images, Graphic & Website templates</p>
      <p class="text-light">High quality items created by our global community</p>
    </div>
    <div class="col-md-7">
      <!-- Carousel -->
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner rounded">
          <div class="carousel-item active">
            <img src="assets/images/3.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="assets/images/4.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Shop Now-->
  <section class="shop-now">
    <div class="row ">
      <div class="col shadow p-4 pb-5 my-5 bg-body rounded-3">
        <h1 class="text-center mb-5 mt-2 text-gray">Shop Now</h1>
        <div class="row">
          <?php foreach (array_slice($products, 0, 3) as $product) : ?>
            <div class="col-lg-4">
              <div class="product-card position-relative mb-3">
                <img src="<?= base_url('assets/images/2.jpg'); ?>" class="w-100 rounded-3" alt="...">

                <!-- icon-hover -->
                <div class="position-absolute top-0 start-0 rounded-3 icon-hover">
                  <form class="cartForm">
                    <?php csrf_field() ?>
                    <button type="submit" class="me-1 favoriteBtn <?= $cartModel->checkCart(session()->get('user_id'), $product['id']) ? 'active' : ''; ?>" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-heart"></i></button>

                    <button type="submit" class="me-1 cartBtn <?= $cartModel->checkCart(session()->get('user_id'), $product['id']) ? 'active' : ''; ?>" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-cart-plus"></i></button>
                  </form>
                </div>

              </div>
              <h5 class="my-2 text-wrap product-title">
                <a href="/product/detail/<?= $product['id']; ?>" class="text-decoration-none text-gray"><?= $product['product_name']; ?></a>
              </h5>
              <div class="d-flex justify-content-between align-items-center">
                <span class="sales"><i class="bi bi-download"></i> 300 Sales</span>
                <span class="btn-price ">$<?= number_format($product['price'], 0, ',', '.'); ?></span>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>

    </div>
  </section>

  <section id="recomendation">
    <div class="row mt-4">
      <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-gray">Recomendation</h2>
        <a class="btn btn-primary" href="#" role="button">View more</a>
      </div>

      <hr class="my-4">

      <?php foreach (array_slice($products, 0, 4) as $product) : ?>
        <div class="col-md-3 col-xs-6">
          <div class="product-card position-relative mb-3">
            <img src="<?= base_url('assets/images/2.jpg'); ?>" class="w-100 rounded-3" alt="...">
            <div class="position-absolute top-0 start-0 rounded-3 icon-hover">
              <form class="cartForm">
                <?php csrf_field() ?>
                <button type="submit" class="btn btn-light me-1 favoriteBtn <?= $cartModel->checkCart(session()->get('user_id'), $product['id']) ? 'active' : ''; ?>" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-heart"></i></button>
                <button type="submit" class="btn btn-light me-1 cartBtn <?= $cartModel->checkCart(session()->get('user_id'), $product['id']) ? 'active' : ''; ?>" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-cart-plus"></i></button>
              </form>
            </div>

          </div>
          <h5 class="my-2 text-wrap product-title">
            <a href="/product/detail/<?= $product['id']; ?>" class="text-decoration-none text-gray"><?= $product['product_name']; ?></a>
          </h5>
          <div class="d-flex justify-content-between align-items-end">
            <span class="sales"><i class="bi bi-download"></i> 300 Sales</span>
            <span class="btn-price ">$<?= number_format($product['price'], 0, ',', '.'); ?></span>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </section>

  <section id="recent">
    <div class="row mt-4">
      <div class="d-flex justify-content-between align-items-center mt-4">
        <h2 class="text-gray">Recent</h2>
        <a class="btn btn-primary" href="#" role="button">View more</a>
      </div>

      <hr class="my-4">

      <?php foreach (array_slice($products, 0, 4) as $product) : ?>
        <div class="col-lg-3">
          <div class="product-card position-relative mb-3">
            <img src="<?= base_url('assets/images/2.jpg'); ?>" class="w-100 rounded-3" alt="...">

            <div class="position-absolute top-0 start-0 rounded-3 icon-hover">
              <form class="cartForm">
                <?php csrf_field() ?>
                <button type="submit" class="btn btn-light me-1 favoriteBtn <?= $cartModel->checkCart(session()->get('user_id'), $product['id']) ? 'active' : ''; ?>" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-heart"></i></button>

                <button type="submit" class="btn btn-light me-1 cartBtn <?= $cartModel->checkCart(session()->get('user_id'), $product['id']) ? 'active' : ''; ?>" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-cart-plus"></i></button>
              </form>
            </div>

          </div>
          <h5 class="my-2 text-wrap product-title">
            <a href="/product/detail/<?= $product['id']; ?>" class="text-decoration-none text-gray"><?= $product['product_name']; ?></a>
          </h5>
          <div class="d-flex justify-content-between align-items-end">
            <span class="sales"><i class="bi bi-download"></i> 300 Sales</span>
            <span class="btn-price ">$<?= number_format($product['price'], 0, ',', '.'); ?></span>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </section>
</div>

<?= $this->endSection() ?>