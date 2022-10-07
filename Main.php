<?php 

include "Transaction.php";
include "Account.php";

class Main{

	public function createAccount($active, $AvailableLimit){
		// create new Account
		$Account = new Account();

		// set Account parameters
		$Account->setActive($active);
		$Account->setAvailableLimit($AvailableLimit);

		return $Account;
	}

	public function addTransaction($Account, $Merchant, $Amount, $Time){

		echo "Trying do a transaction of " . $Amount . "\n";
		
		if($Account->getActive() == 1){

			if($Account->getAvailableLimit() >= $Amount){
				// create new Transaction
				$Transaction = new Transaction();

				// set Transaction parameters
				$Transaction->setMerchant($Merchant);
				$Transaction->setAmount($Amount);
				$Transaction->setTime($Time);

				// add this transaction to the current Account
				$Account->setHistory($Transaction);

				// update AvailableLimit
				$Account->setAvailableLimit($Account->getAvailableLimit() - $Amount);

				echo "Transaction done. \n";

			}else{
				echo "No Limit, have only " . $Account->getAvailableLimit() . "\n";
			}

		}else{
			echo "Account not Active";
		}

	}

	public function showAccount($Account){

		// print Account details
		echo "Account Active = " . $Account->getActive() . "\n";
		echo "Account AvailableLimit = " . $Account->getAvailableLimit() . "\n\n";

		// if existy any history
		if($Account->getHistory()){

			foreach ($Account->getHistory() as $key => $TransactionHistory){

				echo "Transaction " . $key . ":\n";

				echo "Transaction Merchant = " . $TransactionHistory->getMerchant() . "\n";
				echo "Transaction Amount = " . $TransactionHistory->getAmount() . "\n";
				echo "Transaction Time = " . $TransactionHistory->getTime() . "\n\n";

			}
		}
	}
}
