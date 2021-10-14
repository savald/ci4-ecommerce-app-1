const tooltips = document.querySelectorAll(".edit-btn, .delete-btn");
tooltips.forEach((e) => {
  new bootstrap.Tooltip(e);
});

$(document).ready(function () {
  $(".action-form").submit(function (e) {
    e.preventDefault();
  });
  
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
          Toast.fire({
            icon: "success",
            title: "Data Successfully Deleted!",
          });
        }
      },
    });
  });

  $(document).on("click", ".edit-btn", function () {
    let item_id = $(this).data("id");

    $.ajax({
      type: "post",
      url: "/home/get_update_item_modal",
      data: {
        id: item_id,
      },
      dataType: "json",
      success: function (response) {
        $(".view-modal").html(response);
        $(".modal").modal("show");
      },
    });
  });

  $(document).on("submit", "#form_edit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      data: $(this).serialize(),
      url: $(this).attr("action"),
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $(".modal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Data Successfully Update!",
          });
          sourceData();
        } else {
          // console.log(response.errors
          $.each(response.errors, function (key, value) {
            // mengambil atribut name
            // console.log(`[name = ${key}]`);
            $(`[name = ${key}]`).addClass("is-invalid");
            $(`[name = ${key}]`).next().text(value);

            if (value == "") {
              $(`[name = ${key}]`).removeClass("is-invalid");
              $(`[name = ${key}]`).addClass("is-valid");
            }
          });
        }
      },
    });

    $("#form_edit input").on("click", function () {
      $(this).removeClass("is-invalid is-valid");
    });
    $("#form_edit select").on("click", function () {
      $(this).removeClass("is-invalid is-valid");
    });
  });
});
