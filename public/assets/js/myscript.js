// Toast notification
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
})

$(document).ready(function () {

  // Login & Register Btn
  $('.btn-log').click(function(){
    $.ajax({
      url: "auth/login_modal",
      dataType: "json",
      success: function (response) {
        $('.view-modal').html(response)
            $('.modal').modal('show')
      }
    });
  })

  $('.btn-res').click(function(){
    $.ajax({
      url: "auth/register_modal",
      dataType: "json",
      success: function (response) {
        $('.view-modal').html(response)
            $('.modal').modal('show')
      }
    });
  })

  $(document).on('submit', '.form-login', function(e) {
        e.preventDefault()

        $.ajax({
          type: "post",
          data: $(this).serialize(),
          url: '/auth/login',
          dataType: "json",
          success: function(response) {
            if (response.status) {
              $('.modal').modal('hide')
              setInterval('location.reload()', 2000); 
              Toast.fire({
                icon: 'success',
                title: 'Login success!'
              })
            } else {
              $.each(response.errors, function(key, value) {
                $(`[name = ${key}]`).addClass('is-invalid')
                $(`[name = ${key}]`).next().next().text(value)

                if (value == '') {
                  $(`[name = ${key}]`).removeClass('is-invalid')
                }
              })
            }
          }
        });

        $('.form-login input').on('click', function() {
          $(this).removeClass('is-invalid is-valid')
        });

      })

  $(document).on('submit', '.form-register', function(e) {
        e.preventDefault()

        $.ajax({
          type: "post",
          data: $(this).serialize(),
          url: '/auth/register',
          dataType: "json",
          success: function(response) {
            if (response.status) {
              $('.modal').modal('hide')
              setInterval('location.reload()', 2000); 
              Toast.fire({
                icon: 'success',
                title: 'New User Added Successfully!'
              })
            } else {
              $.each(response.errors, function(key, value) {
                $(`[name = ${key}]`).addClass('is-invalid')
                $(`[name = ${key}]`).next().next().text(value)

                if (value == '') {
                  $(`[name = ${key}]`).removeClass('is-invalid')
                }
              })
            }
          }
        });

        $('.form-register input').on('click', function() {
          $(this).removeClass('is-invalid is-valid')
        });

      })

  // Cart & Favorite Btn
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
