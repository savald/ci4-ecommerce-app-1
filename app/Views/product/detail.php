<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<main>
  <div class="purple" style="height: 200px;position: absolute;width: 100%;"></div>
  <div class="container d-flex flex-column justify-content-center">
    <div class="card my-5 p-4 shadow" style="min-width: 100%; min-height: 500px;">
      <div class="row">
        <div class="col-md-5">
          <img src="/assets/images/fashion.jpg" class="rounded-start mx-auto" alt="..." style="max-width: 400px;">
        </div>

        <div class="col-md-7">
          <div class="card-body">
            <h3 class="card-title"><?= $productDetail['product_name']; ?></h3>
            <div class="d-flex">
              <div class="text-warning ">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="ms-2 sales">5/5</p>
              <p class="ms-2 sales"><i class="bi bi-download"></i> 300 Sales</p>
            </div>
            <h3 class="card-text mt-3 text-danger fw-bold">$<?= number_format($productDetail['price'], 0, ',', '.'); ?></h3>
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
                  <div class="mt-3 d-flex">
                    <div class="px-4 d-flex">
                      <button class="qty-up border bg-light" data-id="pro1">-</button>
                      <input type="text" data-id="pro1" class="qty_input border px-2 w-25 bg-light" disabled value="1" placeholder="1">
                      <button data-id="pro1" class="qty-down border bg-light">+</button>
                    </div>
                  </div>

                </td>
              </tr>
            </table>

            <div class="button-submit mt-3">
              <button type="button" class="btn btn-primary cartBtn" data-userId="<?= $productDetail['user_id']; ?>" data-productId="<?= $productDetail['id']; ?>" data-categoryId="<?= $productDetail['category_id']; ?>"><i class="bi bi-cart-plus-fill"></i> Add to Cart</button>
              <button type="button" class="btn btn-primary">Buy Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Description -->
    <div class="row ">
      <nav>
        <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Product details</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row ">
            <div class="col-md-8  ">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quasi reprehenderit voluptatum cum tempora culpa dolorem voluptatem perferendis, similique necessitatibus maxime facere maiores dolorum laborum explicabo, aperiam repudiandae repellendus unde molestiae debitis atque obcaecati sit? Voluptatum nisi repudiandae, fugit, in deleniti maxime maiores fuga minima officiis quasi expedita ad quam deserunt optio velit ipsa. Dignissimos provident est aperiam, tempore consequatur facilis animi minus. Iste soluta nemo qui, earum magnam consectetur voluptatem, veniam odit nam, exercitationem eius vitae. Sit dolor iste quae et. Illo consectetur suscipit ducimus. Deleniti ipsam repellat dolores. Accusamus aliquid ab aperiam amet error qui voluptatem eos eaque?</p>
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
              <div class="row mb-3">
                <div class="d-flex">
                  <img src="/assets/images/fashion.jpg" alt="" class="rounded-circle img-thumbnail" style="width: 55px;height: 55px;">
                  <div class="ms-2 ">
                    <p class="mb-0" style="color: rgb(92, 92, 92);font-size: 14px;font-weight: 600;">Salman Rivaldi</p>
                    <p class="text-2 mb-0 ">June 28, 2019</p>
                    <div class="text-purple mb-0 " style="color: rgb(255, 190, 70);font-size: 13px;">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <p class="text-secondary fs-6 mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus
                  quo voluptas adipisci non tenetur
                  pariatur itaque quia consequuntur a iure dignissimos asperiores tempora, ex ullam commodi optio
                  placeat.
                  Eaque optio quod dolores, beatae dolore alias consequuntur rem rerum. Tenetur ad consequatur
                  repellendus
                  laborum nisi qui veritatis doloribus. Voluptatum, officia voluptatem?</p>
                <hr>
              </div>
            </div>
            <div class="col-md-7">
              <div class="row mb-3">
                <div class="d-flex">
                  <img src="/assets/images/fashion.jpg" alt="" class="rounded-circle img-thumbnail" style="width: 55px;height: 55px;">
                  <div class="ms-2 ">
                    <p class="mb-0" style="color: rgb(92, 92, 92);font-size: 14px;font-weight: 600;">Salman Rivaldi</p>
                    <p class="text-2 mb-0 ">June 28, 2019</p>
                    <div class="text-purple mb-0 " style="color: rgb(255, 190, 70);font-size: 13px;">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <p class="text-secondary fs-6 mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus
                  quo voluptas adipisci non tenetur
                  pariatur itaque quia consequuntur a iure dignissimos asperiores tempora, ex ullam commodi optio
                  placeat.
                  Eaque optio quod dolores, beatae dolore alias consequuntur rem rerum. Tenetur ad consequatur
                  repellendus
                  laborum nisi qui veritatis doloribus. Voluptatum, officia voluptatem?</p>
                <hr>
              </div>
            </div>
            <div class="col-md-7">
              <div class="row mb-3">
                <div class="d-flex">
                  <img src="/assets/images/fashion.jpg" alt="" class="rounded-circle img-thumbnail" style="width: 55px;height: 55px;">
                  <div class="ms-2 ">
                    <p class="mb-0" style="color: rgb(92, 92, 92);font-size: 14px;font-weight: 600;">Salman Rivaldi</p>
                    <p class="text-2 mb-0 ">June 28, 2019</p>
                    <div class="text-purple mb-0 " style="color: rgb(255, 190, 70);font-size: 13px;">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <p class="text-secondary fs-6 mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus
                  quo voluptas adipisci non tenetur
                  pariatur itaque quia consequuntur a iure dignissimos asperiores tempora, ex ullam commodi optio
                  placeat.
                  Eaque optio quod dolores, beatae dolore alias consequuntur rem rerum. Tenetur ad consequatur
                  repellendus
                  laborum nisi qui veritatis doloribus. Voluptatum, officia voluptatem?</p>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?= $this->include('partials/related_product') ?>

<?= $this->endSection() ?>