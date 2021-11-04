<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="purple banner" style="height: 200px;position: absolute;width: 100%;"></div>
<div class="container">
  <div class="row bg-body my-5 py-4 px-3 shadow rounded-3">
    <h3 class="text-dark text-center mt-3">Successfully Order</h3>
    <p class="text-secondary text-center">Your product on process...</p>
    <a href="/" class="mx-auto d-block btn-none confirm-btn w-auto text-decoration-none back-shop">Back to Shop</a>
    <a href="/orders" class="mx-auto d-block btn-none confirm-btn w-auto text-decoration-none back-shop">See My Orders</a>
    <hr class="my-3">

    <div class="col-md-6">
      <h5 class="text-dark">Transaction Details</h5>
      <table class="table">
        <colgroup>
          <col span="1" style="width: 30%;">
          <col span="1">
          <col span="1">
        </colgroup>
        <tr>
          <td class="fw-2 text-secondary">Transaction ID</td>
          <td>:</td>
          <td>#<?= sprintf("%07d", $transaction_id); ?></td>
        </tr>
        <tr>
          <td class="fw-2 text-secondary text-secondary">Invoice</td>
          <td>:</td>
          <td><?= $order_details['invoice']; ?></td>
        </tr>
        <tr>
          <td class="fw-2 text-secondary">Date</td>
          <td>:</td>
          <td><?= $order_details['order_date']; ?></td>
        </tr>
        <tr>
          <td class="fw-2 text-secondary">Items</td>
          <td>:</td>
          <td>
            <ol class="list-group list-group-numbered">
              <?php foreach ($items as $item) : ?>
                <li class="d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto text-break">
                    <?= $item['product_name']; ?>
                  </div>
                  <span class="ms-3 me-2"><?= $item['quantity']; ?>x</span>
                </li>
              <?php endforeach ?>
            </ol>
          </td>
        </tr>
        <tr>
          <td class="fw-2 text-secondary">Payment method</td>
          <td>:</td>
          <td>PayPal</td>
        </tr>
        <tr>
          <td class="fw-2 text-secondary">Total</td>
          <td>:</td>
          <td>Rp <?= number_format($order_details['total_price'], 0, ',', '.'); ?></td>
        </tr>
      </table>
    </div>
    <div class="col-md-6">
      <h5 class="text-dark">Customer Information</h5>
      <table class="table">
        <colgroup>
          <col span="1" style="width: 30%;">
          <col span="1">
          <col span="1">
        </colgroup>
        <tr>
          <td class="fw-2 text-secondary">Email</td>
          <td>:</td>
          <td>rivaldysalman@gmail.com</td>
        </tr>
        <tr>
          <td class="fw-2 text-secondary">Phone</td>
          <td>:</td>
          <td>+6285275031388</td>
        </tr>
      </table>

      <h5 class="text-dark mt-4">Shipping Address</h5>
      <p>Lam ateuk jalan blang bintang lama, kecamatan kuta baro aceh besar provinsi aceh</p>
    </div>

  </div>
</div>



<?= $this->endSection() ?>