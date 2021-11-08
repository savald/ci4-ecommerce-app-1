const tooltips = document.querySelectorAll(".edit-btn, .delete-btn");
tooltips.forEach((e) => {
  new bootstrap.Tooltip(e);
});

// Preview image
function previewImg() {

            const inputImg = document.querySelector('.file-input'),
                imgPreview = document.querySelector('#img-preview');

            const fileReader = new FileReader();
            fileReader.readAsDataURL(inputImg.files[0]);

            fileReader.onload = (e) => imgPreview.src = e.target.result;
        }

$(document).ready(function () {

// Show add modal
  $(document).on("click", ".add-btn", function () {

    $.ajax({
      url: "/product/add_modal",
      dataType: "json",
      success: function (response) {
        $(".view-modal").html(response);
        $("#addProductModal").modal("show");
      },
    });
  });

  // Process adding
  $(document).on("submit", ".form_add", function (e) {
    e.preventDefault();
    let formAdd = new FormData(this);

    $.ajax({
      type: "post",
      data: formAdd,
      url: 'product/add_product',
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#addProductModal").modal("hide");
          location.reload()
          // Toast.fire({
          //   icon: "success",
          //   title: "Data Successfully Update!",
          // });
        } else {
          $.each(response.errors, function (key, value) {
            $(`[name = ${key}]`).addClass("is-invalid");
            $(`[name = ${key}]`).next().text(value);

            if (value == "") {
              $(`[name = ${key}]`).removeClass("is-invalid");
            }
          });
        }
      },
      cache: false,
      contentType: false,
      processData: false
    });

    $(".form_add input").on("click", function () {
      $(this).removeClass("is-invalid is-valid");
    });
    $(".form_add select").on("click", function () {
      $(this).removeClass("is-invalid");
    });
  });

// Show delete modal
  $(document).on("click", ".delete-btn", function () {
    $.ajax({
      type: "post",
      url: "/product/delete_modal",
      data: {
        id: $(this).attr("data-productId"),
        productImg: $(this).attr("data-productImg"),
      },
      dataType: "json",
      success: function (response) {
        $(".view-modal").html(response);
        $("#deleteProductModal").modal("show");
      },
    });
  });

  // Process deleting
  $(document).on("submit", ".form_delete", function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      data: $(this).serialize(),
      url: '/product/delete_product',
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#deleteProductModal").modal("hide");
          location.reload()
          // Toast.fire({
          //   icon: "success",
          //   title: "Data Successfully Deleted!",
          // });
        }
      },
    });
  });

// Show edit modal
  $(document).on("click", ".edit-btn", function () {  
    let product_id = $(this).attr("data-productId");
    $.ajax({
      type: "post",
      url: "/product/edit_modal",
      data: {
        id: product_id,
      },
      dataType: "json",
      success: function (response) {
        $(".view-modal").html(response);
        $("#editProductModal").modal("show");
      },
    });
  });

  // Process edit
  $(document).on("submit", ".form_edit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      data: $(this).serialize(),
      url: 'product/edit_product',
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $("#editProductModal").modal("hide");
          location.reload()
          // Toast.fire({
          //   icon: "success",
          //   title: "Data Successfully Update!",
          // });
        } else {
          $.each(response.errors, function (key, value) {
            $(`[name = ${key}]`).addClass("is-invalid");
            $(`[name = ${key}]`).next().text(value);

            if (value == "") {
              $(`[name = ${key}]`).removeClass("is-invalid");
            }
          });
        }
      },
    });

    $("#.form_edit input").on("click", function () {
      $(this).removeClass("is-invalid is-valid");
    });
    $("#.form_edit select").on("click", function () {
      $(this).removeClass("is-invalid");
    });
  });

});
