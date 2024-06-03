<?php
session_start();

$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$conferma = isset($_POST["confirm"]) ? $_POST["confirm"] : "";
$nome = isset($_POST["name"]) ? $_POST["name"] : "";
$cognome = isset($_POST["surname"]) ? $_POST["surname"] : "";

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($username) || empty($password) || empty($conferma) || empty($nome) || empty($cognome)) {
        $error_message = "Tutti i campi sono obbligatori!";
    } elseif ($password != $conferma) {
        $error_message = "Le password inserite non corrispondono.";
    } else {
        require("../data/connessione_db.php");

        $myquery = "SELECT username FROM utenti WHERE username='$username'";
        $ris = $conn->query($myquery);

        if ($ris->num_rows > 0) {
            $error_message = "Questo username è già stato usato.";
        } else {
            $myquery = "INSERT INTO utenti (username, password, nome, cognome)
                        VALUES ('$username', '$password', '$nome', '$cognome')";

            if ($conn->query($myquery) === true) {
                $_SESSION["username"] = $username;
                $conn->close();
                header('Refresh: 5; URL=../home-utente.php');
                echo "Registrazione effettuata con successo!<br>Sarai ridirezionato alla home tra 5 secondi.";
                exit();
            } else {
                $error_message = "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style-registrazione2.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bacasime+Antique&family=Elsie+Swash+Caps:wght@400;900&family=Italiana&display=swap" rel="stylesheet">

    <title>K-registration</title>
</head>
<body class="italiana-regular">
    
    <div class="contenuto">
    <?php
        require("header.php")
    ?>
		<h2 style="margin-right:47px;">Registration</h2>

        <form class="form" action="" method="post">  
            <div class="input-box">
                <input class="input-field" placeholder="name" type="text" name="name" id="name" value="<?php echo htmlspecialchars($nome); ?>" required>
            </div>
            <div class="input-box">
                <input class="input-field" placeholder="surname" type="text" name="surname" id="surname" value="<?php echo htmlspecialchars($cognome); ?>" required>
            </div>
            <div class="input-box">
                <input class="input-field" placeholder="username" type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>
            <div class="input-box">
                <input class="input-field" placeholder="password" type="password" name="password" id="password" required>
            </div>
            <div class="input-box">
                <input class="input-field" placeholder="confirm password" type="password" name="confirm" id="confirm" required>
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check">
                    <label for="check"></label>
                </section>
            </div>
            <div class="input-submit">
                <input style="font-size:25px;" class="submit-button italiana-regular" type="submit" value="register">
            </div>

            <div class="log-in-link">
                <p>Have account? <a href="login.php"> Sign up</a></p>
            </div>
        </form>

        <?php
        if (!empty($error_message)) {
            echo "<p>$error_message</p>";
        }
        ?>
    </div>
   
    <?php 
        require("../java/menu.php");
    ?>
</body>
</html>





