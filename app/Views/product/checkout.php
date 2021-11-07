<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="purple banner" style="height: 300px;position: absolute;width: 100%;"></div>
<main class="pt-5">
  <div class="container">
    <h3 class="text-light my-5">Checkout</h3>

    <div class="bg-body py-4 px-3 shadow rounded-3">
      <div class="row">
        <div class="col-md-9 border-end">
          <div class="row">
            <h5 class="text-gray mb-4">Shipping Address</h5>
            <div class="col">
              <div class="row">
                <div class="col-md-4">
                  <h6 class="text-gray"><?= session()->get('name'); ?></h6>
                  <h6 class="text-gray fs-medium"><?= $user['phone_num'] ?? 'Phone number not set' ?></h6>
                </div>
                <div class="col-md-8">
                  <div class="text-gray text-break"><?= $user['address'] ?? 'Address not set' ?></div>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <h5 class="text-gray my-4">Payment Method</h5>
            <div class="col-md-4">
              <span class="text-secondary p-2 payment-btn">
                <img src="<?= base_url('assets/images/payment/credit-card.png'); ?>" alt="" width="20px">
                Credit Card
              </span>
            </div>
            <div class="col-md-4">
              <span class="text-secondary p-2 payment-btn">
                <img src="<?= base_url('assets/images/payment/bank.png'); ?>" alt="" width="20px">
                Direct Bank Transfer</span>
            </div>
            <div class="col-md-4">
              <span class="text-secondary p-2 payment-btn">
                <img src="<?= base_url('assets/images/payment/paypal.png'); ?>" alt="" width="20px">
                PayPal</span>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <h5 class="text-gray mb-4">Subtotal</h5>
          <h3 class="text-dark text-center">Rp <?= number_format($total_price, 0, ',', '.') ?></h3>
          <form action="/checkout/place_order" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT" />
            <button type="submit" class="checkout-btn text-light w-100 mt-3"><i class="fas fa-shopping-bag"></i> Place Order</button>
          </form>

          <h5 class="text-gray mb-4 mt-5">Order Summary</h5>
          <?php foreach ($products_cart as $product) : ?>
            <div class="row mb-2">
              <div class="col-md-3">
                <img src="/assets/images/fashion.jpg" class="rounded border w-100" alt="...">
              </div>

              <div class="col-md-9 p-0">
                <div class="fs-medium text-gray text-break w-100 fw-2"><?= strlen($product['product_name']) > 22 ? substr($product['product_name'], 0, 22) . '...' : $product['product_name'];  ?></div>
                <div class="fs-small text-secondary fw-2">Rp <?= number_format($product['price'], 0, ',', '.') ?></div>
              </div>
            </div>
            <hr class="my-2">
          <?php endforeach ?>
        </div>

      </div>
    </div>
  </div>
</main>

<?= $this->endSection() ?>