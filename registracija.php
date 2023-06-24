<!DOCTYPE html>
<html>
<head>
  <title>Registracija</title>
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
      background-color: orangered;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background-color: orange;
    }

  </style>
</head>
<body>
  <div class="container">
    <h1>Registracija</h1>
    <form action="provjera.php" method="POST">
      <label for="korisnicko_ime">Korisnicko ime:</label>
      <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br><br>
      <label for="lozinka">Lozinka:</label>
      <input type="password" id="lozinka" name="lozinka" required><br><br>
      <label for="prava">Prava:</label>
      <select id="prava" name="prava">
        <option value="0">0 - Obicni korisnik</option>
        <option value="1">1 - Administrator</option>
      </select><br><br>
      <input type="submit" value="Registriraj se">
    </form>
  </div>
</body>
</html>
