<?php
function TemperatureVaries ($TemperatureTomorrow,$TemperatureToday)
{
	return ($TemperatureToday-$TemperatureTomorrow);
}
function ItIsCold($NeighborsWords)
{
	$NeighborsWordsMassive=[];
	$NeighborsWordsMassive=explode(' ',$NeighborsWords);
	foreach ($NeighborsWordsMassive as $key => $Word) {
		if($Word=='замерзла'||$Word='заморозки'||$Word='холодно')
		{
			return true;
		}
	}
	return false;
}
function TemperatureDrop($TemperatureToday,$TemperatureTomorrow,$TemperatureYesterday)
{
	if($TemperatureYesterday>$TemperatureToday&&$TemperatureToday>$TemperatureTomorrow)
	{
		return true;
	}
	return false;
}
function IsDanger($TemperatureDown,$TemperatureDifference,$NeighborsWords)
{
	if(ItIsCold($NeighborsWords)&&$TemperatureDown&&($TemperatureDifference>5))
	{
		return true;
	}
	return false;
}
$TemperatureToday=12;
$TemperatureTomorrow=10;
$TemperatureYesterday=11;
$NeighborsWords='сегодня холодно';
$IsRain=true;
$MomsWords='';
$TemperatureDown=TemperatureDrop($TemperatureToday,$TemperatureTomorrow,$TemperatureYesterday);
$TemperatureDifference=TemperatureVaries($TemperatureTomorrow,$TemperatureToday);
if(!IsDanger($TemperatureDown,$TemperatureDifference,$NeighborsWords))
{

	if($TemperatureDown||ItIsCold($NeighborsWords))
	{
         $MomsWords='Ты хорошо оделся?';
	}
	else
	{
		if($TemperatureToday<13)
		{
		if($TemperatureTomorrow>=11&&$TemperatureYesterday>=11)
		{
			$MomsWords='Надень шапку';
		}
		if($TemperatureTomorrow<11||$TemperatureYesterday<11)
		{
			$MomsWords='Надень шапку';
		}
	}

	}
	if($IsRain)
	{
		$MomsWords=$MomsWords.' '.'Возьми с собой зонт';
		if($TemperatureDifference>3)
		{
			$MomsWords=$MomsWords.' '.'и шарф';
		}
	}


}
else
$MomsWords='Ты не пройдешь!!!';


echo $MomsWords;
?>
