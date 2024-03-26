<?php
include_once('header.php');
if (!isset($_POST['katWahl'])){
   $result = $connect_db->query("SELECT DISTINCT katTyp FROM tbl_inventur ORDER BY katTyp");
    echo"<div>
        <h1 class='center'>Geräte erfassen</h1>
        <form method='post' action='eintragen.php'>
            <div class='center'>
                <div class='text_field'>";
                echo "<div class='center text_field'><label for='katwahl'>Kategorie: </label>";
                echo "<select name='device' id='katwahl'>";
                echo "<option value='neuanlegen'>neue Kategorie</option>";
                while ($row = $result->fetch_assoc()) {
                    $kats = $row['katTyp'];
                    echo "<option value='$kats'>".$kats."</option>";
                }
                echo "</select>
                </div>
                <div class='text_field' class='center'>
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
            <input type='text' name='device' id='katwahl' placeholder='Kategorie'>
        </div>";
        }
        else{
            echo "<input type='hidden' name='device' value='".$_POST['device']."'>";
        }
        echo "   
        <div class='text_field'>
            <label for='manufactur'>Hersteller: </label>
            <input type='text' name='hersteller' id='manufactur' placeholder='Brother'>
        </div>
        <div class='text_field'>
            <label for='modell'>Modell: </label>
            <input type='text' name='modell' id='modell' placeholder='MFC-2750-LC'>
        </div>
        <div class='text_field'>
            <label for='snr'>Seriennr:</label>
            <input type='text' name='snr' id='snr' placeholder='BLC2750-0000001'>
        </div>
        <div class='text_field'>
            <label for='location'>Standort:</label>
            <input type='text' name='location' id='location' placeholder='Haus 1 / Raum O1.01'>
        </div>
        <div class='text_field'>
            <label for='kdatum'>Kaufdatum:</label>
            <input type='date' name='kaufdatum' id='kdatum' size='30'>
        </div>
        <div class='text_field'>
            <label for='pdatum'>Prüfdatum:</label>
            <input type='date' name='checkdate' id='pdatum'>
        </div>
        
        <div class='text_field' class='center'>
            <input type='submit' name='submit' class='btn-size' value='erfassen'>
        </div>  
     </div>
     </form>
</div>";
}
include_once('footer.php');
?>
