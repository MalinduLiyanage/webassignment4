var bgElement = document.querySelector('.bgimg-1');
var imageUrls = [
  'assets/bg/mainbg_1.jpg',
  'assets/bg/mainbg_2.jpg',
  'assets/bg/mainbg_3.webp'
];

var currentImageIndex = 0;

function changeBackgroundImage() {
  bgElement.style.backgroundImage = 'url("' + imageUrls[currentImageIndex] + '")';
  currentImageIndex = (currentImageIndex + 1) % imageUrls.length;
}

setInterval(changeBackgroundImage, 3000);
