<?php 

class Transaction{
	
	private $merchant;
	private $amount;
	private $time;

	// Getters
	public function getMerchant()
    {
        return $this->merchant;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getTime()
    {
        return $this->time;
    }

    //Setters
    public function setMerchant($merchant)
    {
    	$this->merchant = $merchant;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }
}