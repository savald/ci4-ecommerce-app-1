<?php if ($favoritesProducts) : ?>
  <div class="bg-body mb-3 px-3 shadow rounded-3">
    <div class="row">
      <?php foreach ($favoritesProducts as $product) : ?>
        <div class="col-lg-3 my-3">
          <div class="product-card position-relative mb-2">
            <img src="<?= base_url('assets/images/product_images') . '/' . $product['product_image']; ?>" class="w-100 rounded-1" alt="...">
            <button type="button" class="position-absolute top-0 end-0 heart-btn"><i class="bi bi-heart"></i></button>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <h6 class="my-2 text-wrap product-title">
              <a href="/product/detail/<?= $product['id']; ?>" class="text-decoration-none text-gray"><?= $product['product_name']; ?></a>
            </h6>
            <span class="btn-price">$<?= number_format($product['price'], 0, ',', '.'); ?></span>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
<?php else : ?>
  <div class="bg-body mb-5 p-3 shadow rounded-3">
    <h2 class="text-dark mt-4 text-center">No product...</h2>
    <a href="/" class="text-decoration-none text-center mx-auto d-block">&laquo; Back Shop</a>
  </div>
<?php endif ?>