<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../style-gioiello.css">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script src="https://kit.fontawesome.com/35fdc67f04.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
  
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bacasime+Antique&family=Elsie+Swash+Caps:wght@400;900&family=Italiana&display=swap" rel="stylesheet">

</head>
<body class="italiana-regular">

  <?php 
    require("../header.php");
  ?>

    <div class="Classic-Hoop-Earring-Medium">
      <div class="slider2">
        <div class="main-carousel"  data-flickity='{ "cellAlign": "left", "contain": true   }'>
          <div class="carousel-cell">
            <div class="carousel-cell__content zoom">
              <img src="cigar-ring1.webp" alt="">
            </div>
          </div>
          <div class="carousel-cell">
            <div class="carousel-cell__content zoom">
              <img src="cigar-ring2.webp" alt="">
            </div>
          </div>
        </div>
      </div>
      
      <div class="descrizione reveal">
       <h1>Classic Cigar Band Ring</h1>
       <p class="price_2">$95.00</p>
       <h2>description</h2>
       <p>Historically, cigar bands were used as decorative wrapping placed around cigars, and jewelers began using them as inspiration for wedding bands.
        Our Classic Cigar Band can be worn alone to make a statement, or stacked with eternity diamonds.</p>
        <div class="details">
          <div class="details__title">
              <h3>details & specs</h3>
          </div>
            <div class="details__content">
              <ul>
                <li>14k solid gold—always</li>
                <li>Average weight: 5.6g</li>
                <li>Band width: 8.4mm (front), 7mm (back)</li>
              </ul>
            </div>
        </div>

        <div class="bottone2 reveal">
          <h2>earring quantity</h2>
            <div class="selector-container">
                <ul class="arial">
                    <li class="active 3">3</li>
                    <li class="4">4</li>
                    <li class="5">5</li>
                    <li class="6">6</li>
                    <li class="7">7</li>
                    <li class="8">8</li>
                </ul>
              <div class="line-selector"></div>
            </div>
            <a class="add-to-cart" href="">Add to cart</a>
        </div>
      </div>
     
      <div class="slider">
        <div class="main-carousel"  data-flickity='{ "cellAlign": "left", "contain": true   }'>
          <div class="carousel-cell">
            <div class="carousel-cell__content zoom">
              <img src="../immagini/cigar-ring1.webp" alt="">
            </div>
          </div>
          <div class="carousel-cell">
            <div class="carousel-cell__content zoom">
              <img src="../immagini/cigar-ring2.webp" alt="">
            </div>
          </div>
        </div>
      </div>
     

      <div class="bottone1 reveal">
          <h2>ring size</h2>
          <div class="selector-container">
            <ul class="arial">
                <li class="active 3">3</li>
                <li class="4">4</li>
                <li class="5">5</li>
                <li class="6">6</li>
                <li class="7">7</li>
                <li class="8">8</li>
            </ul>
            <div class="line-selector"></div>
          </div>
          <a class="add-to-cart" href="">Add to cart</a>
      </div>


      <?php 
         require("../footer.php");
      ?>
      

    </div>

    
 
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $( document ).ready(function() {

        $( ".bar" ).on('click', function() {
            $(".menu").toggleClass("menu--open");
        });

        $( ".details-h" ).on('click', function() {    
                $(this).find(".details__content-h").toggleClass("details__content--open");
            });

          $( ".details" ).on('click', function() {    
              $(this).find(".details__content").toggleClass("details__content--open");
          });


        var nav = $(".selector-container");
        var pose = 0;
        var wid = "";
        var line = $(".line-selector");
        var active = $(".active");

        nav.find("ul li").on('click', function() {   
            var this_nav = $(this);
            
            line.animate({
                left:this_nav.position().left,
                width:this_nav.width()+10
            });
            
            nav.find("ul li").removeClass("active");

            if(! this_nav.hasClass("active")){
            this_nav.addClass("active"); 
            }
        });

        var active_width=active.width()
        line.css({
            width:active_width+30
        })
        
    });



    ScrollReveal().reveal('.reveal',{ distance: '100px', duration: 1500, easing:'cubic-bezier(.215, .61, .355, 1)', interval: 200 } );
    ScrollReveal().reveal('.zoom',{ duration: 800, easing:'cubic-bezier(.215, .61, .355, 1)', interval: 200, scale:0.85, mobile:false} );
  </script>


</body>
</html>