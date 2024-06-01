<?php
    if (isset($_POST["username"])) {$username = $_POST["username"];} else {$username = "";}
	if (isset($_POST["password"])) {$password = $_POST["password"];} else {$password = "";}
    if(isset($_POST["conferma"])) $conferma = $_POST["conferma"];  else $conferma = "";
    if(isset($_POST["nome"])) $nome = $_POST["nome"];  else $nome = "";
    if(isset($_POST["cognome"])) $cognome = $_POST["cognome"];  else $cognome = "";
    if(isset($_POST["email"])) $email = $_POST["email"];  else $email = "";
    if(isset($_POST["telefono"])) $telefono = $_POST["telefono"];  else $telefono = "";
    if(isset($_POST["comune"])) $comune = $_POST["comune"];  else $comune = "";
    if(isset($_POST["indirizzo"])) $indirizzo = $_POST["indirizzo"];  else $indirizzo = "";

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style-registrazione.css">
    <title>K-Sign up</title>
</head>
<body>

    <!-- span suddivide senza creare divisioni come il div -->
    <div class="container">
        <div class="title">Sing up</div>
        <form action="" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm password</span>
                    <input type="password" name="password" id="password" placeholder="Confirm your password" required>
                </div>
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" name="nome" id="nome" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">Surname</span>
                    <input type="text" name="cognome" id="cognome" placeholder="Enter your surname" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone number</span>
                    <input type="text" name="telefono" id="telefono" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name="indirizzo" id="indirizzo" placeholder="Enter your address" required>
                </div>
                
            </div>
          
            <div class="button">
                <input class="register" type="submit" value="Register">
            </div>
        </form>
    </div>

        <p>
            <?php
            if(isset($_POST["username"]) and isset($_POST["password"])) {
                if ($_POST["username"] == "" or $_POST["password"] == "") {
                    echo "username e password non possono essere vuoti!";
                } elseif ($_POST["password"] != $_POST["conferma"]){
                    echo "<p>Le password inserite non corrispondono</p>";
                } else {
                    require("../data/connessione_db.php");

                    $myquery = "SELECT username 
						    FROM utenti 
						    WHERE username='$username'";
                    //echo $myquery;

                    $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        echo "Questo username è già stato usato";
                    } else {

                        $myquery = "INSERT INTO utenti (username, password, nome, cognome, email, telefono, comune, indirizzo)
                                    VALUES ('$username', '$password', '$nome', '$cognome','$email','$telefono','$comune','$indirizzo')";

                        /*
                        // Versione con l'uso dell'hash
                        $password_hash = password_hash($password, PASSWORD_DEFAULT);

                        $myquery = "INSERT INTO utenti (username, password, nome, cognome, email, telefono, comune, indirizzo)
                                    VALUES ('$username', '$password_hash', '$nome', '$cognome','$email','$telefono','$comune','$indirizzo')";
                        */

                        if ($conn->query($myquery) === true) {
                            session_start();
                            $_SESSION["username"]=$username;
                            
						    $conn->close();

                            echo "Registrazione effettuata con successo!<br>sarai ridirezionato alla home tra 5 secondi.";
                            header('Refresh: 5; URL=home.php');

                        } else {
                            echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                        }
                    }
                }
            }
            ?>
        </p>
        
    </div>
</body>
</html>





