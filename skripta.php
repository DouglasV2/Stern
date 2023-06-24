<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["title"]) && isset($_POST["about"]) && isset($_POST["content"]) && isset($_POST["photo"]) && isset($_POST["category"])) {
    $title = $_POST["title"];
    $about = $_POST["about"];
    $content = $_POST["content"];
    $photo = $_POST["photo"];
    $category = $_POST["category"];
    $archive = isset($_POST["archive"]) ? 1 : 0;

    $servername = "localhost";
    $username = "root";
    $password = "bapu";
    $dbname = "projekt";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Neuspjesno spajanje na bazu podataka: " . $conn->connect_error);
    }

    $sql = "INSERT INTO vijesti (title, about, content, photo, category, archive) VALUES ('$title', '$about', '$content', '$photo', '$category', $archive)";

    if ($conn->query($sql) === TRUE) {
      echo "Podaci uspjesno pohranjeni";
    } else {
      echo "Greska pri pohrani podataka: " . $conn->error;
    }

    $conn->close();

    echo '
    <html>
    <head>
      <link rel="stylesheet" type="text/css" href="style.css">
      <style>
        .container {
          width: 70%;
          margin: 0 auto;
        }
      </style>
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
                    <li><a href="administrator.php">Administracija</a></li>
                </ul>
            </nav>
        </div>
    </header>
    ';

    echo "<p style=\"font-size: 32px; text-transform: uppercase; font-weight: bold;\"> $title</p>";
    echo "<p style=\"font-size: 18px; text-transform: uppercase;\"> $about</p>";
    echo "<img src=\"$photo\" alt=\"Slika\" style=\"width: 1500px; height: 1000px;\">";
    echo "<p style=\"font-size: 18px;\"> $content</p>";

    echo '
    </div>
    </body>
    </html>
    ';


  } else {
    echo "Molim vas ispunite sva polja u obrascu!";
  }
}
?>
