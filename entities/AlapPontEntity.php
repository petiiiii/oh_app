<?php

class AlapPontEntity{
	
	private string $nev;
	private string $tipus;
	private int $eredmeny;
	
	public function setNev(string $nev){
		$this->nev = $nev;
		return $this;
	}
	public function getNev(): string{
		return $this->nev;
	}
	
	public function setTipus(string $tipus){
		$this->tipus = mb_strtolower($tipus);
		return $this;
	}
	public function getTipus(): string{
		return $this->tipus;
	}
	
	public function setEredmeny(int $eredmeny){
		$this->eredmeny = $eredmeny;
		return $this;
	}
	public function getEredmeny(): int{
		return $this->eredmeny;
	}
	
}

?>