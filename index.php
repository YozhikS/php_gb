<?php

echo "Задание 1 <br>";
$a = 7;
$b = 4;

if ($a > 0 && $b > 0) {
	echo "Разность " . ($a - $b); 
} elseif ($a < 0 && $b < 0) {
	echo "Произведение " . ($a * $b);
} elseif ($a * $b < 0) {
	echo "Сумма " . ($a + $b);
} else {
	echo "Одна из переменных равна 0";
}// обошел использование 0 как положительное число.

echo "<hr> Задание 2 <br>";
$a = 11;
switch($a){
   case 1: echo "1<br>";
   case 2: echo "2<br>";
   case 3: echo "3<br>";
   case 4: echo "4<br>";
   case 5: echo "5<br>";
   case 6: echo "6<br>";
   case 7: echo "7<br>";
   case 8: echo "8<br>";
   case 9: echo "9<br>";
   case 10: echo "10<br>";
   case 11: echo "11<br>";
   case 12: echo "12<br>";
   case 13: echo "13<br>";
   case 14: echo "14<br>";
   case 15: echo "15<br>";
   		break;
   default: break;
}

echo "<hr> Задание 3 <br>";
function difference($arg1, $arg2){
	return $arg1 - $arg2;
}
function summ($arg1, $arg2){
	return $arg1 + $arg2;
}
function division($divisor, $quotient) {
	if ($quotient == 0) {
		return "делить на 0 нельзя!"
	}
	return $divisor / $quotient;
}
function multiplication($arg1, $arg2) {
	return $arg1 * $arg2;
}
echo difference(5,8) . "<br>";
echo summ(2,9) . "<br>";
echo division(44,3) . "<br>";
echo multiplication(2,5) . "<br>";

echo "<hr> Задание 4 <br>";
function mathOperation($arg1, $arg2, $operation){
	switch ($operation) {
		case '+':
			return summ($arg1,$arg2);
		case '-':
			return difference($arg1,$arg2);
		case '*':
			return multiplication($arg1,$arg2);
		case '/':
			return division($arg1,$arg2);
		default: return "Я простой калькулятор, не умею выполнять сложные вычисления.";
	}
}

echo "<hr> Задание 5 <br>";
$dateNow = date('Y');

echo "<hr> Задание 6 <br>";
function power($val, $pow) {
	if ($pow < 1) {
		if ($pow < 0) {
			return "В задании были только положительные степени!"
		}
		return 1;
	}
	return power($val, $pow-1) * $val;
}
echo power(2,64) . "<br>";

echo "<hr> Задание 7 <br>";
function timeNow ($hour, $min) {
	$outStr = " час";
	if (((int)$hour > 1 && (int)$hour < 5) || ((int)$hour > 21 && (int)$hour < 24)) {
	   		$outStr = $outStr . "а";
	}elseif ((int)$hour == 0 || ((int)$hour >= 5 && (int)$hour < 21)) {
	   		$outStr = $outStr . "ов";
	}
	$outStr = $hour . $outStr . " " . $min . " минут";
	if (((int)$min == 1 || ($min % 10) == 1) && (int)$min != 11) {
	   		$outStr = $outStr . "а";
	}elseif ((
		((int)$min > 1 && (int)$min < 5) || 
		(($min % 10) > 1) && (($min % 10) < 5 )) &&
		((int)$min < 5 || (int)$min > 21)) {
	   		$outStr = $outStr . "ы";
	}
	return $outStr;
}

echo timeNow(date('G'),date('i')). "<br>";