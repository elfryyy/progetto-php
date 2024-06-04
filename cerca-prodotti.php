<?php
	// session_start();
	// //echo session_id();
    
	// if(!isset($_SESSION['username'])){
	// 	header('location: ../pagine/login.php');
	// } 
	
	// $username = $_SESSION["username"];
	//echo $username;

	require('data/connessione_db.php');

	if(isset($_POST['cod_prodotto'])){
        foreach($_POST['cod_prodotto'] as $cod_prodotto) {
            
            $sql = "SELECT cod_prodotto FROM prodotti
                    WHERE cod_prodotto = '$cod_prodotto'";
            $conn->query($sql) or die("<p>Query fallita!</p>");
        }
    }	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Ricerca prodotto</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="cerca.css">
</head>
<body>
    
    
	<div class="contenuto">
		<h1 style="text-align: center; margin-top: 0px">Ricerca gioielli</h1>
		<p>Cerca il gioiello che desideri</p>
		<form method="post" action="">
			<table id="tab_dati_personali">
				<tr>
                    <td><input class="input_ricerca" type="text" name="prodotti.nome" placeholder="Cerca gioiello" id="prodotti.nome" value="<?php echo isset($_POST['prodotti.nome']) ? $_POST['prodotti.nome'] : ''; ?>"></td>
				</tr>
				
				<tr>
					<td style="text-align: center; padding-top: 10px" colspan="2"><input type="submit" value="Cerca"/></td>
				</tr>
			</table>
		</form>

		<p></p>

        <form method="post" action="">
            <?php
                if (isset($_POST["prodotti.nome"]) ) {
                    $nome = $_POST["prodotti.nome"];
                    
                    $sql = "SELECT prodotti.cod_prodotto prodotti.nome, prodotti.prezzo, prodotti.categoria, prodotti.descrizione, prodotti.specifiche, prodotti.foto1, prodotti.foto2, prodotti.foto3, prodotti.foto4, prodotti.foto5, prodotti.sconto, prodotti.nuovo
                            FROM prodotti 
                            WHERE nome LIKE '%$nome%'
                               ";
                    //echo $_POST["titolo_da_cercare"];
                    $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        echo "<p>Gioielli trovati: </p>";
                    
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
                           
                            echo <<<EOD
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            EOD;
                     }   
                    }else {
                        echo "<p>Nessun gioiello trovato</p>";
                    }
                    echo "</table>";
                }
            }
        }

            ?>
		</form>	

	</div>	
	
</body>
</html>