<?php
include_once('header.php');
/***
 * if (!isset($_POST['submit'])) {...}
 * in diesem Bereich werden die Input-Felder mit dem Inhalt der DB gefüllt um änderungen vornehmen zu können.
 * die nachfolgende Deklaration und Initialisierung der Variablen ist nötig, da Strings aus der DB nur bis zum ersten
 * Leerzeichen in das Input-Feld übergibt - als Variable wird alles im Input-Feld angezeigt.
 *
 * if (isset($_POST['submit'])) {...}
 * hier wird die DB mit den Werten aus den Input-Feldern aktualisiert.
 * wenn das $_POST['checkdate'] leer ist, wird in der Spalte der DB dieser Wert auf NULL gesetzt, andernfalls wird das Datum
 * übermittelt.
 */
if (!isset($_POST['submit'])) {
    if (!isset($_POST['SQLid'])) {
        echo "<div class='center text_fieldTop'> Es wurde keine Position ausgewählt </div>";
        header("Refresh: 1; view.php");
    } else {
        $result1 = $connect_db->query("SELECT DISTINCT katTyp FROM tbl_inventur ORDER BY katTyp");
        $result = $connect_db->query("SELECT * FROM tbl_inventur where id=". $_POST['SQLid']);
        $row = $result->fetch_assoc();
        $modell = $row ['modell'];
        $katTyp = $row ['katTyp'];
        $hersteller = $row ['hersteller'];
        $standort = $row ['Standort'];
        $snr = $row ['SNr'];
        echo " 
        <div>
            <h1 class='center'>Geräte bearbeiten</h1>
                <form method='post' action='update.php'>
                <div class='center'>
                    <div class='text_field'>
                        <label for='katTyp'>Kategorie: </label>";
                            echo "<select name='device' id='katTyp' >";
                            while ($row1 = $result1->fetch_assoc()) {
                                $kats = $row1['katTyp'];
                                echo "<option value='$kats'"; if ($katTyp == $kats)  { echo "selected";} echo ">".$kats."</option>";
                            }
                            echo "</select>
                    </div>
                    <div class='text_field'>
                        <label for='manufactur'>Hersteller: </label>
                        <input type='text' name='hersteller' id='manufactur' class='textFeld-size' placeholder='Brother' value='$hersteller' required>
                    </div>
                    <div class='text_field'>
                        <label for='modell'>Modell: </label>
                        <input type='text' name='modell' id='modell' class='textFeld-size' placeholder='MFC-2750-LC' value='$modell'>
                    </div>
                    <div class='text_field'>
                        <label for='snr'>Seriennr:</label>
                        <input type='text' name='snr' id='snr' class='textFeld-size' placeholder='BLC2750-0000001' value='$snr'>
                    </div>
                    <div class='text_field'>
                        <label for='location'>Standort:</label>
                        <input type='text' name='location' id='location' class='textFeld-size' placeholder='Haus 1 / Raum O1.01' value='$standort'>
                    </div>
                    <div class='text_field'>
                        <label for='kdatum'>Kaufdatum:</label>
                        <input type='date' name='kaufdatum' id='kdatum'  class='datum' size='30' value=".$row ['kDat'].">
                    </div>
                    <div class='text_field'>
                        <label for='pdatum'>Prüfdatum:</label>
                        <input type='date' name='checkdate' id='pdatum' class='datum' value=".$row ['pDat'].">
                    </div>
                    
                    <div class='text_field' class='center'>
                        <input type='hidden' name='SQLID' value=".$row ['id'].">
                        <input type='submit' name='submit' class='btn-size' value='aktualisieren'>             
                    </div>  
                 </div>
                </form>
        </div>";
    }
}
if (isset($_POST['submit'])) {
    if ($_POST['checkdate']==""){
        $sql = "UPDATE tbl_inventur SET katTyp = '$_POST[device]' , hersteller = '$_POST[hersteller]', modell = '$_POST[modell]', SNr = '$_POST[snr]', kDat = '$_POST[kaufdatum]', pDat = NULL, Standort = '$_POST[location]' WHERE id='$_POST[SQLID]'";
    }else{
        $sql = "UPDATE tbl_inventur SET katTyp = '$_POST[device]' , hersteller = '$_POST[hersteller]', modell = '$_POST[modell]', SNr = '$_POST[snr]', kDat = '$_POST[kaufdatum]', pDat = '$_POST[checkdate]', Standort = '$_POST[location]' WHERE id='$_POST[SQLID]'";
    }
    if ($connect_db->query($sql) === TRUE) {
        echo "<div class='center text_fieldTop'>Erfolgreich gespeichert</div>";
        header("Refresh: 1; view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connect_db->error;
    }
}
include_once('footer.php');
?>