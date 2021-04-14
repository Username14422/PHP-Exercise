<?php
header("Content-Type: text/html; charset=utf-8");

abstract class Figure{
    abstract public function area();
}

class Circle extends Figure{
    public $radius = 0; //радиус
	
	public function __construct(int $radius = 0) {
        $this->radius = $radius;
    }
	
	public function __toString() {
    return "circle|".$this->radius;
	}
	
	function area(){
        return pi()*pow($this->radius,2);
    }
}

class Rectangle extends Figure{
    public $parameters = array(0,0); //стороны
	
	public function __construct(int $side1 = 0, int $side2 = 0) {
        $this->parameters[0] = $side1;
        $this->parameters[1] = $side2;
    }
	
	public function __toString() {
    return "rectangle|".$this->parameters[0]."|".$this->parameters[1];
	}
	
	function area(){
        return $this->parameters[0]*$this->parameters[1];
    }
}

class Triangle extends Figure{
    public $parameters = array(0,0,0); //стороны и угол в радианах
	
	public function __construct(int $side1 = 0, int $side2 = 0, float $angle = 0) {
        $this->parameters[0] = $side1;
        $this->parameters[1] = $side2;	
        $this->parameters[2] = abs($angle);
    }
	
	public function __toString() {
    return "triangle|".$this->parameters[0]."|".$this->parameters[1]."|".$this->parameters[2];
	}
	
	function area(){
        return 0.5*$this->parameters[0]*$this->parameters[1]*sin($this->parameters[2]);
    }
}


function getRandomFigure(){
	$figure = rand(1,3);
	if ($figure == 1){
		return new Circle(rand());
	}
	else if ($figure == 2){
		return new Rectangle(rand(), rand());
	}
	else {
		return new Triangle (rand(), rand(), pi()*rand());
	}
}


function saveRandomFigure(){
	$fileName = "figures.txt";
	$figure = getRandomFigure()->__toString();
	file_put_contents ( $fileName , $figure."\r\n", FILE_APPEND );
}

function getFiguresFromFile(){	
	$fileName = "figures.txt";
	$fileStrings = file_exists($fileName)?file($fileName):array();//чтение файла построчно
	$figures = array();//возвращаемый массив
	foreach ($fileStrings as $str) {			
		$temp = explode("|", $str);
		if ($temp[0] == "circle") $figures[] = new Circle((int)$temp[1]);
		else if ($temp[0] == "rectangle") $figures[] = new Rectangle((int)$temp[1],(int)$temp[2]);
		else $figures[] = new Triangle((int)$temp[1],(int)$temp[2],(float)$temp[3]);				
	}
	return $figures;
}

function printFiguresArray($array)
{
	foreach ($array as $figure) {
		echo $figure."<br>";
	}
}

saveRandomFigure();
printFiguresArray(getFiguresFromFile());

