<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- Confirm modal -->
<?= $this->include('partials/_confirm-modal') ?>

<div class="purple banner" style="height: 300px;position: absolute;width: 100%;"></div>
<main class="pt-4">
  <div class="container">
    <h3 class="text-light my-5">My Orders</h3>

    <?php if ($my_orders) : ?>
      <div class="bg-body pb-4 pt-2 px-3 shadow rounded-3">
        <?php foreach ($my_orders as $order) : ?>
          <div class="card mt-3">
            <div class="card-header h5">
              <?= $order['invoice']; ?>
            </div>
            <div class="card-body py-0">
              <div class="row align-items-center">
                <div class="col-md-3 my-2">
                  Date Order:
                  <p class="card-text"><span class="fw-2"><?= date(' H:i - D, d M Y', strtotime($order['order_date'])); ?></span></p>
                </div>
                <div class="col-md-2 my-2">
                  Total order:
                  <p class="card-text"><span class="fw-2"><?= $order['total_order']; ?></span></p>
                </div>
                <div class="col-md-2 my-2">
                  Total price:
                  <p class="card-text"><span class="fw-2">Rp <?= number_format($order['total_price'], 0, ',', '.'); ?></span></p>
                </div>
                <div class="col-md-2 my-2 text-end">
                  <a href="/invoice/<?= sprintf("%07d", $order['id']); ?>" class="text-decoration-none">Detail &raquo;</a>
                </div>
                <div class="col-md-3 my-2 text-end">
                  <button type="button" class="btn-none confirm-btn w-auto" data-bs-toggle="modal" data-bs-target="#modalOrderConfirmation" data-checkoutId="<?= $order['id']; ?>">Confirm your order</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
  </div>

<?php else : ?>
  <div class="bg-body mb-5 p-3 shadow rounded-3">
    <h2 class="text-dark mt-4 text-center">No order...</h2>
    <a href="/" class="text-decoration-none text-center mx-auto d-block">&laquo; Back Shop</a>
  </div>
<?php endif ?>
</main>

<?= $this->endSection() ?>