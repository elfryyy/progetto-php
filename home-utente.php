<?php
	session_start();
    if(!isset($_SESSION['username'])){ 
		header('location: home.html');
	}
    $username = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>K - home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="style-home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css" integrity="sha512-fJcFDOQo2+/Ke365m0NMCZt5uGYEWSxth3wg2i0dXu7A1jQfz9T4hdzz6nkzwmJdOdkcS8jmy2lWGaRXl+nFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
  <script src="https://kit.fontawesome.com/35fdc67f04.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bacasime+Antique&family=Elsie+Swash+Caps:wght@400;900&family=Italiana&display=swap" rel="stylesheet">

<body class="italiana-regular">


  <div class="header">

    <label>
      <input type="checkbox">
      <div class="bar">
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
      </div>
    </label>

    <div class="menu med-text">
      <ul>
        <li><a href="home.html">Home</a></li>
        <li>
          <div class="details-h">
            <div class="details__title-h">
                Our jewels
            </div>
            <div class="details__content-h">
              <a class="italiana-regular" href="pagine/sezione-prodotti.php?categoria=Rings">>rings</a>
              <a class="italiana-regular" href="pagine/sezione-prodotti.php?categoria=Earrings">>earrings</a>
              <a class="italiana-regular" href="pagine/sezione-prodotti.php?categoria=Necklaces">>necklaces</a>
              <a class="italiana-regular" href="pagine/sezione-prodotti.php?categoria=Pendants">>pendants</a>
              <a class="italiana-regular" href="pagine/sezione-prodotti.php?categoria=New">>new arrivals</a>
              <a class="italiana-regular color" href="pagine/sezione-prodotti.php?categoria=Discounted">>promotions</a>
            </div>
        </div>
        </li>
      </ul>
    </div>

    <div class="logo">
        <img class="immagine" src="immagini/logo.jpg" alt="">
    </div>



	<?php 
	  echo"<p class='saluto_utente'>hi, $username</p>"
	?>

    <label>
        <input type="checkbox">
            <div class="icona">
              <a href="login.php">
                  <img class="img_personal"src="immagini/personal-area.png" alt="">
              </a>
            </div>
    </label>

  </div>

  <div class="hero zoom" >
    <div class="cover__content">
      <a class="button" href="">Discover more</a>
    </div>
  </div>
.
  
  <div class="categorie zoom">
    <h1>Explore our products</h1>
    <div class="cards">
      <a class="rings" href="pagine/sezione-prodotti.php?categoria=Rings">
        <div class="cards__card">
          <div class="cards__card__txt"><b>Rings</b></div>
          <div class="cards__card__riga">          </div>
        </div>
      </a>
      <a class="earrings" href="pagine/sezione-prodotti.php?categoria=Earrings">
        <div class="cards__card">
          <div class="cards__card__txt"><b>Earrings</b></div>
          <div class="cards__card__riga"></div>
        </div>
      </a>
      <a class="necklaces" href="pagine/sezione-prodotti.php?categoria=Necklaces">
        <div class="cards__card">
          <div class="cards__card__txt"><b>Necklaces</b></div>
          <div class="cards__card__riga"></div>
        </div>
      </a>
      <a class="charms" href="pagine/sezione-prodotti.php?categoria=Pendants">
        <div class="cards__card">
          <div class="cards__card__txt"><b>Pendants</b></div>
          <div class="cards__card__riga"></div>
        </div>
      </a>

      <a class="new-arrivals" href="pagine/sezione-prodotti.php?categoria=New">
        <div class="cards__card">
          <div class="cards__card__txt"> <b style="color:aliceblue">New arrivals</b></div>
          <div class="cards__card__riga"></div>
        </div>
      </a>
      <a class="promotions" href="pagine/sezione-prodotti.php?categoria=Discounted">
        <div class="cards__card">
          <div class="cards__card__txt"><b style="color:aliceblue" >Promotions</b></div>
          <div class="cards__card__riga"></div>
        </div>
      </a>
    </div>
    
    </div>


  <div class="in-evidence-p">
    <h1 class="in-evidence">Best sellers:</h1>
    <div class="main-carousel"  data-flickity='{ "cellAlign": "left", "contain": true }'>
      <a class="carousel-cell" href="pagine/prodotto.php?cod_prodotto=8">
        <div class="carousel-cell__content zoom">
          <img src="immagini/e-hoop1.jpg" alt="">
        </div>
        <h1>Classic Hoop Earring Medium</h1>
        <p>$50.00</p>
      </a>
      <a class="carousel-cell" href="pagine/prodotto.php?cod_prodotto=9">
        <h1>Bold Teardroop Hoop Earrings</h1>
        <p>$80.00</p>
        <div class="carousel-cell__content zoom">
          <img src="immagini/e-tear1.jpg" alt="">
        </div>
      </a>
      <a class="carousel-cell" href="pagine/prodotto.php?cod_prodotto=6">
        <h1>North Star Ring</h1>
         <p>$56.00</p>
        <div class="carousel-cell__content zoom">
          <img src="immagini/r-star1.jpg" alt="">
        </div>
      </a>
      <a class="carousel-cell" href="pagine/prodotto.php?cod_prodotto=2">
        <h1>Luna Layered Ring Emerald</h1>
        <p>$120.00</p>
        <div class="carousel-cell__content zoom">
          <img src="immagini/r-emerald1.jpg" alt="">
        </div>
      </a>
      <a class="carousel-cell" href="pagine/prodotto.php?cod_prodotto=13">
        <h1>Teardrop Necklace</h1>
        <p>$90.00</p>
        <div class="carousel-cell__content zoom">
          <img src="immagini/n-tear1.jpg" alt="">
        </div>
      </a>
      <a class="carousel-cell" href="pagine/prodotto.php?cod_prodotto=12">
        <h1>Ribbed Maison Heart Necklace</h1>
        <p>$110.00</p>
        <div class="carousel-cell__content zoom">
          <img src="immagini/n-heart1.jpg" alt="">
        </div>
      </a>
      <a class="carousel-cell" href="pagine/prodotto.php?cod_prodotto=15">
        <div class="carousel-cell__text">
          <h1>Maison Oval Locket</h1>
          <p>$40.00</p>
        </div>
        <div class="carousel-cell__content zoom">
          <img src="immagini/p-oval1.jpg" alt="">
        </div>
      </a>
    </div>
  </div>
    

  <div class="poster nt-3">
    <div class="poster__ing  reveal">
       <img src="immagini/shop.jpg" alt=""class="">
    </div>
    <div class="poster__content reveal">
      <h3 class="big-text">Our shop</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae quos impedit ipsam quisquam, natus libero soluta error laudantium. Architecto possimus autem impedit tempore nulla corrupti illo vero ratione odio quia.</p>
      <a href="" class="button">Go on maps</a>
    </div>
  </div>

  <div class="footer">
    <div class="col-1">
      <h3>USEFUL LINKS</h3>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Contact</a>
      <a href="#">Shop</a>
      <a href="#">Blog</a>
    </div>
    <div class="col-2">
      <h3>NEWSLETTER</h3>
      <form>
        <input type="email" placeholder="Your Email Address" required>
        <br>
        <button type="submit">SUBSCRIBE NOW</button>
      </form>
    </div>
    <div class="col-3">
      <h3>CONTACT</h3>
      <p>123, XYZ Road, BSK 3 <br>Bangalore, Karnataka, IN</p>
      <div class="social-icons">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-whatsapp"></i>
      </div>
    </div>
  </div>




  
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $( document ).ready(function() {


      $( ".bar" ).on('click', function() {
        $(".menu").toggleClass("menu--open");
        $( ".details__content").removeClass("details__content--open")
      });

      $( ".details-h" ).on('click', function() {    
                $(this).find(".details__content-h").toggleClass("details__content--open");
        });

      
    });

    ScrollReveal().reveal('.reveal',{ distance: '100px', duration: 1500, easing:'cubic-bezier(.215, .61, .355, 1)', interval: 600 } );

    ScrollReveal().reveal('.zoom',{ duration: 800, easing:'cubic-bezier(.215, .61, .355, 1)', interval: 200, scale:0.85, mobile:false} );
  </script>




</body>
</html>