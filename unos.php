<!DOCTYPE html>
<html>
<head>
    <title>Unos za PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function validateForm() {
            var title = document.forms["myForm"]["title"].value;
            var about = document.forms["myForm"]["about"].value;
            var content = document.forms["myForm"]["content"].value;
            var photo = document.forms["myForm"]["photo"].value;
            var category = document.forms["myForm"]["category"].value;
            
            var valid = true;
            
            if (title.length < 5 || title.length > 20) {
                document.getElementById("titleError").innerHTML = "Naslov vijesti mora biti između 5 i 20 znakova";
                document.forms["myForm"]["title"].style.borderColor = "red";
                valid = false;
            } else {
                document.getElementById("titleError").innerHTML = "";
                document.forms["myForm"]["title"].style.borderColor = "";
            }
            
            if (about.length < 50) {
                document.getElementById("aboutError").innerHTML = "Opis vijesti mora sadržavati minimalno 50 znakova";
                document.forms["myForm"]["about"].style.borderColor = "red";
                valid = false;
            } else {
                document.getElementById("aboutError").innerHTML = "";
                document.forms["myForm"]["about"].style.borderColor = "";
            }
            
            if (content === "") {
                document.getElementById("contentError").innerHTML = "Sadrzaj mora biti unesen";
                document.forms["myForm"]["content"].style.borderColor = "red";
                valid = false;
            } else {
                document.getElementById("contentError").innerHTML = "";
                document.forms["myForm"]["content"].style.borderColor = "";
            }
            
            if (photo === "") {
                document.getElementById("photoError").innerHTML = "Slika mora biti unesena!";
                document.forms["myForm"]["photo"].style.borderColor = "red";
                valid = false;
            } else {
                document.getElementById("photoError").innerHTML = "";
                document.forms["myForm"]["photo"].style.borderColor = "";
            }
            
            if (category === "") {
                document.getElementById("categoryError").innerHTML = "Kategorija mora biti odabrana";
                document.forms["myForm"]["category"].style.borderColor = "red";
                valid = false;
            } else {
                document.getElementById("categoryError").innerHTML = "";
                document.forms["myForm"]["category"].style.borderColor = "";
            }
            
            if (valid) {
                return true;
            } else {
                return false;
            }
        }
      </script>
</head>
<body class="tijelo">
    <div class="container">
        <header>
            <img class="logo" src="sternlogo.jpg" alt="Logo">
            <div class="title-nav">
                <h1 class="title">Stern</h1>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="kategorija.php?category=Politik">Politik</a></li>
                        <li><a href="kategorija.php?category=Gesundheit">Gesundheit</a></li>
                        <li><a href="clanak.php">Clanak</a></li>
                        <li><a href="administrator.php">Administrator</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <h1 class="naslovzaunos">Forma za unos</h1>
        <form name="myForm" action="skripta.php" method="POST" onsubmit="return validateForm()">
            <div class="form-item">
            <label for="title">Naziv vijesti</label>
            <div class="form-field">
                <input type="text" name="title" class="form-field-textual">
                <span id="titleError" class="error-message"></span>
            </div>
            </div>
            <div class="form-item">
            <label for="about">Opis vijesti (do 50 znakova)</label>
            <div class="form-field">
                <textarea name="about" id="" cols="30" rows="10" class="form-field-textual"></textarea>
                <span id="aboutError" class="error-message"></span>
            </div>
            </div>
            <div class="form-item">
            <label for="content">Sadrzaj vijesti</label>
            <div class="form-field">
                <textarea name="content" id="" cols="30" rows="10" class="form-field-textual"></textarea>
                <span id="contentError" class="error-message"></span>
            </div>
            </div>
            <div class="form-item">
            <label for="photo">Slika: </label>
            <div class="form-field">
                <input type="file" accept="image/jpg,image/gif,image/png,image/jpeg,/image/png" class="input-text" name="photo"/>
                <span id="photoError" class="error-message"></span>
            </div>
            </div>
            <div class="form-item">
            <label for="category">Kategorija vijesti</label>
            <div class="form-field">
                <select name="category" id="" class="form-field-textual">
                <option value="Politik">Politik</option>
                <option value="Gesundheit">Gesundheit</option>
                </select>
                <span id="categoryError" class="error-message"></span>
            </div>
            </div>
            <div class="form-item">
            <label>Cuvati u arhivi: 
                <div class="form-field">
                <input type="checkbox" name="archive">
                </div>
            </label>
            </div>
            <div class="form-item">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" value="Prihvati">Prihvati</button>
            </div>
        </form>
        <footer>
            <span>Bruno Pusic</span>
        </footer>
    </div>
</body>

</html>