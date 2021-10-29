// Toast notification
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
});

// Cart list
function getNavbarCart() {
  $.ajax({
    url: "/carts/get_navbar_cart",
    dataType: "json",
    success: function (response) {
      // console.log(response);
      $("#my-navbar-cart").html(response);
    },
  });
}
// Get count cart
function getCountCart() {
  $.ajax({
    url: "/carts/get_count_cart",
    dataType: "json",
    success: function (response) {
      $("#count-cart").text(response);
    },
  });
}

function getMyCart() {
  $.ajax({
    url: "/carts/get_my_cart",
    dataType: "json",
    success: function (response) {
      $("#my-cart").html(response);
    },
  });
}

function getMyFavorites() {
  $.ajax({
    url: "/favorites/get_my_favorites",
    dataType: "json",
    success: function (response) {
      $("#my-favorites").html(response);
    },
  });
}

// Add/Delete product cart/favorite
function addDel(btn, addUrl, deleteUrl) {
  if (!$(btn).hasClass("active")) {
    // Add
    $.ajax({
      type: "post",
      url: addUrl,
      dataType: "json",
      data: {
        user_id: $(btn).attr("data-userId"),
        product_id: $(btn).attr("data-productId"),
        category_id: $(btn).attr("data-categoryId"),
      },
      success: (response) => {
        // if user has been logged in
        if (response.status) {
          $(btn).addClass("active");
          if (response.table == "carts") {
            getCountCart();
            getNavbarCart();
            getMyCart();
            // this product has been added to cart
          } else {
            // this product has been added to favorites
          }
        }

        // if user hasn't logged in
        // please login first
      },
    });
  } else {
    // Delete
    $.ajax({
      type: "post",
      url: deleteUrl,
      dataType: "json",
      data: {
        user_id: $(btn).attr("data-userId"),
        product_id: $(btn).attr("data-productId"),
      },
      success: (response) => {
        if (response.status) {
          $(btn).removeClass("active");
          if (response.table == "carts") {
            getCountCart();
            getNavbarCart();
            getMyCart();
            // this product has been remove from cart
          } else {
            // this product has been added to favorites
          }
        }
      },
    });
  }
}

$(document).ready(function () {
  getNavbarCart();
  getCountCart();
  getMyCart();
  getMyFavorites();

  // Login & Register Btn
  $(".btn-log").click(function () {
    $.ajax({
      url: "/auth/login_modal",
      dataType: "json",
      success: function (response) {
        $(".view-modal").html(response);
        $(".modal-login").modal("show");
      },
    });
  });

  $(".btn-res").click(function () {
    $.ajax({
      url: "/auth/register_modal",
      dataType: "json",
      success: function (response) {
        $(".view-modal").html(response);
        $(".modal-register").modal("show");
      },
    });
  });

  // Login & Register process
  $(document).on("submit", ".form-login", function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      data: $(this).serialize(),
      url: "/auth/login",
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $(".modal").modal("hide");
          setInterval("location.reload()", 2000);
          Toast.fire({
            icon: "success",
            title: "Login success!",
          });
        } else {
          $.each(response.errors, function (key, value) {
            if (response.errors.email == "") {
              $(`[name = email]`).addClass("is-invalid");
              $(`[name = password]`).addClass("is-invalid");
              $(`[name = password]`).next().next().text(value);
            }

            $(`[name = ${key}]`).addClass("is-invalid");
            $(`[name = ${key}]`).next().next().text(value);

            if (value == "") {
              $(`[name = ${key}]`).removeClass("is-invalid");
            }
          });
        }
      },
    });

    $(".form-login input").on("click", function () {
      if ($("[name = email]").next().next().text() == "") {
        $(".form-login input").removeClass("is-invalid");
      }
      $(this).removeClass("is-invalid");
    });
  });

  $(document).on("submit", ".form-register", function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      data: $(this).serialize(),
      url: "/auth/register",
      dataType: "json",
      success: function (response) {
        if (response.status) {
          $(".modal").modal("hide");
          setInterval("location.reload()", 2000);
          Toast.fire({
            icon: "success",
            title: "New User Added Successfully!",
          });
        } else {
          $.each(response.errors, function (key, value) {
            $(`[name = ${key}]`).addClass("is-invalid");
            $(`[name = ${key}]`).next().next().text(value);

            if (value == "") {
              $(`[name = ${key}]`).removeClass("is-invalid");
            }
          });
        }
      },
    });

    $(".form-register input").on("click", function () {
      $(this).removeClass("is-invalid is-valid");
    });
  });

  // Cart & Favorite
  $(document).on("submit", ".cartForm", function (e) {
    e.preventDefault();
  });

  // Add & delete cart
  $(".cartBtn").click(function () {
    addDel(this, "/carts/add_cart", "/carts/delete_cart");
  });

  // Delete from list cart page
  $(document).on("click", ".cartDelBtn", function () {
    $.ajax({
      type: "post",
      url: "/carts/delete_cart",
      dataType: "json",
      data: {
        user_id: $(this).attr("data-userId"),
        product_id: $(this).attr("data-productId"),
      },
      success: (response) => {
        if (response.status) {
          getNavbarCart();
          getCountCart();
          getMyCart();
          // this product has been remove from cart
        }
      },
    });
  });

  // Add & delete favorite
  $(".favoriteBtn").click(function () {
    addDel(this, "/favorites/add_favorite", "/favorites/delete_favorite");
  });

  // click on qty up button
  $(document).on("click", ".qty-up", function (e) {
    let qtyInput = $(`.qty-input[data-productId='${$(this).attr("data-productId")}']`);
    let qtyPrice = $(`.product-price[data-productId='${$(this).attr("data-productId")}'] span`);

    $.ajax({
      url: "/product/qty_product",
      type: "post",
      data: { id: $(this).attr("data-productId") },
      success: function (response) {
        let obj = JSON.parse(response);
        let productPrice = obj[0]["price"];

        if (qtyInput.val() >= 1 && qtyInput.val() <= 9) {
          qtyInput.val(function (i, oldval) {
            return ++oldval;
          });

          // increase product price
          let price = productPrice * qtyInput.val();
          qtyPrice.text(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

          // set subtotal price
          let totalPrice = $("#deal-price span").text().replace(".", "");
          let checkoutPrice = parseInt(totalPrice) + parseInt(productPrice);
          $("#deal-price span").text(checkoutPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
          $('input[name="total_price"]').val(checkoutPrice.toString().replace(".", ""));
        }
      },
    });
  });

  // click on qty down button
  $(document).on("click", ".qty-down", function (e) {
    let qtyInput = $(`.qty-input[data-productId='${$(this).attr("data-productId")}']`);
    let qtyPrice = $(`.product-price[data-productId='${$(this).attr("data-productId")}'] span`);

    $.ajax({
      url: "/product/qty_product",
      type: "post",
      data: { id: $(this).attr("data-productId") },
      success: function (response) {
        let obj = JSON.parse(response);
        let productPrice = obj[0]["price"];

        if (qtyInput.val() > 1 && qtyInput.val() <= 10) {
          qtyInput.val(function (i, oldval) {
            return --oldval;
          });

          // decrease prouduct price
          let price = productPrice * qtyInput.val();
          qtyPrice.text(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

          // set subtotal price
          let totalPrice = $("#deal-price span").text().replace(".", "");
          let checkoutPrice = parseInt(totalPrice) - parseInt(productPrice);
          $("#deal-price span").text(checkoutPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
          $('input[name="total_price"]').val(checkoutPrice.toString().replace(".", ""));
        }
      },
    });
  });

  $(document).on("click", "#checkout-link", function (e) {
      $('#checkout-btn').trigger('click')
    });
//   $(document).on("click", "#checkout-btn", function (e) {
//     let total_price = $('input[name="total_price"]').val()
//     let inputProductId = $('input[name="product_id"]')
//     let inputQuantity = $('input[name="quantity"]')
//     let productId = []
//     let quantity = []
//     for (let i = 0; i < inputProductId.length; i++) {
//        productId.push(inputProductId[i].value);
//        quantity.push(inputQuantity[i].value)
//       }
// $.ajax({
//   type: "post",
//   url: "/checkout/index",
//   data: {
//     product_id: productId,
//     quantity: quantity,
//     total_price: total_price
//   },
//   dataType: "json",
//   success: function (response) {
//     console.log(response);
//     window.location='/checkout'
//   }
// });
//     });
});
