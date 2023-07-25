<?php

class AlapPont{
	
	private array $alapPont;
	
	public function __construct(array $data){
		$this->setAlapPont($data);
	}
	private function setAlapPont(array $data){
		foreach($data as $item){
			$alapPontEntities = new AlapPontEntity();
			$alapPontEntities->setNev($item['nev']);
			$alapPontEntities->setTipus($item['tipus']);
			$alapPontEntities->setEredmeny(str_replace("%", "", $item['eredmeny']));
			$this->alapPont[] = $alapPontEntities;
		}
	}
	public function getAlapPont(){
		return $this->alapPont;
	}	
}

?>