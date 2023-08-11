// thema switch
// function to set a given theme/color-scheme
function setTheme(themeName) {
  localStorage.setItem('theme', themeName);
  document.documentElement.className = themeName;
}
let iconName = document.querySelector('.icon-theme');
iconName.onclick = () => {
  toggleTheme();
}
// function to change theme to light and dark
function toggleTheme() {
 if (localStorage.getItem('theme') === 'theme-dark'){
     setTheme('theme-light');
     iconName.classList.add('bx-moon');
     iconName.classList.remove('bx-sun');
     iconName.classList.remove('bx-tada');
 } else {
     setTheme('theme-dark');
     iconName.classList.remove('bx-moon');
     iconName.classList.add('bx-sun');
     iconName.classList.remove('bx-tada');
 }
}
// invoked function to set the theme on initial load last recomme
(function () {
 if (localStorage.getItem('theme') === 'theme-dark') {
     setTheme('theme-dark');
     iconName.classList.remove('bx-moon');
     iconName.classList.add('bx-sun');
 } else {
     setTheme('theme-light');
     iconName.classList.add('bx-moon');
     iconName.classList.remove('bx-sun');
 }
})();

// control for the sidbar
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function () {
  sidebar.classList.toggle("active");
  if (sidebar.classList.contains("active"))
  {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
  } 
  else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
};