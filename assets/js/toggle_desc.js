function toggleCollapse(contentId) {
  var content = document.getElementById(contentId);

  if (window.getComputedStyle(content).display === "none") {
    content.style.display = "block";
    content.style.height = "0";
    content.style.overflow = "hidden";
    var contentHeight = content.scrollHeight;
    content.style.height = "0";
    setTimeout(function () {
      content.style.transition = "height 0.3s ease";
      content.style.height = contentHeight + "px";
    }, 0);
  } else {
    content.style.height = content.scrollHeight + "px";
    setTimeout(function () {
      content.style.transition = "height 0.3s ease";
      content.style.height = "0";
    }, 0);
    setTimeout(function () {
      content.style.display = "none";
      content.style.transition = "";
    }, 300);
  }
}

