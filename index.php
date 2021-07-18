<?php
echo "Задание 1 <br>";
$i = 0;
while ($i <= 100) {
	if (($i % 3) == 0) {
		echo "$i<br>";
	}
	$i++;
}

echo "<hr> Задание 2 <br>";
function outNumber($numBegin='0',$numEnd='10')
{
	$context = "";
	do {
		$type = "четное число";
		if ($numBegin == 0) {
			$type = "ноль";
		} elseif ($numBegin % 2 == 1) {
			$type = "не" . $type;	
		}
		$context = $context."$numBegin – $type.<br>";
		$numBegin++;
	} while ($numBegin <= $numEnd);
	return $context;
}
echo outNumber();

echo "<hr> Задание 3 <br>";
$arrCity = [ 
	'Московская область' => 
	[
		'Москва',
		'Зеленоград',
		'Клин'
	],
	'Ленинградская область' => 
	[
		'Санкт-Петербург',
		'Всеволожск',
		'Павловск',
		'Кронштадт'
	],
	'Рязанская область' => 
	[
		'Рязань‎',
		'Ряжск',
		'Касимов‎'
	]
];

foreach ($arrCity as $key => $city) {
	echo "$key:<br>";
	echo join(', ', $city);
	echo "<br>";
}

echo "<hr> Задание 4 <br>";
function translit($string) {
    $converter = array(
        'а' => 'a',   
        'б' => 'b',   
        'в' => 'v',
        'г' => 'g',   
        'д' => 'd',   
        'е' => 'e',
        'ё' => 'e',   
        'ж' => 'zh',  
        'з' => 'z',
        'и' => 'i',   
        'й' => 'y',   
        'к' => 'k',
        'л' => 'l',   
        'м' => 'm',   
        'н' => 'n',
        'о' => 'o',   
        'п' => 'p',   
        'р' => 'r',
        'с' => 's',   
        'т' => 't',   
        'у' => 'u',
        'ф' => 'f',   
        'х' => 'h',   
        'ц' => 'c',
        'ч' => 'ch',  
        'ш' => 'sh',  
        'щ' => 'sch',
        'ь' => '\'',  
        'ы' => 'y',   
        'ъ' => '\'',
        'э' => 'e',   
        'ю' => 'yu',  
        'я' => 'ya',
    );
    return strtr(mb_convert_case($string, MB_CASE_LOWER, "UTF-8"), $converter);
}
$str = "Написать функцию транслитерации строк.";
echo $str . "<br>";
echo translit($str);

echo "<hr> Задание 5 <br>";
function underscore($string) {
	return preg_replace('~[\s]{1}~u', '_', $string);
}
echo underscore("w23ewf fwe we   wefpokjf wef.");

echo "<hr> Задание 6 <br>";
function constructorMenu($arrMenu, $level = 1) {
	$srt = "ul";
	if ($level % 2 == 0) {
		$srt = "li";
	}
	$str = "<" . $srt . ">";
	foreach ($arrMenu as $key => $childMenu) {
		if (gettype($childMenu) == "string") {
			echo $str . $childMenu . substr_replace($str, "/", 1, 0);
		} else
		{
			echo $str . $key;
			constructorMenu($childMenu, $level + 1);
			echo substr_replace($str, "/", 1, 0);
		}
	}
	return;
}

$arr = [ 
	'Home',
	'Man' =>	
	[
		'Skirts/Shorts',
		'Sweaters/Knits',
		'Denim'
	],
	'Women' => 
	[
		'Dresses',
		'Tops',
	],
	'Kids' =>
	[
		'Man' =>	
		[
			'Skirts/Shorts',
			'Sweaters/Knits',
			'Denim'
		],
		'Women' => 
		[
			'Dresses',
			'Tops',
		],
	],
	'Accoseriese',
	'Featured'
];
constructorMenu($arr);

echo "<hr> Задание 7 <br>";
for ($i=0; $i < 10; print($i++)) { 
	// здесь пусто
}

echo "<hr> Задание 8 <br>";
foreach ($arrCity as $key => $value) {
	echo "$key:<br>";
	foreach ($value as $city) {
		if (mb_ereg_match("^К", $city)) {
			echo "$city ";
		}
	}
	echo "<br>";
}

echo "<hr> Задание 9 <br>";
function translitUrl($string) {
    return underscore(translit($string));
}
$str = "аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах";
echo $str . "<br>";
echo translitUrl($str);
echo "<hr>";