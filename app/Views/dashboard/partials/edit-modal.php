<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <form class="d-inline ms-2 form_edit">
    <div class="modal-dialog modal-xl">
      <?= csrf_field(); ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Product</h5>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="item_id" value="<?= $product['id']; ?>">
          <div class="row">
            <div class="col-md-6">
              <form class="form_edit">
                <?= csrf_field() ?>
                <div class="mb-3 row">
                  <label for="product_name" class="col-sm-3 form-label">Product Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="product_name" class="form-control form-control-sm" id="product_name" placeholder="Your Product Name" value="<?= $product['product_name']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback"></div>
                  </div>

                </div>
                <div class="mb-3 row">
                  <label for="category_id" class="col-sm-3 form-label">Category</label>
                  <div class="col-sm-9">
                    <select name="category" class="form-select form-select-sm" id="category_id">
                      <!-- <option value="">-- Choose --</option> -->
                      <?php foreach ($categories as $category) : ?>
                        <?php if ($product['category_id'] == $category['id']) : ?>
                          <option value="<?= $category['id']; ?>" selected><?= $category['category_name']; ?></option>
                        <?php else : ?>
                          <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
                        <?php endif ?>
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
                      <input type="text" class="form-control" id="price" name="price" aria-label="Amount (to the nearest dollar)" value="<?= $product['price']; ?>">
                      <div id="validationServer03Feedback" class="invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="exampleFormControlTextarea1" class="form-label col-sm-3">Decription</label>
                  <div class="col-sm-9">
                    <textarea class="form-control " id="exampleFormControlTextarea1" name="description" rows="3"><?= $product['description']; ?></textarea>
                  </div>
                </div>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>

    </div>
  </form>
</div>