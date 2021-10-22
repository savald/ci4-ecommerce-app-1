<div class="row">
  <?php if ($productCarts) : ?>
    <div class="col-md-9">
      <div class="card mb-3 px-3 shadow">
        <?php $totalPrice = array_map(function ($product) { ?>
          <div class="row my-3">
            <div class="col-md-2">
              <input type="checkbox" name="" id="">
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
                <button type="button" class="qty-down border bg-light" data-productId="<?= $product['id']; ?>">-</button>
                <input type="text" data-productId="<?= $product['id']; ?>" class="text-center border px-2 w-50 bg-light qty-input" disabled value="1" placeholder="1">
                <button type="button" class="qty-up border bg-light" data-productId="<?= $product['id']; ?>">+</button>
              </div>
            </div>
            <div class="col-md-2 d-flex flex-column align-items-end justify-content-between">

              <form class="cartForm">
                <?php csrf_field() ?>
                <input type="hidden" name="_method" value="delete" />
                <button type="submit" class="btn-none fs-medium text-danger cartDelBtn" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>"><i class="fas fa-trash"></i></button>
              </form>

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
      <div class="text-center shadow card p-3">
        <h6 class="text-secondary mb-4">Total Price</h6>
        <h2 class="text-dark" id="deal-price">Rp <span><?= $cartModel->getTotalPrice($totalPrice); ?></span></h2>
        <hr class="mb-4">
        <a href="#" class="btn purple text-light w-100">Checkout</a>
      </div>
    </div>

  <?php else : ?>
    <div class="col">
      <div class="card mb-3 px-3 shadow">
        <h4 class="text-dark my-5">No products...</h4>
      </div>
    </div>
  <?php endif ?>
</div>