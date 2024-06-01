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
        
    });



    ScrollReveal().reveal('.reveal',{ distance: '100px', duration: 1500, easing:'cubic-bezier(.215, .61, .355, 1)', interval: 200 } );
    ScrollReveal().reveal('.zoom',{ duration: 800, easing:'cubic-bezier(.215, .61, .355, 1)', interval: 200, scale:0.85, mobile:false} );
  </script>