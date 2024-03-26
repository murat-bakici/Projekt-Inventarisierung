<?php
include_once('header.php');
/**
 * Auflistung aller Positionen in der DB, sortiert nach Kategorien
 * $kats = $connect_db->query("SELECT DISTINCT katTyp FROM tbl_inventur order by katTyp") - ermittelt die vorhandenen
 * Kategorien. nachfolgend werden dann die Positionen zu den einzelnen Kategorien ausgegeben.
 * $result = $connect_db->query("SELECT * FROM tbl_inventur where katTyp = '$kat' order by modell")
 *
 * echo "<li class='list view_field'><div class='$highlight'>
 * <input type='radio' id=" . $row['id'] . " value=" . $row['id'] . " name='SQLid'>
 * <label for=" . $row['id'] . ">
 * <div id='spaltenInhalt-Hersteller'>" . $row['hersteller'] . "</div>
 * <div id='spaltenInhalt-Modell'> " . $row['modell'] . "</div>
 * </label></div></li>"
 * erzeugt zu jedem Element der DB ein Listenelement und einen Radio-Button umd die Position auswählen zu können.
 * der Radio-Butto bekommt hier die ID der Position als Value-Wert.
 */
if (!isset($_POST['detail'])) {
    $kats = $connect_db->query("SELECT DISTINCT katTyp FROM tbl_inventur order by katTyp");
    echo "<div class='mainContent'><h1 class='center'>Übersicht der Geräte</h1>";
    echo "<form action='update.php' method='post'>";
    echo "<ul class='view-list'>";
    while ($katrow = $kats->fetch_assoc()) {
        echo "<div class='center kat-style'><i>" . $katrow['katTyp'] . "</i></div>";
        echo "<div center id='spaltenName-Hersteller'><u>Hersteller</u></div> <div id='spaltenName-Modell'><u>Modell</u></div>";
        $kat = $katrow['katTyp'];
        $result = $connect_db->query("SELECT * FROM tbl_inventur where katTyp = '$kat' order by modell");
        while ($row = $result->fetch_assoc()) {
            if (strtotime($row['pDat']) < strtotime($datum) && (!strtotime($row['pDat']) != 'NULL')) {$highlight = "view2";}
            else {$highlight = "view1";}
            echo "<li class='list view_field'><div class='$highlight'>
            <input type='radio' id=" . $row['id'] . " value=" . $row['id'] . " name='SQLid'>";
            $herstell = $row['hersteller'];
            if(strlen($herstell) >9){$herstell=substr($herstell, 0,9);}
            echo "<label for=" . $row['id'] . ">
                <div id='spaltenInhalt-Hersteller'>$herstell</div> 
                <div id='spaltenInhalt-Modell'> " . $row['modell'] . "</div>
            </label></div></li>";
        }
    }
    echo "</ul>";
    echo "<div class='center fixed'><input type='submit' value='details'  name='detail' class='btn-size' formaction='view.php'> &nbsp";
    echo "<input type='submit' value='bearbeiten'  name='update' class='btn-size' >  &nbsp";
    echo "<input type='submit' value='löschen'  name='deleleQuest' class='btn-size' formaction='delete.php'></div>";
    echo "</form></div>";
}
/** Anzeige der Details
 */
else {
    /**
     * für die Anzeige der Details / aller Informatioenn zu einer Posotion
     * sollte keine Position ausgewählt worden sein, erscheint die Meldung
     * echo "Es wurde keine Position ausgewählt"
     * und es wird auf die Übersicht aller Positionen weitergeleitet
     */
    if (!isset($_POST['SQLid'])) {
        echo "<div class='center text_fieldTop'> Es wurde keine Position ausgewählt </div>";
        header("Refresh: 1; view.php");
    } else {
        /**
         * Ausgabe aller Informationen zu einer Position.
         * farblich unterschieden falls das Prüfdatum < dem aktuellen Datum ist.
         */
        $result = $connect_db->query("SELECT * FROM tbl_inventur where id = " . $_POST['SQLid']);
        while ($row = $result->fetch_assoc()) {
            if (strtotime($row['pDat']) < strtotime($datum) && (!strtotime($row['pDat']) != 'NULL')) {
                $highlight = "goldenrod";
            }
            else{
                $highlight = "black";
            }
            echo 
            "<div class='center'>
                <div class='list-container'>
                    <div style='color:$highlight'><br>
                        <span class='list-item'> Inventar-Nr.: <div class='textFeld-size2' style='margin-left: 30px;'> " . $row['id'] . "</div></span><br>
                        <span class='list-item'> Hersteller: <div class='textFeld-size2' style='margin-left: 46px;'> " . $row['hersteller'] . "</div></span><br>
                        <span class='list-item'> Modell: <div class='textFeld-size2' style='margin-left: 68.5px;'> " . $row['modell'] . "</div></span><br>
                        <span class='list-item'> Seriennr: <div class='textFeld-size2' style='margin-left: 53px;'> " . $row['SNr'] . "</div></span><br>
                        <span class='list-item'> Standort: <div class='textFeld-size2' style='margin-left: 53px;'> " . $row['Standort'] . "</div></span><br>
                        <span class='list-item'> Kaufdatum: <div class='textFeld-size2' style='margin-left: 34px;'> " . $row['kDat'] . "</div></span><br>
                        <span class='list-item'> Prüftermin: <div class='textFeld-size2' style='margin-left: 38px;'> " . $row['pDat'] . "</div></span><br>
                    </div
                </div>
            </div>
            
            <form action='update.php' method='post'>
            <input type='hidden' value= ". $row['id'] ."  name='SQLid' class='btn-size' >  &nbsp
            <div class='center fixed'>
            <input type='submit' value='Übersicht'  class='btn-size' formaction='view.php'> &nbsp
            <input type='submit' value='bearbeiten' class='btn-size' >  &nbsp
            <input type='submit' value='löschen'  name='deleleQuest' class='btn-size' formaction='delete.php'></div></form>";
        }
    }
}
include_once('footer.php');
?>
