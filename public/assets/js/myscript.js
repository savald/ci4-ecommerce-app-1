$(document).ready(function () {
  $(".cartForm").submit(function (e) {
    e.preventDefault();
  });

  $(".favoriteBtn").click(function () {
    $.ajax({
      type: "post",
      url: "/favorites/add_favorite",
      data: {
        user_id: $(this).attr("data-userId"),
        product_id: $(this).attr("data-productId"),
        category_id: $(this).attr("data-categoryId"),
      },
      success: function (response) {},
    });

    $(this).toggleClass("active");
  });

  $(".cartBtn").click(function () {
    $.ajax({
      type: "post",
      url: "/carts/add_cart",
      data: {
        user_id: $(this).attr("data-userId"),
        product_id: $(this).attr("data-productId"),
        category_id: $(this).attr("data-categoryId"),
      },
      success: function (response) {},
    });

    $(this).toggleClass("active");
  });

});
