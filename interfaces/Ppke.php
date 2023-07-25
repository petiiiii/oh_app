<?

class Ppke implements RequirementsInterface{
	
	public function getBaseRequired(){
		return ["magyar nyelv és irodalom", "történelem", "matematika"];
	}
	public function getRequired(){
		return "angol";
	}
	public function getOptionalRequired(){
		return ["biológia", "fizika", "informatika", "kémia"];
	}
	public function getTipus(){
		return "emelt";
	}
}

?>