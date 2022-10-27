function showNav() {
  document.getElementsByClassName("navigation")[0].classList.toggle("active");
}

// =====Contact Us=======
document.querySelector("#contact-form").addEventListener("submit", (e) => {
  e.preventDefault();
  e.target.elements.name.value = "";
  e.target.elements.email.value = "";
  e.target.elements.message.value = "";
});
