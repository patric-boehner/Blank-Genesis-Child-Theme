/** 
 * WC3: Mobile Menus 
 * https://w3c.github.io/wai-mobile-intro/mobile/mobile-menus/
*/

document.getElementById('nav-toggle').addEventListener('click', toggleMenu, false);

function toggleMenu(event) {

    var navBar = document.getElementById("genesis-nav-primary");
    var expanded = event.currentTarget.getAttribute("aria-expanded");

    if (expanded==="true") {
      navBar.classList.add("closed");
      navBar.classList.remove("opened");
      event.currentTarget.setAttribute('aria-expanded', 'false');
    } else {
      navBar.classList.add("opened");
      navBar.classList.remove("closed");
      event.currentTarget.setAttribute('aria-expanded', 'true');
    }
  
}