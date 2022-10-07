<?php 

class Account{
	
	private $active;
	private $availableLimit;
	private $history;


	// Getters
	public function getActive()
    {
        return $this->active;
    }

    public function getAvailableLimit()
    {
        return $this->availableLimit;
    }

    public function getHistory()
    {
        return $this->history;
    }

    //Setters
    public function setActive($active)
    {
    	$this->active = $active;
    }

    public function setAvailableLimit($availableLimit)
    {
        $this->availableLimit = $availableLimit;
    }

    public function setHistory($history)
    {
    	$this->history[] = $history;
    }
}
