function showBigger(image) {
  image.style.width = "80%";
  image.nextElementSibling.nextElementSibling.style.display = "none";
}

function showOriginalSize(image) {
  image.style.width = "45%";
  image.nextElementSibling.nextElementSibling.style.display = "block";
}
