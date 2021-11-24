<?php if ($productCarts) : ?>

  <?php foreach (array_slice($productCarts, 0, 4) as $product) : ?>
    <li class="dropdown-item mb-1" style="max-width: 100%; overflow-x: hidden;">
      <a href="/product/detail/<?= $product['id']; ?>" class="text-decoration-none text-secondary">
        <div class="row">
          <div class="col-md-3">
            <img class="img-thumbnail" src="<?= base_url('assets/images/product_images') . '/' . $product['product_image']; ?>" alt="" style="max-width: 50px;">
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
      <i class="bi bi-bag-check"></i> <span class="fs-medium">View All</span>
    </a>
  </li>
<?php else : ?>
  <div class="text-secondary text-center mt-3">Empty</div>
<?php endif ?>