<?php if ($productCarts) : ?>
  <form action="/checkout" method="post">
    <?= csrf_field(); ?>
    <div class="row">
      <div class="col-md-9">
        <div class="bg-body rounded px-3 py-1 mb-3 shadow">
          <?php $totalPrice = array_map(function ($product) { ?>
            <div class="row my-3">
              <div class="col-md-2">
                <img src="/assets/images/fashion.jpg" class="rounded border w-100" alt="...">
              </div>
              <div class="col-md-3 d-flex flex-column justify-content-between">
                <p class="text-secondary mb-3" style="font-size: 14px;">sta store</p>
                <h6 class="text-dark text-break"><?= $product['product_name']; ?></h6>
              </div>
              <div class="col-md-2 d-flex align-items-end">
                <h6 class="text-secondary">$<?= number_format($product['price'], 0, ',', '.') ?></h6>
              </div>
              <div class="col-md-3 d-flex align-items-end">
                <p class="mb-1 fs-small">Quantity</p>
                <div class="d-flex ms-2">
                  <button type="button" class="qty-down border bg-light" data-productId="<?= $product['id']; ?>">-</button>
                  <input type="text" data-productId="<?= $product['id']; ?>" class="text-center border px-2 w-50 bg-light qty-input" disabled value="1" placeholder="1">
                  <!-- quantity -->
                  <input type="hidden" name="quantity[]" data-productId="<?= $product['id']; ?>" class="qty-input" value="1">
                  <!-- id product -->
                  <input type="hidden" name="product_id[]" value="<?= $product['id']; ?>">
                  <button type="button" class="qty-up border bg-light" data-productId="<?= $product['id']; ?>">+</button>
                </div>
              </div>
              <div class="col-md-2 d-flex flex-column align-items-end justify-content-between">
                <button type="button" class="btn-none fs-medium text-danger cartDelBtn" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>"><i class="fas fa-trash"></i></button>
                <h5 class="text-danger product-price" data-productId="<?= $product['id']; ?>">Rp <span><?= number_format($product['price'], 0, ',', '.') ?></span></h5>
              </div>
            </div>
            <hr class="my-2">
          <?php
            return $product['price'];
          }, $productCarts);
          ?>
        </div>
      </div>

      <!-- Checkout -->
      <div class="col-md-3">
        <div class="text-center shadow bg-light rounded p-3">
          <h5 class="text-secondary mb-4">Total Price</h5>
          <h2 class="text-dark" id="deal-price">Rp <span><?= number_format($cartModel->getTotalPrice($totalPrice), 0, ',', '.'); ?></span></h2>
          <input type="hidden" name="total_price" value="<?= $cartModel->getTotalPrice($totalPrice); ?>">
          <hr class="mb-4">
          <button type="submit" class="checkout-btn text-light w-100"><i class="fas fa-lock"></i> Secure Checkout</button>
          <span class="text-muted fs-small mt-3">100% money back guarantee</span>
        </div>
      </div>
    </div>
  </form>

<?php else : ?>
  <div class="bg-body mb-5 p-3 shadow rounded-3">
    <h2 class="text-dark mt-4 text-center">No product...</h2>
    <a href="/" class="text-decoration-none text-center mx-auto d-block">&laquo; Back Shop</a>
  </div>
<?php endif ?>