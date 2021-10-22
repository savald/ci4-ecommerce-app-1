<section id="related">
  <div class="row mt-4">
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="text-gray">Related Products</h2>
      <a class="btn btn-primary" href="#" role="button">View more</a>
    </div>

    <hr class="my-4">

    <?php foreach (array_slice($products, 0, 4) as $product) : ?>
      <div class="col-lg-3">
        <div class="product-card position-relative mb-3">
          <img src="<?= base_url('assets/images/2.jpg'); ?>" class="w-100 rounded-3" alt="...">

          <div class="position-absolute top-0 start-0 rounded-3 icon-hover">
            <form class="cartForm">
              <?php csrf_field() ?>
              <button type="submit" class="btn btn-light me-1 favoriteBtn <?= $cartModel->checkCart(session()->get('user_id'), $product['id']) ? 'active' : ''; ?>" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-heart"></i></button>

              <button type="submit" class="btn btn-light me-1 cartBtn <?= $cartModel->checkCart(session()->get('user_id'), $product['id']) ? 'active' : ''; ?>" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $product['id']; ?>" data-categoryId="<?= $product['category_id']; ?>"><i class="bi bi-cart-plus"></i></button>
            </form>
          </div>

        </div>
        <h5 class="my-2 text-wrap product-title">
          <a href="/product/detail/<?= $product['id']; ?>" class="text-decoration-none text-gray"><?= $product['product_name']; ?></a>
        </h5>
        <div class="d-flex justify-content-between align-items-end">
          <span class="sales"><i class="bi bi-download"></i> 300 Sales</span>
          <span class="btn-price ">$<?= number_format($product['price'], 0, ',', '.'); ?></span>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</section>