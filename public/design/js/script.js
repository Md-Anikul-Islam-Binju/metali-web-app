function navToggle(){
  const navMenuDiv = document.getElementById("nav-content").classList;
  if (navMenuDiv.contains("hidden")) {
    navMenuDiv.remove("hidden");
  } else {
    navMenuDiv.add("hidden");
  }
}


// Scroll navbar hide

// var header = document.getElementById('header');
  
// window.onscroll = function () { 
//     "use strict";
//     if (document.body.scrollTop >= 100 || document.documentElement.scrollTop >= 100  ) {
//         header.classList.add("bg__primary");
//     } 
//     else {
//       header.classList.remove("bg__primary");
//     }
// };
