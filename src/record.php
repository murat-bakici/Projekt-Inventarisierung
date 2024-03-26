<?php
/***
 * Eingabeseite für die Inventarisierung, im ersten Teil wird nach der Kategorie gefragt
 * im zweiten Teil wird die ausgewählte Kategorie übernommen, wenn keine ausgewählt wurde
 * wird eine Kategorieeingabe erforderlich
 */
include_once('header.php');
if (!isset($_POST['katWahl'])){
   $result = $connect_db->query("SELECT DISTINCT katTyp FROM tbl_inventur ORDER BY katTyp");
    echo"<div>
        <h1 class='center'>Geräte erfassen</h1>
        <form method='post' action='record.php'>
            <div>
                <div class='text_field'>";
                echo "<div class='center text_field'><label for='katwahl'>Kategorie: </label>";
                echo "<select name='device' id='katwahl'> class='textFeld-size'";
                echo "<option value='neuanlegen'>neue Kategorie</option>";
                while ($row = $result->fetch_assoc()) {
                    $kats = $row['katTyp'];
                    echo "<option value='$kats'>".$kats."</option>";
                }
                echo "</select>
                </div>
                <div class='text_field center'>
                <input type='submit' name='katWahl' value='weiter >' class='btn-size'>
                </div>
                </div>
            </div>
         </form>
        </div>";
}
else{
echo"<div>
    <h1 class='center'>Geräte erfassen</h1>
    <form method='post' action='insert.php'>
    <div class='center'>";
        if ($_POST['device'] == "neuanlegen"){
            echo "<div class='text_field'>
            <label for='katwahl'>Kategorie: </label>
            <input type='text' name='device' id='katwahl' class='textFeld-size' placeholder='Kategorie' required>
        </div>";
        }
        else{
            echo "<div class='text_field'>
                    <label for='katwahl'>Kategorie: </label>
                    <input type='text' id='katwahl' class='textFeld-size' value='".$_POST['device']."' disabled>
                    <input type='hidden' name='device' value='".$_POST['device']."'>
                    </div>";
        }
        echo "   
        <div class='text_field'>
            <label for='manufactur'>Hersteller: </label>
            <input type='text' name='hersteller' id='manufactur' class='textFeld-size' placeholder='Brother' required>
        </div>
        <div class='text_field'>
            <label for='modell'>Modell: </label>
            <input type='text' name='modell' id='modell' class='textFeld-size' placeholder='MFC-2750-LC' required>
        </div>
        <div class='text_field'>
            <label for='snr'>Seriennr:</label>
            <input type='text' name='snr' id='snr' class='textFeld-size' placeholder='BLC2750-0000001'>
        </div>
        <div class='text_field'>
            <label for='location'>Standort:</label>
            <input type='text' name='location' id='location' class='textFeld-size' placeholder='Haus 1 / Raum O1.01'>
        </div>
        <div class='text_field'>
            <label for='kdatum'>Kaufdatum:</label>
            <input type='date' name='kaufdatum' id='kdatum' class='datum'>
        </div>
        <div class='text_field'>
            <label for='pdatum'>Prüfdatum:</label>
            <input type='date' name='checkdate' id='pdatum' class='datum'>
        </div>
        
        <div class='text_field center'>
            <input type='submit' name='submit' class='btn-size' value='erfassen'>
        </div>  
     </div>
     </form>
</div>";
}
include_once('footer.php');
?>
