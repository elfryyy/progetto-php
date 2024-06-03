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
    <li><a href="../home-utente.php">Home</a></li>
    <li>
      <div class="details-h">
        <div class="details__title-h">
            Our jewels
        </div>
        <div class="details__content-h">
          <a class="italiana-regular" href="menu/anelli.html">>rings</a>
          <a class="italiana-regular" href="menu/orecchini.html">>earrings</a>
          <a class="italiana-regular" href="menu/collane.html">>necklaces</a>
          <a class="italiana-regular" href="menu/pendants.html">>pendants</a>
          <a class="italiana-regular" href="menu/newarrivals.html">>new arrivals</a>
          <a class="italiana-regular color" href="menu/prodottiscontati.html">>promotions</a>
        </div>
    </div>
    </li>
  </ul>
</div>

<div class="logo">
    <img class="immagine" src="../immagini/logo.jpg" alt="">
</div>

<label>
    <input type="checkbox">
        <div class="icona">
               <img class="img_search"src="../immagini/search.png" alt="">
        </div>
</label>
<label>
    <input type="checkbox">
        <div class="icona">
               <a href="carrello.php">
               <img class="img_bag_utente" src="../immagini/bag2.png" alt="">
               </a>
        </div>
</label>

<?php 
  echo"<p class='saluto_utente'>hi, $username</p>"
?>

<label>
    <input type="checkbox">
        <div class="icona">
          <a href="login.php">
              <img class="img_personal"src="../immagini/personal-area.png" alt="">
          </a>
        </div>
</label>

</div>
