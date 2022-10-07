<?php
// ./vendor/bin/phpunit --colors MainTest.php

include "Main.php";

use PHPUnit\Framework\TestCase;


class MainTest extends TestCase{
	
	public function testCreateAccount_validValue_successful() 
	{
	    $Main = new Main();
	    $Active = 1; $AvailableLimit = 100;
	    $Account = $Main->createAccount($Active, $AvailableLimit);
	    $this->assertEquals($Active, $Account->getActive());
	    $this->assertEquals($AvailableLimit, $Account->getAvailableLimit());
	}
	/* viollations rules


	*/
	public function testIsActive_validValue_successful()
	{
		$Main = new Main();
		$Active = 1; $AvailableLimit = 100;
		$Account = $Main->createAccount($Active, $AvailableLimit);
	    $this->assertEquals($Active, $Main->isActive($Account));

	}

	public function testAuthorize_validValue_successful()
	{
		$Main = new Main();
		$Active = 1; $AvailableLimit = 1000;
		$Account = $Main->createAccount($Active, $AvailableLimit);
		$Merchant = "Google"; $Amount = 500; $Time = date('d/m/y H:i:s');
		$ret = $Main->authorize($Account, $Merchant, $Amount, $Time);
		// check if violations received the correct return
	    $this->assertEquals($ret["violations"], array());
	    // check if the limit is correct
	    $this->assertEquals($AvailableLimit - $Amount, $ret["account"]->getAvailableLimit());

	}

	public function testAuthorize_validValue_fail()
	{
		$Main = new Main();
		$Active = 0; $AvailableLimit = 1000;
		$Account = $Main->createAccount($Active, $AvailableLimit);
		$Merchant = "Google"; $Amount = 500; $Time = date('d/m/y H:i:s');
		$ret = $Main->authorize($Account, $Merchant, $Amount, $Time);
		// check if violations received the correct return
	    $this->assertEquals($ret["violations"], array("account-not-active"));
	    // check if the limit is correct
	    $this->assertEquals($AvailableLimit, $ret["account"]->getAvailableLimit());

	}
}