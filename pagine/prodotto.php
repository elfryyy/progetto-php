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
            $prezzo = $riga['prezzo'];
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
            
        // echo <<<EOD
        //         <div class="bottone1 reveal">
        //             <h2>ring size</h2>
        //             <div class="selector-container">
        //                 <ul class="arial">
        //                     <li class="active 3">3</li>
        //                     <li class="4">4</li>
        //                     <li class="5">5</li>
        //                     <li class="6">6</li>
        //                     <li class="7">7</li>
        //                     <li class="8">8</li>
        //                 </ul>
        //                 <div class="line-selector"></div>
        //             </div>
        //                 <a class="add-to-cart" href="">Add to cart</a>
        //         </div>
        //        EOD;


        ?>

        <?php 
            require('footer.php');
        ?>	
    </div>
    <?php 
        require('../java/rings.php');
    ?>

</body>
</html>
<?php
	$conn->close();
?>