<!DOCTYPE html>
<html>
<head>
  <title>Stern - PWA Projekt</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
     .wrapper{
    max-width:900px;
    margin: 0 auto;
    }
  </style>
</head>
<body>
  <div class="wrapper">
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
    $naslov = "Eine Donald-Trump-Gebetsmünze und die aberwitzige These dahinter";
    $paragraf1 = "Ein US-Fernsehprediger bewirbt in seiner TV-Show eine Trump-Gebetsmünze. Diese diene als Kontaktpunkt für alle Gläubigen, die für eine Wiederwahl des US-Präsidenten im Jahr 2020 beten. Hinter dem Motiv steckt eine bei christlichen Fanatikern beliebte These..";
    $paragraf2 = "Donald Trump war Zeit seines Lebens nicht unbedingt als Vorzeigechrist aufgefallen. In den USA sind jedoch sehr viele Menschen streng gläubig und so suchte Trump bereits im Wahlkampf die Nähe zu christlichen Predigern. Seit seiner Wahl zum 45. Präsidenten zeigt er sich gerne mit besonders fanatischen Vertretern dieser Zunft. So betete er 2017 etwa mit dem evangelikalen Pastor Robert Jeffress im Oval Office. Der dankte Gott für das Geschenk Donald Trump, weil dieser das Land heilen würde. In fundamentalistischen christlichen Kreisen ist Trump ob seiner erzkonservativen Positionen sehr beliebt und diese Beliebtheit hat sich nun in einer goldfarbenen Gebetsmünze manifestiert, beworben von einem zwielichtigen TV-Prediger (wobei man darüber streiten kann, ob das nicht eine Tautologie ist).

    45 Dollar soll die Münze kosten, deren Material nicht weiter erläutert wird. Im Pack mit einigen Büchern und DVDs (ja, nicht Blu-rays) muss man satte 450 Dollar berappen. Beworben wird das Produkt von den TV-Evangelikalen Lance Wallnau und Jim Bakker. Letzterer gehört zu den Pionieren auf dem Gebiet des Fernsehpredigens, musste jedoch Ende der 80er-Jahre wegen Veruntreuung von Geldern vier Jahre ins Gefängnis. Nach einigen Jahren abseits der Bildschirme kehrte er Anfang des Jahrtausends zurück ins Fernsehen und moderiert mittlerweile die Jim Bakker Show. Eben dort trat Wallnau auf und durfte erläutern, warum er diese Münze verkauft, oder besser: Warum die Leute sie kaufen sollen.
    
    ";
    $slika = "trump.png";
    ?>
    <h2 class="prviheader"><?php echo $naslov; ?></h2>
    <p><?php echo $paragraf1; ?></p>
    <img src="<?php echo $slika; ?>" alt="Slika članka">
    <p><?php echo $paragraf2; ?></p>

    <footer>
        <span>TV-Prediger: Gott hatte die Idee für die Münze</span>
    </footer>
  </div>
</body>
</html>
