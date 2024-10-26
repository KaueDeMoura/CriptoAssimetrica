<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/pages.css">
    <title>Criptografar Mensagem</title>
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

    <h2>Criptografar Mensagem</h2>
    <form method="POST" action="">
        <label for="message">Mensagem:</label><br>
        <textarea name="message" id="message" rows="4" cols="50"></textarea><br><br>
        <button type="submit">Criptografar</button>
    </form>

    
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $message = $_POST["message"];
        $publicKey = file_get_contents('../keypublica.pem');
        
        openssl_public_encrypt($message, $encrypted, $publicKey);
        $encryptedMessage = base64_encode($encrypted);
        
        echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center;'>";
        echo "<h3>Texto Criptografado:</h3>";
        echo "<textarea class='cripto' style='width: 70%;' rows='4' cols='50'>$encryptedMessage</textarea>";
        echo "</div>";
      }
      ?>
      <footer>
          <p>&copy; CriptoInfinity.</p>
      </footer>

</body>
</html>
