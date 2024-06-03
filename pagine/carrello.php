<?php
	session_start();
    if(!isset($_SESSION['username'])){ 
		header('location: ../home.html');
	}
    $username = $_SESSION["username"];

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
    <link rel="stylesheet" href="../style-carrello.css">
  
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
        require('header-utente.php');
    ?>

    <div class="prodotto">
         <img class="prod_img" src="../immagini/e-baroque1.jpg" alt="">
         <div class="testo">
            <p style="float:right; font-size:20px;">x</p>
            <h1>nome</h1>
            <p >specifiche</p>

            <div class="aggiungi">
                <p> - </p>
                <p style="padding-left:30px; padding-right:30px">  1  </p>
                <p> + </p>
            </div>
         </div>
    </div>

    <div class="prodotto">
         <img class="prod_img" src="../immagini/e-baroque1.jpg" alt="">
         <div class="testo">
            <p style="float:right; font-size:20px;"><input type='checkbox' name='cancella'/>x</p>
            <h1>nome</h1>
            <p >specifiche</p>

            <div class="aggiungi">
                <p><input type='checkbox' name='rimuovi'/> - </p>
                <p style="padding-left:30px; padding-right:30px">  1  </p>
                <p><input type='checkbox' name='aggiungi'/> + </p>
            </div>
         </div>
    </div>


    <?php 
        require('footer.php');
        require('../java/menu.php');
    ?>
</body>
</html>
<?php
	// $conn->close();
?>