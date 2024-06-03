<?php

session_start();

$_SESSION["username"]="Zainab";

echo $_SESSION["username"];

session_unset();
?>