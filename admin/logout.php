<?
session_start();
session_unset();
session_destroy();
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">';
?>