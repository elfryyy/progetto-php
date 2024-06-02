<?php
    if (!isset($_GET["categoria"])) {
        die("Errore! manca un parametro essenziale per il caricamento della sezione!");
    } else {
        require("../data/connessione_db.php");
        $categoria = $_GET["categoria"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rings</title>
    <link rel="stylesheet" href="../style-home.css">
    <link rel="stylesheet" href="../style-prodotti.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    
    <script src="https://kit.fontawesome.com/35fdc67f04.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bacasime+Antique&family=Elsie+Swash+Caps:wght@400;900&family=Italiana&display=swap" rel="stylesheet">

</head>

<body class="italiana-regular">
   <?php 
      require("../pagine/header.php");
   ?>

    <section class="products" id="products">
        <h1 class="heading"><?php echo "$categoria"; ?> <span> </span></h1>

         <div class="box-container">

    <?php 

                if($categoria=="New"){

                    $sql = "SELECT prodotti.cod_prodotto, prodotti.nome, prodotti.prezzo, 
                    prodotti.foto1
                    FROM prodotti
                    WHERE nuovo=1";
                    $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                     if ($ris->num_rows == 0) {
                         echo "<p>Non ci sono nuovi prodotti</p>";
                    }
                     else{
                         foreach($ris as $riga){
                            $cod_prodotto=$riga['cod_prodotto'];
                            $prezzo = number_format($riga['prezzo'], 2);
                            $nome = $riga['nome'];
                            $foto1 = $riga["foto1"];

                            echo <<<EOD
                                        <div class="box">
                                            <div class="image">
                                                <img src="../immagini/$foto1" alt="">
                                                <div class="icons">
                                                    <a style="width:100%" href="prodotto.php?cod_prodotto=$cod_prodotto">Show more</a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3>$nome</h3>
                                                <div class="price">$$prezzo </div>
                                            </div>
                                        </div>
                                      EOD;
                        }}


                } elseif($categoria=="Discounted"){
                    $sql = "SELECT prodotti.cod_prodotto, prodotti.nome, prodotti.prezzo, 
                    prodotti.foto1, prodotti.sconto
                    FROM prodotti
                    WHERE sconto!=''";
                    $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                     if ($ris->num_rows == 0) {
                         echo "<p>Non ci sono nuovi prodotti</p>";
                    }
                     else {
                         foreach($ris as $riga){
                            $cod_prodotto=$riga['cod_prodotto'];
                            $prezzo = number_format($riga['prezzo'], 2);
                            $nome = $riga['nome'];
                            $foto1 = $riga["foto1"];
                            $sconto=$riga["sconto"];
                            $prezzo_s=number_format(($prezzo/100)*(100-$sconto), 2);


                            echo <<<EOD
                                        <div class="box">
                                            <span class="discount">-$sconto%</span>
                                            <div class="image">
                                                <img src="../immagini/$foto1" alt="">
                                                <div class="icons">
                                                    <a style="width:100%" href="prodotto.php?cod_prodotto=$cod_prodotto">Show more</a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3>$nome</h3>
                                                <div class="price">$$prezzo_s <span>$$prezzo</span>  </div>
                                            </div>
                                        </div>
                                      EOD;
                        }
                    }

                }else{
                    $sql = "SELECT prodotti.cod_prodotto, prodotti.nome, prodotti.prezzo, 
                    prodotti.foto1, prodotti.sconto, prodotti.nuovo
                    FROM prodotti
                    WHERE categoria='$categoria'";
                    $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                     if ($ris->num_rows == 0) {
                         echo "<p>Questa categoria non ha prodotti</p>";
                     } else {
                         foreach($ris as $riga){
                            $cod_prodotto=$riga['cod_prodotto'];
                            $prezzo = number_format($riga['prezzo'], 2);
                            $nome = $riga['nome'];
                            $foto1 = $riga["foto1"];
                            $nuovo = $riga['nuovo'];
                            $sconto= $riga["sconto"];
    
                           if($sconto){
                                $prezzo_s=number_format(($prezzo/100)*(100-$sconto), 2);
    
                                    echo <<<EOD
                                            <div class="box">
                                            <span class="discount">-$sconto%</span>
                                                <div class="image">
                                                    <img src="../immagini/$foto1" alt="">
                                                    <div class="icons">
                                                        <a style="width:100%" href="prodotto.php?cod_prodotto=$cod_prodotto">Show more</a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3>$nome</h3>
                                                    <div class="price">$$prezzo_s <span>$$prezzo</span> </div>
                                                </div>
                                            </div>
                                        
                                            EOD;
                           }elseif($nuovo){
                                echo <<<EOD
                                        <div class="box">
                                        <span class="discountnew">NEW</span>
                                            <div class="image">
                                                <img src="../immagini/$foto1" alt="">
                                                <div class="icons">
                                                    <a style="width:100%" href="prodotto.php?cod_prodotto=$cod_prodotto">Show more</a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3>$nome</h3>
                                                <div class="price">$$prezzo </div>
                                            </div>
                                        </div>
                                    
                                        EOD;
    
                           }else{
                                echo <<<EOD
                                        <div class="box">
                                            <div class="image">
                                                <img src="../immagini/$foto1" alt="">
                                                <div class="icons">
                                                    <a style="width:100%" href="prodotto.php?cod_prodotto=$cod_prodotto">Show more</a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3>$nome</h3>
                                                <div class="price">$$prezzo </div>
                                            </div>
                                        </div>
                                    
                                        EOD;
    
    
                           }
                            
                         }
                     }

                }
                // $sql = "SELECT prodotti.cod_prodotto, prodotti.nome, prodotti.prezzo, 
                // prodotti.foto1, prodotti.sconto, prodotti.nuovo
                // FROM prodotti
                // WHERE categoria=$categoria";
                // $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                //  if ($ris->num_rows == 0) {
                //      echo "<p>Questa categoria non ha prodotti</p>";
                //  } else {
                //      foreach($ris as $riga){
                //         $cod_prodotto=$riga['cod_prodotto'];
                //         $prezzo = number_format($riga['prezzo'], 2);
                //         $nome = $riga['nome'];
                //         $foto1 = $riga["foto1"];
                //         $nuovo = $riga['nuovo'];
                //         $sconto= $riga["sconto"];

                //        if($sconto){
                //             $prezzo_s=number_format(($prezzo/100)*(100-$sconto), 2);

                //                 echo <<<EOD
                //                         <div class="box">
                //                         <span class="discount">-$sconto%</span>
                //                             <div class="image">
                //                                 <img src="../immagini/$foto1" alt="">
                //                                 <div class="icons">
                //                                     <a style="width:100%" href="prodotto.php?cod_prodotto=$cod_prodotto">Show more</a>
                //                                 </div>
                //                             </div>
                //                             <div class="content">
                //                                 <h3>$nome</h3>
                //                                 <div class="price">$$prezzo_s <span>$$prezzo</span> </div>
                //                             </div>
                //                         </div>
                                    
                //                         EOD;
                //        }elseif($nuovo){
                //             echo <<<EOD
                //                     <div class="box">
                //                     <span class="discountnew">NEW</span>
                //                         <div class="image">
                //                             <img src="../immagini/$foto1" alt="">
                //                             <div class="icons">
                //                                 <a style="width:100%" href="prodotto.php?cod_prodotto=$cod_prodotto">Show more</a>
                //                             </div>
                //                         </div>
                //                         <div class="content">
                //                             <h3>$nome</h3>
                //                             <div class="price">$$prezzo </div>
                //                         </div>
                //                     </div>
                                
                //                     EOD;

                //        }else{
                //             echo <<<EOD
                //                     <div class="box">
                //                         <div class="image">
                //                             <img src="../immagini/$foto1" alt="">
                //                             <div class="icons">
                //                                 <a style="width:100%" href="prodotto.php?cod_prodotto=$cod_prodotto">Show more</a>
                //                             </div>
                //                         </div>
                //                         <div class="content">
                //                             <h3>$nome</h3>
                //                             <div class="price">$$prezzo </div>
                //                         </div>
                //                     </div>
                                
                //                     EOD;


                //        }
                        
                //      }
                //  }
          ?>
           

        </div>
    </section>




    <?php
        require("../pagine/footer.php");
        require("../java/menu.php");
    ?>
</body>
</html>