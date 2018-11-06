<!DOCTYPE html>
<html>
 <head>
 <meta charset='utf-8'>
 </head>
 <body>
 <form method="POST">
 ВВЕДИТЕ ЧИСЛО:<input type="text" name="value">
  </br>
 ВВЕДИТЕ СИСТЕМУ СЧИСЛЕНИЯ ДЛЯ ВВЕДЕННОГО ЧИСЛА :<input type="text" name="basisin">
 </br>
 ВВЕДИТЕ СИСТЕМУ СЧИСЛЕНИЯ ДЛЯ ПЕРЕВОДА:<input type="text" name="basisout">
  </br>
  <input type="submit"  value="Отправить">
 </br>
</form>
ОТВЕТ:
</body>
<?php
$Value=$_POST['value'];
$Basis_In=(int)$_POST['basisin'];
$Basis_Out=(int)$_POST['basisout'];
 function Comparison($Div){
     	switch ($Div) {
	case 15:
	return 'F';
		break;
		case 14:
	return 'E';
		break;
		case 13:
	return 'D';
		break;
		case 12:
	return 'C';
		break;
		case 11:
	return 'B';
		break;
		case 10:
	return 'A';
		break;
	default:
	return $Div;
		break;
}
}
function DecimalFractionNotation($Value,$Basis_In)
{
	$Value_Massive=[];
	$Value_Massive=str_split($Value);
	$Amount=0;
	foreach ($Value_Massive as $Key => $Number) {
switch ($Number) {
	case 'A':
		$Amount=$Amount+($Basis_In**((-1)*($Key+1)))*10;
		break;
		case 'B':
		$Amount=$Amount+($Basis_In**((-1)*($Key+1)))*11;
		break;
		case 'C':
		$Amount=$Amount+($Basis_In**((-1)*($Key+1)))*12;
		break;
		case 'D':
		$Amount=$Amount+($Basis_In**((-1)*($Key+1)))*13;
		break;
		case 'E':
		$Amount=$Amount+($Basis_In**((-1)*($Key+1)))*14;
		break;
		case 'F':
		$Amount=$Amount+($Basis_In**((-1)*($Key+1)))*15;
		break;
	default:
	$Number=(int)$Number;
	$Amount=$Amount+($Basis_In**((-1)*($Key+1)))*$Number;
		break;
}
}
return $Amount;
}
function DecimalNotation($Value,$Basis_In)
{
	$Value_Massive=[];
	$Value_Massive=str_split($Value);
	$Amount=0;
	foreach ($Value_Massive as $Key => $Number) {
switch ($Number) {
	case 'A':
		$Amount=$Amount+($Basis_In**(count ($Value_Massive)-($Key+1)))*10;
		break;
		case 'B':
		$Amount=$Amount+($Basis_In**(count ($Value_Massive)-($Key+1)))*11;
		break;
		case 'C':
		$Amount=$Amount+($Basis_In**(count ($Value_Massive)-($Key+1)))*12;
		break;
		case 'D':
		$Amount=$Amount+($Basis_In**(count ($Value_Massive)-($Key+1)))*13;
		break;
		case 'E':
		$Amount=$Amount+($Basis_In**(count ($Value_Massive)-($Key+1)))*14;
		break;
		case 'F':
		$Amount=$Amount+($Basis_In**(count ($Value_Massive)-($Key+1)))*15;
		break;
	default:
	$Number=(int)$Number;
	$Amount=$Amount+($Basis_In**(count ($Value_Massive)-($Key+1)))*$Number;
		break;
}
}
return $Amount;
}
function Conversion($Value,$Basis_In,$Basis_Out)
{
     $Count_Massive=[];
     if($Basis_In==10)
     {
     $Count=$Value;
 }
 else
 {
 	$Count=DecimalNotation($Value,$Basis_In);
 }
     
     while($Count>=$Basis_Out)
     {
   
     	$Count_Massive[]=Comparison($Count%$Basis_Out);

   $Count=intdiv($Count,$Basis_Out);

 
     }


    $Count_Massive[]=Comparison($Count); 
    $Count_Massive=array_reverse($Count_Massive);
    $Value_Out=implode($Count_Massive);
    return $Value_Out;
}
function ConversionFraction($Value,$Basis_In,$Basis_Out)
{
$Increase=0;
$Fraction_Massive=explode('.',$Value);
$Count_Massive=[];
     if($Basis_In==10)
     {
     $Count='0.'.$Fraction_Massive[count($Fraction_Massive)-1];
 }
 else
 {
 	$Count=DecimalFractionNotation($Fraction_Massive[count($Fraction_Massive)-1],$Basis_In);
 }
     $Count_Massive[]='0';
     $Count_Massive[]='.';
     $i=0;
     while($Count!=0)
     {
     	$Count=$Count*$Basis_Out;
     	$Count_Massive[]=Comparison(floor($Count));
        $Count=$Count-floor($Count);
        $i++;
        if($i>20)
        {
        	break;
        }

     }
 
    $Count_Massive[]=Comparison($Count); 
    $Value_Out=implode($Count_Massive);
    return $Value_Out;


}
$ResultInteger;
$ResultFraction;
$Value_Massive=[];
$Fraction_Massive=[];
$Value_Massive=str_split($Value);
$ItFraction=false;
foreach ($Value_Massive as $key => $number) {
	if($number=='.')
	{
		$ItFraction=true;
	}

}
$Fraction_Massive=explode('.',$Value);
if($ItFraction)
{

	if($Basis_Out==10&&$Basis_In==10)
{
$ResultFraction=$Value;
}
elseif($Basis_Out==10)
{
$ResultFraction=DecimalFractionNotation($Fraction_Massive[count($Fraction_Massive)-1],$Basis_In);
}
else
{
	$ResultFraction=ConversionFraction($Value,$Basis_In,$Basis_Out);
}
}

if($Basis_Out==10&&$Basis_In==10)
{
$ResultInteger=$Fraction_Massive[0];
}
elseif($Basis_Out==10)
{
    $ResultInteger=DecimalNotation($Fraction_Massive[0],$Basis_In);
}
else
{
$ResultInteger=Conversion($Fraction_Massive[0],$Basis_In,$Basis_Out);
}
$ResultFraction=trim($ResultFraction,'0');
echo $ResultInteger.$ResultFraction;
?>
</html>
