<?php
require_once("animal.php");
require_once("kodok.php");
require_once("kera.php");
echo "<h2> OOP <h2>";

$shaun = new Animal("shaun");
echo "nama hewan : " .  $shaun->hewan . "<br>";
echo "jumlah kaki : " .  $shaun->kaki . "<br>";
echo "berdarah dingin : " .  $shaun->cold_blooded . "<br> <br>";

$buduk = new kodok("buduk");
echo "nama hewan : " .  $buduk->hewan . "<br>";
echo "jumlah kaki : " .  $buduk->kaki . "<br>";
echo "berdarah dingin : " .  $buduk->cold_blooded . "<br>";
echo "jump : " . $buduk->jump() . "<br> <br>";

$primata = new kera("kera");
echo "nama hewan : " .  $primata->hewan . "<br>";
echo "jumlah kaki : " .  $primata->kaki . "<br>";
echo "berdarah dingin : " .  $primata->cold_blooded . "<br>";
echo "yell : " . $primata->yell() . "<br> <br>";
?>