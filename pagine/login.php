<?php
    if (isset($_POST["username"])) $username = $_POST["username"]; else $username = "";
    if (isset($_POST["password"])) $password = $_POST["password"]; else $password = "";
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style-login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bacasime+Antique&family=Elsie+Swash+Caps:wght@400;900&family=Italiana&display=swap" rel="stylesheet">

    <title>K-Sign in</title>
</head>
<body class="italiana-regular">
    
    <div class="contenuto">
    <?php
        require("header.php")
    ?>
		<h2 style="margin-right:47px;">Login</h2>

       
        <form class="form" action="" method="post">  
            
            <div class="input-box">
                <td><input class="input-field" placeholder="username" type="text" name="username" id="username" value = "<?php echo $username ?>" required></td>
            </div>
            <div class="input-box">
                <td><input class="input-field" placeholder="password" type="password" name="password" id="password" required></td>
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check">
                    <label for="check"></label>
                </section>
            </div>
            <div class="input-submit">
                <input style="font-size:25px;"class="submit-button italiana-regular" type="submit" value="sign in">
            </div>

            <div class="sign-up-link">
                <p>Don't have account? <a href="registrazione.php"> Sign up</a></p>
            </div>
        </form>

        

        <?php
            if (isset($_POST["username"]) and isset($_POST["password"])) { 
                require("../data/connessione_db.php"); 

                $myquery = "SELECT username, password 
                            FROM utenti
                            WHERE username='$username'  
                                AND password='$password'";

                $ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");

                if ($ris->num_rows == 0) {
                    echo "<p>Utente o password non trovati.</p>";
                    $conn->close();
                } else {
                    session_start();
                    $_SESSION["username"] = $username;

                    $conn->close();
					header("location: ../home.php");
                    
                }
            }

        ?>
    </div>
   
    <?php 
        require("../java/menu.php");
    ?>
</body>

</html>




