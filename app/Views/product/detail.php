<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="purple banner" style="height: 200px;position: absolute;width: 100%;"></div>
<div class="container">
  <h3 class="text-light my-5">Detail Product</h3>
  <div class="row bg-body py-4 px-3 shadow rounded-3">
    <div class="col-md-7">
      <div class="row pe-4">
        <div class="col-md-8">
          <img src="/assets/images/fashion.jpg" class="rounded-2 w-100 border" alt="...">
        </div>
        <div class="col-md-4">
          <div class="d-flex flex-column justify-content-between h-100">
            <img src="/assets/images/fashion.jpg" class="rounded-2 my-auto d-block w-100 border" alt="...">
            <img src="/assets/images/fashion.jpg" class="rounded-2 my-auto d-block w-100 border" alt="...">
          </div>
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
          <button type="submit" class="my-cart-btn cartBtn" data-userId="<?= $productDetail['user_id']; ?>" data-productId="<?= $productDetail['id']; ?>" data-categoryId="<?= $productDetail['category_id']; ?>"><i class="bi bi-cart-plus-fill"></i> Add to Cart</button>
          <button type="button" class="checkout-btn">Buy Now</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Description -->
  <div class="row my-5">
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

  <?= $this->include('partials/_related-product') ?>
</div>


<?= $this->endSection() ?>