<div class="row">
  <div class="col">
    <div class="card mb-3 px-3 shadow">
      <?php if ($favoritesProducts) : ?>
        <div class="row">
          <?php foreach ($favoritesProducts as $product) : ?>
            <div class="col-lg-3 my-3">
              <div class="product-card position-relative mb-2">
                <img src="../assets/images/2.jpg" class="w-100 rounded-1" alt="...">
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
      <?php else : ?>
        <h4 class="text-dark my-5">No products...</h4>
      <?php endif ?>
    </div>
  </div>
</div>