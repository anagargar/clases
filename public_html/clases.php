<?php


class animal
{
	public function comer()
	{
		echo "Comer";
	}	
	
	protected function escupir()
	{
		echo "Warrroooo";
	}
}


class humano extends animal
{
	public $property="Value";
	
	protected function mentir()
	{
		 echo "Es que es una amiga";
// 		 $this->property="Other value";
	}
	
	public function depredador()
	{
		
	}
}


class user extends humano
{
	public $name='';
	protected $amante=array();
	const pi="3.14159265";
	
	function __construct($name)
	{
		$this->name=$name;
	}
	
	protected function tenerAmante()
	{
		$this->amante=array('anillo'=>self::pi);
	}
	
	public function irsedeMarcha()
	{
		$this->tenerAmante();
		
	}
	
	public static function hacerseElLongui()
	{
		parent::mentir();
		parent::escupir();
	}
	
	function __destruct()
	{
		$this->name="RIP".$this->name;
		$baja="6747352562";
	}
}


$usuario1 = new user('agustin');
$usuario2 = new user('sebastian');

echo $usuario1->name;

$usuario1->name="Agustin sin novia";

echo $usuario1->name;
$usuario1->irsedeMarcha();

// user::hacerseElLongui();

$usuario1->hacerseElLongui();
$usuario1->comer();

echo "<pre>";
print_r($usuario1);
echo "</pre>";






user::hacerseElLongui();



