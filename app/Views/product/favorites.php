<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="purple banner" style="height: 200px;position: absolute;width: 100%;"></div>
<div class="container">
  <h3 class="text-light my-5">My Favorites</h3>

  <div id="my-favorites">
    <!-- Ajax -->
  </div>

  <?= $this->include('partials/_related-product') ?>
</div>

<?= $this->endSection() ?>