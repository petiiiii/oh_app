<?php

class Validator{
	
	const ALAP_PONT_LOWEST_EDGE = 20;
	
	private AlapPont $alapPontData;
	private $getRequirements;
	
	public function __construct($alapPontData, $getRequirements){
		$this->alapPontData = $alapPontData;
		$this->getRequirements = $getRequirements;
	}
	public function validate(){
		$pontValidation = $this->validateAlapPont();
		$errors = [];
		$valid =  true;
		if(!$pontValidation['valid']){
			$errors[] = "hiba, nem lehetséges a pontszámítás a ".$pontValidation['tantargy']." tárgyból elért 20% alatti eredmény miatt";
			$valid = false;
		}
		if(!$this->validateRequirement()){
			$errors[] = "hiba, nem lehetséges a pontszámítás a kötelező érettségi tárgyak hiánya miatt";
			$valid = false;
		}
		return ["message" => implode("\n", $errors), "valid" => $valid];
	}
	public function validateAlapPont(){
		$valid = true;
		$subjects = [];
		foreach($this->alapPontData->getAlapPont() as $pont){
			if($pont->getEredmeny() < self::ALAP_PONT_LOWEST_EDGE){
				$valid = false;
				$subjects[] = $pont->getNev();
			}
		}
		return ["valid" => $valid, "tantargy" => implode(", ", $subjects)];
	}
	
	public function validateRequirement(){
		$validRequired = false;
		$validOptionalRequired = false;
		$validBaseRequired = true;
		$subjects = [];
		foreach($this->alapPontData->getAlapPont() as $pont){
			if($this->getRequirements->getRequired() == $pont->getNev()){
				$validRequired = true;
			}elseif(in_array($pont->getNev(), $this->getRequirements->getOptionalRequired())){
				$validOptionalRequired = true;
			}
			$subjects[$pont->getNev()] = $pont->getNev();
		}
		foreach($this->getRequirements->getBaseRequired() as $required){
			if(!in_array($required, $subjects)){
				$validBaseRequired = false;
			}
		}
		if($validRequired && $validOptionalRequired && $validBaseRequired){
			return true;
		}
		return false;
	}
	
}

?>