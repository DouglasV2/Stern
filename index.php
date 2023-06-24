<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "bapu";
$dbname = "projekt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Neuspjelo spajanje na bazu podataka: " . $conn->connect_error);
}

$korisnicko_ime = $_SESSION['korisnicko_ime'] ?? '';
$lozinka = $_SESSION['lozinka'] ?? '';
$prava = $_SESSION['prava'] ?? '';

$prava = false; 

$korisnik_query = "SELECT prava FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime' AND lozinka = '$lozinka'";
$korisnik_result = $conn->query($korisnik_query);

if ($korisnik_result->num_rows > 0) {
  $korisnik = $korisnik_result->fetch_assoc();
  $prava = $korisnik['prava'];
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Stern - PWA Projekt</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <header>
      <img class="logo" src="sternlogo.jpg" alt="Logo">
      <div class="title-nav">
        <h1 class="title">Stern</h1>
        <nav>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="unos.php">Unos</a></li>
            <li><a href="kategorija.php?category=Politik">Politik</a></li>
            <li><a href="kategorija.php?category=Gesundheit">Gesundheit</a></li>
            <li><a href="clanak.php">Clanak</a></li>
            <li><a href="registracija.php">Registracija</a></li>
            <li><a href="prijava.php">Prijava</a></li>
            <?php if ($prava === true ||($korisnicko_ime == 'admin' && $lozinka == 'adminovic')) : ?>
              <li><a href="administrator.php">Administrator</a></li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </header>

    <?php
      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Neuspjelo spajanje na bazu podataka: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM vijesti WHERE archive = 0 ORDER BY id DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<section>';
          echo '<h1 class="section-title">' . $row["category"] . '</h1>';
          echo '<article>';
          echo '<a href="clanak.php?id=' . $row["id"] . '">';
          echo '<img class="picture" src="' . $row["photo"] . '" alt="Slika">';
          echo '<h3 class="picture-title">' . $row["title"] . '</h3>';
          echo '<p class="picture-text">' . $row["about"] . '</p>';
          echo '</a>';
          echo '</article>';
          echo '</section>';
        }
      } else {
        echo 'Nema unesenih vijesti.';
      }

      $conn->close();
    ?>

    <footer>
        <span>Bruno Pusic</span>
    </footer>
  </div>
</body>
</html>
