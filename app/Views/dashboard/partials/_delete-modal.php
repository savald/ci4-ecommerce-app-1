<!-- Delete Modal -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <form class="d-inline ms-2 form_delete">
    <div class="modal-dialog modal-sm">
      <?= csrf_field(); ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Product</h5>
        </div>
        <div class="modal-body">
          <input type="text" name="id" value="<?= $product['id']; ?>">
          <input type="text" name="productImg" value="<?= $product['productImg']; ?>">
          Are you sure ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
      </div>
  </form>

</div>
</div>