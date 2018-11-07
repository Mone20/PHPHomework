<?php
class Driver
{
var $PistonUp;
var $FirstValveIsOpen;
public $SecondValveIsOpen;
var $LampIsOn;
function __constructor()
{
	$this->PistonUp=false;
	$this->FirstValveIsOpen=false;
	$this->SecondValveIsOpen=false;
	$this->LampIsOn=false;
}
function Explosion()
{
	$this->LampIsOn=!($this->LampIsOn);
}
function PistonMove()
{
	$this->PistonUp=!($this->PistonUp);
}
function FirstValveMove()
{
	$this->FirstValveIsOpen=!($this->FirstValveIsOpen);
}
function SecondValveMove()
{
	$this->SecondValveIsOpen=!($this->SecondValveIsOpen);
}
function TaktWorks($key,$index)
{
	if($this->SecondValveIsOpen)
	{
echo 'закрыть второй клапан   ' .$index.'  поршня <br/>';
$this->SecondValveMove();
}
if($key==0)
{
	
echo 'открыть первый клапан    '.$index.'   поршня<br/>';
$this->FirstValveMove();
}
if($key==1)
{
	echo 'закрыть первый клапан   '.$index.'   поршня <br/>';
	$this->FirstValveMove();
}
if($key==2)
{
echo 'взрыв в   '.$index.'  цилиндре<br/>';
$this->Explosion();
}
if($key==3)
{
echo 'открыть второй клапан   '.$index.'  поршня <br/>';
$this->SecondValveMove();
}
if($this->PistonUp)
echo 'опустить  '.$index.'  поршень<br/>';
else
echo 'поднять  '.$index.'   поршень<br/>';
$this->PistonMove();
}
}
$FirstCylinder= new Driver();
$SecondCylinder= new Driver();
$ThirdCylinder= new Driver();
$FourthCylinder= new Driver();
$FirstCylinder->PistonUp=true;
$FourthCylinder->PistonUp=true;
function EngineWorks()
{
global $FirstCylinder;
global $SecondCylinder;
global $ThirdCylinder;
global $FourthCylinder;
for($i=0;;$i++)
{ 
	echo '<br/><br/>';
	$FirstCylinder->TaktWorks($i,1);
	$SecondCylinder->TaktWorks($i-3,2);
	$ThirdCylinder->TaktWorks($i-1,3);
	$FourthCylinder->TaktWorks($i-2,4);
	echo '<br/><br/>';
	if($i==6)
	{
		$i=0;
$FirstCylinder->LampIsOn=false;
$SecondCylinder->LampIsOn=false;
$ThirdCylinder->LampIsOn=false;
$FourthCylinder->LampIsOn=false;
	}
}

}
EngineWorks();
?>
