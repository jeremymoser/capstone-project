// Set Active Nav Items in Website and Portal NavBar
currentColorMode();
const script = window.location.pathname;
const navItem = document.querySelectorAll('a[href="' + script + '"]');
for (i = 0; i < navItem.length; i++) {
  navItem[i].classList.add("active");
  if (
    navItem[i].parentElement.parentElement.classList.contains("dropdown-menu")
  ) {
    navItem[i].parentElement.parentElement.previousElementSibling.classList.add(
      "active"
    );
  }
}

// Monitor System ColorMode
window
  .matchMedia("(prefers-color-scheme: dark)")
  .addEventListener("change", ({ matches }) => {
    if (matches) {
      color = "dark";
    } else {
      color = "light";
    }
    setColorMode(color);
  });
function currentColorMode() {
  if (
    (currentColorMode = window.matchMedia(
      "(prefers-color-scheme: dark)"
    ).matches)
  ) {
    // Dark Mode
    setColorMode("dark");
  } else {
    // Light Mode
    setColorMode("light");
  }
}
function setColorMode(color) {
  document.documentElement.setAttribute("data-bs-theme", color);
}
