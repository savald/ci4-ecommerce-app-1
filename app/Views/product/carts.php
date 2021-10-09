<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<main>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class=" position-relative d-flex flex-column justify-content-center">
          <?php if ($productCarts) : ?>
            <?php foreach ($productCarts as $product) : ?>
              <div class="card detail-img px-4 shadow" style="width: 100%;">
                <div class="row my-3">
                  <div class="col-md-4">
                    <img src="/assets/images/fashion.jpg" class="rounded border" alt="..." style="width: 200px;">
                  </div>
                  <div class="col-md-6 d-flex flex-column justify-content-between">
                    <div>
                      <h6 class="text-secondary">$<?= number_format($product['price'], 0, ',', '.') ?></h6>
                      <p class="text-secondary mb-3" style="font-size: 14px;">sta store</p>
                      <h6 class="text-dark"><?= $product['product_name']; ?></h6>
                    </div>
                    <div>
                      <p class="mb-1 fs-small">Quantity</p>
                      <div class=" d-flex">
                        <button class="qty-up border bg-light" data-id="pro1">-</button>
                        <input type="text" data-id="pro1" class="text-center border px-2 w-25 bg-light" disabled value="1" placeholder="1">
                        <button data-id="pro1" class="qty-down border bg-light">+</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 d-flex flex-column justify-content-between">
                    <a href="#" class="p-0">
                      <h4 class="text-end text-danger"><i class="fas fa-trash"></i></h4>
                    </a>
                    <h4 class="text-end text-danger">$25.00</h4>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
        </div>
      </div>

      <!-- Checkout -->
      <div class="col-md-3 mt-5">
        <div class="text-center shadow w-100 card p-3">
          <h6 class="text-secondary mb-4">Cart total</h6>
          <h2 class="text-dark">$10.00</h2>
          <hr class="mb-4">
          <a href="#" class="btn btn-danger w-100">Checkout</a>
        </div>
      </div>
    </div>

  <?php else : ?>
    <h4 class="mt-5 text-secondary">Your cart is empty...</h4>
  <?php endif ?>
  </div>
</main>

<?= $this->include('partials/related_product') ?>
<?= $this->endSection() ?>