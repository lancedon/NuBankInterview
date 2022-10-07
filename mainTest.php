<?php
// ./vendor/bin/phpunit --colors mainTest.php

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
}