<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>



<div class="container categories my-3">
  <div class="row">
    <div class="col d-flex justify-content-evenly">
      <a href="/category/electronics" class="text-decoration-none text-black">
        <div class="card p-1" style="width: 6rem;">
          <img src="assets/images/fashion.jpg" class="card-img-top" alt="...">
        </div>
        <h6 class="text-center fs-small mt-1 ">Electronics</h6>
      </a>
      <a href="/category/handphones" class="text-decoration-none text-black">
        <div class="card p-1" style="width: 6rem;">
          <img src="assets/images/fashion.jpg" class="card-img-top" alt="...">
        </div>
        <h6 class="text-center fs-small mt-1">Handphones</h6>
      </a>
      <a href="/category/computers" class="text-decoration-none text-black">
        <div class="card p-1" style="width: 6rem;">
          <img src="assets/images/fashion.jpg" class="card-img-top" alt="...">
        </div>
        <h6 class="text-center fs-small mt-1">Computers</h6>
      </a>
      <a href="/category/men-fashion" class="text-decoration-none text-black">
        <div class="card p-1" style="width: 6rem;">
          <img src="assets/images/fashion.jpg" class="card-img-top" alt="...">
        </div>
        <h6 class="text-center fs-small mt-1">Men Fashion</h6>
      </a>
      <a href="/category/women-fashion" class="text-decoration-none text-black">
        <div class="card p-1" style="width: 6rem;">
          <img src="assets/images/fashion.jpg" class="card-img-top" alt="...">
        </div>
        <h6 class="text-center fs-small mt-1">Women Fashion</h6>
      </a>
      <a href="/category/shoes" class="text-decoration-none text-black">
        <div class="card p-1" style="width: 6rem;">
          <img src="assets/images/fashion.jpg" class="card-img-top" alt="...">
        </div>
        <h6 class="text-center fs-small mt-1">Shoes</h6>
      </a>
      <a href="/category/furniture" class="text-decoration-none text-black">
        <div class="card p-1" style="width: 6rem;">
          <img src="assets/images/fashion.jpg" class="card-img-top" alt="...">
        </div>
        <h6 class="text-center fs-small mt-1">Furniture</h6>
      </a>
    </div>
  </div>
</div>
<div class="purple w-100 vh-100 position-absolute" style="z-index: -1;"></div>
<div class="container ">
  <!-- Carousel -->
  <div class="row">
    <div class="col">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
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
  <div class="row ">
    <div class="col shadow p-4 pb-5 my-5 bg-body rounded-3">
      <h1 class="text-center mb-5 mt-2">Shop Now</h1>
      <div class="row">
        <?php foreach (array_slice($products, 0, 3) as $product) : ?>
          <div class="col-lg-4">
            <div class="card hover-product" style="width: 100%;">
              <img src="assets/images/2.jpg" class="card-img-top" alt="...">
              <div class="position-absolute icon-hover">

                <form class="cartForm">
                  <?php csrf_field() ?>
                  <button type="submit" class="btn btn-light me-1 favoriteBtn" data-userId="<?= $product['user_id']; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-heart"></i></button>
                  <button type="submit" class="btn btn-light me-1 cartBtn" data-userId="<?= $product['user_id']; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-cart-plus"></i></button>
                </form>

              </div>
            </div>
            <a href="/product/detail/<?= $product['id']; ?>" class="text-decoration-none">
              <h5 class="card-subtitle my-2 text-muted"><?= $product['product_name']; ?></h5>
            </a>
            <div class="d-flex justify-content-between">
              <p class="sales"><i class="bi bi-download"></i> 300 Sales</p>
              <p class="btn-price ">$<?= number_format($product['price'], 0, ',', '.'); ?></p>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>

  </div>
</div>

<!-- <div class="container">
  <div id="recomendation">
    <div class="row">
      <div class="d-flex justify-content-between align-items-center mt-5">
        <h2 class="">Recomendation</h2>
        <a class="btn btn-primary" href="#" role="button">View more</a>
      </div>

      <hr class="my-4">

      <?php foreach (array_slice($products, 0, 4) as $product) : ?>
        <div class="col-lg-3 mb-5">
          <div class="card hover-product" style="width: 100%;">
            <img src="assets/images/2.jpg" class="card-img-top" alt="...">
            <div class="position-absolute icon-hover">
              <form action="" method="post" class="cartForm">
                <?php csrf_field() ?>
                <button type="submit" class="btn btn-light me-1 favoriteBtn"><i class="bi bi-heart"></i></i></button>
                <button type="submit" class="btn btn-light me-1 cartBtn"><i class="bi bi-cart-plus"></i></i></button>
              </form>
            </div>
          </div>
          <a href="/product/detail/<?= $product['id']; ?>" class="text-decoration-none">
            <h5 class="card-subtitle my-2 text-muted"><?= $product['product_name']; ?></h5>
          </a>
          <div class="d-flex justify-content-between align-items-end">
            <p class="sales"><i class="bi bi-download"></i> 300 Sales</p>
            <p class="btn-price ">$<?= number_format($product['price'], 0, ',', '.'); ?></p>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>

  <div id="recently">
    <div class="row">
      <div class="d-flex justify-content-between align-items-center mt-5">
        <h2 class="">Recent</h2>
        <a class="btn btn-primary" href="#" role="button">View more</a>
      </div>

      <hr class="my-4">

      <?php foreach (array_slice($products, 0, 4) as $product) : ?>
        <div class="col-lg-3 mb-5">
          <div class="card hover-product" style="width: 100%;">
            <img src="assets/images/2.jpg" class="card-img-top" alt="...">
            <div class="position-absolute icon-hover">
              <form action="" method="post" class="cartForm">
                <?php csrf_field() ?>
                <button class="btn btn-light me-1 "><i class="bi bi-heart"></i></i></button>
                <button class="btn btn-light me-1 "><i class="bi bi-cart-plus"></i></i></button>
              </form>
            </div>
          </div>
          <a href="/product/detail/<?= $product['id']; ?>" class="text-decoration-none">
            <h5 class="card-subtitle my-2 text-muted"><?= $product['product_name']; ?></h5>
          </a>
          <div class="d-flex justify-content-between align-items-end">
            <p class="sales"><i class="bi bi-download"></i> 300 Sales</p>
            <p class="btn-price ">$<?= number_format($product['price'], 0, ',', '.'); ?></p>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div> -->
<?= $this->endSection() ?>