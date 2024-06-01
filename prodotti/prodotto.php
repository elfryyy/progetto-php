<?php
    if (!isset($_GET["cod_prodotto"])) {
        die("Errore! manca un parametro essenziale per il caricamento del prodotto!");
    } else {
        $cod_prodotto = $_GET["cod_prodotto"];
        require("../data/connessione_db.php");
        $sql = "SELECT prodotti.categoria, prodotti.nome, prodotti.prezzo, prodotti.descrizione, prodotti.specifiche
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
            $nome = $riga["nome"];
            $specifiche = $riga["specifiche"];
        }
    }
?>


<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/style-gioiello.css">
  
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
<body>
	<?php require("../header.php");
    ?>



	<?php 
		require('../footer.php');
	?>	
	
</body>
</html>
<?php
	$conn->close();
?>