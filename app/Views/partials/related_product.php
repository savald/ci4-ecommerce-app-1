<div class="container">
  <section id="recently">
    <div class="row">
      <div class="d-flex justify-content-between align-items-center mt-5">
        <h2 class="">Related Products</h2>
        <a class="btn btn-primary" href="#" role="button">View more</a>
      </div>

      <hr class="my-4">

      <?php foreach (array_slice($products, 0, 4) as $product) : ?>
        <div class="col-lg-3 mb-5">
          <div class="card hover-product" style="width: 100%;">
            <img src="../assets/images/2.jpg" class="card-img-top" alt="...">
            <div class="position-absolute icon-hover">
              <form action="#" method="post">
                <?php csrf_field() ?>
                <button class="btn btn-light me-1 "><i class="bi bi-heart"></i></i></button>
                <button class="btn btn-light me-1 "><i class="bi bi-cart-plus"></i></i></button>
              </form>
            </div>
          </div>
          <a href="/detail/<?= $product['id']; ?>" class="text-decoration-none">
            <h5 class="card-subtitle my-2 text-muted"><?= $product['product_name']; ?></h5>
          </a>
          <div class="d-flex justify-content-between align-items-end">
            <p class="sales"><i class="bi bi-download"></i> 300 Sales</p>
            <p class="btn-price ">$<?= number_format($product['price'], 0, ',', '.'); ?></p>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </section>
</div>