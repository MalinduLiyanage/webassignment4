var i = 0;
var txt = 'Immerse yourself in JOHNSON TAILORS world of bespoke tailoring and timeless elegance. Our skilled artisans and master tailors blend tradition with innovation to bring your sartorial visions to life. We offer personalized consultations and use the finest fabrics to create garments that exude luxury and comfort. From custom-made suits to exquisite dresses, every detail is meticulously crafted to reflect your unique style.';
var speed = 50;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("desc_text").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}