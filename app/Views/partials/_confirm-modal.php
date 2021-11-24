<!-- First Modal -->
<div class="modal orderConfirmation fade" id="modalOrderConfirmation" tabindex="-1" aria-labelledby="orderConfirmationLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Your Order</h5>
      </div>
      <div class="modal-body">
        Order accepted?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="confirm-btn" data-bs-target="#modalOrderCompleted" data-bs-toggle="modal">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Second Modal -->
<div class="modal fade" id="modalOrderCompleted" tabindex="-1" aria-labelledby="orderCompletedLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Completed</h5>
      </div>
      <div class="modal-body">
        Thank you for purchasing our products, please give us your review!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" data-bs-target="#modalReview" data-bs-toggle="modal">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Third Modal -->
<div class="modal fade staticReview" id="modalReview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalReview" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
      </div>
      <div class="modal-body">

        <form action="/review/addReview" method="POST">
          <?php foreach ($products_review as $product) : ?>
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="<?= base_url("/assets/images/product_images") . '/' . $product['product_image']; ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?= $product['product_name']; ?></h5>
                    <input type="hidden" name="product_id[]" value="<?= $product['product_id']; ?>">
                    <label for="message-text" class="col-form-label">Your review:</label>
                    <textarea class="form-control" name="review[]" id="message-text"></textarea>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>