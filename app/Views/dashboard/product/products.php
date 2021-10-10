<?= $this->extend('dashboard/layouts/main') ?>
<?= $this->section('content') ?>

<div class="row">
  <div class="col">
    <table class="table">
      <thead>
        <tr>
          <th class="p-3" scope="col">#</th>
          <th class="p-3" scope="col">Image</th>
          <th class="p-3" scope="col">Name</th>
          <th class="p-3" scope="col">Description</th>
          <th class="p-3" scope="col">Price($)</th>
          <th class="p-3" scope="col">Category</th>
          <th class="p-3" scope="col">Add at</th>
          <th class="p-3" scope="col">Update at</th>
          <th class="p-3" scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $key => $product) : ?>
          <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <td class="p-3"><img src="assets/images/fashion.jpg" class="img-thumbnail" style="min-width:100px; min-height: 100px;max-width: 100px;max-height: 100px;"></td>
            <td class="p-3 text-secondary fw-bold "><?= $product['product_name']; ?></td>
            <td class="p-3 text-secondary"><?= substr($product['description'], 0, 70); ?> ...</td>
            <td class="p-3 text-secondary"><?= number_format($product['price'], 0, ',', '.') ?></td>
            <td class="p-3 text-secondary"><?= $product['category_name']; ?></td>
            <td class="p-3 text-secondary"><?= date('d-m-Y', strtotime($product['created_at'])) ?? 'Not updated yet' ?></td>
            <td class="p-3 text-secondary"><?= $product['updated_at'] ? date('d-m-Y', strtotime($product['updated_at'])) : 'Not updated yet' ?></td>
            <td class="p-3">
              <a href="#"><i class="fas fa-edit text-success"></i></a>
              <form action="" method="post" class="d-inline ms-2">
                <button class="text-danger " style="padding: 0;border: none; background: none;"><i class="fas fa-trash"></i></i></button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>
</div>

<?= $this->endSection() ?>