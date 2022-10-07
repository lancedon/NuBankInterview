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

	public function authorize($Account, $Merchant, $Amount, $Time){

		$violations = array();

		echo "Trying do a transaction of " . $Amount . "\n";

		if(!$this->isActive($Account)){

			echo "Account not Active";
			$violations[] = "account-not-active";
		}

		if(!$this->ruleCheckLimit($Account, $Amount)){
				
			echo "No Limit, have only " . $Account->getAvailableLimit() . "\n";
			$violations[] = "insufficient-limit";
		}

		if(count($violations) == 0){
			
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
		}


		return array("account" => $Account, "violations" => $violations);

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

	public function isActive($Account){

		return $Account->getActive();

	}

	/* 

	*/
	public function ruleCheckLimit($Account, $Amount){

		return ($Account->getAvailableLimit() >= $Amount);

	}

}
