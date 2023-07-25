<?php

class TobbletPont{
	
	private array $tobbletPont;
	
	public function __construct(array $data){
		$this->setTobbletPont($data);
	}
	
	public function setTobbletPont(array $data){	
		foreach($data as $item){
			$tobbletPontEntity = new TobbletPontEntity();
			$tobbletPontEntity->setKategoria($item['kategoria']);
			$tobbletPontEntity->setTipus(($item['tipus'] == "C1") ? 40 : 28);
			$tobbletPontEntity->setNyelv($item['nyelv']);
			$this->tobbletPont[] = $tobbletPontEntity;
		}
	}
	
	public function getTobbletPont(){
		return $this->tobbletPont;
	}
	
}

?>