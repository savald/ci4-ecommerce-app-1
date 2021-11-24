<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="purple banner" style="height: 300px;position: absolute;width: 100%;"></div>
<main class="pt-5">
  <div class="container">
    <h3 class="text-light my-5">My Cart</h3>
    <div id="my-cart">
      <!-- Ajax -->
    </div>
  </div>
</main>

<?= $this->endSection() ?>