<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/pages.css">
    <title>Descriptografar Mensagem</title>
</head>
<body>
    <nav>
        <div class="logo">
                <img src="../logo.png.png" alt="logo" />
                <h1><a href="./index.html">CriptoInfinity</a></h1>
            </div>
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="criptografar.php">Criptografar</a></li>
                <li><a href="descriptografar.php">Descriptografar</a></li>
            </ul>
        </nav>



    <h2>Descriptografar Mensagem</h2>
    <form method="POST" action="">
        <label for="encryptedMessage">Texto Criptografado:</label><br>
        <textarea name="encryptedMessage" id="encryptedMessage" rows="4" cols="50"></textarea><br><br>
        <button type="submit">Descriptografar</button>
    </form>
    
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $encryptedMessage = $_POST["encryptedMessage"];
            $privateKey = file_get_contents('../keyprivada.pem');
            
            $encryptedMessage = base64_decode($encryptedMessage);
            
            openssl_private_decrypt($encryptedMessage, $decrypted, $privateKey);
            
            echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center;'>";
            echo "<h3>Texto Criptografado:</h3>";
            echo "<textarea class='cripto' style='width: 70%;' rows='4' cols='50'>$decrypted</textarea>";
            echo "</div>";
        }
        ?>
    <footer>
        <p>&copy; CriptoInfinity.</p>
    </footer>
</body>
</html>
