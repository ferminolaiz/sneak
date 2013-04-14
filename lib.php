<?php
	function asc2hex($str) {
		return chunk_split(bin2hex($str), 2, " ");
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
		return $newstring;
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
?>