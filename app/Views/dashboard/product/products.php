<?= $this->extend('dashboard/layouts/main') ?>
<?= $this->section('content') ?>

<div class="view-modal">
  <!-- ajax -->
</div>


<div class="row get-products">
  <div class="col">
    <?php if ($products_user) : ?>
      <nav class="navbar">
        <button type="button" class="btn btn-primary add-btn">Add Product</button>
        <ul class="navbar-nav ms-auto me-2">
          <li class="nav-item">
            <form class="d-none d-md-inline-block form-inline w-100">
              <div class="input-group">
                <input class="form-control" name="keyword" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-secondary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </form>
          </li>
        </ul>
      </nav>
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
      if (count($total_products) > 10) : ?>
        <div id="pagination">
          <?= $pager->links('products', 'bootstrap_pagination') ?>
        </div>
      <?php endif ?>

    <?php else : ?>
      <h4 class="mt-4 mb-3 text-secondary text-center">You have no any products</h4>
      <button type="button" class="mx-auto d-block btn btn-primary add-btn">Add Product</button>
    <?php endif ?>
  </div>
</div>

<?= $this->endSection() ?>