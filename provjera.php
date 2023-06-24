<?php
$servername = "localhost";
$username = "root";
$password = "bapu";
$dbname = "projekt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Neuspjesno spajanje na bazu podataka: " . $conn->connect_error);
}

$korisnickoIme = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];
$prava = $_POST['prava']; 

$sql = "SELECT * FROM korisnik WHERE korisnicko_ime = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $korisnickoIme);
$stmt->execute();
$rezultat = $stmt->get_result();

if ($rezultat->num_rows > 0) {
  echo "Korisnicko ime vec postoji!";
  exit;
} else {
  $sql = "INSERT INTO korisnik (korisnicko_ime, lozinka, prava) VALUES (?, ?, ?)"; 
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $korisnickoIme, $lozinka, $prava); 
  $stmt->execute();

  echo "Uspjesno ste registrirani! Prijavite se na <a href='prijava.php'>stranici</a>.";
  exit;
}

$conn->close();
?>
