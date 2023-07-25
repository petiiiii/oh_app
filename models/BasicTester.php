<?php



class BasicTester extends \PHPUnit\Framework\TestCase{
	
	public function testThatStringsMatch(){
		$processor = new EredmenyProcessor();
		$processor->setReturnValue(true);
		
		require_once "homework_input.php";
		$expectedResult = 470;
		$processor->setInputData($exampleData);
		$calcedPoint = $processor->run();
		$this->assertSame($expectedResult, $calcedPoint);
		
		$expectedResult = 476;
		$processor->setInputData($exampleData1);
		$calcedPoint = $processor->run();
		$this->assertSame($expectedResult, $calcedPoint);
		
		$expectedResult = "hiba, nem lehetséges a pontszámítás a kötelező érettségi tárgyak hiánya miatt";
		$processor->setInputData($exampleData2);
		$calcedPoint = $processor->run();
		$this->assertSame($expectedResult, $calcedPoint);
		
		$expectedResult = "hiba, nem lehetséges a pontszámítás a magyar nyelv és irodalom tárgyból elért 20% alatti eredmény miatt";
		$processor->setInputData($exampleData3);
		$calcedPoint = $processor->run();
		$this->assertSame($expectedResult, $calcedPoint);
	}
	
}

?>