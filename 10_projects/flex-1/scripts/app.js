let menu = document.querySelector(".msn-menu")
let menuBtn = document.querySelector(".msn-header__icon")
let menuBtnIcon = document.querySelector(".msn-header__icon i")

menuBtn.addEventListener("click", function () {
  if (menuBtnIcon.classList.contains("fa-bars")) {
    menu.style.left = "0"
    menuBtnIcon.classList = "fa fa-times"
  } else {
    menu.style.left = "-256px"
    menuBtnIcon.classList = "fa fa-bars"
  }
})
