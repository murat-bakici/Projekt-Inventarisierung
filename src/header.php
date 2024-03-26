<?php
/***
 * stellt den Kopf der Seiten und beinhaltet alles Header-Informationen
 * laden der CSS Dateien
 * durch das include ("db/db_conn.php") wird die Datenbankverbindung erzeugt
 * include_once ('menu.php') inkludiert das Menu der Seite
 */
include ("db/db_conn.php");
echo "
<!DOCTYPE html>
<html lang='de'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='Cache-Control' content='no-cache, no-store, must-revalidate'/>
    <meta http-equiv='Pragma' content='no-cache''/>
    <meta http-equiv='Expires' content='0'/>

    <title>Geräte-Inventur @PHP-Projekt</title>
    <!-- Link zu den CSS Dateien -->
    <link rel='stylesheet' href='./css/global.css'>
    <link rel='stylesheet' href='./css/mobile.css'>    
    <link rel='stylesheet' href='./css/desktop.css'>
    <link rel='icon' type='image/png' href='./images/icon.png'>
    
</head>
<body>
<div>
<a href='index.php'><h1 class='center'>Geräte-Inventur</h1>
";
/**
 * ermittelt das aktuelle Server-Datum
 */
$timestamp = time();
$datum = date("Y-m-d", $timestamp);
include_once ('menu.php');