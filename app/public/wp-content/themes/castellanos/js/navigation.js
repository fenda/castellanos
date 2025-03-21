/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  const mobileMenuBtn = document.querySelector(".menu-toggle__button");
  const mobileMenu = document.querySelector(".menu-header-container");

  mobileMenuBtn.onclick = function () {
    mobileMenuBtn.classList.toggle("active");
    mobileMenuBtn.classList.toggle("not-active");
    mobileMenu.classList.toggle("active");
  };

  const siteNavigation = document.getElementById("site-navigation");

  // Return early if the navigation doesn't exist.
  if (!siteNavigation) {
    return;
  }

  const button = document.querySelector(".menu-toggle__button");

  // Return early if the button doesn't exist.
  if ("undefined" === typeof button) {
    return;
  }

  const menu = siteNavigation.getElementsByTagName("ul")[0];

  // Hide menu toggle button if menu is empty and return early.
  if ("undefined" === typeof menu) {
    button.style.display = "none";
    return;
  }

  if (!menu.classList.contains("nav-menu")) {
    menu.classList.add("nav-menu");
  }

  // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
  button.addEventListener("click", function () {
    siteNavigation.classList.toggle("toggled");

    if (button.getAttribute("aria-expanded") === "true") {
      button.setAttribute("aria-expanded", "false");
    } else {
      button.setAttribute("aria-expanded", "true");
    }
  });

  // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
  document.addEventListener("click", function (event) {
    const isClickInside = siteNavigation.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove("toggled");
      button.setAttribute("aria-expanded", "false");
    }
  });

  const links = menu.getElementsByTagName("a");
  const dropdownToggles = menu.querySelectorAll(
    ".menu-item-has-children > .nav-icon, .page_item_has_children > .nav-icon"
  );

  for (const link of links) {
    link.addEventListener("focus", toggleFocus, { passive: true });
    link.addEventListener("blur", toggleFocus, { passive: true });
  }

  for (const toggle of dropdownToggles) {
    toggle.addEventListener("touchstart", toggleFocus, { passive: false });
    toggle.addEventListener("click", toggleFocus, { passive: false });
  }

  function toggleFocus(event) {
    if (event.type === "focus" || event.type === "blur") {
      let self = this;
      while (!self.classList.contains("nav-menu")) {
        if ("li" === self.tagName.toLowerCase()) {
          self.classList.toggle("focus");
        }
        self = self.parentNode;
      }
    }

    if (event.type === "touchstart" || event.type === "click") {
      const menuItem = this.parentNode;
      event.preventDefault();
      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove("focus");
        }
      }
      menuItem.classList.toggle("focus");
    }
  }
})();
