<?php
header("Content-Type: text/html; charset=utf-8");

abstract class Figure{
    abstract public function area();
}

class Circle extends Figure
{
    public $radius = 0; //радиус
	
	public function __construct(int $radius = 0) {
        $this->radius = $radius;
    }
	
	function area(){
        return pi()*pow($this->radius,2);
    }
}

class Rectangle extends Figure
{
    public $parameters = array(0,0); //стороны
	
	public function __construct(int $side1 = 0, int $side2 = 0) {
        $this->parameters[0] = $side1;
        $this->parameters[1] = $side2;
    }
	
	function area(){
        return $this->parameters[0]*$this->parameters[1];
    }
}

class Triangle extends Figure
{
    public $parameters = array(0,0,0); //стороны и угол в радианах
	
	public function __construct(int $side1 = 0, int $side2 = 0, int $angle = 0) {
        $this->parameters[0] = $side1;
        $this->parameters[1] = $side2;	
        $this->parameters[2] = abs($angle);
    }
	
	function area(){
        return 0.5*$this->parameters[0]*$this->parameters[1]*sin($this->parameters[2]);
    }
}




?>