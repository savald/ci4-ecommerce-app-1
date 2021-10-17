<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="container">
  <h2 class="">My Cart</h2>

  <hr class="mt-3 mb-4">
  <div class="row">
    <div class="col-md-9">
      <?php if ($productCarts) : ?>
        <?php foreach ($productCarts as $product) : ?>
          <div class="card mb-3 px-3 shadow-sm" style="width: 100%;">
            <div class="row my-3">
              <div class="col-md-2">
                <img src="/assets/images/fashion.jpg" class="rounded border" alt="..." style="width: 100px;">
              </div>
              <div class="col-md-3 d-flex flex-column justify-content-between">
                <p class="text-secondary mb-3" style="font-size: 14px;">sta store</p>
                <h6 class="text-dark text-wrap"><?= $product['product_name']; ?></h6>
              </div>
              <div class="col-md-2 d-flex align-items-end">
                <h6 class="text-secondary">$<?= number_format($product['price'], 0, ',', '.') ?></h6>
              </div>
              <div class="col-md-3 d-flex align-items-end">
                <p class="mb-1 fs-small">Quantity</p>
                <div class="d-flex ms-2">
                  <button type="button" class="qty-up border bg-light" data-id="pro1">-</button>
                  <input type="text" data-id="pro1" class="text-center border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                  <button type="button" data-id="pro1" class="qty-down border bg-light">+</button>
                </div>
              </div>
              <div class="col-md-2 d-flex flex-column align-items-end justify-content-between">
                <button type="button" class="btn-none fs-medium delete-cart-btn">
                  <p class="text-danger"><i class="fas fa-trash"></i></p>
                </button>
                <h5 class="text-danger">$25.00</h5>
              </div>
            </div>
          </div>
        <?php endforeach ?>
    </div>

    <!-- Checkout -->
    <div class="col-md-3">
      <div class="text-center shadow w-100 card p-3">
        <h6 class="text-secondary mb-4">Total Price</h6>
        <h2 class="text-dark">$10.00</h2>
        <hr class="mb-4">
        <a href="#" class="btn purple text-light w-100">Checkout</a>
      </div>
    </div>
  </div>

<?php else : ?>
  <h4 class="mt-5 text-secondary">Your cart is empty...</h4>
<?php endif ?>
</div>

<?= $this->include('partials/related_product') ?>
<?= $this->endSection() ?>