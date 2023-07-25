<?php

class EredmenyProcessor{
	
	private Szak $szak;
	private AlapPont $alapPontData;
	private TobbletPont $tobbletPontData;
	private $requiredSubject = null;
	private $optionalRequiredSubject = null;
	private $getRequirements;
	private $alapPont;
	private $tobbletPont;
	private $returnValue;
	
	public function __construct(?array $inputData = null){
		if(!is_null($inputData)){
			$this->setInputData($inputData);
		}
	}
	public function run(){
		$validator = new Validator($this->alapPontData, $this->getRequirements);
		$validatorResult = $validator->validate();
		if(!$validatorResult['valid']){
			if($this->returnValue){
				return $validatorResult['message'];
			}
			print_r($validatorResult['message']);
			die();
		}
		$this->setRequiredSubjects();
		$this->setAdditionalPoints();
		$this->calculateAlapPont();
		$finalPoint = $this->printResult();
		if($this->returnValue){
			return $finalPoint;
		}
		print_r($finalPoint);
		die();
	}
	public function printResult(){
		return $this->tobbletPont + $this->alapPont;
	}
	public function calculateAlapPont(){
		$this->alapPont = ($this->requiredSubject->getEredmeny() + $this->optionalRequiredSubject->getEredmeny()) * 2;
	}
	public function setAdditionalPoints(){
		$additionalPoints = [];
		foreach($this->tobbletPontData->getTobbletPont() as $tobbletPont){
			if(!isset($additionalPoints[$tobbletPont->getKategoria().$tobbletPont->getNyelv()]) || $additionalPoints[$tobbletPont->getKategoria().$tobbletPont->getNyelv()] < $tobbletPont->getTipus()){
				$additionalPoints[$tobbletPont->getKategoria().$tobbletPont->getNyelv()] = $tobbletPont->getTipus();
			}
		}
		foreach($this->alapPontData->getAlapPont() as $alap){
			if($alap->getTipus() == "emelt"){
				$additionalPoints[] = 50;
			}
		}
		$this->tobbletPont = (array_sum($additionalPoints) > 100) ? 100 : array_sum($additionalPoints);
	}
	public function setRequiredSubjects(){
		foreach($this->alapPontData->getAlapPont() as $pont){
			if($this->getRequirements->getRequired() == $pont->getNev()){
				$this->requiredSubject = $pont;
			}elseif(in_array($pont->getNev(), $this->getRequirements->getOptionalRequired())){
				if(is_null($this->optionalRequiredSubject) || $pont->getEredmeny() > $this->optionalRequiredSubject->getEredmeny()){
					$this->optionalRequiredSubject = $pont;
				}
			}
		}
	}
	public function setReturnValue(bool $value){
		$this->returnValue = $value;
	}
	public function setInputData(array $inputData){
		$this->szak = new Szak($inputData['valasztott-szak']);
		$this->alapPontData = new AlapPont($inputData['erettsegi-eredmenyek']);
		$this->tobbletPontData = new TobbletPont($inputData['tobbletpontok']);
		$egyetem = $this->szak->getEgyetem();
		$this->getRequirements = new $egyetem();
	}
}

?>