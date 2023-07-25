<?php

class TobbletPontEntity{
	
	private string $kategoria;
	private string $tipus;
	private int $eredmeny;
	
	public function setKategoria(string $kategoria){
		$this->kategoria = $kategoria;
		return $this;
	}
	public function getKategoria(): string{
		return $this->kategoria;
	}
	
	public function setTipus(string $tipus){
		$this->tipus = $tipus;
		return $this;
	}
	public function getTipus(): string{
		return $this->tipus;
	}
	
	public function setNyelv(string $nyelv){
		$this->nyelv = $nyelv;
		return $this;
	}
	public function getNyelv(): string{
		return $this->nyelv;
	}
	
}

?>