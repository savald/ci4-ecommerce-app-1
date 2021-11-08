<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="purple banner" style="height: 300px;position: absolute;width: 100%;"></div>
<main class="pt-4">
  <div class="container">
    <h3 class="text-light my-5">Products you search</h3>

    <div class="bg-body mb-3 px-3 shadow rounded-3">
      <div class="row">
        <?php foreach ($products as $product) : ?>
          <div class="col-lg-3 my-3">
            <div class="product-card position-relative mb-3">
              <img src="/assets/images/product_images/<?= $product['product_image'] ?? 'default_user.png'; ?>" class="w-100 rounded-3" alt="...">
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
    </div>
  </div>

  <div id="pagination">
    <?= $pager->links('products', 'bootstrap_pagination') ?>
  </div>
</main>

<?= $this->endSection() ?>