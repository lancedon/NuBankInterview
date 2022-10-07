<?php
// ./vendor/bin/phpunit --colors TransactionTest.php

include "Transaction.php";

use PHPUnit\Framework\TestCase;


class TransactionTest extends TestCase{
	
	public function testSetMerchant_validValue_successful() 
	{
	    $Transaction = new Transaction();
	    $value = "String";
	    $Transaction->setMerchant($value);
	    $this->assertEquals($value, $Transaction->getMerchant());
	}

	public function testSetAmount_validValue_successful() 
	{
	    $Transaction = new Transaction();
	    $value = 100;
	    $Transaction->setAmount($value);
	    $this->assertEquals($value, $Transaction->getAmount());
	}

	public function testSetTime_validValue_successful() 
	{
	    $Transaction = new Transaction();
	    $value = date('d/m/y H:i:s');
	    $Transaction->setTime($value);
	    $this->assertEquals($value, $Transaction->getTime());
	}
}