<?php
// ./vendor/bin/phpunit --colors AccountTest.php

include "Account.php";

use PHPUnit\Framework\TestCase;


class AccountTest extends TestCase{
	
	public function testSetActive_validValue_successful() 
	{
	    $Account = new Account();
	    $value = 1;
	    $Account->setActive($value);
	    $this->assertEquals($value, $Account->getActive());
	}

	public function testSetAvailableLimit_validValue_successful() 
	{
	    $Account = new Account();
	    $value = 100;
	    $Account->setAvailableLimit($value);
	    $this->assertEquals($value, $Account->getAvailableLimit());
	}

	public function testSetHistory_validValue_successful() 
	{
	    $Account = new Account();
	    $value = "ShouldBeAnTransaction";
	    $Account->setHistory($value);
	    $this->assertEquals($value, $Account->getHistory()[0]);
	}
}