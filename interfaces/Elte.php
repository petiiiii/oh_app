<?

class Elte implements RequirementsInterface{
	
	public function getBaseRequired(){
		return ["magyar nyelv és irodalom", "történelem", "matematika"];
	}
	public function getRequired(){
		return "matematika";
	}
	public function getOptionalRequired(){
		return ["biológia", "fizika", "informatika", "kémia"];
	}
	public function getTipus(){
		return "normal";
	}
}

?>