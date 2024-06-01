
<?php
    if (isset($_POST["username"])) $username = $_POST["username"]; else $username = "";
    if (isset($_POST["password"])) $password = $_POST["password"]; else $password = "";
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-login.css">
    <title>K-Sign in</title>
</head>
<body>
    
    <div class="contenuto">
        <h1>K</h1>
		<h2>Login</h2>

       
        <form action="" method="post">  
            <div class="input-box">
                <input type="text" class="input-field" id="username" placeholder="Username" required> 
            </div>
            <div class="input-box">
                <input type="password" class="input-field" id="password" placeholder="Password" required> 
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check">
                    <label for="check">Remember me</label>
                </section>
                <section>
                    <a href="#">Forgot password</a>
                </section>
            </div>
            <div class="input-submit">
                <input class="submit-button" type="submit" value="Sign in">
            </div>

            <div class="sign-up-link">
                <p>Don't have account? <a href="pagine/registrazione.php">Sign up</a></p>
            </div>
        </form>

        

        <?php
            if (isset($_POST["username"]) and isset($_POST["password"])) { 
                require("data/connessione_db.php"); 

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
					header("location: pagine/home.php");
                }
            }
        ?>
    </div>
   
</body>
</html>




