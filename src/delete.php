<?php
include_once('header.php');
if (isset($_POST['delete'])) {
    //$id = $_POST['SQLid2'];
    $result = $connect_db->query("DELETE FROM tbl_inventur where id=" . $_POST['SQLid2']);
    echo "<div class='center text_fieldTop'> Datensatz erfolgreich gelöscht </div>";
    header("Refresh:2; view.php");
}

if (isset($_POST['deleleQuest'])) {
    if (isset($_POST['SQLid'])) {
        //$id = $_POST['SQLid2'];
        $result = $connect_db->query("SELECT * FROM tbl_inventur where id = " . $_POST['SQLid']);
        while ($row = $result->fetch_assoc()) {
            echo
                "<div class='center'>
                <div class='list-container'>
                    <div><br>
                        <span class='list-item'> Inventar-Nr.: <div class='textFeld-size2' style='margin-left: 30px;'> " . $row['id'] . "</div></span><br>
                        <span class='list-item'> Hersteller: <div class='textFeld-size2' style='margin-left: 46px;'> " . $row['hersteller'] . "</div></span><br>
                        <span class='list-item'> Modell: <div class='textFeld-size2' style='margin-left: 68.5px;'> " . $row['modell'] . "</div></span><br>
                        <span class='list-item'> Seriennr: <div class='textFeld-size2' style='margin-left: 53px;'> " . $row['SNr'] . "</div></span><br>
                        <span class='list-item'> Standort: <div class='textFeld-size2' style='margin-left: 53px;'> " . $row['Standort'] . "</div></span><br>
                        <span class='list-item'> Kaufdatum: <div class='textFeld-size2' style='margin-left: 34px;'> " . $row['kDat'] . "</div></span><br>
                        <span class='list-item'> Prüftermin: <div class='textFeld-size2' style='margin-left: 38px;'> " . $row['pDat'] . "</div></span><br>
                    </div
                </div>
            </div>";
        }
        echo "<form action='delete.php' method='post'>";
        echo "<div class='center text_fieldTop'>Aus Inventarliste löschen?</div><br>";
        echo "<input type='hidden' value=" . $_POST['SQLid'] . " name='SQLid2'>
    <div class='center text_field'>
        <input type='submit' class='btn-size' value='löschen' name='delete'> &nbsp;
        <input type='submit' class='btn-size' value='abbrechen' formaction='view.php'>
    </div>";
        echo "</form>";
    } else {
        echo "<div class='center text_fieldTop'> kein Datensatz ausgewählt </div>";
        header("Refresh:2; view.php");
    }
}
include_once('footer.php');
?>