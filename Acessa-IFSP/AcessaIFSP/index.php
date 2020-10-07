<?php
require_once('navBar.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Acessa IFSP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 950px;
  position: relative;
  margin: auto;
}


/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 5.0s;
  animation-name: fade;
  animation-duration: 5.0s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>

        
<div class="row">
    <div class="container">
        <h1><i>Bem vindo!</i></h1>
        <p>Sistema de controle de acesso ao Instituto Federal.</p> 
    
    
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="img/logotipo1.jpg" style="width:95%">
        </div>

        <div class="mySlides fade">
            <img src="img/entrada2.jpg" style="width:95%">
        </div>

        <div class="mySlides fade">
            <img src="img/entrada.jpg" style="width:95%">
        </div>

    </div>
<br>

    <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000); }
</script>
        <div class="col-sm-4">
            <h3>Problemas?</h3>
            <p>e-mail: acessaifsp@ifsp.edu.br</p>
        </div>
    </div>        
</div>
</body>
</html> 
