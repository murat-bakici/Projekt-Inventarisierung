<?php
/***
 * hier werden die Suchen ausgegeben, soviel die globale Suche von der Startseite, als auch die Suche
 * nach Filterung. Header und Footer werden inkludiert.
 * für den Filter werden die Kategorien aus der DB gelesen und in einer Auswahl zur Verfügung gestellt.
 *s
 */

include_once('header.php');
$result = $connect_db->query("SELECT DISTINCT katTyp FROM tbl_inventur ORDER BY katTyp");
echo "<h1 class='center'>Geräte suchen</h1>";
echo "<form action='search.php' method='post'>";
    echo "<div class='center text_field'><label for='katwahl'>Kategorie:</label>";
    echo "<select name='kategorie' id='katwahl' class='textFeld-size3'>";
        echo "<option value=''>Alle Kategorien</option>";
        while ($row = $result->fetch_assoc()) {
            $kats = $row['katTyp'];
            echo "<option value='$kats'>".$kats."</option>";
        }
    echo "</select><br></div>";

    echo "<div class='center text_field'><label for='build'>Hersteller:</label>";
    echo "<input type='search' name='buildS' id='build' class='textFeld-size3'><br></div>";
    echo "<div class='center text_field'><label for='modell'>Modell:</label>";
    echo "<input type='search' name='modellS' id='modell' class='textFeld-size3' ><br></div>";
    /*
    echo "<label for='start'>gekauft zwischen</label>";
    echo "<input type='date' id='start' name='startDate'> - <input type='date' name='endDate'><br>";
    */
    echo "<div class='center'><input type='submit' name='suchen' class='btn-size text_field' value='suche Starten'>";
echo "</form> </div>";

/***
 * Ausgabe der Suchergenisse anhand der Filtereingaben
 */

if(isset($_POST['suchen'])) {
    $katTyp = $_POST['kategorie'];
    $build = $_POST['buildS'];
    $modell = $_POST['modellS'];
    /**
     * nachfolgende If-Else-Anweisungen sind für die Suche / Filterung
     */
    if (!empty($_POST['buildS']) && !empty($_POST['modellS'])){
        $suche = $connect_db->query("SELECT * FROM tbl_inventur WHERE katTyp LIKE '%$katTyp%' AND hersteller like '%$build%' AND modell like '%modell%' ");
    }
    elseif (!empty($_POST['buildS'])){
        $suche = $connect_db->query("SELECT * FROM tbl_inventur WHERE katTyp LIKE '%$katTyp%' AND hersteller like '%$build%' ");
    }
    elseif (!empty($_POST['modellS'])){
        $suche = $connect_db->query("SELECT * FROM tbl_inventur WHERE katTyp LIKE '%$katTyp%' AND modell like '%$modell%' ");
    }
    else{
        $suche = $connect_db->query("SELECT * FROM tbl_inventur WHERE katTyp LIKE '$katTyp' ");
    }
    // $suche = $connect_db->query("SELECT * FROM tbl_inventur WHERE (katTyp LIKE '%$katTyp%' AND hersteller like '%$build%') OR (katTyp LIKE '%$katTyp%' AND modell like '%modell%')  ");

    echo "<form action='update.php' method='post'>";
    /***
     * if (!is_null($suche->fetch_assoc())){...}
     * wenn das Array suche nicht leer ist, werden die Ergenisse ausgegeben.
     * wenn das Array $suche leer ist, wird ausgegeben "Keine Datensätze gefunden"
     */
    if (!is_null($suche)) {

        while ($row = $suche->fetch_assoc()) {

            echo "<input type='radio' id='" . $row['id'] . "' value='" . $row['id'] . "' name='SQLid'><label for='" . $row['id'] . "'> " . $row['hersteller'] . " - " . $row['modell'] . " - " . $row['Standort'] . "</label><br>";
        }
        echo "<div class='center home fixed'>";
        echo "<input type='submit' value='details'  name='detail' formaction='view.php' class='btn-size'> &nbsp";
        echo "<input type='submit' value='bearbeiten'  name='update' class='btn-size'> &nbsp";
        echo "<input type='submit' value='löschen'  name='delete' formaction='delete.php' class='btn-size'>";
        echo "</form></div>";
    }
    else {echo "Keine Datensätze gefunden";}
}

/***
 * Ausgabe von Suchergebnisse der globalen Suche
 * gesucht wird in der Tabelle nach Hersteller, Modell. Seriennummer und Kategorie
 */
if(isset($_POST['allesSuchen'])) {
    $search = $_POST['suchstr'];
    $suche = $connect_db->query("SELECT * FROM tbl_inventur WHERE hersteller LIKE '%$search%' OR modell LIKE '%$search%' OR SNr LIKE '%$search%' OR katTyp LIKE '%$search%'");
    echo "<form action='update.php' method='post'>";
    while ($row = $suche->fetch_assoc()) {
        $id = $row['id'];
        echo "<input type='radio' id='$id' value='$id' name='SQLid'> <label for='$id'>".$row['modell'] . "  - " . $row['Standort'] . "</label><br>";
    }
    echo "<div class='center home fixed'>";
    echo "<input type='submit' value='details'  name='detail' formaction='view.php' class='btn-size'> &nbsp";
    echo "<input type='submit' value='bearbeiten'  name='update' class='btn-size'> &nbsp";
    echo "<input type='submit' value='löschen'  name='delete' formaction='delete.php' class='btn-size'>";
    echo "</form></div>";
}
include_once('footer.php');
?>