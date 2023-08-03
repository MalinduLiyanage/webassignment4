var stars = document.getElementsByClassName("star");

function toggleStar(index) {
  for (var i = 0; i <= index; i++) {
    stars[i].classList.add("colored-star");
  }

  for (var j = index + 1; j < stars.length; j++) {
    stars[j].classList.remove("colored-star");
  }
}

for (var k = 0; k < stars.length; k++) {
  stars[k].addEventListener("click", (function(index) {
    return function() {
      toggleStar(index);
    };
  })(k));
}
