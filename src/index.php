<?php
/***
 * startseite mit einem Suchfeld und text -> impress.php
 */
include_once('header.php');

echo"

<form action='search.php' method='post'>
<div class='center home'>
        <input type='search' name='suchstr' class='text_fieldTop textFeld-size3' placeholder='Inventar durchsuchen'>
    </div>
    <div class='center home'>
        <input type='submit' value='suchen' class='btn-size text_fieldTop' name='allesSuchen'>
    </div>
</form>
";
include_once ('impress.php');
include_once('footer.php');
?>