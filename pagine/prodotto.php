<?php
    if (!isset($_GET["cod_prodotto"])) {
        die("Errore! manca un parametro essenziale per il caricamento del prodotto!");
    } else {
        $cod_prodotto = $_GET["cod_prodotto"];
        require("../data/connessione_db.php");
        $sql = "SELECT prodotti.categoria, prodotti.nome, prodotti.prezzo, 
                prodotti.descrizione, prodotti.specifiche, prodotti.foto1, 
                prodotti.foto2, prodotti.foto3, prodotti.foto4, prodotti.foto5
                FROM prodotti
                WHERE cod_prodotto=$cod_prodotto"; 
        $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
        if ($ris->num_rows == 0) {
            die ("Prodotto non trovato!");
        } else {
            $riga = $ris->fetch_assoc();
            $categoria = $riga['categoria'];
            $prezzo1 = number_format($riga['prezzo'], 2);
            $prezzo2= number_format($prezzo1/2, 2);
            $descrizione = $riga['descrizione'];
            $nome = $riga['nome'];
            $specifiche = $riga["specifiche"];
            $foto1 = $riga["foto1"];
            $foto2 = $riga["foto2"];
            $foto3 = $riga["foto3"];
            $foto4 = $riga["foto4"];
            $foto5 = $riga["foto5"];
        }
    }
?>


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
        require('header.php');
    ?>
    <div class="Classic-Hoop-Earring-Medium"> 
        <?php 
            if($foto5==""){
                echo <<<EOD
                        <div class="slider2">
                            <div class="main-carousel"  data-flickity='{ "cellAlign": "left", "contain": true   }'>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto1" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto2" alt="">
                                </div>
                            </div>
                            </div>
                        </div>
                        EOD;
            }
            else{
                echo <<<EOD
                        <div class="slider2">
                          <div class="main-carousel"  data-flickity='{ "cellAlign": "left", "contain": true   }'>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto1" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto2" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto3" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto4" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto5" alt="">
                                </div>
                            </div>
                          </div>
                        </div>
                        EOD;    
            }
            $array = explode('.', $specifiche);
            $lista="";
            foreach ($array as $elemento) {
                $lista .= "<li>{$elemento}</li>\n";
            }
            
                echo <<<EOD
                        <div class="descrizione reveal">
                                <h1>$nome</h1>
                                <p class="price_1 remove">$ $prezzo2</p>
                                <p class="price_2 "> $ $prezzo1 </p>
                                <h2>description</h2>
                                <p>$descrizione</p>
                                <div class="details">
                                    <div class="details__title">
                                        <h3>details & specs</h3>
                                    </div>
                                    <div class="details__content">
                                        <ul>
                                        $lista
                                        </ul>
                                    </div>
                                </div>
                        EOD;
            if($categoria==1){
                echo <<<EOD
                                <div class="bottone2 reveal">                   
                EOD;
                if($cod_prodotto==2){
                echo <<<EOD
                            <h2 class="stone-title">stone type</h2>
                            <div class="selector-container">
                                <ul class="stone-img">
                                <a href="../prodotti/luna-ring-emerald.html"><img  class="scale" src="../immagini/stone1.jpg" alt=""></a>
                                <a href="../prodotti/luna-ring-tourmaline.html"><img src="../immagini/stone2.jpg" alt=""></a>
                                <a href=""><img src="../immagini/stone3.jpg" alt=""></a>
                                </ul>
                            </div>
                        EOD;
                }
                elseif($cod_prodotto==3){
                echo <<<EOD
                            <h2 class="stone-title">stone type</h2>
                            <div class="selector-container">
                                <ul class="stone-img">
                                <a href="../prodotti/luna-ring-emerald.html"><img  src="../immagini/stone1.jpg" alt=""></a>
                                <a href="../prodotti/luna-ring-tourmaline.html"><img class="scale" src="../immagini/stone2.jpg" alt=""></a>
                                <a href=""><img src="../immagini/stone3.jpg" alt=""></a>
                                </ul>
                            </div>
                        EOD;

                }
                elseif($cod_prodotto=4){
                    echo <<<EOD
                                <h2 class="stone-title">stone type</h2>
                                <div class="selector-container">
                                    <ul class="stone-img">
                                    <a href="../prodotti/luna-ring-emerald.html"><img  src="../immagini/stone1.jpg" alt=""></a>
                                    <a href="../prodotti/luna-ring-tourmaline.html"><img  src="../immagini/stone2.jpg" alt=""></a>
                                    <a href=""><img class="scale" src="../immagini/stone3.jpg" alt=""></a>
                                    </ul>
                                </div>
                            EOD;
    
                    }
                echo <<<EOD
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
                        </div>
                        EOD;
            }
            elseif($categoria==2){
                
                echo <<<EOD
                                <div class="bottone2 reveal">
                                    <h2 class="earring-qty">earring quantity</h2>
                                    <div class="selector-container">
                                        <ul>
                                            <li class="active pair"> Pair</li>
                                            <li class="single">Single</li>
                                        </ul>
                                        <div class="line-selector"></div>
                                   </div>
                                        <a class="add-to-cart" href="">Add to cart</a>
                               </div>
                        </div>
                        EOD;

            }
            elseif($categoria==3){
                
                echo <<<EOD
                                <div class="bottone2 reveal">
                                    <h2>Chain Length</h2>
                                    <div class="selector-container">
                                        <ul class="arial">
                                            <li class="active 18">18</li>
                                            <li class="20">20</li>
                                            <li class="22">22</li>
                                            <li class="24">24</li>
                                        </ul>
                                        <div class="line-selector"></div>
                                   </div>
                                        <a class="add-to-cart" href="">Add to cart</a>
                                </div>
                        </div>
                        EOD;

            }
            elseif($categoria==4){
                
                echo <<<EOD
                                <div class="bottone2-p reveal">
                                <a class="add-to-cart" href="">Add to cart</a>
                            </div>
                        </div>
                        EOD;

            }
                    
            if($foto5==""){
                echo <<<EOD
                        <div class="slider">
                            <div class="main-carousel"  data-flickity='{ "cellAlign": "left", "contain": true   }'>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto1" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto2" alt="">
                                </div>
                            </div>
                            </div>
                        </div>
                        EOD;
                    }
            else{
                echo <<<EOD
                        <div class="slider">
                            <div class="main-carousel"  data-flickity='{ "cellAlign": "left", "contain": true   }'>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto1" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto2" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto3" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto4" alt="">
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom">
                                <img src="../immagini/$foto5" alt="">
                                </div>
                            </div>
                            </div>
                        </div>
                        EOD;    
                    }
            if($categoria==1){

                echo <<<EOD
                                <div class="bottone1 reveal">                   
                        EOD;
                if($cod_prodotto==2){
                echo <<<EOD
                            <h2 class="stone-title">stone type</h2>
                            <div class="selector-container">
                                <ul class="stone-img">
                                <a href="../prodotti/luna-ring-emerald.html"><img  class="scale" src="../immagini/stone1.jpg" alt=""></a>
                                <a href="../prodotti/luna-ring-tourmaline.html"><img src="../immagini/stone2.jpg" alt=""></a>
                                <a href=""><img src="../immagini/stone3.jpg" alt=""></a>
                                </ul>
                            
                        EOD;
                }
                elseif($cod_prodotto==3){
                echo <<<EOD
                            <h2 class="stone-title">stone type</h2>
                            <div class="selector-container">
                                <ul class="stone-img">
                                <a href="../prodotti/luna-ring-emerald.html"><img  src="../immagini/stone1.jpg" alt=""></a>
                                <a href="../prodotti/luna-ring-tourmaline.html"><img class="scale" src="../immagini/stone2.jpg" alt=""></a>
                                <a href=""><img src="../immagini/stone3.jpg" alt=""></a>
                                </ul>
                            
                        EOD;

                }
                elseif($cod_prodotto==4){
                    echo <<<EOD
                                <h2 class="stone-title">stone type</h2>
                                <div class="selector-container">
                                    <ul class="stone-img">
                                    <a href="../prodotti/luna-ring-emerald.html"><img  src="../immagini/stone1.jpg" alt=""></a>
                                    <a href="../prodotti/luna-ring-tourmaline.html"><img  src="../immagini/stone2.jpg" alt=""></a>
                                    <a href=""><img class="scale" src="../immagini/stone3.jpg" alt=""></a>
                                    </ul>
                                
                            EOD;
    
                }
                    echo <<<EOD
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
                            </div>
                            EOD;

            }
            elseif($categoria==2){
                
                echo <<<EOD
                        <div class="bottone1 reveal">
                            <h2 class="earring-qty">earring quantity</h2>
                            <div class="selector-container">
                                <ul>
                                    <li class="active pair"> Pair</li>
                                    <li class="single">Single</li>
                                </ul>
                                <div class="line-selector"></div>
                            </div>
                                        <a class="add-to-cart" href="">Add to cart</a>
                               </div>
                        
                        EOD;

            }
            elseif($categoria==3){
                
                echo <<<EOD
                                <div class="bottone1 reveal">
                                    <h2>Chain Length</h2>
                                    <div class="selector-container">
                                        <ul class="arial">
                                            <li class="active 18">18</li>
                                            <li class="20">20</li>
                                            <li class="22">22</li>
                                            <li class="24">24</li>
                                        </ul>
                                        <div class="line-selector"></div>
                                   </div>
                                        <a class="add-to-cart" href="">Add to cart</a>
                                </div>
                        
                        EOD;

            }
            elseif($categoria==4){
            echo <<<EOD
                            <div class="bottone1-p reveal">
                            <a class="add-to-cart" href="">Add to cart</a>
                        </div>
                    
                    EOD;
            }
            


        ?>

        <?php 
            require('footer.php');
        ?>	

    </div>

    <?php 
      if($categoria==1){
        require('../java/rings.php');
      }
      elseif($categoria==2){
        require('../java/earrings.php');
      }
      elseif($categoria==3){
        require('../java/necklaces.php');
      }
      elseif($categoria==4){
        require('../java/pendant.php');
      }

    ?>

</body>
</html>
<?php
	$conn->close();
?>