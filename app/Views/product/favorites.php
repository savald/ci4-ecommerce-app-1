<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="purple banner" style="height: 200px;position: absolute;width: 100%;"></div>
<div class="container">
  <h3 class="text-light my-5">My Favorites</h3>

  <div class="row">
    <div class="col">
      <div class="card mb-3 px-3 shadow">
        <?php if ($favoritesProducts) : ?>
          <div class="row">
            <?php foreach ($favoritesProducts as $product) : ?>
              <div class="col-lg-3 my-3 product-cart">
                <div class="position-relative">
                  <img src="../assets/images/2.jpg" class="w-100 rounded-1 mb-2 " alt="...">
                  <button type="button" class="btn-none position-absolute heart-btn"><i class="fas fa-heart"></i></button>
                </div>

                <!-- <div class="card hover-product" style="width: 100%;">
                    <div class="position-absolute icon-hover">
                      <form action="#" method="post">
                        <?php csrf_field() ?>
                        <button class="btn btn-light me-1 "><i class="bi bi-heart"></i></i></button>
                        <button class="btn btn-light me-1 "><i class="bi bi-cart-plus"></i></i></button>
                      </form>
                    </div>
                  </div> -->
                <div class="row">
                  <div class="col-md-8">
                    <a href="/product/detail/<?= $product['id']; ?>" class="product-title">
                      <h6 class="card-subtitle my-2 text-muted text-wrap"><?= $product['product_name']; ?></h6>
                    </a>
                  </div>
                  <div class="col-md-4">
                    <p class="btn-price">$<?= number_format($product['price'], 0, ',', '.'); ?></p>
                  </div>
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
</div>

<?= $this->include('partials/related_product') ?>
<?= $this->endSection() ?>