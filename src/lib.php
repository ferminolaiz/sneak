<?php

	function text2list($text) {
		$string = "";
		foreach (explode(PHP_EOL, $text) as $line ) {
			$string .= "<li class=\"li1\"><span class=\"de1\">".$line."</span></li>";
		}
		return $string;
	}

	function asc2hex($str) {
		return trim(chunk_split(bin2hex($str), 2, " "));
	}

	function hex2asc($str) {
		$newstring = "";
		$str = str_replace(" ", "", $str);
		for ( $n = 0; $n < strlen($str); $n += 2 ) {
			$newstring .=  pack("C", hexdec( substr( $str, $n, 2) ) );
		}
		return $newstring;
	}

	function asc2bin($str) {
		$newstring = "";
		$text_array = explode("\r\n", chunk_split($str, 1));
		for ($n = 0; $n < count($text_array) - 1; $n++) {
			$newstring .= substr("0000".base_convert(ord($text_array[$n]), 10, 2), -8);
		}
		$newstring = chunk_split($newstring, 8, " ");
		return trim($newstring);
	}

	function bin2asc($str) {
		$newstring = "";
		$str = str_replace(" ", "", $str);
		$text_array = explode("\r\n", chunk_split($str, 8));
		for ($n = 0; $n < count($text_array) - 1; $n++) {
			$newstring .= chr(base_convert($text_array[$n], 2, 10));
		}
		return $newstring;
	}

	function binary2hex($str) {
		$newstring = "";
		$str = str_replace(" ", "", $str);
		$text_array = explode("\r\n", chunk_split($str, 8));
		for ($n = 0; $n < count($text_array) - 1; $n++) {
			$newstring .= str_pad(base_convert($text_array[$n], 2, 16), 2, "0", STR_PAD_LEFT);
		}
		$newstring = chunk_split($newstring, 2, " ");
		return $newstring;
	}

	function hex2binary($str) {
		$newstring = "";
		$str = str_replace(" ", "", $str);
		$text_array = explode("\r\n", chunk_split($str, 2));
		for ($n = 0; $n < count($text_array) - 1; $n++) {
			$newstring .= substr("0000".base_convert($text_array[$n], 16, 2), -8);
		}
		$newstring = chunk_split($newstring, 8, " ");
		return $newstring;
	}

	function ascii2asciicode($text)
	{
		$newstring = "";
		for ($i=0; $i < strlen($text); $i++) { 
			$newstring .= ord($text[$i])." ";
		}
		return trim($newstring);
	}

	function asciicode2ascii($text)
	{
		$newstring = "";
		$numeros = explode(" ", $text);
		foreach ($numeros as $numero) {
			$newstring .= chr($numero);
		}
		return $newstring;
	}

	function ascii2mysql($text) {
		$newstring = "CHAR(".str_replace(" ", ",", ascii2asciicode($text)).")";
		return $newstring;
	}

	function ascii2fromcharcode($text)
	{
		$newstring = "String.fromCharCode(".str_replace(" ", ",", ascii2asciicode($text)).")";
		return $newstring;
	}

	$leet = array(
		'a' => array('4', '@', 'ä', 'ª', 'λ', 'a', 'A'),
		'b' => array('8', '|3', 'I3', 'ß', 'b'),
		'c' => array('[', '(', 'c'),
		'd' => array('[)', '|)', 'd'),
		'e' => array('3', '€', 'ë', 'E', 'e'),
		'f' => array('F', 'f'), 
		'h' => array('|-|', '}{', 'h', 'h'),
		'i' => array('¡', '|', 'i'),
		'j' => array('ʝ', 'j'),
		'k' => array('k', 'K'),
		'l' => array('1', 'l'),
		'm' => array('|v|', '/V\\', '/\\/\\', 'm'),
		'n' => array('|\|', '/\/', 'n'),
		'o' => array('0', '()', 'o'),
		'p' => array('℗','p','þ'),
		'r' => array('2', 'Я', 'r'),
		's' => array('5', '$', 'r'),
		't' => array('7', '†', 't'),
		'u' => array('|_|','u'),
		'v' => array('v', '\/'),
		'w' => array('\/\/', 'vv', 'Ш', 'w'),
		'x' => array('Ж', '×', 'x'),
		'y' => array('Ч','y'),
		'z' => array('z')
	);

	function leetencode($text)
	{
		global $leet;
		$newstring = "";
		for ( $i = 0 ; $i < strlen($text); $i++ ) {
			$letra = strtolower($text[$i]);
			if(array_key_exists($letra, $leet))
			{
				$newstring .= $leet[$letra][ rand(0, count($leet[$letra]) - 1) ];
			}else{
				$newstring .= $text[$i];
			}
		}
		return $newstring;
	}
?>