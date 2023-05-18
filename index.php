<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php

date_default_timezone_set('Europe/Berlin');


$rok = date('Y');
$miesiac = date('m');
$TenDzien = date('d');


$pierwszyDzien = mktime(0, 0, 0, $miesiac, 1, $rok);
$DniMiesiaca = date('t', $pierwszyDzien);

$NazwaMiesiacaLiczba = date('m', $pierwszyDzien);
$NazwyMiesiecy = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień');

$NazwaMiesiaca = $NazwyMiesiecy[$NazwaMiesiacaLiczba-1];


$DniTygodnia = date('N', $pierwszyDzien);


$NazwyDni = array('Pon', 'Wto', 'Śro', 'Czw', 'Pią', 'Sob', 'Nie');
?>
<div class="container">

<div class="calendar-container">

<header>
      
    <div class="month">
        <?php
        echo $rok;
        ?>
    </div>
    
    <div class="day">
        <?php
        echo $NazwaMiesiaca;
        ?>
    </div>

</header>

<?php
echo "<table class='calendar'>";
echo "<thead><tr>";
foreach ($NazwyDni as $DzienTygodnia) {
    echo "<td>$DzienTygodnia</td>";
}
echo "</tr></thead>";


$Dzien = 1;
echo "<tbody><tr>";
for ($i = 1; $i < $DniTygodnia; $i++) {
    echo "<td></td>";
}
while ($Dzien <= $DniMiesiaca) {
    if ($DniTygodnia == 8) {
        echo "</tr><tr>";
        $DniTygodnia = 1;
    }
    if($Dzien == $TenDzien)
    echo "<td class='dzisiaj'>$Dzien</td>";
    else
    echo "<td>$Dzien</td>";
    $Dzien++;
    $DniTygodnia++;
}
echo "</tr></tbody>";

echo "</table>";
?>
    <div class="ring-left"></div>
    <div class="ring-right"></div>

  </div>

</div>
</body>
</html>