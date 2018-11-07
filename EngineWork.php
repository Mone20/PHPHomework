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
$FirstCylinder->LampIsOn=false;
$SecondCylinder->LampIsOn=false;
$ThirdCylinder->LampIsOn=false;
$FourthCylinder->LampIsOn=false;
//первый такт
echo '<br/><br/>';
echo 'открыть первый клапан первого цилиндра<br/>';
$FirstCylinder->FirstValveMove();
echo 'опустить первый поршень<br/>';
$FirstCylinder->PistonMove();
if($SecondCylinder->SecondValveIsOpen)
{
echo 'закрыть второй клапан второго цилиндра<br/>';
$SecondCylinder->SecondValveMove();
}
echo 'поднять второй поршень<br/>';
$SecondCylinder->PistonMove();
echo 'поднять третий поршень<br/>';
$ThirdCylinder->PistonMove();
echo 'опустить четвертый поршень<br/>';
$FourthCylinder->PistonMove();
echo '<br/><br/>';
//второй такт
echo 'закрыть первый клапан первого цилиндра<br/>';
$FirstCylinder->FirstValveMove();
echo 'поднять первый поршень<br/>';
$FirstCylinder->PistonMove();
echo 'опустить второй поршень<br/>';
$SecondCylinder->PistonMove();
echo 'открыть первый клапан третьего цилиндра<br/>';
$ThirdCylinder->FirstValveMove();
echo 'опустить третий поршень<br/>';
$ThirdCylinder->PistonMove();
echo 'поднять четвертый поршень<br/>';
$FourthCylinder->PistonMove();
echo '<br/><br/>';
//третий такт
echo 'взрыв в первом цилиндре<br/>';
$FirstCylinder->Explosion();
echo 'опустить первый поршень<br/>';
$FirstCylinder->FirstValveMove();
echo 'поднять второй поршень<br/>';
$SecondCylinder->PistonMove();
echo 'закрыть первый клапан третьего цилиндра<br/>';
$ThirdCylinder->FirstValveMove();
echo 'поднять третий поршень<br/>';
$ThirdCylinder->PistonMove();
echo 'открыть первый клапан четвертого цилиндра<br/>';
$FourthCylinder->FirstValveMove();
echo 'опустить четвертый поршень<br/>';
$FourthCylinder->PistonMove();
echo '<br/><br/>';
//четвертый такт
echo 'открыть второй клапан первого цилиндра<br/>';
$FirstCylinder->SecondValveMove();
echo 'поднять первый поршень<br/>';
$FirstCylinder->PistonMove();
echo 'закрыть второй клапан первого цилиндра<br/>';
$FirstCylinder->SecondValveMove();
echo 'открыть первый клапан второго цилиндра<br/>';
$SecondCylinder->FirstValveMove();
echo 'опустить второй поршень<br/>';
$SecondCylinder->PistonMove();
echo 'взрыв в третьем цилиндре<br/>';
$ThirdCylinder->Explosion();
echo 'опустить третий поршень<br/>';
$ThirdCylinder->PistonMove();
echo 'поднять четвертый поршень<br/>';
$FourthCylinder->PistonMove();
echo '<br/><br/>';
//
echo 'опустить первый поршень<br/>';
$FirstCylinder->FirstValveMove();
echo 'закрыть первый клапан второго цилиндра<br/>';
$SecondCylinder->FirstValveMove();
echo 'поднять второй поршень<br/>';
$SecondCylinder->PistonMove();
echo 'открыть второй клапан третьего цилиндра<br/>';
$ThirdCylinder->SecondValveMove();
echo 'поднять третий поршень<br/>';
$ThirdCylinder->PistonMove();
echo 'закрыть второй клапан третьего цилиндра<br/>';
$ThirdCylinder->SecondValveMove();
echo 'взрыв в четвертом цилиндре<br/>';
$FourthCylinder->Explosion();
echo 'опустить четвертый поршень<br/>';
$FourthCylinder->PistonMove();
echo '<br/><br/>';
//
echo 'поднять первый поршень<br/>';
$FirstCylinder->PistonMove();
echo 'взрыв во втором цилиндре<br/>';
$SecondCylinder->Explosion();
echo 'опустить второй поршень<br/>';
$SecondCylinder->PistonMove();
echo 'открыть второй клапан второго цилиндра<br/>';
$SecondCylinder->SecondValveMove();
echo 'опустить третий поршень<br/>';
$ThirdCylinder->PistonMove();
echo 'поднять четвертый поршень<br/>';
$FourthCylinder->PistonMove();
echo '<br/><br/>';
}
for($i=1;;$i++)
{
	echo '<br/>Цикл №'.$i;
	EngineWorks();
	

}
?>
