<?php
/***
 * zum Eintragen der Variablen aus der Eingabeform
 * id => Index in der DB mit Autoinkrement, daher übergabe NULL
 * katTyp => beinhaltet die Artikel-Kategorie
 * hersteller => Feld für den Hersteller
 * modell => Feld für das Modell des Herstellers
 * SNr => Feld für die Seriennummer
 * kDat => Feld für das Kaufdatum
 * pDat => Feld für das Prüfdatum
 * Standort => Feld für den Standort
 *
 * if ($_POST['checkdate']==""){..}
 * Wenn das Prüfdatum leer ist wird in der DB dieser wert als NULL gespeichert, andernfalls mit dem Datum aus der Eingabe
 */
include_once('header.php');

if ($_POST['checkdate']==""){
    $sql = "INSERT INTO tbl_inventur (id, katTyp, hersteller, modell, SNr, Standort, kDat)
VALUES (NULL, '$_POST[device]', '$_POST[hersteller]', '$_POST[modell]', '$_POST[snr]', '$_POST[location]', '$_POST[kaufdatum]')";
}else{
    $sql = "INSERT INTO tbl_inventur (id, katTyp, hersteller, modell, SNr, Standort, kDat, pDat)
VALUES (NULL, '$_POST[device]', '$_POST[hersteller]', '$_POST[modell]', '$_POST[snr]', '$_POST[location]', '$_POST[kaufdatum]', '$_POST[checkdate]')";
}
if ($connect_db->query($sql) === TRUE) {
    echo "<div class='center text_fieldTop'> Neuer Datensatz erfolgreich angelegt </div>";
} else {
    echo "Error: " . $sql . "<br>" . $connect_db->error;
}
$connect_db->close();
header("Refresh:2; view.php");
include_once('footer.php');
?>