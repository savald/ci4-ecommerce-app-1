<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="container">
  <main>
    <div class="row">
      <div class="d-flex justify-content-between align-items-center mt-5">
        <h2 class="">Category: <?= $categoryName; ?></h2>
      </div>

      <hr class="my-4">

      <?php if ($productsCategory) : ?>
        <?php foreach ($productsCategory as $product) : ?>
          <div class="col-lg-2 mb-5 product-cart">
            <div class="card hover-product" style="width: 100%;">
              <img src="../assets/images/2.jpg" class="card-img-top" alt="...">
              <div class="position-absolute icon-hover">
                <form action="#" method="post">
                  <?php csrf_field() ?>
                  <button class="btn btn-light me-1 "><i class="bi bi-heart"></i></i></button>
                  <button class="btn btn-light me-1 "><i class="bi bi-cart-plus"></i></i></button>
                </form>
              </div>
            </div>
            <a href="/product/detail/<?= $product['id']; ?>" class="product-title">
              <h6 class="card-subtitle my-2 text-muted"><?= $product['product_name']; ?></h6>
            </a>
            <div class="d-flex justify-content-between align-items-end">
              <p class="sales"><i class="bi bi-download"></i> 300 Sales</p>
              <p class="btn-price">$<?= number_format($product['price'], 0, ',', '.'); ?></p>
            </div>
          </div>
        <?php endforeach ?>
      <?php else : ?>
        <div class="col">
          <h5 class="text-secondary">No product in this category</h5>
        </div>
      <?php endif ?>
    </div>
    </section>
</div>

<?= $this->endSection() ?>