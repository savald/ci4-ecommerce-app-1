<?php if ($productCarts) : ?>

  <?php foreach (array_slice($productCarts, 0, 4) as $product) : ?>
    <li class="dropdown-item mb-1" style="max-width: 100%; overflow-x: hidden;">
      <a href="/detail/<?= $product['id']; ?>" class="text-decoration-none text-secondary">
        <div class="row">
          <div class="col-md-3">
            <img class="img-thumbnail" src="<?= base_url('assets/images/fashion.jpg'); ?>" alt="" style="max-width: 50px;">
          </div>
          <div class="col-md-6 text-break fs-medium">
            <?= strlen($product['product_name']) > 18  ? substr($product['product_name'], 0, 18) . '...' : $product['product_name']; ?>
          </div>
          <div class="col-md-3 text-dark fw-5 text-end fs-medium">
            $<?= number_format($product['price'], 0, ',', '.') ?>
          </div>
        </div>
      </a>
    </li>
  <?php endforeach ?>

  <li>
    <hr class="dropdown-divider">
  </li>
  <li>
    <a href="/carts" class="dropdown-item text-center">
      <h6><i class="bi bi-bag-fill"></i> View All</h6>
    </a>
  </li>
<?php else : ?>
  <div class="text-secondary text-center mt-3">Your cart is empty</div>
<?php endif ?>