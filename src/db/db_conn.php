<?php
/**
 *  hier wird die Verbindung zur DB hergestellt.
 *  Die Zugangsdaten sind in Variablen angegeben um an anderer Stelle auf die Variablen zugreifen zu können.
 */

/*$dbhost = "mysql8.bytecamp.net";
$dbuser = "db_2363_2_bka";
$dbpass = "Fink2302";
$dbname = "db_2363_2_bka";*/
    $dbhost = "127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "inventur";
// Create connection
$connect_db = new mysqli($dbhost, $dbuser,$dbpass, $dbname);
// Check connection
if ($connect_db->connect_error) {
    die("Connection failed: " . $connect_db->connect_error);
}
