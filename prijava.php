<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "bapu";
$dbname = "projekt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Neuspjesno spajanje na bazu podataka: " . $conn->connect_error);
}

if (isset($_POST['korisnicko_ime']) && isset($_POST['lozinka'])) {
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];

    $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = ? AND lozinka = ? AND prava = ?";
    $stmt = $conn->prepare($sql);
    $prava = true; 

    $stmt->bind_param("ssi", $korisnicko_ime, $lozinka, $prava); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if ($row['prava'] == 1 || ($korisnicko_ime == 'admin' && $lozinka == 'adminovic')) {
            $_SESSION['korisnicko_ime'] = $korisnicko_ime;
            $_SESSION['lozinka'] = $lozinka;
            $_SESSION['prava'] = $prava;

            header("Location: index.php");
            exit();
        } else {
            echo "" . $korisnicko_ime . "! Nemate prava  za pristup administratorskoj stranici!";
            exit();
        }
    } else {
        echo "Pogresno korisnicko ime ili lozinka. Registrirajte se na <a href='registracija.php'>stranici</a>.";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Prijava</title>
  <style>
    h1{
      text-align: center;
    }
    form {
      max-width: 400px;
      margin: 0 auto;
      text-align: center;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      margin-top: 5px;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 20px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Prijava</h1>
  <form method="POST" action="prijava.php">
    <label for="korisnicko_ime">Korisnicko ime:</label>
    <input type="text" id="korisnicko_ime" name="korisnicko_ime" required>

    <label for="lozinka">Lozinka:</label>
    <input type="password" id="lozinka" name="lozinka" required>

    <select id="prava" name="prava">
        <option value="0">0 - Obicni korisnik</option>
        <option value="1">1 - Administrator</option>
    </select><br><br>

    <input type="submit" value="Prijavi se">
  </form>
</body>
</html>
