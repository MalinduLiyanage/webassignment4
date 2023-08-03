function showCard(image) {
  var overlay = document.getElementById("overlay");
  var card = document.getElementById("card");
  var cardImage = document.getElementById("card-image");
  
  overlay.style.display = "block";
  card.style.display = "block"; 
  
  cardImage.src = image.src; 
}

function showCard_2(image) {
  var overlay2 = document.getElementById("overlay_2");
  var card2 = document.getElementById("card_2");
  var cardImage2 = document.getElementById("card-image_2");
  
  overlay2.style.display = "block";
  card2.style.display = "block";
  
  cardImage2.src = image.src; 
}

function hideCard() {
  var overlay = document.getElementById("overlay");
  var card = document.getElementById("card");

  overlay.style.display = "none"; 
  card.style.display = "none"; 

}

function hideCard_2() {
  var overlay2 = document.getElementById("overlay_2");
  var card2 = document.getElementById("card_2");

  overlay2.style.display = "none"; 
  card2.style.display = "none"; 

}