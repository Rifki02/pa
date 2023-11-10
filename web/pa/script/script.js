// buat toggle class activ biar muncul klo dipencet (dimenu)
const navbarNav = document.querySelector('.navbar-nav');
// ketika hamburger diklick
document.querySelector('#hamburger-menu').onclick = () => {
  navbarNav.classList.toggle('active');
};


//klick diluar sidebar utk menghilngkn nav
const hamburger = document.querySelector('#hamburger-menu');

document.addEventListener('click',function(e) {
  if(!hamburger.contains(e.target) && !navbarNav.contains(e.target)){
    navbarNav.classList.remove('active');
  }
});

