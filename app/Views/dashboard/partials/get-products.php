<div class="col">
  <?php if ($products_user) : ?>
    <table class="table">
      <colgroup>
        <col span="1">
        <col span="1">
        <col span="1">
        <col span="1" style="width: 20%;">
      </colgroup>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Price($)</th>
          <th scope="col">Category</th>
          <th scope="col">Added</th>
          <th scope="col">Updated</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1 + (4 * ($currentPage - 1));
        foreach ($products_user as $product) : ?>
          <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><img src="assets/images/fashion.jpg" class="img-thumbnail" style="min-width:85px; min-height: 85px;max-width: 85px;max-height: 85px;"></td>
            <td class="text-secondary fw-bold "><?= $product['product_name']; ?></td>
            <td class="text-secondary fs-medium"><?= substr($product['description'], 0, 70); ?> ...</td>
            <td class="text-secondary fs-medium"><?= number_format($product['price'], 0, ',', '.') ?></td>
            <td class="text-secondary fs-medium"><?= $product['category_name']; ?></td>
            <td class="text-secondary fs-medium"><?= date('d-m-Y', strtotime($product['created_at'])) ?? 'Not updated yet' ?></td>
            <td class="text-secondary fs-medium"><?= $product['updated_at'] ? date('d-m-Y', strtotime($product['updated_at'])) : 'Not updated yet' ?></td>
            <td>

              <button class="text-success edit-btn btn-none" data-productId="<?= $product['id']; ?>" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></i></button>

              <button class="text-danger ms-2 delete-btn btn-none" data-productId="<?= $product['id']; ?>" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></i></button>

            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <?php
    if (count($total_products) > 4) : ?>
      <?= $pager->links('products', 'bootstrap_pagination') ?>
    <?php endif ?>

  <?php else : ?>
    <h4 class="text-secondary">You have no any products</h4>
  <?php endif ?>
</div>