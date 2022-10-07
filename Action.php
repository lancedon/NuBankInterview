<?php
include "Main.php";

$Main = new Main();

// create new Account
$Account = $Main->createAccount(1, 1000);

// show all account details
$Main->showAccount($Account);


// create new Transaction
$Main->addTransaction($Account, "Google", 500, date('d/m/y H:i:s'));

// sleep for two second
sleep(2);

// create new Transaction
$Main->addTransaction($Account, "Uol", 100, date('d/m/y H:i:s'));

// show all account details
$Main->showAccount($Account);