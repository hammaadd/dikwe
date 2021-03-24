document.getElementById("hamburger").onclick = function toggleMenu() {
    const navToggle = document.getElementsByClassName("toggle");
    for (let i = 0; i < navToggle.length; i++) {
      navToggle.item(i).classList.toggle("hidden");
    }
};
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#field-pass');
togglePassword.addEventListener('click', function (e) {
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  this.classList.toggle('fa-eye-slash');
});
const cTogglePassword = document.querySelector('#cTogglePassword');
const cPassword = document.querySelector('#field-cpass');
cTogglePassword.addEventListener('click', function (e) {
  const type = cPassword.getAttribute('type') === 'password' ? 'text' : 'password';
  cPassword.setAttribute('type', type);
  this.classList.toggle('fa-eye-slash');
});