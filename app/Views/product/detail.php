<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="purple banner" style="height: 300px;position: absolute;width: 100%;"></div>
<main class="pt-5">
  <div class="container">
    <h3 class="text-light my-5">Detail Product</h3>
    <div class="row bg-body py-4 px-3 shadow rounded-3">
      <div class="col-md-7">
        <div class="row pe-4">
          <div class="col-md-8">
            <img src="<?= base_url('assets/images/product_images') . '/' . $productDetail['product_image']; ?>" class="rounded-2 w-100 border" alt="...">
          </div>
        </div>
      </div>

      <div class="col-md-5">
        <div class="row">
          <div class="col-md-8">
            <h3 class="text-gray text-wrap"><?= $productDetail['product_name']; ?></h3>
            <div class="d-flex">
              <div class="text-warning ">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <span class="ms-2 sales">5/5</span>
              <span class="ms-2 sales"><i class="bi bi-download"></i> 300 Sales</span>
            </div>
          </div>
          <div class="col-md-4">
            <h4 class="text-end mt-3 text-danger fw-bold">$<?= number_format($productDetail['price'], 0, ',', '.'); ?></h4>
          </div>
        </div>
        <hr>
        <table class="text-secondary">
          <tr>
            <td>
              <h6>Specification</h6>
            </td>
          </tr>
          <tr>
            <td>
              Category
            </td>
            <td>:</td>
            <td class="px-4"><?= $productDetail['category_name']; ?></td>
          </tr>
          <tr>
            <td>
              Weight
            </td>
            <td>:</td>
            <td class="px-4">500gr</td>
          </tr>
          <tr>
            <td>
              From
            </td>
            <td>:</td>
            <td class="px-4">Indonesia</td>
          </tr>
          <tr>
            <td>
              Merk
            </td>
            <td>:</td>
            <td class="px-4">Zalora</td>
          </tr>
          <tr>
            <td>
              <h6>Quantity</h6>
            </td>
            <td>:</td>
            <td>
              <div class="px-4 mt-3 d-flex">
                <button type="button" class="qty-down border bg-light" data-productId="<?= $productDetail['id']; ?>">-</button>
                <input type="text" data-productId="<?= $productDetail['id']; ?>" class="text-center border px-2 w-50 bg-light qty-input" disabled value="1" placeholder="1">
                <button type="button" class="qty-up border bg-light" data-productId="<?= $productDetail['id']; ?>">+</button>
              </div>

            </td>
          </tr>
        </table>

        <div class="button-submit mt-3">
          <form class="cartForm">
            <?php csrf_field() ?>
            <button type="button" class="my-cart-btn <?= $cartModel->checkCart(session()->get('user_id'), $productDetail['id']) ? 'incart' : ''; ?>" data-userId="<?= session()->get('user_id') ?? 0; ?>" data-productId="<?= $productDetail['id']; ?>" data-categoryId="<?= $productDetail['category_id']; ?>">
              <i class="bi bi-cart-plus-fill"></i> <?= $cartModel->checkCart(session()->get('user_id'), $productDetail['id']) ? 'Remove from Cart' : 'Add to Cart'; ?>
            </button>
            <button type="button" class="checkout-btn">Buy Now</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Description -->
    <div class="row my-5">
      <nav>
        <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>

          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</button>
        </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row ">
            <div class="col-md-8  ">
              <p><?= $productDetail['description'] ?? 'No Review'; ?></p>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="row">
            <div class="col-md-5">
              <h4>74 Reviews</h4>
              <div class="d-flex">
                <div class="text-purple ">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
                <p class="ms-2 sales">4.1 Overall rating</p>
              </div>
            </div>

            <!-- Ratings stars -->
            <div class="col-md-7 text-muted">
              <div class="d-flex mb-3 justify-content-between align-items-center">
                <div>5 <i class="bi bi-star-fill"></i></div>
                <div class="bar rounded" style="line-height: 10px;"></div>
                <div>72</div>
              </div>
              <div class="d-flex mb-3 justify-content-between align-items-center">
                <div>5 <i class="bi bi-star-fill"></i></div>
                <div class="bar rounded" style="line-height: 10px;"></div>
                <div>72</div>
              </div>
              <div class="d-flex mb-3 justify-content-between align-items-center">
                <div>5 <i class="bi bi-star-fill"></i></div>
                <div class="bar rounded" style="line-height: 10px;"></div>
                <div>72</div>
              </div>
              <div class="d-flex mb-3 justify-content-between align-items-center">
                <div>5 <i class="bi bi-star-fill"></i></div>
                <div class="bar rounded" style="line-height: 10px;"></div>
                <div>72</div>
              </div>
              <div class="d-flex mb-3 justify-content-between align-items-center">
                <div>5 <i class="bi bi-star-fill"></i></div>
                <div class="bar rounded" style="line-height: 10px;"></div>
                <div>72</div>
              </div>
            </div>
          </div>
          <hr class="mb-5">

          <div class="row">
            <div class="col-md-7">
              <?php if ($reviews) : ?>
                <?php foreach ($reviews as $review) : ?>
                  <div class="row mb-3">
                    <div class="d-flex">
                      <img src="/assets/images/fashion.jpg" alt="" class="rounded-circle img-thumbnail" style="width: 55px;height: 55px;">
                      <div class="ms-2 ">
                        <p class="mb-0" style="color: rgb(92, 92, 92);font-size: 14px;font-weight: 600;"><?= $review['name']; ?></p>
                        <p class="text-2 mb-0 "><?= date('D, d M Y', strtotime($review['created_at'])); ?></p>
                        <div class="text-purple mb-0 " style="color: rgb(255, 190, 70);font-size: 13px;">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p class="text-secondary fs-6 mt-3"><?= $review['review']; ?></p>
                    <hr>
                  </div>
                <?php endforeach ?>
              <?php else : ?>
                <div class="row mb-3">
                  <p class="text-secondary fs-6 mt-3">No review for this product</p>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</main>


<?= $this->endSection() ?>