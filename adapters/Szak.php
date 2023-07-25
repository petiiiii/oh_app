<?php 

class Szak{
	
	private string $egyetem;
	private string $kar;
	private string $szak;
	
	public function __construct(array $data){
		$this->egyetem = ucfirst(mb_strtolower($data['egyetem']));
		$this->kar = $data['kar'];
		$this->szak = $data['szak'];
	}
	
	public function getEgyetem(){
		return $this->egyetem;
	}
	public function getSzak(){
		return $this->szak;
	}
	public function getKar(){
		return $this->kar;
	}
}

?>