<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="purple banner" style="height: 200px;position: absolute;width: 100%;"></div>
<div class="container">
  <h3 class="text-light my-5">Checkout</h3>

  <div class="row bg-body py-4 px-3 shadow rounded-3">
    <div class="row">
      <div class="col-md-9 border-end">
        <div class="row">
          <h5 class="text-gray mb-4"><i class="bi bi-geo-alt-fill"></i> Shipping Address</h5>
          <div class="col">
            <div class="row">
              <div class="col-md-4">
                <h6 class="text-gray"><?= session()->get('name'); ?></h6>
                <h6 class="text-gray fs-medium"><?= $user['phone_num'] ?? 'Phone number not set' ?></h6>
              </div>
              <div class="col-md-8">
                <div class="text-gray text-wrap"><?= $user['address'] ?? 'Address not set' ?></div>
              </div>
            </div>
          </div>
        </div>

        <hr>

        <div class="row">
          <h5 class="text-gray my-4"><i class="fas fa-money-check-alt"></i> Payment method</h5>
          <div class="col-md-4">
            <span class="text-secondary border rounded p-2">
              <img src="<?= base_url('assets/images/payment/credit-card.png'); ?>" alt="" width="20px">
              Credit Card
            </span>
          </div>
          <div class="col-md-4">
            <span class="text-secondary border rounded p-2">
              <img src="<?= base_url('assets/images/payment/bank.png'); ?>" alt="" width="20px">
              Bank Transfer</span>
          </div>
          <div class="col-md-4">
            <span class="text-secondary border rounded p-2">
              <img src="<?= base_url('assets/images/payment/paypal.png'); ?>" alt="" width="20px">
              PayPal</span>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <h5 class="text-gray mb-4">Order summary</h5>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>