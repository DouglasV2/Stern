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
        die("Neuspjelo spajanje na bazu podataka: " . $conn->connect_error);
      }

      $category = $_GET["category"];

      $sql = "SELECT * FROM vijesti WHERE category = '$category' AND archive = 0 ORDER BY id DESC";
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

