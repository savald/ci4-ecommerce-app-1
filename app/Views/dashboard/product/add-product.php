<?= $this->extend('dashboard/layouts/main') ?>
<?= $this->section('content') ?>

<div class="row">
  <div class="col-md-6">
    <?php $validation =  \Config\Services::validation(); ?>
    <form action="/add-product" method="post">
      <?= csrf_field() ?>
      <div class="mb-3 row">
        <label for="product_name" class="col-sm-3 form-label">Product Name</label>
        <div class="col-sm-9">
          <input type="text" name="product_name" class="form-control form-control-sm <?= ($validation->hasError('product_name')) ? 'is-invalid' : ''; ?>" id="product_name" placeholder="Your Product Name">
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('product_name'); ?>
          </div>
        </div>

      </div>
      <div class="mb-3 row">
        <label for="category" class="col-sm-3 form-label">Category</label>
        <div class="col-sm-9">
          <select class="form-select form-select-sm <?= ($validation->hasError('category')) ? 'is-invalid' : ''; ?>" id="category" name="category" aria-label="Default select example">
            <option selected disabled>Choose</option>
            <option value="1">Electronics</option>
            <option value="2">Handphones</option>
            <option value="3">Computers</option>
            <option value="4">Man Fashion</option>
            <option value="5">Women Fashion</option>
            <option value="6">Shoes</option>
            <option value="7">Furniture</option>
          </select>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('category'); ?>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="price" class="form-label col-sm-3">Price</label>
        <div class="col-sm-9">
          <div class="input-group input-group-sm">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="price" name="price" aria-label="Amount (to the nearest dollar)">
            <div id="validationServer03Feedback" class="invalid-feedback">
              <?= $validation->getError('price'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="exampleFormControlTextarea1" class="form-label col-sm-3">Decription</label>
        <div class="col-sm-9">
          <textarea class="form-control " id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-primary w-100 btn-sm shadow">Add <i class="bi bi-upload"></i></button>
    </form>
  </div>
  <div class="col-md-3">
    <div class="mb-3">
      <img src="assets/images/fashion.jpg" class="card-img-top w-75 h-75 border mx-auto d-block" alt="...">
      <div class="mt-3">
        <input class="form-control form-control-sm " type="file" id="formFile">
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>