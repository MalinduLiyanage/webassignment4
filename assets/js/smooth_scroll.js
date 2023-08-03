const navLinks = document.querySelectorAll(".w3-bar-item.w3-button");

for (const link of navLinks) {
  link.addEventListener("click", clickHandler);
}

function clickHandler(event) {
  event.preventDefault();
  const targetId = this.getAttribute("href");
  smoothScrollTo(targetId);
}

const backButton = document.getElementById("backHome");
backButton.addEventListener("click", navigateToHome);

const expButton = document.getElementById("explore_btn");
expButton.addEventListener("click", navigateToQuality);

function navigateToHome() {
  const targetId = "#home";
  smoothScrollTo(targetId);
}

function navigateToQuality(e) {
  e.preventDefault();
  const target = this.getAttribute("href");
  smoothScrollTo(target);
}

function smoothScrollTo(targetId) {
  const targetElement = document.querySelector(targetId);
  if (targetElement) {
    window.scrollTo({
      top: targetElement.offsetTop,
      behavior: "smooth"
    });
  }
}


