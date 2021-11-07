<!-- Delete Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <form class="d-inline ms-2 form_add" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg">
      <?= csrf_field(); ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Product</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <div class="mb-3 row">
                <label for="product_name" class="col-sm-3 form-label">Product Name</label>
                <div class="col-sm-9">
                  <input type="text" name="product_name" class="form-control form-control-sm" id="product_name" placeholder="Product Name">
                  <div id="validationServer03Feedback" class="invalid-feedback"></div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="category_id" class="col-sm-3 form-label">Category</label>
                <div class="col-sm-9">
                  <select name="category" class="form-select form-select-sm" id="category_id">
                    <option value="" selected disabled>-- Choose --</option>
                    <?php foreach ($categories as $category) : ?>
                      <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <div id="validationServer03Feedback" class="invalid-feedback"></div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="price" class="form-label col-sm-3">Price</label>
                <div class="col-sm-9">
                  <div class="input-group input-group-sm">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" id="price" name="price" aria-label="Amount (to the nearest dollar)">
                    <div id="validationServer03Feedback" class="invalid-feedback"></div>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="exampleFormControlTextarea1" class="form-label col-sm-3">Decription</label>
                <div class="col-sm-9">
                  <textarea class="form-control " id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <img src="assets/images/product_img/default.png" id="img-preview" class="w-100 img-thumbnail border mx-auto d-block">
                <div class="mt-3">
                  <input class="form-control form-control-sm file-input" name="product_image" type="file" id="formFile" onchange="previewImg()">
                  <div id="validationServer03Feedback" class="invalid-feedback"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </form>
</div>