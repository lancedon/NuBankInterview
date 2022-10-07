<?php
include "Main.php";

$Main = new Main();

// create new Account
$Account = $Main->createAccount(0, 400);

// show all account details
$Main->showAccount($Account);


// create new Transaction
var_dump($Main->authorize($Account, "Google", 500, date('d/m/y H:i:s')));

// sleep for two second
sleep(2);

// create new Transaction
var_dump($Main->authorize($Account, "Uol", 600, date('d/m/y H:i:s')));

// show all account details
$Main->showAccount($Account);