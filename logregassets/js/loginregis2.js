const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const forgot_btn = document.querySelector("#forgot-btn");
const contener = document.querySelector(".contener");

sign_up_btn.addEventListener("click", () => {
  contener.classList.add("sign-up-mode");
});

forgot_btn.addEventListener("click", () => {
  contener.classList.add("forgot-mode");
});

sign_in_btn2.addEventListener("click", () => {
  contener.classList.remove("forgot-mode");
});