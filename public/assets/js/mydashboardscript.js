const tooltips = document.querySelectorAll(".edit-btn, .delete-btn");
tooltips.forEach((e) => {
  new bootstrap.Tooltip(e);
});

function getProducts() {
    $.ajax({
      url: '/product/get_products',
      dataType: "json",
      success: function(response) {
        $('.get-products').html(response)
      }
    });
  }

$(document).ready(function () {
getProducts()
  
// Show delete modal
  $(document).on("click", ".delete-btn", function () {
    let product_id = $(this).attr("data-productId");

    $.ajax({
      type: "post",
      url: "/product/delete_modal",
      data: {
        id: product_id,
      },
      dataType: "json",
      success: function (response) {
        $(".view-modal").html(response);
        $(".modal").modal("show");
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
          $(".modal").modal("hide");
          getProducts()
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
console.log(product_id);
    $.ajax({
      type: "post",
      url: "/product/edit_modal",
      data: {
        id: product_id,
      },
      dataType: "json",
      success: function (response) {
        $(".view-modal").html(response);
        $(".modal").modal("show");
      },
    });
  });

  $(document).on("submit", ".form_edit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      data: $(this).serialize(),
      url: 'product/edit_product',
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $(".modal").modal("hide");
          getProducts();
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

    $("#form_edit input").on("click", function () {
      $(this).removeClass("is-invalid is-valid");
    });
    $("#form_edit select").on("click", function () {
      $(this).removeClass("is-invalid");
    });
  });
});
