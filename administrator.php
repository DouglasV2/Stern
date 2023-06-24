
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
            <li><a href="index.php">Home</a></li>
            <li><a href="unos.php">Unos</a></li>
            <li><a href="kategorija.php?category=Politik">Politik</a></li>
            <li><a href="kategorija.php?category=Gesundheit">Gesundheit</a></li>
            <li><a href="clanak.php">Clanak</a></li>
            <li><a href="administrator.php">Administrator</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <?php
      $servername = "localhost";
      $username = "root";
      $password = "bapu";
      $dbname = "projekt";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Neuspjesno spajanje na bazu podataka " . $conn->connect_error);
      }

      if (isset($_GET["delete"])) {
        $deleteId = $_GET["delete"];
        $sql = "DELETE FROM vijesti WHERE id = '$deleteId'";
        if ($conn->query($sql) === TRUE) {
          echo "Zapis je uspjesno obrisan.";
        } else {
          echo "Pogreska prilikom brisanja zapisa: " . $conn->error;
        }
      }

      $sql = "SELECT * FROM vijesti";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<article>';
          echo '<h1 class="article-title">' . $row["title"] . '</h1>';
          echo '<img class="article-picture" src="' . $row["photo"] . '" alt="Slika">';
          echo '<p class="article-text">' . $row["content"] . '</p>';
          echo '<a href="administrator.php?delete=' . $row["id"] . '">Izbrisi zapis</a>';
          echo '</article>';
        }
      } else {
        echo 'Nema unesenih vijesti!';
      }

      $conn->close();
    ?>

    <footer>
        <span>Bruno Pusic</span>
    </footer>
  </div>
</body>
</html>
