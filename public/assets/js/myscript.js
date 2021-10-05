console.log(baseURL);

const cartForm = document.querySelectorAll(".cartForm"),
  favoriteBtn = document.querySelectorAll(".favoriteBtn"),
  cartBtn = document.querySelectorAll(".cartBtn");

cartForm.forEach((e) => {
  e.onsubmit = (e) => {
    e.preventDefault();
  };
});

cartBtn.forEach((e) => {
  e.onclick = function () {
    console.log(this.getAttribute("data-userId"));
    console.log(this.getAttribute("data-productId"));
    console.log(this.getAttribute("data-categoryId"));
    // let params =

    // let xhr = new XMLHttpRequest();

    // xhr.open("POST", baseURL + "/add-cart", true);
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // xhr.onreadystatechange = function () {
    //   if (xhr.readyState == 4 && xhr.status == 200) {
    //     console.log(this.responseText);
    //   }
    // };
    // xhr.send();
  };
});
